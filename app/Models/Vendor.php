<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{

    protected $fillable = [
            'name',
            'email',
            'kontak',
            'alamat',
            'jumlah_product',
            'status',
    ];

    public function productvendor(){
     return $this->hasMany(ProductVendor::class);
    }
}
