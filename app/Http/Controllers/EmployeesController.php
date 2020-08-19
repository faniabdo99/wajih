<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
class EmployeesController extends Controller{
    public function getHome(){
        $MainData = Employee::where('is_active' , 1)->latest()->get();
        return view('employees.all' , compact('MainData'));
    }
    public function getNew(){
        return view('employees.new');
    }
    public function postNew(Request $r){
        $EmployeeData = $r->all();
        $EmployeeData['company_id'] = 1;
        $EmployeeData['salary_week'] =  number_format((float)$r->salary/4, 2, '.', '');
        $EmployeeData['salary_day'] = number_format((float)$EmployeeData['salary_week']/6, 2, '.', '');
        $EmployeeData['salary_hour'] = number_format((float)$EmployeeData['salary_day']/11, 2, '.', '');
        Employee::create($EmployeeData);
        return redirect()->route('employee.all')->withSuccess('تم اضافة الموظف بنجاح');
    }
    public function getEdit($id){
        $TheEmployee = Employee::findOrFail($id);
        return view('employees.edit' , compact('TheEmployee'));
    }
    public function postEdit(Request $r , $id){
        $TheEmployee = Employee::findOrFail($id);
        $EmployeeData = $r->all();
        $TheEmployee->update($r->all());
        return redirect()->route('employee.all')->withSuccess('تم تحديث بيانات الموظف بنجاح');
    }
    public function delete($id){
        $TheEmployee = Employee::findOrFail($id)->update(['is_active' => 0]);
        return redirect()->route('employee.all')->withSuccess('تم حذف الموظف بنجاح');
    }
}
