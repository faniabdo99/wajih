<?php
use Illuminate\Support\Facades\Route;
Route::get('login' , 'AuthController@getLogin')->name('login.get');
Route::post('login' , 'AuthController@postLogin')->name('login.post');
Route::middleware('auth')->group(function(){
Route::get('/', 'HomeController@getHome')->name('home');
Route::get('my-account' , 'AuthController@getEdit')->name('myAccount.edit.get');
Route::post('my-account' , 'AuthController@postEdit')->name('myAccount.edit.post');
Route::get('logout' , 'AuthController@logout')->name('logout');
Route::prefix('employees')->group(function(){
    Route::get('/' , 'EmployeesController@getHome')->name('employee.all');
    Route::get('new' , 'EmployeesController@getNew')->name('employee.new.get');
    Route::post('new' , 'EmployeesController@postNew')->name('employee.new.post');
    Route::get('edit/{id}' , 'EmployeesController@getEdit')->name('employee.edit.get');
    Route::post('edit/{id}' , 'EmployeesController@postEdit')->name('employee.edit.post');
    Route::get('delete/{id}' , 'EmployeesController@delete')->name('employee.delete');
});
Route::prefix('attendance')->group(function(){
    Route::get('/' , 'AttendController@getHome')->name('attend.all');
    Route::get('new' , 'AttendController@getNew')->name('attend.new.get');
    Route::post('new' , 'AttendController@postNew')->name('attend.new.post');
    Route::get('edit/{id}' , 'AttendController@getEdit')->name('attend.edit.get');
    Route::post('edit/{id}' , 'AttendController@postEdit')->name('attend.edit.post');
    Route::get('delete/{id}' , 'AttendController@delete')->name('attend.delete');
});
Route::prefix('customers')->group(function(){
    Route::get('/' , 'CustomersController@getHome')->name('customers.all');
    Route::get('new' , 'CustomersController@getNew')->name('customers.new.get');
    Route::post('new' , 'CustomersController@postNew')->name('customers.new.post');
    Route::get('edit/{id}' , 'CustomersController@getEdit')->name('customers.edit.get');
    Route::post('edit/{id}' , 'CustomersController@postEdit')->name('customers.edit.post');
    Route::get('delete/{id}' , 'CustomersController@delete')->name('customers.delete');
});
Route::prefix('suppliers')->group(function(){
    Route::get('/' , 'SuppliersController@getHome')->name('suppliers.all');
    Route::get('new' , 'SuppliersController@getNew')->name('suppliers.new.get');
    Route::post('new' , 'SuppliersController@postNew')->name('suppliers.new.post');
    Route::get('edit/{id}' , 'SuppliersController@getEdit')->name('suppliers.edit.get');
    Route::post('edit/{id}' , 'SuppliersController@postEdit')->name('suppliers.edit.post');
    Route::get('delete/{id}' , 'SuppliersController@delete')->name('suppliers.delete');
});

Route::prefix('suppliers-payments')->group(function(){
    Route::get('new' , 'SuppliersPaymentsController@getNew')->name('suppliersPayments.new.get');
    Route::post('new' , 'SuppliersPaymentsController@postNew')->name('suppliersPayments.new.post');
    Route::get('edit/{id}' , 'SuppliersPaymentsController@getEdit')->name('suppliersPayments.edit.get');
    Route::post('edit/{id}' , 'SuppliersPaymentsController@postEdit')->name('suppliersPayments.edit.post');
    Route::get('delete/{id}' , 'SuppliersPaymentsController@delete')->name('suppliersPayments.delete');
});
Route::prefix('expenses')->group(function(){
    Route::get('/' , 'ExpensesController@getHome')->name('expenses.all');
    Route::get('new' , 'ExpensesController@getNew')->name('expenses.new.get');
    Route::post('new' , 'ExpensesController@postNew')->name('expenses.new.post');
    Route::get('edit/{id}' , 'ExpensesController@getEdit')->name('expenses.edit.get');
    Route::post('edit/{id}' , 'ExpensesController@postEdit')->name('expenses.edit.post');
    Route::get('delete/{id}' , 'ExpensesController@delete')->name('expenses.delete');
});
Route::prefix('sales')->group(function(){
    Route::get('/' , 'SalesController@getHome')->name('sales.all');
    Route::get('new' , 'SalesController@getNew')->name('sales.new.get');
    Route::post('new' , 'SalesController@postNew')->name('sales.new.post');
    Route::get('edit/{id}' , 'SalesController@getEdit')->name('sales.edit.get');
    Route::post('edit/{id}' , 'SalesController@postEdit')->name('sales.edit.post');
    Route::get('delete/{id}' , 'SalesController@delete')->name('sales.delete');
});
Route::prefix('payments')->group(function(){
    Route::get('/' , 'PaymentsController@getHome')->name('payments.all');
    Route::get('new' , 'PaymentsController@getNew')->name('payments.new.get');
    Route::post('new' , 'PaymentsController@postNew')->name('payments.new.post');
    Route::get('edit/{id}' , 'PaymentsController@getEdit')->name('payments.edit.get');
    Route::post('edit/{id}' , 'PaymentsController@postEdit')->name('payments.edit.post');
    Route::get('delete/{id}' , 'PaymentsController@delete')->name('payments.delete');
});
Route::get('reports' , 'ReportsController@getIndex')->name('reports.home');
    Route::post('reports/client' , 'ReportsController@clientReport')->name('reports.client');
    Route::post('reports/company' , 'ReportsController@companyReport')->name('reports.company');
    Route::post('reports/employyes' , 'ReportsController@employeesReport')->name('reports.employees');
});
