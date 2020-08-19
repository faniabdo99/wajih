<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Sales;
use App\Customer;
class SalesController extends Controller{
    public function getHome(){
        $MainData = Sales::latest()->get();
        return view('sales.all' , compact('MainData'));
    }
    public function getNew(){
        $Customers = Customer::where('is_active' , 1)->latest()->get();
        return view('sales.new' , compact('Customers'));
    }
    public function postNew(Request $r){
        $SaleData = $r->except('date');
        $SaleData['company_id'] = 1;
        $SaleData['created_at'] = Carbon::create($r->date.date('H:i:s'));
        $SaleData['notes'] = $r->title . ' ' . $r->notes;
        Sales::create($SaleData);
        return redirect()->route('sales.all')->withSuccess('تم اضافة الفاتورة بنجاح');
    }
    public function getEdit($id){
        $TheSale = Sales::findOrFail($id);
        $Customers = Customer::where('is_active' , 1)->latest()->get();
        return view('sales.edit' , compact('TheSale' , 'Customers'));
    }
    public function postEdit(Request $r , $id){
        $TheSale = Sales::findOrFail($id);
        $SaleData = $r->except('date');
        $SaleData['company_id'] = 1;
        $SaleData['created_at'] = Carbon::create($r->date.date('H:i:s'));
        $SaleData['notes'] = $r->title . ' ' . $r->notes;
        $TheSale->update($SaleData);
        return redirect()->route('sales.all')->withSuccess('تم تحديث بيانات الفاتورة بنجاح');
    }
    public function delete($id){
        $TheEmployee = Sales::findOrFail($id)->delete();
        return redirect()->route('sales.all')->withSuccess('تم حذف الفاتورة بنجاح');
    }
}
