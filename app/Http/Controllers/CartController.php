<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    
    public function addCart($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $id => [
                    'productname' => $product->productname,
                    'price' => $product->price,
                    'discount' => $product->discount,
                    'productimage' => $product->productimage,
                    'quantity' => 1
                ]
            ];
            session()->put('cart', $cart);
        } else if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        } else {
            $cart[$id] = [
                'productname' => $product->productname,
                'price' => $product->price,
                'discount' => $product->discount,
                'productimage' => $product->productimage,
                'quantity' => 1
            ];
            session()->put('cart', $cart);
        }
        return response()->view('home/cart', ['cart' => session()->get('cart')]);
    }
    public function updateCart($id, $type)
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            if ($type == 'down' && $cart[(int)$id]['quantity'] > 1) {
                $cart[(int)$id]['quantity'] -= 1;
                session()->put('cart', $cart);
            } if($type == 'up') {
                $cart[(int)$id]['quantity'] += 1;
                session()->put('cart', $cart);
            }
            return redirect()->route('home.cart');
        }
    }
    public function deleteCart($id)
    {
        session()->forget('cart.' . (int)$id);
        return redirect()->route('home.cart');
    }

    public function Cart()
    {
        $cart = array();
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        }
        return response()->view('home/cart', ['cart' => $cart]);
        
    }

    public function orderCart(Request $request)
    {
        $customer = new Customer();
        $customer->customername = $request->input('customerName');
        $customer->phonenumber = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->email = $request->input('email');
        $customer->description = $request->input('description');
        $customer->save();
        $customerid = $customer->id;
        if ($customerid > 0) {
            $order = new Order();
            $order->createddate = date("Y-m-d");
            $order->statusorder = "Đang xử lý";
            $order->shippingtype = $request->input('shippingType');
            $order->shippingcity = $request->input('shippingCity');
            $order->shippingaddress = $request->input('shippingAddress');
            $order->paymenttype = $request->input('paymentType');
            $order->customerid = $customerid;
            $order->save();
            $orderid = $order->id;
            if ($orderid > 0) {
                $cart = session()->get('cart');
                foreach($cart as $id => $item){
                    $orderdetail = new OrderDetail();
                    $orderdetail->orderid = $orderid;
                    $orderdetail->productid = $id;
                    $orderdetail->quantity = $item['quantity'];
                    $orderdetail->save();
                }
                session()->flush();
                return redirect()->route('home.cart')->with('success','Đặt hàng thành công');
            }
        }
    }
}
