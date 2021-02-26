<?php

namespace App\Http\Controllers;
use App\Modelos\Role;
use App\Modelos\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
   
 public function index()
 {
    $this->authorize('haveaccess','role.index');
     $roles =  Role::orderBy('id','asc')->paginate(2);
    
     return view('roles_permisos.index',compact('roles'));
 }

 /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
 public function create()
 {          
         $this->authorize('haveaccess','role.create');
         $permissions = Permission::all();

         return view('roles_permisos.createrole',compact('permissions'));
 }


 public function store(Request $request)
 {
        $this->authorize('haveaccess','role.create');
         $request->validate([
         'rolname'       => 'required|max:50|unique:roles,rolname',
         'slug'          => 'required|max:50|unique:roles,slug',
         'full-accesses' => 'required|in:yes,no'
         
     ]);
     if($request->get('full-accesses')== 'yes')
     {       
         
         $role = Role::create($request->all());
         $permi= Permission::all()->pluck('id');
         $role->permission()->sync($permi);
         
     
         return redirect()->route('role.index')
         ->with('status_success','Operación con éxito'); 
     }else 
     {
         $role = Role::create($request->all());
         $role->permission()->sync($request->get('permission'));
         return redirect()->route('role.index')
         ->with('status_success','Operación con éxito'); 
     }
     
     
 }


 public function show(Role $role)
 {  
    $this->authorize('haveaccess','role.show'); 
    $permissions = Permission::all();
    foreach($role->permission as $permiss) {
        $permission_role[]=$permiss->id; 
    }
    return view('roles_permisos.view',compact('role','permissions','permission_role'));
 }

 
 public function edit(Role $role)
 {      
    $this->authorize('haveaccess','role.edit');
        $permissions = Permission::all();
        foreach($role->permission as $permiss) {
            $permission_role[]=$permiss->id; 
        }
        return view('roles_permisos.editrole',compact('role','permissions','permission_role'));
 }


 public function update(Request $request, Role $role)
 {  
    $this->authorize('haveaccess','role.edit');
    
   
    $request->validate([
        'rolname'          => 'required|max:50|unique:roles,rolname,'.$role->id,
        'full-accesses'   => 'required|in:yes,no'
    ]);

    $role->update($request->all());
        
            $role->permission()->sync($request->get('permission'));
        
        return redirect()->route('role.index')
            ->with('status_success','Rol actualizado !'); 
    
 }

 public function destroy(Role $role)
 {
    $this->authorize('haveaccess','role.destroy');
    $role->delete();

    return redirect()->route('role.index')
        ->with('status_success','Rol removido completamente !!'); 
 }
}















