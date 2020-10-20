<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Payment;
use App\Customer;
class PaymentsController extends Controller{
    public function getHome(){
        $MainData = Payment::latest()->get();
        return view('payments.all' , compact('MainData'));
    }
    public function getNew(){
        $Customers = Customer::where('is_active' , 1)->latest()->get();
        return view('payments.new' , compact('Customers'));
    }
    public function postNew(Request $r){
        $PaymentData = $r->except('date');
        $PaymentData['company_id'] = 1;
        $PaymentData['created_at'] = Carbon::create($r->date.date('H:i:s'));
        Payment::create($PaymentData);
        return redirect()->route('payments.all')->withSuccess('تم اضافة الدفعة بنجاح');
    }
    public function getEdit($id){
        $ThePayment = Payment::findOrFail($id);
        $Customers = Customer::where('is_active' , 1)->latest()->get();
        return view('payments.edit' , compact('ThePayment' , 'Customers'));
    }
    public function postEdit(Request $r , $id){
        $payments = Payment::findOrFail($id);
        $PaymentData = $r->except('date');
        $PaymentData['company_id'] = 1;
        $PaymentData['created_at'] = Carbon::create($r->date.date('H:i:s'));
        $payments->update($PaymentData);
        return redirect()->route('payments.all')->withSuccess('تم تحديث بيانات الدفعة بنجاح');
    }
    public function delete($id){
        $TheEmployee = Payment::findOrFail($id)->delete();
        return redirect()->route('payments.all')->withSuccess('تم حذف الدفعة بنجاح');
    }
}
