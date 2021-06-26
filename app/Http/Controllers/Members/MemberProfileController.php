<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\DealerShip;
use App\Models\MemberProfile;
use App\Models\MemberShip;
use App\Models\PlotAvailability;
use App\Models\Province;
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

    public function memberProfileDetails(){
        $code=$_POST['code'];
        $memberProfile=MemberProfile::where('code',$code)
            ->get();
        return response()->json([
            'memberProfile' => $memberProfile
        ]);
    }
//for Membership
    public function memberProfileList(){
        $society_code=$_POST['society_code'];
        $memberProfile=memberProfile::withTrashed()->get();
        $membership=memberShip::where('society_code',$society_code)
            ->get();
        $membership_array=array();
        foreach ($membership as $ms){
            $membership_array[$ms->memberprofile_code]=$ms;
        }
        $x=0;
        $memberProfile_array=array();
        foreach ($memberProfile as $mp){
            if (!array_key_exists( $mp->code ,$membership_array ) ){
                $memberProfile_array[$x]=$mp;
                $x++;
            }
        }
        return response()->json([
            'memberProfiles' => $memberProfile_array
        ]);
    }

    public function dealerProfileList(){
        $society_code=$_POST['society_code'];
        $memberProfile=memberProfile::withTrashed()->get();
        $membership=dealerShip::where('society_code',$society_code)
            ->get();
        $membership_array=array();
        foreach ($membership as $ms){
            $membership_array[$ms->memberprofile_code]=$ms;
        }
        $x=0;
        $memberProfile_array=array();
        foreach ($memberProfile as $mp){
            if (!array_key_exists( $mp->code ,$membership_array ) ){
                $memberProfile_array[$x]=$mp;
                $x++;
            }
        }
        return response()->json([
            'memberProfiles' => $memberProfile_array
        ]);
    }

    public function index()
    {
        if (auth()->user()->hasRole('Administrator')){
            $arr['memberProfile']=MemberProfile::withTrashed()->get();
            return view('Company.Members.view')->with($arr);
        }else {
            $arr['memberProfile'] = MemberProfile::all();
            return view('Company.Members.view')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['country']=Country::all();
        $arr['province']=Province::all();
        $arr['city']=City::all();
        return view('Company.Members.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, MemberProfile $memberProfile)
    {
        $memberProfile->name=$request->name;
        $memberProfile->code=$request->code;
        $memberProfile->cnic=$request->cnic;
        $memberProfile->dob=$request->dob;
        $memberProfile->email=$request->email;
        $memberProfile->father_name=$request->father_name;
        $memberProfile->address=$request->address;
        $memberProfile->cnic_issuance=$request->cnic_issuance;
        $memberProfile->cnic_expiry=$request->cnic_expiry;
        $memberProfile->mobile_no=$request->mobile_no;
        $memberProfile->resedential_no=$request->resedential_no;
        $memberProfile->notification_no=$request->notification_no;
        if($request->cnic_front->getClientOriginalName()){
            $ext =  $request->cnic_front->getClientOriginalExtension();
            $file = date('ymd')."cnic_front".rand(1,99999).'.'.$ext;
            $request->cnic_front->storeAs('public/memberprofile/'.$request->code,$file);
        }
        else
        {
            $file = '';
        }
        $memberProfile->cnic_front=$file;

        if($request->cnic_back->getClientOriginalName()){
            $ext =  $request->cnic_back->getClientOriginalExtension();
            $file = date('ymd')."cnic_back".rand(1,99999).'.'.$ext;
            $request->cnic_back->storeAs('public/memberprofile/'.$request->code,$file);
        }
        else
        {
            $file = '';
        }
        $memberProfile->cnic_back=$file;


        if($request->picture->getClientOriginalName()){
            $ext =  $request->picture->getClientOriginalExtension();
            $file = date('ymd')."picture".rand(1,99999).'.'.$ext;
            $request->picture->storeAs('public/memberprofile/'.$request->code,$file);
        }
        else
        {
            $file = '';
        }
        $memberProfile->picture=$file;
        $memberProfile->country_code=$request->country;
        $memberProfile->province_code=$request->province;
        $memberProfile->city_code=$request->city;
        $memberProfile->description=$request->description;
        $memberProfile->save();
        return redirect()->route('memberprofiles.index');
    }

    public function restore($id){
        $memberProfile=MemberProfile::withTrashed()->where('id', $id)
            ->first();
        $memberProfile->restore();
        return redirect()->route('memberprofiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberProfile  $memberProfile
     * @return \Illuminate\Http\Response
     */
    public function show(MemberProfile $memberProfile)
    {
        $arr['memberProfile']=$memberProfile;
        $arr['country']=Country::where('code',$memberProfile->country_code)->first();
        $arr['province']=Province::where('code',$memberProfile->province_code)->first();
        $arr['city']=City::where('code',$memberProfile->city_code)->first();
        return view('Company.Members.detail')->with($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberProfile  $memberProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberProfile $memberProfile)
    {
        $arr['country']=Country::all();
        $arr['province']=Province::all();
        $arr['city']=City::all();
        $arr['memberProfile']=$memberProfile;
        return view('Company.Members.edit')->with($arr);

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
        $file='';
        if(isset($request->cnic_front) && $request->cnic_front->getClientOriginalName()){
            $ext =  $request->cnic_front->getClientOriginalExtension();
            $file = date('ymd')."cnic_front".rand(1,99999).'.'.$ext;
            $request->cnic_front->storeAs('public/memberprofile/'.$request->code,$file);
        }
        if($file){
            $memberProfile->cnic_front=$file;
            $memberProfile->save();
            $file='';
        }
        if(isset($request->cnic_back) && $request->cnic_back->getClientOriginalName()){
            $ext =  $request->cnic_back->getClientOriginalExtension();
            $file = date('ymd')."cnic_back".rand(1,99999).'.'.$ext;
            $request->cnic_back->storeAs('public/memberprofile/'.$request->code,$file);
        }
        if($file){
            $memberProfile->cnic_back=$file;
            $memberProfile->save();
            $file='';
        }
        if(isset($request->picture) && $request->picture->getClientOriginalName()){
            $ext =  $request->picture->getClientOriginalExtension();
            $file = date('ymd')."picture".rand(1,99999).'.'.$ext;
            $request->picture->storeAs('public/memberprofile/'.$request->code,$file);
        }
        if($file){
            $memberProfile->picture=$file;
            $memberProfile->save();
            $file='';
        }

        $memberProfile->name=$request->name;
        $memberProfile->code=$request->code;
        $memberProfile->cnic=$request->cnic;
        $memberProfile->dob=$request->dob;
        $memberProfile->email=$request->email;
        $memberProfile->father_name=$request->father_name;
        $memberProfile->address=$request->address;
        $memberProfile->cnic_issuance=$request->cnic_issuance;
        $memberProfile->cnic_expiry=$request->cnic_expiry;
        $memberProfile->mobile_no=$request->mobile_no;
        $memberProfile->resedential_no=$request->resedential_no;
        $memberProfile->notification_no=$request->notification_no;
        $memberProfile->country_code=$request->country;
        $memberProfile->province_code=$request->province;
        $memberProfile->city_code=$request->city;
        $memberProfile->description=$request->description;
        $memberProfile->updated_at = date('Y-m-d H:i:s');
        $memberProfile->save();
        return redirect()->route('memberprofiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberProfile  $memberProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberProfile $memberProfile)
    {
        $memberProfile->delete();
        return redirect()->route('memberprofiles.index');
    }

    public function memberList(){
        $society_code=$_POST['society_code'];
        $memberProfile=MemberProfile::withTrashed()->get();
        $memberShip=MemberShip::where('society_code',$society_code)
            ->get();
        $memberShip_array=array();
        foreach ($memberShip as $ms){
            $memberShip_array[$ms->memberprofile_code]=$ms;
        }
        $x=0;
        $memberProfile_array=array();
        foreach ($memberProfile as $mp){
            if (array_key_exists( $mp->code ,$memberShip_array ) ){
                $memberProfile_array[$x]=$mp;
                $x++;
            }
        }
        return response()->json([
            'memberProfiles' => $memberProfile_array
        ]);
    }
}
