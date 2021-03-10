<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
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
            $arr['country']=Country::withTrashed()->get();
            return view('Locations.Countries.view')->with($arr);
        }else{
            $arr['country']=Country::all();
            return view('Locations.Countries.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Locations.Countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Country $country)
    {
        $country->name=$request->name;
        $country->code=$request->code;
        $country->description=$request->description;
        $country->save();
        return redirect()->route('countries.index');
    }

    public function restore($id){
        $country=Country::withTrashed()->where('id', $id)
            ->first();
        $country->restore();
        return redirect()->route('countries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        $arr['country']=$country;
        return view('Locations.Countries.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $country->name=$request->name;
        $country->code=$request->code;
        $country->description=$request->description;
        $country->updated_at = date('Y-m-d H:i:s');
        $country->save();
        return redirect()->route('countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('countries.index');
    }
}
