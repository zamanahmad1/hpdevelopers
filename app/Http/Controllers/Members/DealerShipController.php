<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\DealerShip;
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

            $arr['dealerShip'] = DealerShip::all();
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
    public function store(Request $request, DealerShip $dealerShip)
    {
        $code=$request->memberprofile.$request->society_code.date('ymd').rand(1,99999).'D';
        $dealerShip->code=$code;
        $dealerShip->memberprofile_code=$request->memberprofile;
        $dealerShip->society_code=$request->society_code;
        $dealerShip->membertype='D';
        $dealerShip->description=$request->description;
        $dealerShip->save();
        return redirect()->route('dealerships.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DealerShip  $dealerShip
     * @return \Illuminate\Http\Response
     */

    public function restore($id){
        $dealerShip=DealerShip::withTrashed()->where('id', $id)
            ->first();
        $dealerShip->restore();
        return redirect()->route('dealerships.index');
    }

    public function show(DealerShip $dealerShip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DealerShip  $dealerShip
     * @return \Illuminate\Http\Response
     */
    public function edit(DealerShip $dealerShip)
    {
        $arr['society']=Society::all();
        $arr['dealerShip']=$dealerShip;
        $arr['memberProfile']=MemberProfile::where('code',$dealerShip->memberprofile_code)
            ->first();
        return view('Company.Members.DealerShips.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DealerShip  $dealerShip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DealerShip $dealerShip)
    {
        return redirect()->route('dealerships.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DealerShip  $dealerShip
     * @return \Illuminate\Http\Response
     */
    public function destroy(DealerShip $dealerShip)
    {
        $dealerShip->delete();
        return redirect()->route('dealerships.index');
    }
}
