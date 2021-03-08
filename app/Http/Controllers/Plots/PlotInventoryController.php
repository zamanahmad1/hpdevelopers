<?php

namespace App\Http\Controllers\plots;

use App\Http\Controllers\Controller;
use App\Models\PlotAvailability;
use App\Models\PlotCategory;
use App\Models\PlotDimension;
use App\Models\PlotInhensiveFeature;
use App\Models\PlotInventory;
use App\Models\PlotPrice;
use App\Models\PlotShape;
use App\Models\PlotSize;
use App\Models\PlotStatus;
use App\Models\PlotType;
use App\Models\Street;
use Illuminate\Http\Request;

class PlotInventoryController extends Controller
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
            $street=Street::withTrashed()->get();
            $plotAvailability=PlotAvailability::withTrashed()->get();
            $street_array=array();
            $plotAvailability_array=array();

            foreach ($street as $s){
                $street_array[$s->code]=$s->name;
            }
            foreach ($plotAvailability as $pa){
                $plotAvailability_array[$pa->code]=$pa->name;
            }
            $arr['plotAvailability']=$plotAvailability_array;
            $arr['street']=$street_array;
            $arr['plotInventory']=PlotInventory::withTrashed()->get();
            return view('Company.Plots.Inventories.view')->with($arr);
        }else {
            $street=Street::withTrashed()->get();
            $plotAvailability=PlotAvailability::withTrashed()->get();
            $street_array=array();
            $plotAvailability_array=array();

            foreach ($street as $s){
                $street_array[$s->code]=$s->name;
            }
            foreach ($plotAvailability as $pa){
                $plotAvailability_array[$pa->code]=$pa->name;
            }
            $arr['plotAvailability']=$plotAvailability_array;
            $arr['street']=$street_array;
            $arr['plotInventory'] = PlotInventory::all();
            return view('Company.Plots.Inventories.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['plotShape']=PlotShape::all();
        $arr['plotSize']=PlotSize::all();
        $arr['PlotShape']=PlotShape::all();
        $arr['street']=Street::all();
        $arr['plotCategory']=PlotCategory::all();
        $arr['plotType']=PlotType::all();
        $arr['plotStatus']=PlotStatus::all();
        $arr['plotAvailability']=PlotAvailability::all();
        $arr['plotInhensiveFeature']=PlotInhensiveFeature::all();
        return view('Company.Plots.Inventories.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PlotInventory $plotInventory)
    {
        $plotInventory->name=$request->name;
        $plotInventory->code=$request->code;
        $plotInventory->description=$request->description;
        $plotInventory->area=$request->area;
        $plotInventory->shape_code=$request->shape;
        $plotInventory->street_code=$request->street;
        $plotInventory->plotcategory_code=$request->category;
        $plotInventory->plottype_code=$request->type;
        $plotInventory->plotstatus_code=$request->status;
        $plotInventory->plotsize_code=$request->size;
        if ($request->input('inhensiveFeature') !== Null){
            $plotInventory->inhensivefeature_code = implode(',', $request->input('inhensiveFeature'));
        }else{
            $plotInventory->inhensivefeature_code ='';
        }
        $plotInventory->plotavailability_code=$request->availability;

        $plotSize=PlotSize::where('code',$request->size)
            ->get();

        $plotPrice=new PlotPrice();
        $plotPrice->name=$request->name.' price';
        $plotPrice->code='p'.$request->code;
        $plotPrice->plot_code=$request->code;
        $plotPrice->installment_price=($plotSize[0]->installment_price/225)*$request->area;
        $plotPrice->cash_price=($plotSize[0]->cash_price/225)*$request->area;
        $plotPrice->description='this is for'.$request->name;

        $plotInventory->save();
        $plotPrice->save();
        return redirect()->route('plotinventories.index');

    }

    public function restore($id){
        $plotInventory=PlotInventory::withTrashed()->where('id', $id)
            ->first();
        $plotPrice=PlotPrice::withTrashed()->where('plot_code',$plotInventory->code)
            ->first();
        $plotDimension=PlotDimension::withTrashed()->where('plot_code',$plotInventory->code)->get();
        $plotInventory->restore();
        $plotPrice->restore();
        foreach ($plotDimension as $pd){
            $pd->restore();
        }
        return redirect()->route('plotinventories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlotInventory  $plotInventory
     * @return \Illuminate\Http\Response
     */
    public function show(PlotInventory $plotInventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlotInventory  $plotInventory
     * @return \Illuminate\Http\Response
     */
    public function edit(PlotInventory $plotInventory)
    {
        $arr['plotShape']=PlotShape::all();
        $arr['plotSize']=PlotSize::all();
        $arr['PlotShape']=PlotShape::all();
        $arr['street']=Street::all();
        $arr['plotCategory']=PlotCategory::all();
        $arr['plotType']=PlotType::all();
        $arr['plotStatus']=PlotStatus::all();
        $arr['plotAvailability']=PlotAvailability::all();
        $arr['plotInhensiveFeature']=PlotInhensiveFeature::all();
        $arr['plotInventory']=$plotInventory;
        $arr['temp']=explode(',',$plotInventory->inhensivefeature_code);
        return view('Company.Plots.Inventories.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlotInventory  $plotInventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlotInventory $plotInventory)
    {
        $plotInventory->name=$request->name;
        $plotInventory->code=$request->code;
        $plotInventory->description=$request->description;
        $plotInventory->area=$request->area;
        $plotInventory->shape_code=$request->shape;
        $plotInventory->street_code=$request->street;
        $plotInventory->plotcategory_code=$request->category;
        $plotInventory->plottype_code=$request->type;
        $plotInventory->plotstatus_code=$request->status;
        $plotInventory->plotsize_code=$request->size;
        if ($request->input('inhensiveFeature') !== Null){
            $plotInventory->inhensivefeature_code = implode(',', $request->input('inhensiveFeature'));
        }else{
            $plotInventory->inhensivefeature_code ='';
        }
        $plotInventory->plotavailability_code=$request->availability;
        $plotInventory->updated_at = date('Y-m-d H:i:s');

        $plotPrice=PlotPrice::where('plot_code',$request->code)->get();
        $plotSize=PlotSize::where('code',$request->size)
            ->get();

        $plotPrice[0]->name=$request->name.' price';
        $plotPrice[0]->code='p'.$request->code;
        $plotPrice[0]->plot_code=$request->code;
        $plotPrice[0]->installment_price=($plotSize[0]->installment_price/225)*$request->area;
        $plotPrice[0]->cash_price=($plotSize[0]->cash_price/225)*$request->area;
        $plotPrice[0]->description='this is for'.$request->name;
        $plotPrice[0]->updated_at = date('Y-m-d H:i:s');
        $plotInventory->save();
        return redirect()->route('plotinventories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlotInventory  $plotInventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlotInventory $plotInventory)
    {
        $plotPrice=PlotPrice::where('plot_code',$plotInventory->code)->first();
        $plotDimension=PlotDimension::where('plot_code',$plotInventory->code)->get();
        $plotInventory->delete();
        $plotPrice->delete();
        foreach ($plotDimension as $pd){
            $pd->delete();
        }
        return redirect()->route('plotinventories.index');

    }
}
