<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modal\Apply;
use App\Modal\Money;



class ManaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    private $request;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        return Apply::where('mflag', 1)->get();
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {

        $apply = new Apply();
        $uid = $this->request->input('uid');
        $money = $this->request->input('money');
        $data = Money::find($uid);
        $totalmoney =$money + $data->money ;
        if ($totalmoney > 0){

            $apply->uid = $uid;
            $apply->money = $money;
            $apply->status = 'apply';
            $date = date('y-m-d h:i:s');
            $apply->created_at = $date;
            $apply->updated_at = $date;
            $apply->save();
            return $apply;
        }
        return false;

    }

    /**
     * Store a newly created resource in storage.
     * @return Response
     */
    public function store()
    {
        $apply = new Apply();
        $uid = $this->request->input('uid');
        $money = $this->request->input('money');
        $data = Money::find($uid);
        $totalmoney =$money + $data->money ;
        if ($totalmoney > 0){

            $apply->uid = $uid;
            $apply->money = $money;
            $apply->status = 'apply';
            $date = date('y-m-d h:i:s');
            $apply->created_at = $date;
            $apply->updated_at = $date;
            $apply->save();
            return $apply;
        }
        return false;
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

        return Apply::find($id);

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        print("OK");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update($id)
    {


    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $apply =Apply::find($id);
        $apply->uflag = 0;
        $apply->save();
        return $apply;
    }
}
