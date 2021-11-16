<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->view('admin/customer/index', ['customers'=>$customers]);
    }
    public function create()
    {
        return response()->view('admin/customer/create');
    }
    public function store(Request $request)
    {
        $customername = $request->input('customername');
        $phone = $request->input('phonenumber');
        $address = $request->input('address');
        $email = $request->input('email');
        $des = $request->input('description');
        $cus = new Customer();
        $cus->customername = $customername;
        $cus->phonenumber = $phone;
        $cus->address = $address;
        $cus->email = $email;
        $cus->description = $des;
        $cus->save();
        return redirect()->route('admin.customer.index');
    }
    public function update($id)
    {
        $customer = Customer::find($id);
        return response()->view('admin/customer/update',['customer'=>$customer]);
    }
    public function edit(Request $request)
    {
        Customer::where('id','=',(int)$request->input('id_update'))->
        update(['customername'=>$request->input('customername_update'),
        'phonenumber'=>$request->input('phonenumber_update'),
        'address'=>$request->input('address_update'),
        'email'=>$request->input('email_update')]);
        return redirect()->route('admin.customer.index');
    }
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('admin.customer.index');
    }
}

