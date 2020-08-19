<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Str;
class Sales extends Model{
    protected $guarded = [];
    public function Customer(){
        return $this->belongsTo(Customer::class);
    }
    public function getTotalAttribute(){
        return $this->pieces * $this->price_per_piece;
    }
    public function getShortNotesAttribute(){
        return Str::words($this->notes ,5);
    }
}
