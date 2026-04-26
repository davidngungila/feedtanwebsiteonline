<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\FeedtanSurvey;

class FeedtanSurveyController extends Controller
{
    public function index()
    {
        return view('feedtan-survey.index');
    }

    public function create()
    {
        return view('feedtan-survey.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'nullable|string|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'customer_email' => 'nullable|email|max:255',
            'customer_location' => 'nullable|string|max:500',
            'frequently_purchased_products' => 'nullable|array',
            'frequently_purchased_products.*' => 'string',
            'wants_delivery_service' => 'nullable|boolean',
            'survey_table_data' => 'nullable|array',
            'survey_table_data.*.product' => 'nullable|string|max:255',
            'survey_table_data.*.frequency_per_week' => 'nullable|string|max:255',
            'survey_table_data.*.quantity_per_purchase' => 'nullable|string|max:255',
            'survey_table_data.*.suggestions' => 'nullable|string|max:500',
            'hard_to_find_product' => 'nullable|string|max:500',
            'products_to_sell' => 'nullable|string|max:500',
            'additional_suggestions' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tafadhali hakikisha umefanya sehemu zote zinazohitajika.',
                    'errors' => $validator->errors()
                ], 422);
            }
            
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Clean and format the data
        $surveyData = $request->all();
        
        // Filter out empty survey table entries
        if (isset($surveyData['survey_table_data'])) {
            $surveyData['survey_table_data'] = array_filter($surveyData['survey_table_data'], function($item) {
                return !empty($item['product']);
            });
        }

        $survey = FeedtanSurvey::create($surveyData);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Asante kwa kujibu survey! Jibu lako litatusaidia kuboresha huduma zetu.'
            ]);
        }

        return redirect()->route('dodoso.survey.thankyou')
            ->with('success', 'Asante kwa kujibu survey! Jibu lako litatusaidia kuboresha huduma zetu.');
    }

    public function thankyou()
    {
        return view('feedtan-survey.thankyou');
    }

    public function admin(Request $request)
    {
        $perPage = $request->get('per_page', 50);
        $surveys = FeedtanSurvey::latest()->paginate($perPage);
        
        // Calculate statistics
        $stats = [
            'total_responses' => FeedtanSurvey::count(),
            'delivery_service_demand' => [
                'yes' => FeedtanSurvey::where('wants_delivery_service', true)->count(),
                'no' => FeedtanSurvey::where('wants_delivery_service', false)->count(),
            ],
            'product_demand' => $this->getProductDemandStats(),
            'hard_to_find_products' => FeedtanSurvey::whereNotNull('hard_to_find_product')
                ->where('hard_to_find_product', '!=', '')
                ->pluck('hard_to_find_product')
                ->toArray(),
            'products_to_sell' => FeedtanSurvey::whereNotNull('products_to_sell')
                ->where('products_to_sell', '!=', '')
                ->pluck('products_to_sell')
                ->toArray(),
        ];

        return view('feedtan-survey.admin', compact('surveys', 'stats'));
    }

    public function show($id)
    {
        $survey = FeedtanSurvey::findOrFail($id);
        return view('feedtan-survey.show', compact('survey'));
    }

    public function export()
    {
        $surveys = FeedtanSurvey::latest()->get();
        
        // Generate comprehensive analytics
        $analytics = $this->generateAdvancedAnalytics($surveys);
        
        // Create CSV with advanced structure
        $csv = $this->createAdvancedExportCSV($surveys, $analytics);

        $filename = 'feedtan_advanced_export_' . date('Y-m-d_H-i-s') . '.csv';
        
        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    private function generateAdvancedAnalytics($surveys)
    {
        $totalSurveys = $surveys->count();
        $analytics = [
            'summary' => [
                'total_responses' => $totalSurveys,
                'export_date' => now()->format('Y-m-d H:i:s'),
                'date_range' => [
                    'start' => $surveys->min('created_at')->format('Y-m-d'),
                    'end' => $surveys->max('created_at')->format('Y-m-d')
                ]
            ],
            'customer_demographics' => [
                'identified_customers' => $surveys->whereNotNull('customer_name')->where('customer_name', '!=', '')->count(),
                'unidentified_customers' => $surveys->filter(function($survey) {
                    return is_null($survey->customer_name) || $survey->customer_name === '';
                })->count(),
                'customers_with_phone' => $surveys->whereNotNull('customer_phone')->where('customer_phone', '!=', '')->count(),
                'customers_with_email' => $surveys->whereNotNull('customer_email')->where('customer_email', '!=', '')->count(),
                'customers_with_location' => $surveys->whereNotNull('customer_location')->where('customer_location', '!=', '')->count(),
            ],
            'product_preferences' => [],
            'delivery_service' => [
                'wants_delivery' => $surveys->where('wants_delivery_service', true)->count(),
                'does_not_want_delivery' => $surveys->where('wants_delivery_service', false)->count(),
                'delivery_percentage' => $totalSurveys > 0 ? round(($surveys->where('wants_delivery_service', true)->count() / $totalSurveys) * 100, 2) : 0
            ],
            'market_insights' => [
                'hard_to_find_products' => $surveys->whereNotNull('hard_to_find_product')->where('hard_to_find_product', '!=', '')->pluck('hard_to_find_product')->toArray(),
                'products_to_sell' => $surveys->whereNotNull('products_to_sell')->where('products_to_sell', '!=', '')->pluck('products_to_sell')->toArray(),
                'additional_suggestions' => $surveys->whereNotNull('additional_suggestions')->where('additional_suggestions', '!=', '')->pluck('additional_suggestions')->toArray(),
            ],
            'survey_table_analysis' => [
                'total_products_mentioned' => 0,
                'unique_products' => [],
                'frequency_analysis' => [],
                'quantity_analysis' => []
            ]
        ];

        // Analyze product preferences
        $categories = array_keys(FeedtanSurvey::$productCategories);
        foreach ($categories as $category) {
            $count = 0;
            foreach ($surveys as $survey) {
                if (is_array($survey->frequently_purchased_products) && in_array($category, $survey->frequently_purchased_products)) {
                    $count++;
                }
            }
            $analytics['product_preferences'][$category] = [
                'count' => $count,
                'percentage' => $totalSurveys > 0 ? round(($count / $totalSurveys) * 100, 2) : 0,
                'label' => FeedtanSurvey::$productCategories[$category] ?? $category
            ];
        }

        // Analyze survey table data
        $allProducts = [];
        $frequencies = [];
        $quantities = [];
        
        foreach ($surveys as $survey) {
            if (is_array($survey->survey_table_data)) {
                foreach ($survey->survey_table_data as $item) {
                    if (!empty($item['product'])) {
                        $allProducts[] = $item['product'];
                        $analytics['survey_table_analysis']['total_products_mentioned']++;
                        
                        if (!empty($item['frequency_per_week'])) {
                            $frequencies[] = $item['frequency_per_week'];
                        }
                        
                        if (!empty($item['quantity_per_purchase'])) {
                            $quantities[] = $item['quantity_per_purchase'];
                        }
                    }
                }
            }
        }
        
        $analytics['survey_table_analysis']['unique_products'] = array_unique($allProducts);
        $analytics['survey_table_analysis']['frequency_analysis'] = array_count_values($frequencies);
        $analytics['survey_table_analysis']['quantity_analysis'] = array_count_values($quantities);

        return $analytics;
    }

    private function createAdvancedExportCSV($surveys, $analytics)
    {
        $csv = '';

        // Header Section
        $csv .= "FEEDTAN DUKO LA KISASA - ADVANCED SURVEY EXPORT\n";
        $csv .= "Export Date: " . $analytics['summary']['export_date'] . "\n";
        $csv .= "Data Range: " . $analytics['summary']['date_range']['start'] . " to " . $analytics['summary']['date_range']['end'] . "\n";
        $csv .= "Total Responses: " . $analytics['summary']['total_responses'] . "\n";
        $csv .= "\n";

        // Executive Summary
        $csv .= "EXECUTIVE SUMMARY\n";
        $csv .= "Metric,Value,Percentage\n";
        $csv .= "Total Responses," . $analytics['summary']['total_responses'] . ",100%\n";
        $csv .= "Identified Customers," . $analytics['customer_demographics']['identified_customers'] . "," . 
                round(($analytics['customer_demographics']['identified_customers'] / $analytics['summary']['total_responses']) * 100, 2) . "%\n";
        $csv .= "Customers Wanting Delivery," . $analytics['delivery_service']['wants_delivery'] . "," . $analytics['delivery_service']['delivery_percentage'] . "%\n";
        $csv .= "Customers with Phone Numbers," . $analytics['customer_demographics']['customers_with_phone'] . "," . 
                round(($analytics['customer_demographics']['customers_with_phone'] / $analytics['summary']['total_responses']) * 100, 2) . "%\n";
        $csv .= "Customers with Email," . $analytics['customer_demographics']['customers_with_email'] . "," . 
                round(($analytics['customer_demographics']['customers_with_email'] / $analytics['summary']['total_responses']) * 100, 2) . "%\n";
        $csv .= "Customers with Location," . $analytics['customer_demographics']['customers_with_location'] . "," . 
                round(($analytics['customer_demographics']['customers_with_location'] / $analytics['summary']['total_responses']) * 100, 2) . "%\n";
        $csv .= "\n";

        // Product Preferences Analysis
        $csv .= "PRODUCT PREFERENCES ANALYSIS\n";
        $csv .= "Category,Count,Percentage,Label\n";
        foreach ($analytics['product_preferences'] as $category => $data) {
            $csv .= "{$category},{$data['count']},{$data['percentage']}%,{$data['label']}\n";
        }
        $csv .= "\n";

        // Survey Table Analysis
        $csv .= "DETAILED PRODUCT ANALYSIS\n";
        $csv .= "Metric,Value\n";
        $csv .= "Total Products Mentioned," . $analytics['survey_table_analysis']['total_products_mentioned'] . "\n";
        $csv .= "Unique Products," . count($analytics['survey_table_analysis']['unique_products']) . "\n";
        $csv .= "\n";

        // Frequency Analysis
        $csv .= "PURCHASE FREQUENCY ANALYSIS\n";
        $csv .= "Frequency,Count\n";
        foreach ($analytics['survey_table_analysis']['frequency_analysis'] as $freq => $count) {
            $csv .= "{$freq},{$count}\n";
        }
        $csv .= "\n";

        // Quantity Analysis
        $csv .= "QUANTITY ANALYSIS\n";
        $csv .= "Quantity,Count\n";
        foreach ($analytics['survey_table_analysis']['quantity_analysis'] as $qty => $count) {
            $csv .= "{$qty},{$count}\n";
        }
        $csv .= "\n";

        // Market Insights
        $csv .= "MARKET INSIGHTS\n";
        $csv .= "Hard to Find Products,Count\n";
        $hardToFindCounts = array_count_values($analytics['market_insights']['hard_to_find_products']);
        foreach ($hardToFindCounts as $product => $count) {
            $csv .= '"' . str_replace('"', '""', $product) . "',{$count}\n";
        }
        $csv .= "\n";

        $csv .= "Products Customers Want to Sell,Count\n";
        $productsToSellCounts = array_count_values($analytics['market_insights']['products_to_sell']);
        foreach ($productsToSellCounts as $product => $count) {
            $csv .= '"' . str_replace('"', '""', $product) . "',{$count}\n";
        }
        $csv .= "\n";

        // Detailed Survey Responses
        $csv .= "DETAILED SURVEY RESPONSES\n";
        $csv .= "ID,Customer Name,Phone,Email,Location,Frequently Purchased Products,Wants Delivery,Product Count,Table Data Count,Hard to Find Product,Products to Sell,Additional Suggestions,Submission Date\n";

        foreach ($surveys as $survey) {
            $frequentlyPurchased = is_array($survey->frequently_purchased_products) 
                ? implode('; ', $survey->frequently_purchased_products) 
                : '';
            
            $tableDataCount = is_array($survey->survey_table_data) ? count($survey->survey_table_data) : 0;
            
            $csv .= implode(',', [
                $survey->id,
                '"' . str_replace('"', '""', $survey->customer_name ?? '') . '"',
                '"' . str_replace('"', '""', $survey->customer_phone ?? '') . '"',
                '"' . str_replace('"', '""', $survey->customer_email ?? '') . '"',
                '"' . str_replace('"', '""', $survey->customer_location ?? '') . '"',
                '"' . str_replace('"', '""', $frequentlyPurchased) . '"',
                $survey->wants_delivery_service ? 'Yes' : 'No',
                $tableDataCount,
                is_array($survey->survey_table_data) ? count($survey->survey_table_data) : 0,
                '"' . str_replace('"', '""', $survey->hard_to_find_product ?? '') . '"',
                '"' . str_replace('"', '""', $survey->products_to_sell ?? '') . '"',
                '"' . str_replace('"', '""', $survey->additional_suggestions ?? '') . '"',
                $survey->created_at->format('Y-m-d H:i:s')
            ]) . "\n";
        }

        return $csv;
    }

    private function getProductDemandStats()
    {
        $stats = [];
        $categories = array_keys(FeedtanSurvey::$productCategories);
        
        foreach ($categories as $category) {
            $stats[$category] = FeedtanSurvey::where('frequently_purchased_products', 'like', '%"' . $category . '"%')->count();
        }
        
        return $stats;
    }
}
