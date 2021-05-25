<?php

namespace App\Http\Controllers\SAMS;

use App\Http\Controllers\Controller;
use App\Models\ReservationStatus;
use Illuminate\Http\Request;

class ReservationStatusController extends Controller
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
        if (auth()->user()->hasRole('Administrator')){
            $arr['reservationStatus']=ReservationStatus::withTrashed()->get();
            return view('Company.SAMS.Reservations.Status.view')->with($arr);
        }else {
            $arr['reservationStatus'] = ReservationStatus::all();
            return view('Company.SAMS.Reservations.Status.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Company.SAMS.Reservations.Status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , ReservationStatus $reservationStatus)
    {
        $reservationStatus->name=$request->name;
        $reservationStatus->code=$request->code;
        $reservationStatus->description=$request->description;
        $reservationStatus->save();
        return redirect()->route('reservationstatus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReservationStatus  $reservationStatus
     * @return \Illuminate\Http\Response
     */
    public function show(ReservationStatus $reservationStatus)
    {
        //
    }

    public function restore($id){
        $reservationStatus=ReservationStatus::withTrashed()->where('id', $id)
            ->first();
        $reservationStatus->restore();
        return redirect()->route('reservationstatus.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReservationStatus  $reservationStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservationStatus $reservationStatus)
    {
        $arr['reservationStatus']=$reservationStatus;
        return view('Company.SAMS.Reservations.Status.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReservationStatus  $reservationStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReservationStatus $reservationStatus)
    {
        $reservationStatus->name=$request->name;
        $reservationStatus->code=$request->code;
        $reservationStatus->description=$request->description;
        $reservationStatus->updated_at = date('Y-m-d H:i:s');
        $reservationStatus->save();
        return redirect()->route('reservationstatus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReservationStatus  $reservationStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservationStatus $reservationStatus)
    {
        $reservationStatus->delete();
        return redirect()->route('reservationstatus.index');
    }
}
