<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_Type extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "product_types";

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
