<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $products = Product::all();
        return response()->view('admin/product/index', ['products' => $products]);
    }
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return response()->view('admin/product/create', 
        ['brands' => $brands, 'categories' => $categories]);
    }
    public function store(Request $request)
    {
        if ($_FILES['productimg']['tmp_name'] != null) {
            $productname = $request->input('productname');
            $price = $request->input('price');
            $discount = $request->input('discount');
            $path = "../img/";
            $filename = $_FILES['productimg']['name'];
            $path = $path . $filename;
            $brand = $request->input('brandid');
            $category = $request->input('categoryid');
            $des = $request->input('description');
            $product = new Product();
            $product->productname = $productname;
            $product->price = $price;
            $product->discount = $discount;
            $product->productimage = $path;
            $product->brandid = $brand;
            $product->categoryid = $category;
            $product->description = $des;
            $product->save();
            return redirect()->route('admin.product.index');
        }
    }
    public function update($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $categories = Category::all();
        return response()->view('admin/product/update',
        ['product'=>$product,
        'brands'=>$brands,
        'categories'=>$categories]);
    }
    public function edit(Request $request)
    {
       Product::where('id','=',(int)$request->input('id_update'))->
       update(['productname'=>$request->input('productname_update'),
       'price'=>$request->input('price_update'),
       'discount'=>$request->input('discount_update'),
       'productimage'=>$request->input('productimg_update'),
       'brandid'=>$request->input('brandid'),
       'categoryid'=>$request->input('categoryid'),
       'description'=>$request->input('description_update')]); 
       return redirect()->route('admin.product.index');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.product.index');
    }
}
