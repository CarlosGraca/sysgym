<div class="row">
	{!! Form::hidden('users_id', ($type == 'update' ? $users->id : null), ['class'=>'form-control','id'=>'users_id']) !!}
	{!! Form::hidden('info', 'setup', ['class'=>'form-control','id'=>'info']) !!}

	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 text-center">
		<span ><strong class="title" style="text-align: left;">{{ trans('adminlte_lang::message.user_image') }}</strong></span>
		<hr class="h-divider" >
		<img  src="{{ url('img/avatar.png') }}" class="img-circle avatar-user" alt="Cinque Terre" width="150" height="150">
		<div style="margin-top: 10px">
			<div class="col-xs-12 text-center">
				<div class="form-group" data-type='user'>
					{!! Form::file('avatar', '', ['class' =>  'filestyle upload_image','data-input'=>'false', 'data-buttonText'=>'Select Image', 'accept'=>'image/*', 'data-placeholder'=> trans('adminlte_lang::message.browser_avatar') ]) !!}
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-9 col-md-6 col-sm-6 col-xs-12">
		<div class="row">
			<span ><strong class="title">{{ trans('adminlte_lang::message.account_information') }}</strong></span>
			<hr class="h-divider" >
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('name',trans('adminlte_lang::message.name')) !!}
					{!! Form::text('name', ($type == 'update' ? $users->name : null) , ['class'=>'form-control','onfocus'=>'onfocus' ,'required'=>'true']) !!}
				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('email',trans('adminlte_lang::message.email')) !!}
					{!! Form::email('email', ($type == 'update' ? $users->email : null) , ['class'=>'form-control','required'=>'true']) !!}
				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-group form-group-sm">
					<label for="password">{{trans('adminlte_lang::message.password')}}</label>
					<input name="password" type="password" value="{{($type == 'update' ? $users->password : null)}}" id="password" class="form-control" required>
				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-group form-group-sm">
					<label for="password_confirmation">{{trans('adminlte_lang::message.retrypepassword')}}</label>
					<input name="password_confirmation" type="password" value="{{($type == 'update' ? $users->password_confirmation : null)}}" id="password_confirmation" class="form-control" required>
				</div>
			</div>
		</div>
	</div>
</div>