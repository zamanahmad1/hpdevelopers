<?php

namespace App\Http\Controllers\Plots;

use App\Http\Controllers\Controller;
use App\Models\PlotInventory;
use App\Models\PlotPrice;
use App\Models\PlotSize;
use Illuminate\Http\Request;

class PlotPriceController extends Controller
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
        if (auth()->user()->hasRole('Administrator')) {
            $plot = PlotInventory::withTrashed()->get();
            $plotCodeIndex = array();
            foreach ($plot as $p) {
                $plotCodeIndex[$p->code] = $p->name;
            }
            $arr['plotInventory']=$plotCodeIndex;
            $arr['plotPrice']=PlotPrice::withTrashed()->get();
            return view('Company.Plots.Prices.view')->with($arr);
        }else{
            $plot = PlotInventory::all();
            $plotCodeIndex = array();
            foreach ($plot as $p) {
                $plotCodeIndex[$p->code] = $p->name;
            }
            $arr['plotInventory']=$plotCodeIndex;
            $arr['plotPrice']=PlotPrice::all();
            return view('Company.Plots.Prices.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlotPrice  $plotPrice
     * @return \Illuminate\Http\Response
     */
    public function show(PlotPrice $plotPrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlotPrice  $plotPrice
     * @return \Illuminate\Http\Response
     */
    public function edit(PlotPrice $plotPrice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlotPrice  $plotPrice
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $plotPrice=PlotPrice::all();
        foreach($plotPrice as $pp){
            $plotInventory=PlotInventory::where('code',$pp->plot_code)
                ->get();
            $plotSize=PlotSize::where('code',$plotInventory[0]->plotsize_code)
                ->get();
            if ($plotInventory[0]->plotavailability_code=='available'){
                $pp->installment_price=($plotSize[0]->installment_price/225)*$plotInventory[0]->area;
                $pp->cash_price=($plotSize[0]->cash_price/225)*$plotInventory[0]->area;
                $pp->updated_at=date('Y-m-d H:i:s');
                $pp->save();
            }
        }
        return redirect()->route('plotprices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlotPrice  $plotPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlotPrice $plotPrice)
    {
        //
    }
}
