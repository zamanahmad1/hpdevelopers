<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\MemberProfile;
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
        $memberProfile=MemberProfile::withTrashed()->get();
        $temp1=array();
        foreach ($memberProfile as $mp){
            $temp1[$mp->code]=$mp;
        }
        if (auth()->user()->hasRole('Administrator')){

            $arr['memberShip']=MemberShip::withTrashed()->get();
            $arr['society']=$temp;
            $arr['memberProfile']=$temp1;
            return view('Company.Members.MemberShips.view')->with($arr);
        }else {

            $arr['memberShip'] = MemberShip::all();
            $arr['society']=$temp;
            $arr['memberProfile']=$temp1;
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
        $arr['society']=Society::all();
        return view('Company.Members.MemberShips.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, memberShip $memberShip)
    {
        $code=$request->memberprofile.$request->society_code.date('ymd').rand(1,99999).'B';
        $memberShip->code=$code;
        $memberShip->memberprofile_code=$request->memberprofile;
        $memberShip->society_code=$request->society_code;
        $memberShip->membertype='B';
        $memberShip->description=$request->description;
        $memberShip->save();
        return redirect()->route('memberships.index');
    }

    public function restore($id){
        $memberShip=MemberShip::withTrashed()->where('id', $id)
            ->first();
        $memberShip->restore();
        return redirect()->route('memberships.index');
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
        $arr['society']=Society::all();
        $arr['memberShip']=$memberShip;
        $arr['memberProfile']=MemberProfile::where('code',$memberShip->memberprofile_code)
            ->first();
        return view('Company.Members.MemberShips.edit')->with($arr);
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
        /*$code=$request->memberprofile.$request->society_code.date('ymd').rand(1,99999).'B';
        $memberShip->code=$code;
        $memberShip->memberprofile_code=$request->memberprofile;
        $memberShip->society_code=$request->society_code;
        $memberShip->membertype='B';
        $memberShip->description=$request->description;
        $memberShip->save();
        return redirect()->route('memberships.index');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberShip  $memberShip
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberShip $memberShip)
    {
        $memberShip->delete();
        return redirect()->route('memberships.index');
    }
}
