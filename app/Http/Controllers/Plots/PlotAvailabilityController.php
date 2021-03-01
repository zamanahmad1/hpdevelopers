<?php

namespace App\Http\Controllers\plots;

use App\Http\Controllers\Controller;
use App\Models\PlotAvailability;
use Illuminate\Http\Request;

class PlotAvailabilityController extends Controller
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
            $arr['plotAvailability']=PlotAvailability::withTrashed()->get();
            return view('Company.Plots.Availabilities.view')->with($arr);
        }else{
            $arr['plotAvailability']=PlotAvailability::all();
            return view('Company.Plots.Availabilities.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Company.Plots.Availabilities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PlotAvailability $plotAvailability)
    {
        $plotAvailability->name=$request->name;
        $plotAvailability->code=$request->code;
        $plotAvailability->description=$request->description;
        $plotAvailability->save();
        return redirect()->route('plotavailabilities.index');
    }

    public function restore($id){
        $plotStatus=PlotAvailability::withTrashed()->where('id', $id)
            ->first();
        $plotStatus->restore();
        return redirect()->route('plotavailabilities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlotAvailability  $plotAvailability
     * @return \Illuminate\Http\Response
     */
    public function show(PlotAvailability $plotAvailability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlotAvailability  $plotAvailability
     * @return \Illuminate\Http\Response
     */
    public function edit(PlotAvailability $plotAvailability)
    {
        $arr['plotAvailability']=$plotAvailability;
        return view('Company.Plots.Availabilities.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlotAvailability  $plotAvailability
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlotAvailability $plotAvailability)
    {
        $plotAvailability->name=$request->name;
        $plotAvailability->code=$request->code;
        $plotAvailability->description=$request->description;
        $plotAvailability->updated_at = date('Y-m-d H:i:s');
        $plotAvailability->save();
        return redirect()->route('plotavailabilities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlotAvailability  $plotAvailability
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlotAvailability $plotAvailability)
    {
        $plotAvailability->delete();
        return redirect()->route('plotavailabilities.index');
    }
}
