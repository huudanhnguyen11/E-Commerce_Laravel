<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $brands = Brand::all();
        return response()->view('admin/brand/index',['brands'=>$brands]);
    }
    public function create()
    {
        return response()->view('admin/brand/create');
    }
    public function store(Request $request)
    {
        if($_FILES['brandimg']['tmp_name'] != null){
            $path = "../img/";
            $filename = $_FILES['brandimg']['name'];
            $path = $path . $filename;
            $brandname = $request->input('brandname');
            $des = $request->input('description');
            $brand = new Brand();
            $brand->brandname = $brandname;
            $brand->brandimg = $path;
            $brand->description = $des;
            $brand->save();
            return redirect()->route('admin.brand.index');

        }
    }
    public function update($id)
    {
        $brand = Brand::find($id);
        return response()->view('admin/brand/update',['brand'=>$brand]);
    }
    public function edit(Request $request)
    {
        Brand::where('id','=',(int)$request->input('id_update'))->
        update(['brandname'=>$request->input('brandname_update'),
        'description'=>$request->input('description_update'),
        'brandimg'=>$request->input('brandimg_update')]);
        return redirect()->route('admin.brand.index');
    }
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('admin.brand.index');
    }
}
