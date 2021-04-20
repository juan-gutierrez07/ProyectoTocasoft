<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Modelos\Role;
use DB;
use Carbon\Carbon;
class UserController extends Controller
{
   
    public function index()
    {
         $this->authorize('haveaccess','user.index');
        $user =  User::with('roles')->orderBy('id','asc')->paginate(10);
        return view('users.index',compact('user'));
    }

    
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( User $user)
    {   
        $this->authorize('view', [$user, ['user.show','userown.show'] ]);
        $roles= Role::orderBy('rolname')->get();

        //return $roles;

        return view('users.view', compact('roles', 'user'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', [$user, ['user.edit','userown.edit'] ]);
        $roles= Role::orderBy('rolname')->get();

        //return $roles;

        return view('users.edituser', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $request->validate([
            'name'          => 'required|max:50|unique:users,name,'.$user->id,
            'email'         => 'required|max:50|unique:users,email,'.$user->id            
        ]);
        
        //dd($request->all());

        $user->update($request->all());

        $user->roles()->sync($request->get('roles'));
        
        return redirect()->route('user.index')
            ->with('status_success','Usuario Actualizado !!'); 
    }

 
    public function destroy(User $user)
    {
        $this->authorize('haveaccess','user.destroy');
        $user->delete();

        return redirect()->route('user.index')
            ->with('status_success','Usuario eliminado !!');
    }
}
