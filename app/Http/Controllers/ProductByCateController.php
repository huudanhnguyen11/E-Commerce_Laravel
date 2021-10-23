<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductByCateController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function getProductByCate($id)
    {
        $categoryname = Category::find($id)->categoryname;
        $product = Product::join('categories', 'categories.id', '=', 'products.categoryid')
            ->join('brands', 'brands.id', '=', 'products.brandid')->where('products.categoryid', '=', $id)
            ->get(
                [
                    'products.id as productid',
                    'categories.id as categoryid',
                    'brands.id as brandid',
                    'products.productname',
                    'categories.categoryname',
                    'brands.brandname',
                    'brands.brandimg',
                    'products.price',
                    'products.discount',
                    'products.productimage',
                    'products.description'
                ]
            );
        return response()->view('home/product', ['products' => $product, 'CateName' => $categoryname]);
    }
    public function getProduct($id)
    {
        $product = Product::find($id);
        return response()->view(
            'home/productdetail',
            ['product' => $product,]
        );
    }
    public function test()
    {
        $product = Product::join('categories', 'categories.id', '=', 'products.categoryid')
            ->join('brands', 'brands.id', '=', 'products.brandid')->where('products.id', '=', 4)
            ->get(
                [
                    'products.id as productid',
                    'categories.id as categoryid',
                    'brands.id as brandid',
                    'products.productname',
                    'categories.categoryname',
                    'brands.brandname',
                    'brands.brandimg',
                    'products.price',
                    'products.discount',
                    'products.productimage',
                    'products.description'
                ]
            );
        return json_encode($product);
    }
}
