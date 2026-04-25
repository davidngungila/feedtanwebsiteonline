<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDemand extends Model
{
    use HasFactory;

    protected $fillable = [
        'gender',
        'age_group',
        'location',
        'purchase_frequency',
        'current_purchase_place',
        'food_products',
        'beverages',
        'cosmetics',
        'household_items',
        'additional_products',
        'price_range',
        'price_example',
        'challenges',
        'additional_comments',
    ];

    protected $casts = [
        'food_products' => 'boolean',
        'beverages' => 'boolean',
        'cosmetics' => 'boolean',
        'household_items' => 'boolean',
        'price_example' => 'decimal:2',
        'challenges' => 'array',
    ];

    public function getGenderLabelAttribute()
    {
        return [
            'male' => 'Me',
            'female' => 'Ke',
        ][$this->gender] ?? $this->gender;
    }

    public function getAgeGroupLabelAttribute()
    {
        return [
            '<18' => '<18',
            '18-25' => '18–25',
            '26-35' => '26–35',
            '36+' => '36+',
        ][$this->age_group] ?? $this->age_group;
    }

    public function getPurchaseFrequencyLabelAttribute()
    {
        return [
            'daily' => 'Kila siku',
            'weekly' => 'Kila wiki',
            'occasionally' => 'Mara chache',
        ][$this->purchase_frequency] ?? $this->purchase_frequency;
    }

    public function getCurrentPurchasePlaceLabelAttribute()
    {
        return [
            'market' => 'Sokoni',
            'nearby_store' => 'Duka jirani',
            'online' => 'Online',
        ][$this->current_purchase_place] ?? $this->current_purchase_place;
    }

    public function getPriceRangeLabelAttribute()
    {
        return [
            'very_low' => 'Chini sana',
            'average' => 'Wastani',
            'slightly_high' => 'Juu kidogo (bora quality)',
        ][$this->price_range] ?? $this->price_range;
    }

    public function getChallengeLabelsAttribute()
    {
        $labels = [
            'high_price' => 'Bei kubwa',
            'poor_quality' => 'Ubora mbaya',
            'difficult_availability' => 'Upatikanaji mgumu',
            'poor_service' => 'Huduma mbaya',
        ];

        $challenges = $this->challenges ?? [];
        $result = [];

        foreach ($challenges as $challenge) {
            $result[] = $labels[$challenge] ?? $challenge;
        }

        return $result;
    }
}
