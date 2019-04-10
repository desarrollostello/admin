<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run()
      {
            DB::table('roles')->insert([
                [
                     'name'         => 'Administrador',
                     'description'  => 'Rol Administrador del Sistema',
                     'special'      => 'all-access',
                     'slug'         => 'rol-administrador',
                     'created_at'   =>date('Y-m-d H:i:s'),
                     'updated_at'   =>date('Y-m-d H:i:s'),
               ],
            ]);

      }
}
