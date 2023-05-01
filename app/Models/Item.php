<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'description',
        'condition',
        'type',
        'is_published',
        'image',
        'owner_name',
        'owner_phone',
        'owner_address',
        'latitude',
        'longtitude',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
