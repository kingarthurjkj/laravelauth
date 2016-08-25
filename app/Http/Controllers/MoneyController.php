<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modal\Money;



class MoneyController extends Controller
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
        return Money::all();
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $money = new Money();

        $money->money = $this->request->input('money');
        $date = date('y-m-d h:i:s');
        $money->created_at = $date;
        $money->updated_at = $date;
        $money->save();
        return $money;

    }

    /**
     * Store a newly created resource in storage.
     * @return Response
     */
    public function store()
    {
        $money = new Money();

        $money->money = $this->request->input('money');
        $date = date('y-m-d h:i:s');
        $money->created_at = $date;
        $money->updated_at = $date;
        $money->save();
        return $money;
      
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

        return Money::find($id);

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
        return Money::destroy($id);
    }
}
