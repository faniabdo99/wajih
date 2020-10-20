<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuppliersPayment extends Model{
    protected $guarded = [];
    public function Supplier(){
      return $this->belongsTo(Supplier::class , 'supplier_id');
    }
}
