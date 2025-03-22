<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public function product_images() {
        return $this->hasMany(productimages::class);
    }
    public function category() {
        return $this->belongsTo(category::class);
    }
    public function brand() {
        return $this->belongsTo(brands::class);
    }

}
