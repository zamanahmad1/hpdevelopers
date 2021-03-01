<?php

namespace App\Http\Controllers\plots;

use App\Http\Controllers\Controller;
use App\Models\PlotShape;
use Illuminate\Http\Request;

class PlotShapeController extends Controller
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
            $arr['plotShape']=PlotShape::withTrashed()->get();
            return view('Company.Plots.Shapes.view')->with($arr);
        }else {
            $arr['plotShape'] = PlotShape::all();
            return view('Company.Plots.Shapes.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Company.Plots.Shapes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PlotShape $plotShape)
    {
        $plotShape->name=$request->name;
        $plotShape->code=$request->code;
        $plotShape->description=$request->description;
        $plotShape->save();
        return redirect()->route('plotshapes.index');
    }

    public function restore($id){
        $plotShape=PlotShape::withTrashed()->where('id', $id)
            ->first();
        $plotShape->restore();
        return redirect()->route('plotshapes.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlotShape  $plotShape
     * @return \Illuminate\Http\Response
     */
    public function show(PlotShape $plotShape)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlotShape  $plotShape
     * @return \Illuminate\Http\Response
     */
    public function edit(PlotShape $plotShape)
    {
        $arr['plotShape']=$plotShape;
        return view('Company.Plots.Shapes.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlotShape  $plotShape
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlotShape $plotShape)
    {
        $plotShape->name=$request->name;
        $plotShape->code=$request->code;
        $plotShape->description=$request->description;
        $plotShape->updated_at = date('Y-m-d H:i:s');
        $plotShape->save();
        return redirect()->route('plotshapes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlotShape  $plotShape
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlotShape $plotShape)
    {
        $plotShape->delete();
        return redirect()->route('plotshapes.index');
    }
}
