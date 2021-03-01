<?php

namespace App\Http\Controllers\Plots;

use App\Http\Controllers\Controller;
use App\Models\PlotStatus;
use App\Models\PlotType;
use Illuminate\Http\Request;

class PlotStatusController extends Controller
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
            $arr['plotStatus']=PlotStatus::withTrashed()->get();
            return view('Company.Plots.Statuses.view')->with($arr);
        }else{
            $arr['plotStatus']=PlotStatus::all();
            return view('Company.Plots.Statuses.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Company.Plots.Statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PlotStatus $plotStatus)
    {
        $plotStatus->name=$request->name;
        $plotStatus->code=$request->code;
        $plotStatus->description=$request->description;
        $plotStatus->save();
        return redirect()->route('plotstatus.index');
    }


    public function restore($id){
        $plotStatus=PlotStatus::withTrashed()->where('id', $id)
            ->first();
        $plotStatus->restore();
        return redirect()->route('plotstatus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlotStatus  $plotStatus
     * @return \Illuminate\Http\Response
     */
    public function show(PlotStatus $plotStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlotStatus  $plotStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(PlotStatus $plotStatus)
    {
        $arr['plotStatus']=$plotStatus;
        return view('Company.Plots.Statuses.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlotStatus  $plotStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlotStatus $plotStatus)
    {
        $plotStatus->name=$request->name;
        $plotStatus->code=$request->code;
        $plotStatus->description=$request->description;
        $plotStatus->updated_at = date('Y-m-d H:i:s');
        $plotStatus->save();
        return redirect()->route('plotstatus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlotStatus  $plotStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlotStatus $plotStatus)
    {
        $plotStatus->delete();
        return redirect()->route('plotstatus.index');
    }
}
