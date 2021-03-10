<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class CityController extends Controller
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
            $province=Province::withTrashed()->get();
            $pr=array();
            foreach ($province as $p){
                $pr[$p->code]=$p->name;
            }
            $arr['city']=City::withTrashed()->get();
            $arr['province']=$pr;
            return view('Locations.Cities.view')->with($arr);
        }else{
            $province=Province::withTrashed()->get();
            $pr=array();
            foreach ($province as $p){
                $pr[$p->code]=$p->name;
            }
            $arr['city']=City::all();
            $arr['province']=$pr;
            return view('Locations.Cities.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['province']=Province::all();
        return view('Locations.Cities.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, City $city)
    {
        $city->name=$request->name;
        $city->code=$request->code;
        $city->description=$request->description;
        $city->city_code=$request->city_code;
        $city->save();
        return redirect()->route('cities.index');
    }

    public function restore($id){
        $city=City::withTrashed()->where('id', $id)
            ->first();
        $city->restore();
        return redirect()->route('cities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $arr['province']=Province::all();
        $arr['city']=$city;
        return view('Locations.Cities.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $city->name=$request->name;
        $city->code=$request->code;
        $city->description=$request->description;
        $city->province_code=$request->province_code;
        $city->updated_at = date('Y-m-d H:i:s');
        $city->save();
        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index');
    }
}
