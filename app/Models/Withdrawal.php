<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user',            // Foreign key for the user
        'amount',          // The amount of the withdrawal
        'currency',        // The currency of the withdrawal (e.g., 'BTC', 'USD')
        'payment_mode',    // How the withdrawal is processed (e.g., 'Cryptocurrency', 'PayPal')
        'crypto_currency', // Specific cryptocurrency (e.g., 'Bitcoin')
        'wallet_address',  // The recipient's crypto wallet address
        'status',          // Current status of the withdrawal (e.g., 'Pending', 'Processed', 'Declined', 'On-hold')
        'Description',     // A description of the transaction
        'accountname',     // Used for beneficiary name or wallet address in some cases
        'admin_comment',   // Comments added by the admin during processing
        'to_deduct',       // The amount deducted from the user's balance
        'created_at',      // Timestamp for creation
        'updated_at',      // Timestamp for last update
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that owns the withdrawal.
     */
    public function duser()
    {
        return $this->belongsTo(User::class, 'user');
    }
}

