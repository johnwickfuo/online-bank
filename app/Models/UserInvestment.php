<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInvestment extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan',
        'user',
        'amount',
        'activate',
        'inv_duration',
        'expire_date',
        'activated_at',
        'last_growth',
    ];


    protected $casts = [
        'activated_at' => 'datetime',
        'last_growth' => 'datetime',
        'expire_date' => 'datetime',
        'created_at' => 'datetime',
    ];


    public function planDetails()
{
    return $this->belongsTo(Plans::class, 'plan', 'id');
}

public function investor()
{
    return $this->belongsTo(User::class, 'user', 'id');
}

}
