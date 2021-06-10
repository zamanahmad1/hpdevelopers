<?php

namespace App\Http\Controllers\SAMS\InstallmentPlans;

use App\Http\Controllers\Controller;
use App\Models\InstallmentPlan;
use Illuminate\Http\Request;

class InstallmentController extends Controller
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
            $arr['installmentPlan']=InstallmentPlan::withTrashed()->get();
            return view('Company.SAMS.InstallmentPlans.view')->with($arr);
        }else {
            $arr['installmentPlan'] = InstallmentPlan::all();
            return view('Company.SAMS.InstallmentPlans.view')->with($arr);

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
     * @param  \App\Models\InstallmentPlan  $installmentPlan
     * @return \Illuminate\Http\Response
     */
    public function show(InstallmentPlan $installmentPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InstallmentPlan  $installmentPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(InstallmentPlan $installmentPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InstallmentPlan  $installmentPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InstallmentPlan $installmentPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InstallmentPlan  $installmentPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstallmentPlan $installmentPlan)
    {
        //
    }
}
