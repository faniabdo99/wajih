<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;
use App\Customer;
use App\Sales;
use App\Expense;
use App\Payment;
class ReportsController extends Controller{
    public function getIndex (){
        $Customers = Customer::where('is_active' , 1)->latest()->get();
        return view('reports.index', compact('Customers'));
    }
    public function companyReport(Request $r){
        //Get Expenses Array
        //
        $ExpensesList = Expense::whereMonth('created_at' , $r->month)->get()->groupBy('type');
        $SalesList = Sales::whereMonth('created_at' , $r->month)->get()->groupBy('customer_id');
        $PaymentsList = Payment::whereMonth('created_at' , $r->month)->get()->groupBy('customer_id');
        $ReportType = 'كشف حساب شهري للشركة';
        $ReportTitle = 'كشف حساب شهري للشركة';
        $ReportDate = $r->month . ' / '. date('Y');
        return view('reports.company' , compact('SalesList' , 'ExpensesList' , 'PaymentsList' , 'ReportType' , 'ReportDate' , 'ReportTitle'));
    }
    public function clientReport(Request $r){
        if($r->has('start_date') && $r->has('end_date')){
            $StartDate = Carbon::parse($r->start_date);
            $EndDate = Carbon::parse($r->end_date);
            $AllSales = Sales::where('customer_id' , $r->customer_id)->whereDate('created_at' , '>=' , $StartDate)->whereDate('created_at' , '<=' ,  $EndDate)->get();
            $AllPayments = Payment::where('customer_id' , $r->customer_id)->whereDate('created_at' , '>=' , $StartDate)->whereDate('created_at' , '<=' ,  $EndDate)->get();
            $NotSortedData = $AllSales->concat($AllPayments);
            $MergedData = $NotSortedData->sortBy('created_at');
            $ReportType = 'عميل حسب التاريخ';
            $ReportDate = $r->start_date . ' - ' . $r->end_date;
            $ReportCustomer = Customer::find($r->customer_id);
            $ReportTitle = $ReportCustomer->name . ' - ' . $ReportDate;
            return view('reports.customer' , compact('MergedData' , 'ReportType' , 'ReportDate' , 'ReportCustomer' , 'ReportTitle'));
            //Time Limited Report
        }elseif($r->has('month')){
           $AllSales = Sales::where('customer_id' , $r->customer_id)->whereMonth('created_at' , $r->month)->whereYear('created_at' , date('Y'))->get();
           $AllPayments = Payment::where('customer_id' , $r->customer_id)->whereMonth('created_at' , $r->month)->whereYear('created_at' , date('Y'))->get();
           $NotSortedData = $AllSales->concat($AllPayments);
           $MergedData = $NotSortedData->sortBy('created_at');
           $ReportType = 'عميل شهري';
           $ReportDate = $r->month . ' / '. date('Y');
           $ReportCustomer = Customer::find($r->customer_id);
           $ReportTitle = $ReportCustomer->name . ' - ' . $ReportDate;
           return view('reports.customer' , compact('MergedData' , 'ReportType' , 'ReportDate' , 'ReportCustomer' , 'ReportTitle'));
        }
        $DateFrom = date($r->start_date);
        $DateTo = date($r->end_date);
        $SalesList = Sales::where('customer_id' , $r->customer_id)->whereBetween('created_at' , [$DateFrom , $DateTo])->latest()->get();
        return view('reports.customer' , compact('SalesList'));
    }
}
