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
        return view('Company.SAMS.InstallmentPlans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, InstallmentPlan $installmentPlan)
    {
        $installmentPlan->name=$request->name;
        $installmentPlan->code=$request->code;
        $installmentPlan->booking=$request->booking;
        $installmentPlan->allocation=$request->allocation;
        $installmentPlan->confirmation=$request->confirmation;
        $installmentPlan->months=$request->months;
        $installmentPlan->monthly_installment=$request->monthly_installment;
        $installmentPlan->quarterly_installment=$request->quarterly_installment;
        $installmentPlan->midyear_installment=$request->midyear_installment;
        $installmentPlan->yearly_installment=$request->yearly_installment;
        $installmentPlan->possession=$request->possession;
        $installmentPlan->total=$request->total;
        $installmentPlan->description=$request->description;
        $installmentPlan->save();
        return redirect()->route('installmentplans.index');
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

    public function restore($id){
        $installmentPlan=InstallmentPlan::withTrashed()->where('id',$id)
            ->first();
        $installmentPlan->restore();
        return redirect()->route('installmentplans.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InstallmentPlan  $installmentPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(InstallmentPlan $installmentPlan)
    {
        $arr['installmentPlan']=$installmentPlan;
        return view('Company.SAMS.InstallmentPlans.edit')->with($arr);
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
        $installmentPlan->name=$request->name;
        $installmentPlan->code=$request->code;
        $installmentPlan->booking=$request->booking;
        $installmentPlan->allocation=$request->allocation;
        $installmentPlan->confirmation=$request->confirmation;
        $installmentPlan->months=$request->months;
        $installmentPlan->monthly_installment=$request->monthly_installment;
        $installmentPlan->quarterly_installment=$request->quarterly_installment;
        $installmentPlan->midyear_installment=$request->midyear_installment;
        $installmentPlan->yearly_installment=$request->yearly_installment;
        $installmentPlan->possession=$request->possession;
        $installmentPlan->total=$request->total;
        $installmentPlan->description=$request->description;
        $installmentPlan->updated_at=date('Y-m-d H:i:s');
        $installmentPlan->save();
        return redirect()->route('installmentplans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InstallmentPlan  $installmentPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstallmentPlan $installmentPlan)
    {
        $installmentPlan->delete();
        return redirect()->route('installmentplans.index');
    }

    public function installmentPlanList(){
        $installmentPlan=InstallmentPlan::all();
        return response()->json([
            'installmentPlan' => $installmentPlan,
        ]);
    }

    public function installmentPlanDetail(){
        $code=$_POST['code'];
        $installmentPlan=InstallmentPlan::where('code',$code)
            ->get();
        return response()->json([
            'installmentPlan' => $installmentPlan
        ]);
    }
}
