<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
      Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
      //Route::auth();
      //Auth::routes(['verify' => true]);
      //Auth::routes(['register' => false]);
      //->middleware('auth', 'role:admin');
      Route::get('/home', 'HomeController@index');
      Route::group(['prefix' => 'profile'], function () {
            Route::get('listado', 'ProfileController@index')->name('profile.index')->middleware('permission:profile.index');
            Route::get('nuevo', 'ProfileController@create')->name('profile.create')->middleware('permission:profile.create');
            Route::post('nuevo', 'ProfileController@store')->name('profile.store')->middleware('permission:profile.store');
            Route::get('editar/{id}', 'ProfileController@edit')->name('profile.edit')->middleware('permission:profile.edit');
            Route::get('ver/{id}', 'ProfileController@show')->name('profile.show')->middleware('permission:profile.show');
            Route::patch('editar/{profile}', 'ProfileController@update')->name('profile.update')->middleware('permission:profile.update');
            Route::get('eliminar/{id}', 'ProfileController@destroy')->name('profile.delete')->middleware('permission:profile.destroy');
            Route::get('restaurar', 'ProfileController@eliminated')->name('profile.eliminated');
            Route::get('restore/{id}', 'ProfileController@restore')->name('profile.restore');
      });

      Route::post('roles/store', 'RoleController@store')->name('roles.store')->middleware('auth', 'role:rol-administrador');
      Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('auth', 'role:rol-administrador');
      Route::get('roles/create', 'RoleController@create')->name('roles.create')->middleware('auth', 'role:rol-administrador');
      Route::put('roles/{role}', 'RoleController@update')->name('roles.update')->middleware('auth', 'role:rol-administrador');
      Route::get('roles/{role}', 'RoleController@show')->name('roles.show')->middleware('auth', 'role:rol-administrador');
      Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')->middleware('auth', 'role:rol-administrador');
      Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('auth', 'role:rol-administrador');

      // permisos
      Route::post('permisos/store', 'PermissionController@store')->name('permisos.store')->middleware('permission:permisos.create');
      Route::get('permisos', 'PermissionController@index')->name('permisos.index')->middleware('permission:permisos.index');
      Route::get('permisos/create', 'PermissionController@create')->name('permisos.create')->middleware('permission:permisos.create');
      Route::put('permisos/{permiso}', 'PermissionController@update')->name('permisos.update')->middleware('permission:permisos.edit');
      Route::get('permisos/{permiso}', 'PermissionController@show')->name('permisos.show')->middleware('permission:permisos.show');
      Route::delete('permisos/{permiso}', 'PermissionController@destroy')->name('permisos.destroy')->middleware('permission:permisos.destroy');
      Route::get('permisos/{permiso}', 'PermissionController@edit')->name('permisos.edit')->middleware('permission:permisos.edit');
      Route::patch('permisos/{permiso}', 'PermissionController@update')->name('permisos.update')->middleware('permission:permisos.update');


      //Users
	Route::get('users', 'UserController@index')->name('users.index')
		->middleware('permission:users.index');
	Route::put('users/{user}', 'UserController@update')->name('users.update')
		->middleware('permission:users.edit');
	Route::get('users/{user}', 'UserController@show')->name('users.show')
		->middleware('permission:users.show');
	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
		->middleware('permission:users.destroy');
	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
		->middleware('permission:users.edit');



      Route::get('/admin_permissions', function()
      {
            $role = \Caffeinated\Shinobi\Models\Role::find(1);
            dd($role->getPermissions());
      });

      Route::get('/assign_permissions', function()
      {
            $role = \Caffeinated\Shinobi\Models\Role::find(1);
            $role->assignPermission(3);
            $role->save();
      });

      Route::get('/revoke_permission', function()
      {
            $role = \Caffeinated\Shinobi\Models\Role::find(1);
            $role->revokePermission(3);
            $role->save();
      });

      Route::get('/revoke_all_permission', function()
      {
            $role = \Caffeinated\Shinobi\Models\Role::find(1);
            $role->revokeAllPermissions();
            $role->save();
      });



    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
