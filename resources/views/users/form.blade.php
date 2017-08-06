<div class="row">
	{!! Form::hidden('users_id', ($type == 'update' ? $user->id : null), ['class'=>'form-control','id'=>'users_id']) !!}
	{!! Form::hidden('info', 'setup', ['class'=>'form-control','id'=>'info']) !!}
    {!! Form::hidden('avatar_crop', null , ['class'=>'form-control','id'=>'avatar_crop']) !!}

	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 text-center">
		<span ><strong class="title" style="text-align: left;">{{ trans('adminlte_lang::message.avatar') }}</strong></span>
		<hr class="h-divider" >
		<img  src="{{ asset( ($type == 'update' ? $user->avatar : 'img/avatar.png') ) }}" class="img-thumbnail avatar-crop" alt="Cinque Terre" width="150" height="150">
		<div style="margin-top: 10px">
			<div class="col-xs-12 text-center">
				<div class="form-group" data-type='user' data-crop="true">
                    {!! Form::file('avatar', '', ['class' =>  'filestyle upload_image','data-input'=>'false', 'data-buttonText'=>'Select Image', 'data-placeholder'=> trans('adminlte_lang::message.browser_avatar') ]) !!}
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
					{!! Form::text('name', ($type == 'update' ? $user->name : null) , ['class'=>'form-control','onfocus'=>'onfocus' ,'required'=>'true']) !!}
				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('email',trans('adminlte_lang::message.email')) !!}
					{!! Form::email('email', ($type == 'update' ? $user->email : null) , ['class'=>'form-control','required'=>'true', ($type == 'update' ? ' ' : '')]) !!}
				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-group form-group-sm">
                    <?php if($type == 'update') $role =  $user->roles->first(); ?>
                    {!! Form::label('role',trans('adminlte_lang::message.role') ) !!}
					{!! Form::select('role', $roles, ($type == 'update' ? $role['id'] : null) , ['class'=>'form-control','placeholder'=>' (SELECT ROLE) ']) !!}
				</div>
			</div>


		@if($type == 'create')
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group form-group-sm">
						<label for="password">{{trans('adminlte_lang::message.password')}}</label>
						<input name="password" type="password" value="{{($type == 'update' ? $user->password : null)}}" id="password" class="form-control" required>
					</div>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group form-group-sm">
						<label for="password_confirmation">{{trans('adminlte_lang::message.retrypepassword')}}</label>
						<input name="password_confirmation" type="password" value="{{($type == 'update' ? $user->password_confirmation : null)}}" id="password_confirmation" class="form-control" required>
					</div>
				</div>
			@endif
		</div>

		@if($type == 'update')
		{{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
			<div class="row">
				<span ><strong class="title">{{ trans('adminlte_lang::message.branch_permission') }}</strong></span>
				<hr class="h-divider">

				{{--{{ $user->branch_permission }}--}}
				{{--@if(isset($user->company->branch))--}}
					{{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
					{{--{{  }}--}}
					@foreach($user->company->branch->where('institution_type_flag',2) as $branch)
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
							<div class="form-group form-group-sm">
								{!! Form::checkbox('branches[]',$branch->id, ($type == 'update' ? ( !!count( $user->branch_permission->where('branch_id',$branch->id)->first() ) ) : false)) !!}
								{!! Form::label('branches',$branch->name) !!}
							</div>
						</div>
						{{--{{ $branch->name }}--}--}}

					@endforeach

				{{--@endif--}}
				{{--</div>--}}

			</div>
		{{--</div>--}}
		@endif

	</div>


</div>