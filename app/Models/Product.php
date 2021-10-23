<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'productname',
        'price',
        'discount',
        'productimage',
        'brandid',
        'categoryid',
        'description',
    ];

    public function brand(){
        return $this->hasOne(Brand::class,'id','brandid');
    }
    public function category(){
        return $this->hasOne(Category::class,'id','categoryid');
    }
}
