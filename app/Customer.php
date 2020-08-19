<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model{
    protected $guarded = [];
    public function CurrentStates($ReportType , $Date = null , $StartDate = null , $EndDate = null){
        if($ReportType == 'ItemReport'){
            // if($Date){
                $FormattedDate = $Date->format('Y-m-d H:i:s');
                $HeOweUs = Sales::where('customer_id' , $this->id)->where('created_at' , '<=' , $FormattedDate)->get()->map(function($item){
                    return ($item->pieces * $item->price_per_piece);
                });
                $HePaid = intval(Payment::where('customer_id' , $this->id)->where('created_at' , '<=' , $FormattedDate)->sum('amount'));
            // }else{
            //     $HeOweUs = Sales::where('customer_id' , $this->id)->whereDate('created_at' , '>=' , $StartDate)->whereDate('created_at' , '<=' , $EndDate)->get()->map(function($item){
            //         return ($item->pieces * $item->price_per_piece);
            //     });
            //     $HePaid = intval(Payment::where('customer_id' , $this->id)->whereDate('created_at' , '>=' , $StartDate)->whereDate('created_at' , '<=' , $EndDate)->sum('amount'));
            // }
 
        }elseif($ReportType == 'MonthReport'){
            if($Date <= 9){
                $Date = '0'.$Date;
            }
            $HeOweUs = Sales::where('customer_id' , $this->id)->whereMonth('created_at' , '=' , $Date)->get()->map(function($item){
                return ($item->pieces * $item->price_per_piece);
            });
            $HePaid = intval(Payment::where('customer_id' , $this->id)->whereMonth('created_at' , '=' , $Date)->sum('amount'));
        }elseif($ReportType == 'MonthFiltersReport'){
            $HeOweUs = Sales::where('customer_id' , $this->id)->whereDate('created_at' , '>=' , $StartDate)->whereDate('created_at' , '<=' , $EndDate)->get()->map(function($item){
                return ($item->pieces * $item->price_per_piece);
            });
            $HePaid = intval(Payment::where('customer_id' , $this->id)->whereDate('created_at' , '>=' , $StartDate)->whereDate('created_at' , '<=' , $EndDate)->sum('amount'));
        }
        //Calculate Rassed
        $Rassed = $HePaid - $HeOweUs->sum();
        //About Madden
        $Data =  [
            'madden' => $HeOweUs->sum(),
            'rassed' => $Rassed,
            'daeen' => $HePaid
        ];
        // dd($Data);
        return $Data;
    }
}
