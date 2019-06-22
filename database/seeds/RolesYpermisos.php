<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesYpermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //Proyectos
        Permission::create(['name' => 'create proyectos']);
        Permission::create(['name' => 'read proyectos']);
        Permission::create(['name' => 'update proyectos']);
        Permission::create(['name' => 'delete proyectos']);

        //Usuarios
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'read users']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        //Registros
        Permission::create(['name' => 'create registros']);
        Permission::create(['name' => 'read registros']);
        Permission::create(['name' => 'update registros']);
        Permission::create(['name' => 'delete registros']);


        //Roles y permisos
        //========Evaluador de proyectos===============
        $role = Role::create(['name' => 'evaluadorProyecto']);
        $role->givePermissionTo('read proyectos');
        $role->givePermissionTo('update proyectos');

        //========Moderador===============
        $role = Role::create(['name' => 'moderador']);
        $role->givePermissionTo('create user');
        $role->givePermissionTo('read users');
        $role->givePermissionTo('update user');
        $role->givePermissionTo('delete user');
        $role->givePermissionTo('create registros');
        $role->givePermissionTo('read registros');
        $role->givePermissionTo('update registros');
        $role->givePermissionTo('delete registros');

        //========Administradores===============
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
        

    }
}
