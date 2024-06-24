<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel_Types extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "hotel_types";

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
}
