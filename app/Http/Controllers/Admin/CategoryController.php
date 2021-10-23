<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::all();
        return response()->view('admin/category/index', ['categories' => $categories]);
    }
    public function create()
    {
        return response()->view('admin/category/create');
    }
    public function store(Request $request)
    {
        $categoryname = $request->input('categoryname');
        $des = $request->input('description');
        $cate = new Category();
        $cate->categoryname = $categoryname;
        $cate->description = $des;
        $cate->save();
        return redirect()->route('admin.category.index');
    }
    public function update($id)
    {
        $category = Category::find($id);
        return response()->view('admin/category/update',['category'=>$category]);
    }
    public function edit(Request $request)
    {
        Category::where('id', '=', (int)$request->input('id_update'))->
        update(['categoryname'=>$request->input('categoryname_update'),
        'description'=>$request->input('description_update')]);
        return redirect()->route('admin.category.index');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
