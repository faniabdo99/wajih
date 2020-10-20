<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model{
    protected $guarded = [];
    public function getTypeTextAttribute(){
        $Resultes = [
            'salaries' => 'رواتب',
            'bills' => 'فواتير',
            'rental' => 'آجار',
            'material' => 'مشتريات / بضائع',
            'others' => 'أخرى'
        ];
        return $Resultes[$this->type];
    }
    public function Supplier(){
      return $this->belongsTo(Supplier::class , 'supplier_id');
    }
}
