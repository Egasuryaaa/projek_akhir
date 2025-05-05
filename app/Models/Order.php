<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'order_number',
        'status',
        'payment_method',
        'payment_status',
        'payment_id',
        'address_id',
        'shipping_method',
        'shipping_cost',
        'subtotal',
        'tax',
        'total',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'shipping_cost' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'tax' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    /**
     * Get the user that owns the order.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the address for this order.
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * Get the order items for the order.
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
    
    /**
     * Get formatted total amount.
     */
    public function getFormattedTotalAttribute(): string
    {
        return number_format($this->total, 2);
    }
    
    /**
     * Get status badge.
     */
    public function getStatusBadgeAttribute(): string
    {
        $colors = [
            'pending' => 'warning',
            'paid' => 'success',
            'processing' => 'info',
            'shipped' => 'primary',
            'delivered' => 'success',
            'cancelled' => 'danger',
        ];
        
        return $colors[$this->status] ?? 'secondary';
    }
    
    /**
     * Get payment status badge.
     */
    public function getPaymentStatusBadgeAttribute(): string
    {
        $colors = [
            'pending' => 'warning',
            'paid' => 'success',
            'failed' => 'danger',
        ];
        
        return $colors[$this->payment_status] ?? 'secondary';
    }
}