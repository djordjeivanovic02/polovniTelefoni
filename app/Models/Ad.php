<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid', 'adsTitle', 'category', 'brand', 'model', 'description',
        'user', 'state', 'price', 'phoneNumber', 'dateCreate',
        'color', 'addons', 'main-image', 'images', 'rates', 'ratesCount',
        'creatorUsername', 'visits', 'isFavourite', 'compared', 'cart',
    ];
}
