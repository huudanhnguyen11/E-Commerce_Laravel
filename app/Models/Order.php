<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'createddate',
        'statusorder',
        'shippingaddress',
        'shippingcity',
        'shippingtype',
        'paymenttype',
        'customerid',
        'userid',
    ];
    public function customer(){
        return $this->hasOne(Customer::class,'id','customerid');
    }
    public function user(){
        return $this->hasMany(User::class,'id','userid');
    }
}
