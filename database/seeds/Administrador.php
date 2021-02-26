<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Modelos\Role;
use App\Modelos\Permission;

class Administrador extends Seeder
{
   
    public function run()
    {   
        DB::statement("SET foreign_key_checks=0");
        DB::table('roles')->truncate();
        DB::table('role_user')->truncate();
        DB::statement("SET foreign_key_checks=1");


        //semilla para el usuario administrador
        DB::table('users')->insert([
            'name'=>'Juan Gutierrez',
            'password'=>Hash::make('admin'),
            'email'=>'administrador@gmail.com',
            'status'=>'ACTIVO',
            'email_verified_at'=>Carbon::now(),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

            
        ]);

        DB::table('users')->insert([
            'name'=>'Sebastian Piñeros',
            'password'=>Hash::make('12345'),
            'email'=>'sebastianpiñeros@gmail.com',
            'status'=>'ACTIVO',
            'email_verified_at'=>Carbon::now(),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);


        $roladmin= Role::create([
            'rolname'=>'Administrador',
            'slug'=>'/admin',
            'descripcion'=> 'El Administrador es el encargado de manejar y controlar la información dentro del sistema.',            
            'full-accesses'=>'yes',

        ]);
        
        $roluser= Role::create([
            'rolname'=>'Turista',
            'slug'=>'/turista',
            'descripcion'=> 'Usuario registrado',            
            'full-accesses'=>'no',

        ]);
     
        DB::table('role_user')->insert([
            'role_id'=> 1,
            'user_id'=>1,
        ]);

        DB::table('role_user')->insert([
            'role_id'=> 2,
            'user_id'=>2,
        ]);
       
       

            $permissions_all = [];
            $permissions_turista = [];

        $permission = Permission::create([
            'name'=>'Listar roles',
            'slug'=>'role.index',
            'description'=> 'El Administrador puede listar los roles',


        ]);
            $permission_all[] = $permission->id;
                
        $permission = Permission::create([
            'name' => 'Ver role',
            'slug' => 'role.show',
            'description' => 'El usuario puede ver el rol',
        ]);

        $permission_all[] = $permission->id;
                
        $permission = Permission::create([
            'name' => 'Crear rol role',
            'slug' => 'role.create',
            'description' => 'El usuario puede crear un rol',
        ]);

        $permission_all[] = $permission->id;
                
        $permission = Permission::create([
            'name' => 'Editar role',
            'slug' => 'role.edit',
            'description' => 'El usuario puede editar un rol',
        ]);

        $permission_all[] = $permission->id;
                
        $permission = Permission::create([
            'name' => 'Eliminar role',
            'slug' => 'role.destroy',
            'description' => 'El usuario puede eliminar un rol',
        ]);
        $permission_all[] = $permission->id;

        //permission user
        $permission = Permission::create([
            'name' => 'Listar usuarios',
            'slug' => 'user.index',
            'description' => 'Puede listar los usuarios registrados',
        ]);
        
        $permission_all[] = $permission->id;
        $permissions_turista[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Ver usuario',
            'slug' => 'user.show',
            'description' => 'Puede ver información de los usuarios registrados',
        ]);        
        
        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Editar usuario',
            'slug' => 'user.edit',
            'description' => 'Puede editar los usuarios registrados',
        ]);
        
        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Eliminar usuario',
            'slug' => 'user.destroy',
            'description' => 'Puede eliminar los usuarios registrados',
        ]);
        
        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Ver mi usuario',
            'slug' => 'userown.show',
            'description' => 'El usuario vera solamente su información',
        ]);
        
        $permission_all[] = $permission->id; 
        
        $permission = Permission::create([
            'name' => 'Editar mi usuario',
            'slug' => 'editown.show',
            'description' => 'El usuario solamente podra editar su información',
        ]);

        $permission_all[] = $permission->id;
    
        $roladmin->permission()->sync( $permission_all);
        

    }
}
