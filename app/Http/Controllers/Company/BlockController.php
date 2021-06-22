<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Sector;
use App\Models\Society;
use Illuminate\Http\Request;

class BlockController extends Controller
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
            $sector=Sector::withTrashed()->get();
            $se=array();
            foreach ($sector as $s){
                $se[$s->code]=$s->name;
            }
            $arr['block']=Block::withTrashed()->get();
            $arr['sector']=$se;
            return view('Company.Blocks.view')->with($arr);
        }else{
            $sector=Sector::withTrashed()->get();
            $se=array();
            foreach ($sector as $s){
                $se[$s->code]=$s->name;
            }
            $arr['block']=Block::all();
            $arr['sector']=$se;
            return view('Company.Blocks.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['sector']=Sector::all();
        return view('Company.Blocks.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Block $block)
    {
        $block->name=$request->name;
        $block->code=$request->code;
        $block->description=$request->description;
        $block->sector_code=$request->sector_code;
        $block->save();
        return redirect()->route('blocks.index');
    }

    public function restore($id){
        $blocks=Block::withTrashed()->where('id', $id)
            ->first();
        $blocks->restore();
        return redirect()->route('blocks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function show(Block $block)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function edit(Block $block)
    {
        $arr['sector']=Sector::all();
        $arr['block']=$block;
        return view('Company.Blocks.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Block $block)
    {
        $block->name=$request->name;
        $block->code=$request->code;
        $block->description=$request->description;
        $block->sector_code=$request->sector_code;
        $block->updated_at = date('Y-m-d H:i:s');
        $block->save();
        return redirect()->route('blocks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function destroy(Block $block)
    {
        $block->delete();
        return redirect()->route('blocks.index');
    }

    public function blockList(){
        $sector_code=$_POST['sector_code'];
        $blocklist=Block::where('sector_code',$sector_code)
            ->get();
        return response()->json([
            'blocks' => $blocklist
        ]);
    }
}
