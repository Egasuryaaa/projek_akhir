<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SellerLocation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'business_name',
        'description',
        'address_line',
        'province',
        'city',
        'district',
        'postal_code',
        'latitude',
        'longitude',
        'is_active',
        'business_hours',
        'contact_phone',
        'photos',
        'seller_type',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'business_hours' => 'array',
        'photos' => 'array',
        'is_active' => 'boolean',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    /**
     * Get the user that owns the seller location.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the seller type options.
     *
     * @return array
     */
    public static function getSellerTypeOptions(): array
    {
        return [
            'farmer' => 'Farmer',
            'fisherman' => 'Fisherman',
            'wholesale' => 'Wholesale',
            'retail' => 'Retail',
        ];
    }
}