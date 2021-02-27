<?php

namespace App\Http\Controllers\Plots;

use App\Http\Controllers\Controller;
use App\Models\plotType;
use Illuminate\Http\Request;

class plotTypeController extends Controller
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
            $arr['plotType']=plotType::withTrashed()->get();
            return view('Company.Plots.Types.view')->with($arr);
        }else{
            $arr['plotType']=plotType::all();
            return view('Company.Plots.Types.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Company.Plots.Types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, plotType $plotType)
    {
        $plotType->name=$request->name;
        $plotType->code=$request->code;
        $plotType->description=$request->description;
        $plotType->save();
        return redirect()->route('plottypes.index');
    }

    public function restore($id){
        $plotType=plotType::withTrashed()->where('id', $id)
            ->first();
        $plotType->restore();
        return redirect()->route('plottypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\plotType  $plotType
     * @return \Illuminate\Http\Response
     */
    public function show(plotType $plotType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\plotType  $plotType
     * @return \Illuminate\Http\Response
     */
    public function edit(plotType $plotType)
    {
        $arr['plotType']=$plotType;
        return view('Company.Plots.Types.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\plotType  $plotType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, plotType $plotType)
    {
        $plotType->name=$request->name;
        $plotType->code=$request->code;
        $plotType->description=$request->description;
        $plotType->updated_at = date('Y-m-d H:i:s');
        $plotType->save();
        return redirect()->route('plottypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\plotType  $plotType
     * @return \Illuminate\Http\Response
     */
    public function destroy(plotType $plotType)
    {
        $plotType->delete();
        return redirect()->route('plottypes.index');
    }
}
