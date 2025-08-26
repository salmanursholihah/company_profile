<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
                  'id',
                  'image',
                  'name',
                  'kategori',
                  'deskripsi',
                  'price',
                  'discount',
                  'stok',
                  'lokasi',
                  'status',

    ];
}
