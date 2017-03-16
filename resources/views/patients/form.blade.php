<div class="row">
	{!! Form::hidden('patient_id', ($type == 'update' ? $patient->id : null), ['class'=>'form-control','id'=>'patient_id']) !!}
	<span style="display: none;"> </span>
	<span ><strong class="title">{{ trans('adminlte_lang::message.personal_information') }}</strong></span>
    <hr class="h-divider" >
	<div class="col-lg-3 col-md-4 col-sm-6 text-center">
		<img  src="{{ url('/') }}/{{ ($type == 'update' ? $patient->avatar : 'img/avatar.png') }}" class="img-circle avatar-patient" alt="Cinque Terre" width="150" height="150">
		<div style="margin-top: 10px">
			<div class="col-xs-12 text-center">
				<div class="form-group" data-type='patient'>
					{!! Form::file('avatar', '', ['class' =>  'filestyle upload_image','data-input'=>'false', 'data-buttonText'=>'Select Image', 'accept'=>'image/*', 'data-placeholder'=> trans('adminlte_lang::message.browser_avatar') ]) !!}
				</div>
			</div>
		</div>
	</div>
    <div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('name','(*) '.trans('adminlte_lang::message.name')) !!}
			{!! Form::text('name', ($type == 'update' ? $patient->name : null) , ['class'=>'form-control','onfocus'=>'onfocus','required'=>'']) !!}
			<p class="has-error" style="display: none"></p>
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('genre','(*) '.trans('adminlte_lang::message.genre')) !!}
			{!! Form::select('genre', [ 'male'=>trans('adminlte_lang::message.male'),'female'=>trans('adminlte_lang::message.female')],($type == 'update' ? $patient->genre : null), ['class'=>'form-control', 'placeholder' => trans('adminlte_lang::message.genre_empty')]) !!}
			<p class="has-error" style="display: none"></p>
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('civil_state','(*) '.trans('adminlte_lang::message.civil_state') ) !!}
			{!! Form::select('civil_state', ['single'=>trans('adminlte_lang::message.single'),'married'=>trans('adminlte_lang::message.married'),'divorced'=>trans('adminlte_lang::message.divorced'),'widowed'=>trans('adminlte_lang::message.widowed')],($type == 'update' ? $patient->civil_state : null), ['class'=>'form-control', 'placeholder' => trans('adminlte_lang::message.civil_state_empty')]) !!}
			<p class="has-error" style="display: none"></p>
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('birthday', '(*) '.trans('adminlte_lang::message.birthday') ) !!}
			{!! Form::date('birthday', ($type == 'update' ? $patient->birthday : null) , ['class'=>'form-control']) !!}
			<p class="has-error" style="display: none"></p>
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('nationality',trans('adminlte_lang::message.nationality') ) !!}
			{!! Form::text('nationality', ($type == 'update' ? $patient->nationality : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('bi', trans('adminlte_lang::message.bi') ) !!}
			{!! Form::number('bi', ($type == 'update' ? $patient->bi : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('nif',trans('adminlte_lang::message.nif') ) !!}
			{!! Form::number('nif', ($type == 'update' ? $patient->nif : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('parents',trans('adminlte_lang::message.parents') ) !!}
			{!! Form::text('parents', ($type == 'update' ? $patient->parents : null) , ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="row">
	<span ><strong class="title">{{ trans('adminlte_lang::message.contact_information') }}</strong></span>
	<hr class="h-divider" >

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('address','(*) '.trans('adminlte_lang::message.address') ) !!}
			{!! Form::text('address', ($type == 'update' ? $patient->address : null) , ['class'=>'form-control']) !!}
			<p class="has-error" style="display: none"></p>
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('city','(*) '.trans('adminlte_lang::message.city') ) !!}
			{!! Form::text('city', ($type == 'update' ? $patient->city : null) , ['class'=>'form-control']) !!}
			<p class="has-error" style="display: none"></p>
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('island_id','(*) '.trans('adminlte_lang::message.island') ) !!}
			{!! Form::select('island_id', $island, ($type == 'update' ? $patient->island_id : null) , ['class'=>'form-control','id'=>'island_id','placeholder' => ' (SELECT ISLAND) ']) !!}
			<p class="has-error" style="display: none"></p>
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('email',trans('adminlte_lang::message.email') ) !!}
			{!! Form::email('email', ($type == 'update' ? $patient->email : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('mobile',trans('adminlte_lang::message.mobile') ) !!}
			{!! Form::text('mobile', ($type == 'update' ? $patient->mobile : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('phone',trans('adminlte_lang::message.phone') ) !!}
			{!! Form::text('phone', ($type == 'update' ? $patient->phone : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('zip_code',trans('adminlte_lang::message.zip_code') ) !!}
			{!! Form::number('zip_code', ($type == 'update' ? $patient->zip_code : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('website',trans('adminlte_lang::message.website') ) !!}
			{!! Form::text('website', ($type == 'update' ? $patient->website : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('facebook',trans('adminlte_lang::message.facebook') ) !!}
			{!! Form::text('facebook', ($type == 'update' ? $patient->facebook : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('has_secure',trans('adminlte_lang::message.has_secure') ) !!}
			{!! Form::select('has_secure',[0 =>trans('adminlte_lang::message.not'), 1 =>trans('adminlte_lang::message.yes') ], ($type == 'update' ? $patient->has_secure : null) , ['class'=>'form-control','id'=>'has_secure']) !!}
		</div>
	</div>

</div>


<div class="row">
	<span ><strong class="title">{{ trans('adminlte_lang::message.work_information') }}</strong></span>
	<hr class="h-divider" >
	<div class="col-lg-4 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('profession',trans('adminlte_lang::message.profession') ) !!}
			{!! Form::text('profession', ($type == 'update' ? $patient->profession : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('work_phone',trans('adminlte_lang::message.work_phone') ) !!}
			{!! Form::text('work_phone', ($type == 'update' ? $patient->work_phone : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('work_address',trans('adminlte_lang::message.work_address') ) !!}
			{!! Form::text('work_address', ($type == 'update' ? $patient->work_location : null) , ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

@include('secure_card.form')