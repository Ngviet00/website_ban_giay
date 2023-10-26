<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseHistory extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'don_hang';

    protected $fillable = [
        'member_id',
        'product_id',
        'image',
        'price',
        'quantity',
        'total_money',
        'status',
        'name',
        'address',
        'phone',
        'payment_method'
    ];
}
