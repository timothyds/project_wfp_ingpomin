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

    //protected $table = 'namatable'; -> Untuk mengatur nama tabel di database
    public function products() : HasMany
    {
        return $this->hasMany(Product::class,'hotel_id','id');//hotel_id merupakan foreign key di product, sedangkan id merupakan pk dari hotel
    }
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class,'hotel_type');
    }
    public function typeWithTrashed(): BelongsTo
    {
        return $this->belongsTo(Type::class,'hotel_type')->withTrashed();
    }
}
