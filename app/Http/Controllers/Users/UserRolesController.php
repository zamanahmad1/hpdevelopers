<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserRolesController extends Controller
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
        $arr['user'] = User::all();
        $arr['role'] = Role::all();
        return view('Users.UserRoles.view')->with($arr);
        /* foreach ( $arr['role'] as $r)
         {
             echo "users ";
             echo $r->name;
             echo " ";
         }
         foreach ($arr['user'] as $u)
         {
             echo "<br>";
             echo $u->name;
             echo " ";
             foreach ($arr['role'] as $r){
                 if ($u->hasRole($r->name)){
                     echo "true";
                 }
                 echo "false";
                 echo " ";
             }
         }*/
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $arr['user'] = $user;
        $arr['role'] = Role::all();
        return view('Users.UserRoles.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        if ($request->input('roles') !== Null) {
            $x = 0;
            $arr = array();
            foreach ($request->input('roles') as $checked) {
                $role = Role::findById($checked);
                $arr[$x] = $role->name;
                $x++;
            }
            $user->syncRoles($arr);
        } else {
            $role = Role::all();
            foreach ($role as $r) {
                $user->removeRole($r->name);
            }
        }
        return redirect()->route('userroles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
