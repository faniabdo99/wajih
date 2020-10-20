<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Supplier;
class SuppliersController extends Controller{
  public function getHome(){
      $MainData = Supplier::where('is_active' , 1)->latest()->get();
      return view('suppliers.all' , compact('MainData'));
  }
  public function getNew(){
      return view('suppliers.new');
  }
  public function postNew(Request $r){
      $CustomerData = $r->all();
      $CustomerData['company_id'] = 1;
      Supplier::create($CustomerData);
      return redirect()->route('suppliers.all')->withSuccess('تم اضافة المورد بنجاح');
  }
  public function getEdit($id){
      $TheSupplier = Supplier::findOrFail($id);
      return view('suppliers.edit' , compact('TheSupplier'));
  }
  public function postEdit(Request $r , $id){
      $TheCustomer = Supplier::findOrFail($id);
      $TheCustomer->update($r->all());
      return redirect()->route('suppliers.all')->withSuccess('تم تحديث بيانات المورد بنجاح');
  }
  public function delete($id){
      $TheCustomer = Supplier::findOrFail($id)->update(['is_active' => 0]);
      return redirect()->route('suppliers.all')->withSuccess('تم حذف المورد بنجاح');
  }
}
