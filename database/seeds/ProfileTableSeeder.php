<?php

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run()
      {
            DB::table('profile')->insert([
                  'user_id'     => 1,
                  'apellido'    => 'Tello',
                  'nombre'      => 'Mauro',
                  'telefono'    => '2920 538998',
                  'slug'        => 'mauro-tello-profile-users',
                  'created_at'=>date('Y-m-d H:i:s'),
                  'updated_at'=>date('Y-m-d H:i:s'),
            ]);
      }
}
