<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Society;
use Illuminate\Http\Request;

class SocietyController extends Controller
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
            $project=Project::withTrashed()->get();
            $pa=array();
            foreach ($project as $p){
                $pa[$p->code]=$p->name;
            }
            $arr['society']=Society::withTrashed()->get();
            $arr['project']=$pa;
            return view('Company.Societies.view')->with($arr);
        }else{
            $project=Project::withTrashed()->get();
            $pa=array();
            foreach ($project as $p){
                $pa[$p->code]=$p->name;
            }
            $arr['society']=Society::all();
            $arr['project']=$pa;
            return view('Company.Societies.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['project']=Project::all();
        return view('Company.Societies.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Society $society)
    {
        $society->name=$request->name;
        $society->code=$request->code;
        $society->description=$request->description;
        $society->project_code=$request->project_code;
        $society->save();
        return redirect()->route('societies.index');
    }
    public function restore($id){
        $society=Society::withTrashed()->where('id', $id)
            ->first();
        $society->restore();
        return redirect()->route('societies.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function show(Society $society)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function edit(Society $society)
    {
        $arr['project']=Project::all();
        $arr['society']=$society;
        return view('Company.Societies.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Society $society)
    {
        $society->name=$request->name;
        $society->code=$request->code;
        $society->description=$request->description;
        $society->project_code=$request->project_code;
        $society->updated_at = date('Y-m-d H:i:s');
        $society->save();
        return redirect()->route('societies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function destroy(Society $society)
    {
        $society->delete();
        return redirect()->route('societies.index');
    }
}
