<?php

namespace App\Http\Controllers\Plots;

use App\Http\Controllers\Controller;
use App\Models\PlotDimension;
use App\Models\PlotInventory;
use Carbon\Traits\Date;
use Illuminate\Http\Request;

class PlotDimensionController extends Controller
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
            $plotInventory=PlotInventory::withTrashed()->get();
            $temp=array();
            foreach($plotInventory as $pi){
                $temp[$pi->code]=$pi->name;
            }
            $arr['plot']=$temp;
            $arr['plotDimension']=PlotDimension::withTrashed()->get();
            return view('Company.Plots.Dimensions.view')->with($arr);
        }else{
            $plotInventory=PlotInventory::all();
            $temp=array();
            foreach($plotInventory as $pi){
                $temp[$pi->code]=$pi->name;
            }
            $arr['plot']=$temp;
            $arr['plotDimension']=PlotDimension::all();
            return view('Company.Plots.Dimensions.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['plotInventory']=PlotInventory::all();
        return view('Company.Plots.Dimensions.create')->with($arr);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PlotDimension $plotDimension)
    {
        $plotDimension->name=$request->name;
        $plotDimension->code=$request->code;
        $plotDimension->description=$request->description;
        $plotDimension->plot_code=$request->plot_code;
        $plotDimension->length=$request->length;
        $plotDimension->save();
        return redirect()->route('plotdimensions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlotDimension  $plotDimension
     * @return \Illuminate\Http\Response
     */
    public function show(PlotDimension $plotDimension)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlotDimension  $plotDimension
     * @return \Illuminate\Http\Response
     */
    public function edit(PlotDimension $plotDimension)
    {
        $arr['plotInventory']=PlotInventory::all();
        $arr['plotDimension']=$plotDimension;
        $arr['plot']=PlotInventory::where('code',$plotDimension->plot_code)->first();
        return view('Company.Plots.Dimensions.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlotDimension  $plotDimension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlotDimension $plotDimension)
    {
        $plotDimension->name=$request->name;
        $plotDimension->code=$request->code;
        $plotDimension->description=$request->description;
        $plotDimension->plot_code=$request->plot_code;
        $plotDimension->length=$request->length;
        $plotDimension->updated_at=date('Y-m-d H:i:s');
        $plotDimension->save();
        return redirect()->route('plotdimensions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlotDimension  $plotDimension
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlotDimension $plotDimension)
    {
        //
    }
}
