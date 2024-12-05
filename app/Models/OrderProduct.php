<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;  // Ensure Product model is imported

class OrderProduct extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
