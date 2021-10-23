<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'categoryname',
        'description',
        'brandimg',
    ];
}
