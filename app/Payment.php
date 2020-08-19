<?php
namespace App;
use Str;
use Illuminate\Database\Eloquent\Model;
class Payment extends Model{
    protected $dates = ['date'];
    protected $guarded = [];
    public $timestamps = true;
    public function Customer(){
        return $this->belongsTo(Customer::class);
    }
    public function getShortNotesAttribute(){
        return Str::words($this->notes ,5);
    }
}
