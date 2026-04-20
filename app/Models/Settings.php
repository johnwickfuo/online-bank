<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $casts = [
        'return_capital' => 'boolean',
        'should_cancel_plan' => 'boolean',
        'modules' => 'array',
        'btc_swap_rate' => 'decimal:8', // Cast btc_swap_rate to decimal with 8 precision
    ];

    // Add the new fields to the $fillable property
    protected $fillable = [
        'return_capital',
        'should_cancel_plan',
        'modules',
        'contact_email', // Assuming these are already here from webpreference.blade.php
        'currency',
        's_currency',
        'redirect_url',
        'enable_kyc',
        'enable_kyc_registration',
        'enable_verification',
        'btc_receive_address', // New: BTC receive address
        'btc_qr_code_path',    // New: Path to BTC QR code image
        'btc_swap_rate',       // New: BTC to Fiat swap rate
    ];

    // public function getModulesAttribute($value)
    // {
    //     return ucfirst($value);
    // }
}
