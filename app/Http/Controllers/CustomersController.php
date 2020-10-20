<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
class CustomersController extends Controller{
    public function getHome(){
        $MainData = Customer::where('is_active' , 1)->latest()->get();
        return view('customers.all' , compact('MainData'));
    }
    public function getNew(){
        return view('customers.new');
    }
    public function postNew(Request $r){
        $CustomerData = $r->all();
        $CustomerData['company_id'] = 1;
        Customer::create($CustomerData);
        return redirect()->route('customers.all')->withSuccess('تم اضافة العميل بنجاح');
    }
    public function getEdit($id){
        $TheCustomer = Customer::findOrFail($id);
        return view('customers.edit' , compact('TheCustomer'));
    }
    public function postEdit(Request $r , $id){
        $TheCustomer = Customer::findOrFail($id);
        $TheCustomer->update($r->all());
        return redirect()->route('customers.all')->withSuccess('تم تحديث بيانات العميل بنجاح');
    }
    public function delete($id){
        $TheCustomer = Customer::findOrFail($id)->update(['is_active' => 0]);
        return redirect()->route('customers.all')->withSuccess('تم حذف العميل بنجاح');
    }
}
