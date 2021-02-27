<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Street;
use Illuminate\Http\Request;

class StreetController extends Controller
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
            $block=Block::withTrashed()->get();
            $bl=array();
            foreach ($block as $b){
                $bl[$b->code]=$b->name;
            }
            $arr['street']=Street::withTrashed()->get();
            $arr['block']=$bl;
            return view('Company.Streets.view')->with($arr);
        }else{
            $block=Block::withTrashed()->get();
            $bl=array();
            foreach ($block as $b){
                $bl[$b->code]=$b->name;
            }
            $arr['street']=Street::all();
            $arr['block']=$bl;
            return view('Company.Streets.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['block']=Block::all();
        return view('Company.Streets.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Street $street)
    {
        $street->name=$request->name;
        $street->code=$request->code;
        $street->description=$request->description;
        $street->block_code=$request->block_code;
        $street->save();
        return redirect()->route('streets.index');
    }
    public function restore($id){
        $streets=Street::withTrashed()->where('id', $id)
            ->first();
        $streets->restore();
        return redirect()->route('streets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Street  $street
     * @return \Illuminate\Http\Response
     */
    public function show(Street $street)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Street  $street
     * @return \Illuminate\Http\Response
     */
    public function edit(Street $street)
    {
        $arr['block']=Block::all();
        $arr['street']=$street;
        return view('Company.Streets.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Street  $street
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Street $street)
    {
        $street->name=$request->name;
        $street->code=$request->code;
        $street->description=$request->description;
        $street->block_code=$request->block_code;
        $street->updated_at = date('Y-m-d H:i:s');
        $street->save();
        return redirect()->route('streets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Street  $street
     * @return \Illuminate\Http\Response
     */
    public function destroy(Street $street)
    {
        $street->delete();
        return redirect()->route('streets.index');
    }
}
