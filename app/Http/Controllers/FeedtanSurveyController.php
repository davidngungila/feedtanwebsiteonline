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

    public function export()
    {
        $surveys = FeedtanSurvey::latest()->get();
        
        $csv = implode(',', [
            'ID', 'Customer Name', 'Phone', 'Email', 'Location',
            'Frequently Purchased Products', 'Wants Delivery', 'Survey Table Data',
            'Hard to Find Product', 'Products to Sell', 'Additional Suggestions', 'Created At'
        ]) . "\n";

        foreach ($surveys as $survey) {
            $frequentlyPurchased = is_array($survey->frequently_purchased_products) 
                ? implode('; ', $survey->frequently_purchased_products) 
                : '';
            
            $surveyTableData = is_array($survey->survey_table_data) 
                ? json_encode($survey->survey_table_data) 
                : '';
            
            $csv .= implode(',', [
                $survey->id,
                '"' . ($survey->customer_name ?? '') . '"',
                '"' . ($survey->customer_phone ?? '') . '"',
                '"' . ($survey->customer_email ?? '') . '"',
                '"' . ($survey->customer_location ?? '') . '"',
                '"' . $frequentlyPurchased . '"',
                $survey->wants_delivery_service ? 'Yes' : 'No',
                '"' . $surveyTableData . '"',
                '"' . ($survey->hard_to_find_product ?? '') . '"',
                '"' . ($survey->products_to_sell ?? '') . '"',
                '"' . ($survey->additional_suggestions ?? '') . '"',
                $survey->created_at->format('Y-m-d H:i:s')
            ]) . "\n";
        }

        $filename = 'feedtan_survey_' . date('Y-m-d_H-i-s') . '.csv';
        
        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
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
