<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
class ExpensesController extends Controller{
    public function getHome(){
        $MainData = Expense::latest()->get();
        return view('expneses.all' , compact('MainData'));
    }
    public function getNew(){
        return view('expneses.new');
    }
    public function postNew(Request $r){
        $EmployeeData = $r->all();
        $EmployeeData['company_id'] = 1;
        $EmployeeData['notes'] = $r->notes . ' ' . $r->title;
        Expense::create($EmployeeData);
        return redirect()->route('expenses.all')->withSuccess('تم اضافة الفاتورة بنجاح');
    }
    public function getEdit($id){
        $TheExpens = Expense::findOrFail($id);
        return view('expneses.edit' , compact('TheExpens'));
    }
    public function postEdit(Request $r , $id){
        $TheExpens = Expense::findOrFail($id);
        $TheExpens->update($r->all());
        return redirect()->route('expenses.all')->withSuccess('تم تحديث بيانات الفاتورة بنجاح');
    }
    public function delete($id){
        $TheEmployee = Expense::findOrFail($id)->delete();
        return redirect()->route('expenses.all')->withSuccess('تم حذف الفاتورة بنجاح');
    }
}
