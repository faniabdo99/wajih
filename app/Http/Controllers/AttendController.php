<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employee;
use App\Attend;
class AttendController extends Controller{
    public function getHome(){
        $MainData = Attend::where('month' , date('n'))->latest()->get();
        //Get the employees
        $Employees = Employee::where('is_active' , 1)->pluck('id');
        $FinalSalaryArray = [];
        foreach($Employees as $Employee){
            $TheEmployee = Employee::find($Employee);
            $Year = date('Y');
            $Month = date('n');
            //Check How many days this gut worked
            $ThisMonthWorkingDays = Attend::where('month' , $Month)->where('year' , $Year)->where('employee_id' , $Employee)->sum('work_days');
            $ThisMonthLoans = Attend::where('month' , $Month)->where('year' , $Year)->where('employee_id' , $Employee)->sum('loans');
            $ThisMonthAdditions = Attend::where('month' , $Month)->where('year' , $Year)->where('employee_id' , $Employee)->sum('additions');
            $ThisMonthCutoffs = Attend::where('month' , $Month)->where('year' , $Year)->where('employee_id' , $Employee)->sum('cutoff');
            $ThisMonthLateHours = Attend::where('month' , $Month)->where('year' , $Year)->where('employee_id' , $Employee)->sum('off_hours');
            $ThisMonthSalary = (($ThisMonthWorkingDays * $TheEmployee->salary_day) + $ThisMonthAdditions) - (($ThisMonthLoans) + ($ThisMonthCutoffs)) - ($ThisMonthLateHours * $TheEmployee->salary_hour);
            $EmployeeSalaryArray = [
                'name' => $TheEmployee->name,
                'work_days' => $ThisMonthWorkingDays,
                'off_hours' => $ThisMonthLateHours,
                'salary' => ceil(intval($ThisMonthSalary)/5)*5,
                'cutoff' => $ThisMonthCutoffs,
                'additions' => $ThisMonthAdditions,
                'loans' => $ThisMonthLoans
            ];
            array_push($FinalSalaryArray,$EmployeeSalaryArray );

        }
        return view('attend.all' , compact('MainData' , 'FinalSalaryArray'));
    }
    public function getNew(){
        $Employyes = Employee::where('is_active' , 1)->latest()->get();
        return view('attend.new' , compact('Employyes'));
    }
    public function postNew(Request $r){
        $AttendData = $r->all();
        $AttendData['company_id'] = 1;
        Attend::create($AttendData);
        return redirect()->route('attend.all')->withSuccess('تم اضافة بيانات العمل بنجاح');
    }
    public function getEdit($id){
        $TheItem = Attend::findOrFail($id);
        return view('attend.edit' , compact('TheItem'));
    }
    public function postEdit(Request $r , $id){
        Attend::findOrFail($id)->update($r->all());
        return redirect()->route('attend.all');
    }
    public function delete($id){
        $TheAttend = Attend::findOrFail($id)->delete();
        return redirect()->route('attend.all')->withSuccess('تم حذف بيانات العمل بنجاح');
    }
}
