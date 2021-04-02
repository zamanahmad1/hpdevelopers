<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Dealership;
use App\Models\MemberProfile;
use App\Models\Society;
use Illuminate\Http\Request;

class DealerShipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $memberProfile=MemberProfile::withTrashed()->get();
        $temp1=array();
        foreach ($memberProfile as $mp){
            $temp1[$mp->code]=$mp;
        }
        if (auth()->user()->hasRole('Administrator')){

            $arr['dealerShip']= DealerShip::withTrashed()->get();
            $arr['society']=$temp;
            $arr['memberProfile']=$temp1;
            return view('Company.Members.DealerShips.view')->with($arr);
        }else {

            $arr['dealerShip'] = Dealership::all();
            $arr['society']=$temp;
            $arr['memberProfile']=$temp1;
            return view('Company.Members.DealerShips.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['society']=Society::all();
        return view('Company.Members.DealerShips.create')->with($arr);
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
     * @param  \App\Models\Dealership  $dealership
     * @return \Illuminate\Http\Response
     */
    public function show(Dealership $dealership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dealership  $dealership
     * @return \Illuminate\Http\Response
     */
    public function edit(Dealership $dealership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dealership  $dealership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dealership $dealership)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dealership  $dealership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dealership $dealership)
    {
        //
    }
}
