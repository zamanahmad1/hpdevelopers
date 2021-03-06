<?php

namespace App\Http\Controllers\Plots;

use App\Http\Controllers\Controller;
use App\Models\PlotSize;
use Illuminate\Http\Request;

class PlotSizeController extends Controller
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
            $arr['plotSize']=PlotSize::withTrashed()->get();
            return view('Company.Plots.Sizes.view')->with($arr);
        }else{
            $arr['plotSize']=PlotSize::all();
            return view('Company.Plots.Sizes.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Company.Plots.Sizes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PlotSize $plotSize)
    {
        $plotSize->name=$request->name;
        $plotSize->code=$request->code;
        $plotSize->description=$request->description;
        $plotSize->installment_price=$request->installment_price;
        $plotSize->cash_price=$request->cash_price;
        $plotSize->save();
        return redirect()->route('plotsizes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlotSize  $plotSize
     * @return \Illuminate\Http\Response
     */
    public function show(PlotSize $plotSize)
    {
        //
    }

    public function restore($id){
        $plotSize=PlotSize::withTrashed()->where('id', $id)
            ->first();
        $plotSize->restore();
        return redirect()->route('plotsizes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlotSize  $plotSize
     * @return \Illuminate\Http\Response
     */
    public function edit(PlotSize $plotSize)
    {
        $arr['plotSize']=$plotSize;
        return view('Company.Plots.Sizes.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlotSize  $plotSize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlotSize $plotSize)
    {
        $plotSize->name=$request->name;
        $plotSize->code=$request->code;
        $plotSize->description=$request->description;
        $plotSize->installment_price=$request->installment_price;
        $plotSize->cash_price=$request->cash_price;
        $plotSize->updated_at = date('Y-m-d H:i:s');
        $plotSize->save();
        return redirect()->route('plotsizes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlotSize  $plotSize
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlotSize $plotSize)
    {
        $plotSize->delete();
        return redirect()->route('plotsizes.index');
    }
}
