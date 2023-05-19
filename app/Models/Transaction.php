<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'cashier_id',
        'total',
        'pay',        
        'change',
    ];
    public function customer()
    {
        return $this->belongsTo(User::class)->where('users.role','=','customer');
    }
    public function cashier()
    {
        return $this->belongsTo(User::class)->where('users.role','=','cashier');
    }
}
