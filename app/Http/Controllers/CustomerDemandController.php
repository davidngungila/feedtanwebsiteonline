<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerDemand;

class CustomerDemandController extends Controller
{
    public function index()
    {
        return view('customer-demand.index');
    }

    public function create()
    {
        return view('customer-demand.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gender' => 'required|in:male,female',
            'age_group' => 'required|in:<18,18-25,26-35,36+',
            'location' => 'required|string|max:255',
            'purchase_frequency' => 'required|in:daily,weekly,occasionally',
            'current_purchase_place' => 'required|in:market,nearby_store,online',
            'food_products' => 'nullable|boolean',
            'beverages' => 'nullable|boolean',
            'cosmetics' => 'nullable|boolean',
            'household_items' => 'nullable|boolean',
            'additional_products' => 'nullable|string|max:500',
            'price_range' => 'required|in:very_low,average,slightly_high',
            'price_example' => 'nullable|numeric|min:0',
            'challenges' => 'required|array',
            'challenges.*' => 'in:high_price,poor_quality,difficult_availability,poor_service',
            'additional_comments' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $customerDemand = CustomerDemand::create($request->all());

        return redirect()->route('customer-demand.thankyou')
            ->with('success', 'Thank you for completing our customer demand assessment!');
    }

    public function thankyou()
    {
        return view('customer-demand.thankyou');
    }

    public function admin()
    {
        $demands = CustomerDemand::latest()->paginate(50);
        
        // Calculate statistics
        $stats = [
            'total_responses' => CustomerDemand::count(),
            'gender_distribution' => CustomerDemand::selectRaw('gender, COUNT(*) as count')
                ->groupBy('gender')
                ->pluck('count', 'gender')
                ->toArray(),
            'age_distribution' => CustomerDemand::selectRaw('age_group, COUNT(*) as count')
                ->groupBy('age_group')
                ->pluck('count', 'age_group')
                ->toArray(),
            'product_demand' => [
                'food_products' => CustomerDemand::where('food_products', true)->count(),
                'beverages' => CustomerDemand::where('beverages', true)->count(),
                'cosmetics' => CustomerDemand::where('cosmetics', true)->count(),
                'household_items' => CustomerDemand::where('household_items', true)->count(),
            ],
            'price_preferences' => CustomerDemand::selectRaw('price_range, COUNT(*) as count')
                ->groupBy('price_range')
                ->pluck('count', 'price_range')
                ->toArray(),
            'top_challenges' => CustomerDemand::selectRaw('JSON_UNQUOTE(JSON_EXTRACT(challenges, CONCAT(\'$[\', idx, \']\'))) as challenge, COUNT(*) as count')
                ->join(DB::raw("(SELECT 0 as idx UNION SELECT 1 UNION SELECT 2 UNION SELECT 3) as numbers"), function($join) {
                    $join->on(DB::raw('JSON_LENGTH(challenges)'), '>', DB::raw('numbers.idx'));
                })
                ->groupBy('challenge')
                ->orderByDesc('count')
                ->limit(5)
                ->pluck('count', 'challenge')
                ->toArray(),
        ];

        return view('customer-demand.admin', compact('demands', 'stats'));
    }

    public function export()
    {
        $demands = CustomerDemand::latest()->get();
        
        $csv = implode(',', [
            'ID', 'Gender', 'Age Group', 'Location', 'Purchase Frequency',
            'Current Purchase Place', 'Food Products', 'Beverages', 'Cosmetics',
            'Household Items', 'Additional Products', 'Price Range',
            'Price Example', 'Challenges', 'Additional Comments', 'Created At'
        ]) . "\n";

        foreach ($demands as $demand) {
            $challenges = is_array($demand->challenges) ? implode('; ', $demand->challenges) : $demand->challenges;
            
            $csv .= implode(',', [
                $demand->id,
                $demand->gender,
                $demand->age_group,
                '"' . $demand->location . '"',
                $demand->purchase_frequency,
                $demand->current_purchase_place,
                $demand->food_products ? 'Yes' : 'No',
                $demand->beverages ? 'Yes' : 'No',
                $demand->cosmetics ? 'Yes' : 'No',
                $demand->household_items ? 'Yes' : 'No',
                '"' . $demand->additional_products . '"',
                $demand->price_range,
                $demand->price_example,
                '"' . $challenges . '"',
                '"' . $demand->additional_comments . '"',
                $demand->created_at->format('Y-m-d H:i:s')
            ]) . "\n";
        }

        $filename = 'customer_demand_assessment_' . date('Y-m-d_H-i-s') . '.csv';
        
        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}
