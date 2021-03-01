<?php

namespace App\Http\Controllers\plots;

use App\Http\Controllers\Controller;
use App\Models\PlotInhensiveFeature;
use Illuminate\Http\Request;

class PlotInhensiveFeatureController extends Controller
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
            $arr['plotInhensiveFeature']=PlotInhensiveFeature::withTrashed()->get();
            return view('Company.Plots.InhensiveFeatures.view')->with($arr);
        }else{
            $arr['plotInhensiveFeature']=PlotInhensiveFeatureg::all();
            return view('Company.Plots.InhensiveFeatures.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Company.Plots.InhensiveFeatures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,PlotInhensiveFeature $plotInhensiveFeature)
    {
        $plotInhensiveFeature->name=$request->name;
        $plotInhensiveFeature->code=$request->code;
        $plotInhensiveFeature->description=$request->description;
        $plotInhensiveFeature->percentage=$request->percentage;
        $plotInhensiveFeature->save();
        return redirect()->route('plotinhensivefeatures.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlotInhensiveFeature  $plotInhensiveFeature
     * @return \Illuminate\Http\Response
     */
    public function show(PlotInhensiveFeature $plotInhensiveFeature)
    {
        //
    }

    public function restore($id){
        $plotInhensiveFeature=PlotInhensiveFeature::withTrashed()->where('id', $id)
            ->first();
        $plotInhensiveFeature->restore();
        return redirect()->route('plotinhensivefeatures.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlotInhensiveFeature  $plotInhensiveFeature
     * @return \Illuminate\Http\Response
     */
    public function edit(PlotInhensiveFeature $plotInhensiveFeature)
    {
        $arr['plotInhensiveFeature']=$plotInhensiveFeature;
        return view('Company.Plots.InhensiveFeatures.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlotInhensiveFeature  $plotInhensiveFeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlotInhensiveFeature $plotInhensiveFeature)
    {
        $plotInhensiveFeature->name=$request->name;
        $plotInhensiveFeature->code=$request->code;
        $plotInhensiveFeature->description=$request->description;
        $plotInhensiveFeature->percentage=$request->percentage;
        $plotInhensiveFeature->updated_at = date('Y-m-d H:i:s');
        $plotInhensiveFeature->save();
        return redirect()->route('plotinhensivefeatures.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlotInhensiveFeature  $plotInhensiveFeature
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlotInhensiveFeature $plotInhensiveFeature)
    {
        $plotInhensiveFeature->delete();
        return redirect()->route('plotinhensivefeatures.index');
    }
}
