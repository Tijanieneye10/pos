<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'product_price', 'product_code', 'category_name', 'product_stock'];

    public function getShortNameAttribute()
    {
        $name =  Str::substr($this->product_name, 0,2) ;
        return Str::upper($name);
    }
}
