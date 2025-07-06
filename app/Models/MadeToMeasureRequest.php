<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MadeToMeasureRequest extends Model
{
    use HasFactory;

        protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'product_id',
        'product_name',
        'quantity',
        'color',
        'width',
        'length',
        'notes',
        'status',
        'file_path',
    ];
}
