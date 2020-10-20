<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\SuppliersPayment;
class SuppliersPaymentsController extends Controller{
    public function getNew(){
      $Suppliers = Supplier::where('is_active' , 1)->latest()->get();
      return view('suppliers-payments.new' , compact('Suppliers'));
    }
    public function postNew(Request $r){
      $PaymentData = $r->all();
      $PaymentData['company_id'] = 1;
      SuppliersPayment::create($PaymentData);
      return redirect()->route('expenses.all')->withSuccess('تم تسجيل الدفعة بنجاح');
    }
    public function getEdit($id){
      $Suppliers = Supplier::where('is_active' , 1)->latest()->get();
      $ThePayment = SuppliersPayment::findOrFail($id);
      return view('suppliers-payments.edit' , compact('Suppliers' , 'ThePayment'));
    }
    public function postEdit(Request $r , $id){
      $ThePayment = SuppliersPayment::findOrFail($id)->update($r->all());
      return redirect()->route('expenses.all')->withSuccess('تم تعديل الدفعة بنجاح');
    }
    public function delete($id){
      SuppliersPayment::findOrFail($id)->delete();
      return redirect()->route('expenses.all')->withSuccess('تم حذف الدفعة بنجاح');
    }
}
