<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\MemberProfile;
use Illuminate\Http\Request;

class MemberProfileController extends Controller
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


            $arr['memberProfile']=MemberProfile::withTrashed()->get();
            return view('Company.Members.view')->with($arr);
        }else {

            $arr['memberProfile'] = MemberProfile::all();
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
     * @param  \App\Models\MemberProfile  $memberProfile
     * @return \Illuminate\Http\Response
     */
    public function show(MemberProfile $memberProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberProfile  $memberProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberProfile $memberProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberProfile  $memberProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberProfile $memberProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberProfile  $memberProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberProfile $memberProfile)
    {
        //
    }
}
