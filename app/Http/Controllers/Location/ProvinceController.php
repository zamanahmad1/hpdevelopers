<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
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
            $country=Country::withTrashed()->get();
            $co=array();
            foreach ($country as $c){
                $co[$c->code]=$c->name;
            }
            $arr['province']=Province::withTrashed()->get();
            $arr['country']=$co;
            return view('Locations.Provinces.view')->with($arr);
        }else{
            $country=Country::withTrashed()->get();
            $co=array();
            foreach ($country as $c){
                $co[$c->code]=$c->name;
            }
            $arr['province']=Province::all();
            $arr['country']=$co;
            return view('Locations.Provinces.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['country']=Country::all();
        return view('Locations.Provinces.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Province $province)
    {
        $province->name=$request->name;
        $province->code=$request->code;
        $province->description=$request->description;
        $province->country_code=$request->country_code;
        $province->save();
        return redirect()->route('provinces.index');
    }

    public function restore($id){
        $province=Province::withTrashed()->where('id', $id)
            ->first();
        $province->restore();
        return redirect()->route('provinces.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
        $arr['country']=Country::all();
        $arr['province']=$province;
        return view('Locations.Provinces.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $province)
    {
        $province->name=$request->name;
        $province->code=$request->code;
        $province->description=$request->description;
        $province->country_code=$request->country_code;
        $province->updated_at = date('Y-m-d H:i:s');
        $province->save();
        return redirect()->route('provinces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        $province->delete();
        return redirect()->route('provinces.index');
    }
}
