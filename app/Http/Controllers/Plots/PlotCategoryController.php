<?php

namespace App\Http\Controllers\plots;

use App\Http\Controllers\Controller;
use App\Models\PlotCategory;
use Illuminate\Http\Request;

class PlotCategoryController extends Controller
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
            $arr['plotCategory']=PlotCategory::withTrashed()->get();
            return view('Company.Plots.Categories.view')->with($arr);
        }else {
            $arr['plotCategory'] = PlotCategory::all();
            return view('Company.Plots.Categories.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Company.Plots.Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PlotCategory $plotCategory)
    {
        $plotCategory->name=$request->name;
        $plotCategory->code=$request->code;
        $plotCategory->description=$request->description;
        $plotCategory->save();
        return redirect()->route('plotcategories.index');
    }

    public function restore($id){
        $plotCategory=PlotCategory::withTrashed()->where('id', $id)
            ->first();
        $plotCategory->restore();
        return redirect()->route('plotcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlotCategory  $plotCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PlotCategory $plotCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlotCategory  $plotCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PlotCategory $plotCategory)
    {
        $arr['plotCategory']=$plotCategory;
        return view('Company.Plots.Categories.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlotCategory  $plotCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlotCategory $plotCategory)
    {
        $plotCategory->name=$request->name;
        $plotCategory->code=$request->code;
        $plotCategory->description=$request->description;
        $plotCategory->updated_at = date('Y-m-d H:i:s');
        $plotCategory->save();
        return redirect()->route('plotcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlotCategory  $plotCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlotCategory $plotCategory)
    {
        $plotCategory->delete();
        return redirect()->route('plotcategories.index');
    }
}
