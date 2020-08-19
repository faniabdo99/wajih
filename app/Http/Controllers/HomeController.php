<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Sales;
use App\Expense;
class HomeController extends Controller{
    public function getHome(){
        //Total Sales
        $TotalSalesObject = Sales::all()->map(function($item){
            return $item->total;
        })->toArray();
        $TotalSales = array_sum($TotalSalesObject);
        //Total Expenses
        $TotalExpenseObject = Expense::all()->map(function($item){
            return $item->total;
        })->toArray();
        $TotalExpenses = array_sum($TotalExpenseObject);
        //Total Profits
        $TotalProfits = $TotalSales - $TotalExpenses;
        $SalesData = Sales::latest()->limit(10)->get();
        return view('index' , compact('TotalSales','TotalExpenses','TotalProfits','SalesData'));
    }
}
