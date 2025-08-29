<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVendor extends Model
{
    protected $fillable = [
        'vendor_id','name','slug','category','description','price','stock','image'
    ];

    public function vendor(){
        return $this->belongsTo(user::class, 'vendor_id');
    }
}
