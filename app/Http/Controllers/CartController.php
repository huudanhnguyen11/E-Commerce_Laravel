<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function Cart()
    {
        $cart = array();
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        }
        return response()->view('home/cart', ['cart' => $cart]);
    }
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
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
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
        return response()->view('home/cart', ['cart' => $cart]);
    }
    public function updateCart($id, $type, $quantity)
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            if ($type == 'down' && $cart[$id][$quantity] > 1) {
                $cart[$id][$quantity] -= 1;
                session()->put('cart', $cart);
            } else {
                $cart[$id][$quantity] += 1;
                session()->put('cart', $cart);
            }
        }
        return redirect()->route('home.cart');
    }
    public function deleteCart($id)
    {
        session()->forget('cart.' . (int)$id);
        return redirect()->route('home.cart');
    }
}
