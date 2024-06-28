<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function hotelWithTrashed(): BelongsTo
    {
        return $this->belongsTo(Hotel::class, 'hotel_id')->withTrashed();
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }

    public function product_type()
    {
        return $this->belongsTo(Product_Type::class);
    }
}
