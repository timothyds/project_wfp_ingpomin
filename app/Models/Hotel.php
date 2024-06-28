<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function hotel_type()
    {
        return $this->belongsTo(Hotel_Type::class);
    }

    public function hotel_typeWithTrashed()
    {
        return $this->belongsTo(Hotel_Type::class, 'hotel_type_id')->withTrashed();
    }
}
