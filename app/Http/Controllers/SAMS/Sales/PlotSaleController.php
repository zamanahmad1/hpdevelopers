<?php

namespace App\Http\Controllers\SAMS\Sales;

use App\Http\Controllers\Controller;
use App\Models\PlotSale;
use Illuminate\Http\Request;

class PlotSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('');
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
     * @param  \App\Models\PlotSale  $plotSale
     * @return \Illuminate\Http\Response
     */
    public function show(PlotSale $plotSale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlotSale  $plotSale
     * @return \Illuminate\Http\Response
     */
    public function edit(PlotSale $plotSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlotSale  $plotSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlotSale $plotSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlotSale  $plotSale
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlotSale $plotSale)
    {
        //
    }
}
