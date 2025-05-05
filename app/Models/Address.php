<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'label',
        'recipient_name',
        'phone',
        'address_line',
        'province',
        'city',
        'district',
        'postal_code',
        'is_default',
        'longitude',
        'latitude',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_default' => 'boolean',
        'longitude' => 'decimal:7',
        'latitude' => 'decimal:7',
    ];

    /**
     * Get the user that owns the address.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Set this address as default and unset others.
     */
    public function setAsDefault(): void
    {
        if ($this->is_default) {
            return;
        }

        // Begin transaction
        \DB::beginTransaction();
        
        try {
            // Unset all other default addresses for this user
            static::where('user_id', $this->user_id)
                ->where('is_default', true)
                ->update(['is_default' => false]);
            
            // Set this one as default
            $this->is_default = true;
            $this->save();
            
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }
    }

    /**
     * Get full address as a string.
     */
    public function getFullAddressAttribute(): string
    {
        return "{$this->address_line}, {$this->district}, {$this->city}, {$this->province}, {$this->postal_code}";
    }
}