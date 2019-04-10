<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
            DB::table('permissions')->insert([
                  [
                        'name'      => 'Navegar Usuarios',
                        'slug'      => 'users.index',
                        'description'=>'Navegar todos los usuarios',
                        'created_at'   =>date('Y-m-d H:i:s'),
                        'updated_at'   =>date('Y-m-d H:i:s'),
                  ],
                  [
                        'name'      => 'Ver Usuario',
                        'slug'      => 'users.show',
                        'description'=>'Ver detalles del Usuario',
                        'created_at'   =>date('Y-m-d H:i:s'),
                        'updated_at'   =>date('Y-m-d H:i:s'),
                  ],
                  [
                        'name'      => 'Crear Usuario',
                        'slug'      => 'users.create',
                        'description'=>'Crear Usuario',
                        'created_at'   =>date('Y-m-d H:i:s'),
                        'updated_at'   =>date('Y-m-d H:i:s'),
                  ],
                  [
                        'name'      => 'Editar Usuario',
                        'slug'      => 'users.edit',
                        'description'=>'Editar Usuario',
                        'created_at'   =>date('Y-m-d H:i:s'),
                        'updated_at'   =>date('Y-m-d H:i:s'),
                  ],
                  [
                        'name'      => 'Eliminar Usuario',
                        'slug'      => 'users.destroy',
                        'description'=>'Eliminar Usuario',
                        'created_at'   =>date('Y-m-d H:i:s'),
                        'updated_at'   =>date('Y-m-d H:i:s'),
                  ],
                  [
                        'name'      => 'Navegar Roles',
                        'slug'      => 'roles.index',
                        'description'=>'Navegar todos los roles',
                        'created_at'   =>date('Y-m-d H:i:s'),
                        'updated_at'   =>date('Y-m-d H:i:s'),
                  ],
                  [
                        'name'      => 'Ver Roles',
                        'slug'      => 'roles.show',
                        'description'=>'Ver detalles del rol',
                        'created_at'   =>date('Y-m-d H:i:s'),
                        'updated_at'   =>date('Y-m-d H:i:s'),
                  ],
                  [
                        'name'      => 'Crear Roles',
                        'slug'      => 'roles.create',
                        'description'=>'Crear Rol',
                        'created_at'   =>date('Y-m-d H:i:s'),
                        'updated_at'   =>date('Y-m-d H:i:s'),
                  ],
                  [
                        'name'      => 'Editar Roles',
                        'slug'      => 'roles.edit',
                        'description'=>'Editar Rol',
                        'created_at'   =>date('Y-m-d H:i:s'),
                        'updated_at'   =>date('Y-m-d H:i:s'),
                  ],
                  [
                        'name'      => 'Eliminar Roles',
                        'slug'      => 'roles.destroy',
                        'description'=>'Eliminar Rol',
                        'created_at'   =>date('Y-m-d H:i:s'),
                        'updated_at'   =>date('Y-m-d H:i:s'),
                  ],
                  [
                        'name'      => 'Navegar Perfiles',
                        'slug'      => 'profile.index',
                        'description'=>'Navegar todos los Perfiles',
                        'created_at'   =>date('Y-m-d H:i:s'),
                        'updated_at'   =>date('Y-m-d H:i:s'),
                  ],
                  [
                        'name'      => 'Ver Perfil',
                        'slug'      => 'profile.show',
                        'description'=>'Ver detalles del Perfil',
                        'created_at'   =>date('Y-m-d H:i:s'),
                        'updated_at'   =>date('Y-m-d H:i:s'),
                  ],
                  [
                        'name'      => 'Crear Perfiles',
                        'slug'      => 'profile.create',
                        'description'=>'Crear Perfil',
                        'created_at'   =>date('Y-m-d H:i:s'),
                        'updated_at'   =>date('Y-m-d H:i:s'),
                  ],
                  [
                        'name'      => 'Editar Perfiles',
                        'slug'      => 'profile.edit',
                        'description'=>'Editar Perfil',
                        'created_at'   =>date('Y-m-d H:i:s'),
                        'updated_at'   =>date('Y-m-d H:i:s'),
                  ],
                  [
                        'name'      => 'Eliminar Perfil',
                        'slug'      => 'profile.destroy',
                        'description'=>'Eliminar Perfil',
                        'created_at'   =>date('Y-m-d H:i:s'),
                        'updated_at'   =>date('Y-m-d H:i:s'),
                  ],
            ]);
      }
}
