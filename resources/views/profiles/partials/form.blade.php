<div class="row">
	<div class="col-md-4 text-center">
		@if($profile->avatar)
			<img src="{{ asset($profile->avatar) }}" width="100" class="img-circle circular" alt="Imagen de Perfil"/>
		@else
		<img src="{{ asset('img/avatar-default.png') }}" class="img-circle" alt="Imagen de Perfil"/>
		@endif
		<hr />
		@if(isset($profile))
	    	<input type="file" class="form-control" name="files[]" id="profile-img" multiple />
	    @endif
	  <hr />
	</div>

	<div class="col-md-8">
		@if('action' == 'create')
		<div class="form-group">
			{!! Form::label('user_id', 'Usuario') !!}
			{!! Form::select('user_id', $users, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',  'id' => 'select_users', 'data-live-search' => 'true', 'data-max-options' => '1']  )  !!}
		</div>
		@endif
		<div class="form-group">
			{{ Form::label('apellido', 'Apellido') }}
			{{ Form::text('apellido', null, ['class' => 'form-control', 'id' => 'apellido', 'required']) }}
		</div>
		<div class="form-group">
			{{ Form::label('nombre', 'Nombre') }}
			{{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre', 'required']) }}
		</div>
		<div class="form-group">
			{{ Form::label('telefono', 'Teléfono') }}
			{{ Form::text('telefono', null, ['class' => 'form-control', 'id'=>'telefono']) }}
		</div>

		<div class="form-group">
			{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary pull-right']) }}
		</div>
	</div>
</div>
<hr>
