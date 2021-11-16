<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function test()
    {
        $mydata = OrderDetail::join('products', 'products.id', '=', 'orderdetails.productid')->where('orderdetails.orderid', '=', 10)->get(['orderdetails.id as orderdtid', 'products.id as productid', 'products.productname', 'orderdetails.quantity']);
        return $mydata[0];
    }
    public function index()
    {
        $orders = Order::all();
        return response()->view('admin/order/index', ['orders' => $orders]);
    }
    public function create()
    {
        $customers = Customer::all();
        $users = User::all();
        $products = Product::all();
        return response()->view('admin/order/create', ['customers' => $customers, 'users' => $users, 'products' => $products]);
    }
    public function store(Request $request)
    {
        if ($request->has('customerid') !== '') {
            $customerid = (int)$request->input('customerid');
            $statusorder = $request->input('statusorder');
            $shipadd = $request->input('shippingaddress');
            $shipcity = $request->input('shippingcity');
            $shiptype = $request->input('shippingtype');
            $statuspayment = $request->input('statuspayment');
            $products = $request->input('productlist');
            $quantity = $request->input('quantity');
            $order = new Order();
            $order->createddate = date("Y-m-d");
            $order->statusorder = $statusorder;
            $order->shippingaddress = $shipadd;
            $order->shippingcity = $shipcity;
            $order->shippingtype = $shiptype;
            $order->paymenttype = $statuspayment;
            $order->customerid = $customerid;
            $order->userid = (int)Auth::user()->id;
            $order->save();
            $orderid = $order->id;
            if ($orderid > 0) {
                foreach ($products as $item) {
                    $oderdetail = new OrderDetail();
                    $oderdetail->orderid = $orderid;
                    $oderdetail->productid = (int)$item;
                    $oderdetail->quantity = 1;
                    $oderdetail->save();
                }
            }
            return redirect()->route('admin.order.index');
        }
    }
    public function update($id)
    {
        $order = Order::find($id);
        $mydata = OrderDetail::join('products', 'products.id', '=', 'orderdetails.productid')
            ->where('orderdetails.orderid', '=', $id)->get([
                'orderdetails.id as orderdetailid',
                'products.id as productid', 'products.productname',
                'orderdetails.quantity'
            ]);
        return response()->view('admin/order/update', ['order' => $order, 'products' => $mydata]);
    }
    public function quantity($oid, $odid, $type, $quantity)
    {
        if ($type == 'up') {
            $quantity += 1;
        } else {
            $quantity -= 1;
        }
        OrderDetail::where('id', '=', $odid)->update(['quantity' => $quantity]);
        return redirect()->route('admin.order.update', ['id' => $oid]);
    }
    public function edit(Request $request)
    {
        Order::where('id', '=', (int)$request->input('id_update'))->update([
            'statusorder' => $request->input('statusorder'),
            'paymenttype' => $request->input('statuspayment')
        ]);
        return redirect()->route('admin.order.index');
    }
}
