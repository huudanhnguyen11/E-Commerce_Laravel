<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->rolename == 'admin') {
            return response()->view('admin/dashboard/index');
        } else if (Auth::user()->rolename == 'Post') {
            return response()->view('admin.product.index');
        } else {
            return redirect()->route('admin.order.index');
        }
    }
}
