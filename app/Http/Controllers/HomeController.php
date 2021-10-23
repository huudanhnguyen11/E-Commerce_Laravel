<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $content1 = Product::join('categories', 'categories.id', '=', 'products.categoryid')
        //     ->join('brands', 'brands.id', '=', 'products.brandid')->where('products.categoryid', '=', 1)->limit(3)
        //     ->get(
        //         [
        //             'products.id as productid',
        //             'categories.id as categoryid',
        //             'brands.id as brandid',
        //             'products.productname',
        //             'categories.categoryname',
        //             'brands.brandname',
        //             'brands.brandimg',
        //             'products.price',
        //             'products.discount',
        //             'products.productimage',
        //             'products.description'
        //         ]
        //     );
        $content2 = Product::join('categories', 'categories.id', '=', 'products.categoryid')
            ->join('brands', 'brands.id', '=', 'products.brandid')->where('products.categoryid', '=', 1)->limit(8)
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
        $content3 = Product::join('categories', 'categories.id', '=', 'products.categoryid')
            ->join('brands', 'brands.id', '=', 'products.brandid')->where('products.categoryid', '=', 2)->limit(8)
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
        $content4 = Product::join('categories', 'categories.id', '=', 'products.categoryid')
            ->join('brands', 'brands.id', '=', 'products.brandid')->where('products.categoryid', '=', 5)->limit(8)
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
        $content5 = Product::join('categories', 'categories.id', '=', 'products.categoryid')
            ->join('brands', 'brands.id', '=', 'products.brandid')->where('products.categoryid', '=', 6)->limit(8)
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
        $content6 = Product::join('categories', 'categories.id', '=', 'products.categoryid')
            ->join('brands', 'brands.id', '=', 'products.brandid')->where('products.categoryid', '=', 7)->limit(8)
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
        $content7 = Product::join('categories', 'categories.id', '=', 'products.categoryid')
            ->join('brands', 'brands.id', '=', 'products.brandid')->where('products.categoryid', '=', 8)->limit(8)
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
        $content8 = Product::join('categories', 'categories.id', '=', 'products.categoryid')
            ->join('brands', 'brands.id', '=', 'products.brandid')->where('products.categoryid', '=', 9)->limit(8)
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
        $content9 = Product::join('categories', 'categories.id', '=', 'products.categoryid')
            ->join('brands', 'brands.id', '=', 'products.brandid')->where('products.categoryid', '=', 10)->limit(8)
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
        return response()->view('home/index', [
            'content2' => $content2, 'content3' => $content3, 'content4' => $content4, 'content5' => $content5,
            'content6' => $content6, 'content7' => $content7, 'content8' => $content8, 'content9' => $content9
        ]);
    }
}
