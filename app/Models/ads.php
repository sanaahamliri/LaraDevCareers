<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ads extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'imageUrl',
        'price',
        'location',
        'rooms',
        'size',
        'type',
        'endDate',
        'detailUrl',
    ];
}