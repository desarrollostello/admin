<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Image;

class ProfileController extends Controller
{
      public function index()
      {
            $profiles = Profile::paginate();
            return view('profiles.index', compact('profiles'));
      }
            /**
               * Show the form for creating a new resource.
               *
               * @return \Illuminate\Http\Response
               */
      public function create()
      {
            $users = \App\User::all()->pluck('name', 'id');

            return view('profiles.create', [
                  'users'     => $users,
                  'action'    => 'create'
            ]);
      }


      public function store(ProfileRequest $profileRequest)
      {

            $data = $profileRequest->all();
            $creada = false;
            //dd($data);
            if (isset($data['file']))
            {
                  $allowedfileExtension=['jpeg','JPEG', 'jpg','png','JPG','PNG'];
                  $files = $data['avatar'];
                  foreach($files as $file){
                        $filename = $file->getClientOriginalName();
                        $extension = $file->getClientOriginalExtension();
                        $check=in_array($extension,$allowedfileExtension);

                        if($check)
                        {
                              $destinationPath = 'upload/profile/';
                              //$new_file = Image::make($file)->resize(300,300);
                              $img = Image::make($file->getRealPath());

                              $img->resize(100, 100, function ($constraint) {
                                    $constraint->aspectRatio();
                              })->save($destinationPath.$filename);
                              //$new_file->move($destinationPath, $filename);
                              $data['user_id'] = Auth::user()->id;
                              $data['avatar'] = $destinationPath . $filename;
                              $creada = Profile::create($data);
                        }
                  }
                  if ($creada)
                  {
                        return redirect()->route('profile.index')->with('success', 'Perfil guardado satisfactoriamente');
                  }else{
                        return redirect()->route('profile.index')->with('error', 'Ocurrió un error al guardar.');
                  }
            }else{
                  $creada = Profile::create($data);
                  if ($creada)
                  {
                        return redirect()->route('profile.index')->with('success', 'Perfil guardado satisfactoriamente');
                  }else{
                        return redirect()->route('profile.index')->with('error', 'Ocurrió un error al guardar.');
                  }
            }

      }


            /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
      public function show($id)
      {
            $profile = Profile::find($id);
            return view('profiles.show', compact('profile'));
      }

            /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
      public function edit($slug)
      {

            $profile = Profile::where('slug', $slug)->first();
        
            return view('profiles.edit', [
              'profile' => $profile,
              'action'  => 'edit'
            ]);
      }

            /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
      public function update(ProfileRequest $profileRequest, Profile $profile)
      {
            $data = $profileRequest->all();
            $actualizado = false;
            if($data['files'])
            {
                  $allowedfileExtension=['jpeg','JPEG','jpg','png','JPG','PNG'];
                  $files = $data['files'];
                  foreach($files as $file){
                        $filename = $file->getClientOriginalName();
                        $extension = $file->getClientOriginalExtension();
                        $check=in_array($extension,$allowedfileExtension);

                        if($check)
                        {
                              $destinationPath = 'upload/profile/';
                              //$new_file = Image::make($file)->resize(300,300);
                              $img = Image::make($file->getRealPath());

                              $img->resize(200, 200, function ($constraint) {
                                    $constraint->aspectRatio();
                              })->save($destinationPath.$filename);
                              $profile->nombre = $data['nombre'];
                              $profile->apellido = $data['apellido'];
                              $profile->telefono = $data['telefono'];
                              $data['user_id'] = Auth::user()->id;
                              $data['avatar'] = $destinationPath . $filename;
                              $profile->user_id = $data['user_id'];
                              $profile->avatar = $data['avatar'];
                              $updated = $profile->save();
                        }
                  }
                  if ($updated)
                  {
                        return redirect()->route('/home')->with('success', 'Perfil Actualizado satisfactoriamente');
                  }else{
                        return redirect()->route('profile.index')->with('error', 'Ocurrió un error al guardar.');
                  }
            }else{
                  $actualizado = $profile->fill($profileRequest->all())->update();
                  if ($actualizado){
                    Session::flash('message-success', 'Perfil guardado satisfactoriamente.');
                    return redirect()->route('profile.index');
                  }else{
                    Session::flash('message-warnning', 'Ocurrió un error al guardar.');
                    return redirect()->route('profile.index');
                  }
            }

      }

      public function destroy(Profile $profile)
      {
            $profile->delete();
            return redirect()->route('profile.index')->with('info', 'Perfil Eliminado satisfactoriamente');
      }
}
