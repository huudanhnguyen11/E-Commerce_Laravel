<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return response()->view('admin.brand.index', compact('brands'));
    }
    public function create()
    {
        return response()->view('admin/brand/create');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'brandname' => 'required',
                'brandimg' => 'required|image|mimes:jpeg,png|max:2048'
            ],
            [
                'brandname.required' => 'Bạn chưa nhập tên thương hiệu',
                'brandimg.required' => 'Bạn chưa tải ảnh',
            ]
        );
        if ($request->hasFile('brandimg')) {
            $path = '../img/';
            $filename = $request->file('brandimg')->getClientOriginalName();
            $path = $path . $filename;
            $brandname = $request->input('brandname');
            $des = $request->input('description');
        }
        $brand = new Brand();
        $brand->brandname = $brandname;
        $brand->brandimg = $path;
        $brand->description = $des;
        $brand->save();
        return redirect()->route('admin.brand.index')->with('success', 'Brand created successfully');
    }
    public function update($id)
    {
        $brand = Brand::find($id);
        return response()->view('admin/brand/update',['brand'=>$brand]);
    }
    public function edit(Request $request)
    {
        $request->validate(
            [
                'brandname_update' => 'required'
            ],
            [
                'brandname_update.require' => 'Bạn chưa nhập thương hiệu'
            ]
        );
        if ($request->hasFile('brandimg_update')) {
            $path = '../img/';
            $filename = $request->file('brandimg_update')->getClientOriginalName();
            $path = $path . $filename;
            Brand::where('id', '=', (int)$request->input('id_update'))
            ->update(['brandname' => $request->input('brandname_update'), 
            'description' => $request->input('description_update'), 
            'brandimg' => $path]);
        } else {
            Brand::where('id', '=', (int)$request->input('id_update'))
            ->update(['brandname' => $request->input('brandname_update'), 
            'description' => $request->input('description_update')]);
        }
        return redirect()->route('admin.brand.index')->with('success','Brand updated Successfully');
    }
    public function destroy($id)
    {
        $brand = Brand::find($id)->delete();
        return redirect()->route('admin.brand.index')->with('success','Brand deleted Successfully');
    }
}
