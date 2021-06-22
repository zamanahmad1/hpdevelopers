<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Sector;
use App\Models\Society;
use Illuminate\Http\Request;

class SectorController extends Controller
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
            $society=Society::withTrashed()->get();
            $so=array();
            foreach ($society as $s){
                $so[$s->code]=$s->name;
            }
            $arr['sector']=Sector::withTrashed()->get();
            $arr['society']=$so;
            return view('Company.Sectors.view')->with($arr);
        }else{
            $society=Society::withTrashed()->get();
            $so=array();
            foreach ($society as $s){
                $so[$s->code]=$s->name;
            }
            $arr['sector']=Sector::all();
            $arr['society']=$so;
            return view('Company.Sectors.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['society']=Society::all();
        return view('Company.Sectors.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sector $sector)
    {
        $sector->name=$request->name;
        $sector->code=$request->code;
        $sector->description=$request->description;
        $sector->society_code=$request->society_code;
        $sector->save();
        return redirect()->route('sectors.index');
    }

    public function restore($id){
        $sector=Sector::withTrashed()->where('id', $id)
            ->first();
        $sector->restore();
        return redirect()->route('sectors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show(Sector $sector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit(Sector $sector)
    {
        $arr['society']=Society::all();
        $arr['sector']=$sector;
        return view('Company.Sectors.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sector $sector)
    {
        $sector->name=$request->name;
        $sector->code=$request->code;
        $sector->description=$request->description;
        $sector->society_code=$request->society_code;
        $sector->updated_at = date('Y-m-d H:i:s');
        $sector->save();
        return redirect()->route('sectors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sector $sector)
    {
        $sector->delete();
        return redirect()->route('sectors.index');
    }

    public function sectorList(){
        $society_code=$_POST['society_code'];
        $sectorlist=Sector::where('society_code',$society_code)
            ->get();
        return response()->json([
            'sectors' => $sectorlist
        ]);
    }
}
