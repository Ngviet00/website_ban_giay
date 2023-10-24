<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'parent_id',
        'status'
    ];

    public const STATUS_SHOW = 1;
    public const STATUS_HIDE = 0;


    public function scopeStatusActive($q)
    {
        return $q->where('status', '=', self::STATUS_SHOW);
    }
}
