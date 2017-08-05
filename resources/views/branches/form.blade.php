<div class="row">
	{!! Form::hidden('branch_id', ($type == 'update' ? $branch->id : null), ['class'=>'form-control','id'=>'branch_id']) !!}
	{!! Form::hidden('item_id', ($type == 'update' ? $branch->id : null), ['class'=>'form-control','id'=>'item_id']) !!}
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
		<div class="row">
			<span ><strong class="title">{{ trans('adminlte_lang::message.personal_information') }}</strong></span>
			<hr class="h-divider" >

			<div class="col-md-3 col-sm-6 text-center">
				<img  src="{{ asset(($type == 'update' ? $branch->avatar : 'img/round-logo.jpg')) }}" class="img-thumbnail avatar-branch" alt="Cinque Terre" width="150" height="150">
				<div style="margin-top: 10px">
					<div class="col-xs-12 text-center">
						<div class="form-group" data-type='branch'>
							{!! Form::file('avatar', '', ['class' =>  'filestyle upload_image','data-input'=>'false', 'data-buttonText'=>'Select Image', 'accept'=>'image/*', 'data-placeholder'=> trans('adminlte_lang::message.browser_avatar') ]) !!}
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-9 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('name',trans('adminlte_lang::message.name')) !!}
					{!! Form::text('name', ($type == 'update' ? $branch->name : null) , ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="col-md-9 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('manager',trans('adminlte_lang::message.manager')) !!}
					{!! Form::text('manager', ($type == 'update' ? $branch->manager : null) , ['class'=>'form-control']) !!}
				</div>
			</div>

		</div>
		<div class="row">
			<span ><strong class="title">{{ trans('adminlte_lang::message.contact_information') }}</strong></span>
			<hr class="h-divider" >

			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('email',trans('adminlte_lang::message.email')) !!}
					{!! Form::email('email', ($type == 'update' ? $branch->email : null), ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('phone',trans('adminlte_lang::message.phone')) !!}
					{!! Form::tel('phone', ($type == 'update' ? $branch->phone : null) , ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('fax',trans('adminlte_lang::message.fax')) !!}
					{!! Form::text('fax', ($type == 'update' ? $branch->fax : null) , ['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('address',trans('adminlte_lang::message.address')) !!}
					{!! Form::textArea('address', ($type == 'update' ? $branch->address : null) , ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					{!! Form::label('city',trans('adminlte_lang::message.city') ) !!}
					{!! Form::text('city', ($type == 'update' ? $branch->city : null) , ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					{!! Form::label('island',trans('adminlte_lang::message.island') ) !!}
					{!! Form::select('island', $island, ($type == 'update' ? $branch->island_id : null) , ['class'=>'form-control','id'=>'island','placeholder'=>' (SELECT ISLAND) ']) !!}
				</div>
			</div>

		</div>


		<!-- WORK TIME -->
		@include('schedules.form',['schedules'=>(isset($schedules) ? $schedules : null),'last_schedules'=>(isset($last_schedules) ? $last_schedules : null),'weeks'=>$weeks,'flag'=>1])

	</div>

</div>
