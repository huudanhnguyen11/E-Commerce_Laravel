<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderdetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $order = Order::find($id);
        $mydata = OrderDetail::join('products', 'products.id', '=', 'orderdetails.productid')
            ->where('orderdetails.orderid', '=', $id)
            ->get([
                'products.productname',
                'products.price',
                'products.discount',
                'products.productimage',
                'orderdetails.quantity'
            ]);
        return response()->view('admin/orderdetails/index', ['order' => $order, 'orderdetail' => $mydata]);
    }
    public function test()
    {
        // $mydata = OrderDetail::join('products', 'products.id', '=', 'orderdetails.productid')
        //     ->where('orderdetails.orderid', '=', 10)
        //     ->get([
        //         'products.productname',
        //         'products.price', 'products.discount',
        //         'products.productimage',
        //         'orderdetails.quantity'
        //     ]);
        // return json_decode($mydata);
        // $mydata = Order::join('customers', 'customers.id', '=', 'orders', 'orders.customerid')
        //     ->where('orders.id', '=', 10)
        //     ->get(
        //         'orders.id as orderid',

        //         'customers.id as customerid',

        //     );
        $mydata = Order::join('customers', 'customers.id', '=', 'orders', 'orders.customerid')->where('orders.id', '=', 10)->get('orders.id as orderid', 'customers.id as customerid', 'customers.customername');
        return json_decode($mydata);
    }
}
