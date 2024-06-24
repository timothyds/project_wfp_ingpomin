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
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class,'hotel_id');
    }
    public function transactions(): BelongsToMany{
        return $this->belongsToMany(Transaction::class,'product_transaction','product_id','transaction_id');
    }
    public function hotelWithTrashed(): BelongsTo
    {
        return $this->belongsTo(Hotel::class,'hotel_id')->withTrashed();
    }
}
