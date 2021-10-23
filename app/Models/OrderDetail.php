<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'orderdetails';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'orderid',
        'productid',
        'quantity',
    ];
    public function order(){
        return $this->hasOne(Order::class,'id','orderid');
    }
    public function product(){
        return $this->hasMany(Product::class,'id','productid');
    }
}
