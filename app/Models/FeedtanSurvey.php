<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedtanSurvey extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_email',
        'customer_location',
        'frequently_purchased_products',
        'wants_delivery_service',
        'survey_table_data',
        'hard_to_find_product',
        'products_to_sell',
        'additional_suggestions',
    ];

    protected $casts = [
        'frequently_purchased_products' => 'array',
        'survey_table_data' => 'array',
        'wants_delivery_service' => 'boolean',
    ];

    // Product categories mapping
    public static $productCategories = [
        'vyakula' => 'Vyakula (mchele, unga, mafuta, sukari, mayai, mkate)',
        'vinywaji' => 'Vinywaji (soda, juice, maji)',
        'bidhaa_za_usafi' => 'Bidhaa za usafi (sabuni, dawa ya meno, detergent, tissue)',
        'bidhaa_za_watoto' => 'Bidhaa za Watoto (diapers, maziwa ya Watoto, babywipes, babysoap & oil)',
        'snacks' => 'Snacks (biscuit, chocolates, pipi, crips, karanga, korosho)',
        'skincare_products' => 'Skincare products (lotion, cleanser, showergel, facewash, shampoo)',
    ];

    // Helper methods for data formatting
    public function getFrequentlyPurchasedProductsLabelsAttribute()
    {
        if (!$this->frequently_purchased_products) {
            return [];
        }

        $labels = [];
        foreach ($this->frequently_purchased_products as $product) {
            $labels[] = self::$productCategories[$product] ?? $product;
        }
        return $labels;
    }

    public function getWantsDeliveryServiceLabelAttribute()
    {
        return $this->wants_delivery_service ? 'Ndiyo' : 'Hapana';
    }

    public function getSurveyTableDataFormattedAttribute()
    {
        if (!$this->survey_table_data) {
            return [];
        }

        return array_map(function($item) {
            return [
                'product' => $item['product'] ?? '',
                'frequency_per_week' => $item['frequency_per_week'] ?? '',
                'quantity_per_purchase' => $item['quantity_per_purchase'] ?? '',
                'suggestions' => $item['suggestions'] ?? ''
            ];
        }, $this->survey_table_data);
    }
}
