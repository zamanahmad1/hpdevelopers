<?php

namespace App\Http\Controllers\SAMS;

use App\Http\Controllers\Controller;
use App\Models\MemberProfile;
use App\Models\PlotInventory;
use App\Models\Reservation;
use App\Models\ReservationStatus;
use Illuminate\Http\Request;

class ReservationController extends Controller
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

        $reservation_check=Reservation::all();
        foreach ($reservation_check as $r){
            if($r->reservation_status=='active'){
                if(strtotime(date("y-m-d"))-strtotime($r->reserved_till)>0){
                    $r->reservation_status='pending';
                    $r->save();
                }
            }
        }
        if (auth()->user()->hasRole('Administrator')){
            $plots=array();
            $memberProfiles=array();
            $plot=PlotInventory::withTrashed()->get();
            foreach($plot as $p){
                $plots[$p->code]=$p;
            }
            $arr['plots']=$plots;
            $memberProfile=MemberProfile::withTrashed()->get();
            foreach($memberProfile as $mp){
                $memberProfiles[$mp->code]=$mp;
            }
            $arr['memberProfiles']=$memberProfiles;
            $arr['reservation']=Reservation::withTrashed()->get();
            return view('Company.SAMS.Reservations.view')->with($arr);

        }else{
            $plots=array();
            $memberProfiles=array();
            $plot=PlotInventory::all();
            foreach($plot as $p){
                $plots[$p->code]=$p;
            }
            $arr['plots']=$plots;
            $memberProfile=MemberProfile::all();
            foreach($memberProfile as $mp){
                $memberProfiles[$mp->code]=$mp;
            }
            $arr['memberProfiles']=$memberProfiles;
            $arr['reservation']=Reservation::all();
            return view('Company.SAMS.Reservations.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['plotInventory']=PlotInventory::where('plotavailability_code','available')
            ->get();
        $arr['memberProfile']=MemberProfile::all();
        $arr['reservationStatus']=ReservationStatus::all();
        return view('Company.SAMS.Reservations.create')->with($arr);
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
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
