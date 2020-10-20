<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model{
    protected $guarded = [];
    public function Expens(){
      return $this->hasMany(Expense::class , 'supplier_id');
    }
    public function Rassed(){
      $AllExpenses = Expense::where('supplier_id' , $this->id)->sum('amount');
      $AllPayments = SuppliersPayment::where('supplier_id' , $this->id)->sum('amount');
      return -($AllExpenses - $AllPayments);
    }
}
