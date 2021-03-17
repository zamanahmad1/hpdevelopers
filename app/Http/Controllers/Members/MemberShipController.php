<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\MemberShip;
use App\Models\Society;
use Illuminate\Http\Request;

class MemberShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $society=Society::withTrashed()->get();
        $temp=array();
        foreach ($society as $s){
            $temp[$s->code]=$s;
        }
        if (auth()->user()->hasRole('Administrator')){

            $arr['memberShip']=MemberShip::withTrashed()->get();
            $arr['society']=$temp;
            return view('Company.Members.MemberShips.view')->with($arr);
        }else {

            $arr['memberShip'] = MemberShip::all();
            $arr['society']=$temp;
            return view('Company.Members.MemberShips.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberShip  $memberShip
     * @return \Illuminate\Http\Response
     */
    public function show(MemberShip $memberShip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberShip  $memberShip
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberShip $memberShip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberShip  $memberShip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberShip $memberShip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberShip  $memberShip
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberShip $memberShip)
    {
        //
    }
}
