<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Modal\Apply;
use App\Modal\Money;

class ManagerController extends Controller
{

  
   public function accept(Request $request){

    $id = $request->get('id');
    $apply = Apply::find($id);
    $money = Money::find($apply->uid);
    $totalmoney =$money->money + $apply->money ;
    if (($apply->status == 'apply')||($apply->status == 'wait')) {
        if ($totalmoney > 0) {

            $apply->status = 'accept';
            $date = date('y-m-d h:i:s');
            $apply->created_at = $date;
            $apply->updated_at = $date;
            $apply->save();

            $money->money = $totalmoney;
            $money->created_at = $date;
            $money->updated_at = $date;
            $money->save();
            return $apply;
        }
    }
    return false;

}
    public function wait(Request $request){

        $id = $request->get('id');
        $apply = Apply::find($id);
        $status = $apply->status;

        if ($status=='apply'){

            $apply->status = 'wait';
            $date = date('y-m-d h:i:s');
            $apply->created_at = $date;
            $apply->updated_at = $date;
            $apply->save();

           return $apply;
        }
        return false;

    }
    public function cancel(Request $request){

        $id = $request->get('id');
        $apply = Apply::find($id);
        $status = $apply->status;

        if (($apply->status == 'apply')||($apply->status == 'wait')){

            $apply->status = 'cancel';
            $date = date('y-m-d h:i:s');
            $apply->created_at = $date;
            $apply->updated_at = $date;
            $apply->save();

            return $apply;
        }
        return false;

    }
    public function delete(Request $request){

        $id = $request->get('id');
        $apply =Apply::find($id);
        $apply->mflag = 0;
        $apply->save();
        return $apply;

    }

}
