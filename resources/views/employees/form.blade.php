<div class="row">
	{!! Form::hidden('patient_id', ($type == 'update' ? $employee->id : null), ['class'=>'form-control','id'=>'patient_id']) !!}
	<span ><strong class="title">{{ trans('adminlte_lang::message.personal_information') }}</strong></span>
    <hr class="h-divider" >
	<div class="col-lg-3 col-md-4 col-sm-6 text-center">
		<img  src="{{ url('/') }}/{{ ($type == 'update' ? $employee->avatar : 'img/avatar.png') }}" class="img-circle avatar-employee" alt="Cinque Terre" width="150" height="150">
		<div style="margin-top: 10px">
			<div class="col-xs-12 text-center">
				<div class="form-group" data-type='employee'>
					{!! Form::file('avatar', '', ['class' =>  'filestyle upload_image','data-input'=>'false', 'data-buttonText'=>'Select Image', 'accept'=>'image/*', 'data-placeholder'=> trans('adminlte_lang::message.browser_avatar') ]) !!}
				</div>
			</div>
		</div>
	</div>
    <div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('name',trans('adminlte_lang::message.name')) !!}
			{!! Form::text('name', ($type == 'update' ? $employee->name : null) , ['class'=>'form-control','onfocus'=>'onfocus']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('genre',trans('adminlte_lang::message.genre')) !!}
			{!! Form::select('genre', [ 'male'=>trans('adminlte_lang::message.male'),'female'=>trans('adminlte_lang::message.female')],($type == 'update' ? $employee->genre : null), ['class'=>'form-control', 'placeholder' => trans('adminlte_lang::message.genre_empty')]) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('civil_state',trans('adminlte_lang::message.civil_state') ) !!}
			{!! Form::select('civil_state', ['single'=>trans('adminlte_lang::message.single'),'married'=>trans('adminlte_lang::message.married'),'divorced'=>trans('adminlte_lang::message.divorced'),'widowed'=>trans('adminlte_lang::message.widowed')],($type == 'update' ? $employee->civil_state : null), ['class'=>'form-control', 'placeholder' => trans('adminlte_lang::message.civil_state_empty')]) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('birthday', trans('adminlte_lang::message.birthday') ) !!}
			{!! Form::date('birthday', ($type == 'update' ? $employee->birthday : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('nationality',trans('adminlte_lang::message.nationality') ) !!}
			{!! Form::text('nationality', ($type == 'update' ? $employee->nationality : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('bi', trans('adminlte_lang::message.bi') ) !!}
			{!! Form::number('bi', ($type == 'update' ? $employee->bi : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('nif',trans('adminlte_lang::message.nif') ) !!}
			{!! Form::number('nif', ($type == 'update' ? $employee->nif : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('parents',trans('adminlte_lang::message.parents') ) !!}
			{!! Form::text('parents', ($type == 'update' ? $employee->parents : null) , ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="row">
	<span ><strong class="title">{{ trans('adminlte_lang::message.contact_information') }}</strong></span>
	<hr class="h-divider" >

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('address',trans('adminlte_lang::message.address') ) !!}
			{!! Form::text('address', ($type == 'update' ? $employee->address : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('city',trans('adminlte_lang::message.city') ) !!}
			{!! Form::text('city', ($type == 'update' ? $employee->city : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('island_id',trans('adminlte_lang::message.island') ) !!}
			{!! Form::select('island_id', $island, ($type == 'update' ? $employee->island_id : null) , ['class'=>'form-control','id'=>'island','placeholder' => ' (SELECT ISLAND) ']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('email',trans('adminlte_lang::message.email') ) !!}
			{!! Form::email('email', ($type == 'update' ? $employee->email : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('mobile',trans('adminlte_lang::message.mobile') ) !!}
			{!! Form::text('mobile', ($type == 'update' ? $employee->mobile : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('phone',trans('adminlte_lang::message.phone') ) !!}
			{!! Form::text('phone', ($type == 'update' ? $employee->phone : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('zip_code',trans('adminlte_lang::message.zip_code') ) !!}
			{!! Form::number('zip_code', ($type == 'update' ? $employee->zip_code : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('website',trans('adminlte_lang::message.website') ) !!}
			{!! Form::text('website', ($type == 'update' ? $employee->website : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('facebook',trans('adminlte_lang::message.facebook') ) !!}
			{!! Form::text('facebook', ($type == 'update' ? $employee->facebook : null) , ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('has_secure',trans('adminlte_lang::message.has_secure') ) !!}
			{!! Form::select('has_secure',[0 =>trans('adminlte_lang::message.not'), 1 =>trans('adminlte_lang::message.yes') ], ($type == 'update' ? $employee->has_secure : null) , ['class'=>'form-control','id'=>'has_secure']) !!}
		</div>
	</div>

</div>


<div class="row">
	<span ><strong class="title">{{ trans('adminlte_lang::message.work_information') }}</strong></span>
	<hr class="h-divider" >
	<div class="col-lg-12 no-padding">
		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				{!! Form::label('category',trans('adminlte_lang::message.category') ) !!}
				{!! Form::select('category', $category, ($type == 'update' ? $employee->category_id : null) , ['class'=>'form-control','id'=>'category', 'placeholder' => ' (SELECT CATEGORY) ']) !!}
			</div>
		</div>

		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				{!! Form::label('salary',trans('adminlte_lang::message.salary') ) !!}
				{!! Form::number('salary', ($type == 'update' ? $employee->salary : null) , ['class'=>'form-control']) !!}
			</div>
		</div>

		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				{!! Form::label('branch',trans('adminlte_lang::message.branch') ) !!}
				{!! Form::select('branch', $branches, ($type == 'update' ? $employee->branch_id : null) , ['class'=>'form-control','id'=>'branch','placeholder' => ' (SELECT BRANCH) ']) !!}
			</div>
		</div>

		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				{!! Form::label('doctor_check',trans('adminlte_lang::message.doctor') ) !!}
				{!! Form::select('doctor_check',[0 =>trans('adminlte_lang::message.not'), 1 =>trans('adminlte_lang::message.yes') ], ($type == 'update' ? $employee->doctor : null) , ['class'=>'form-control','id'=>'doctor_check']) !!}
			</div>
		</div>
	</div>
	<div class="col-lg-12 no-padding">
		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				{!! Form::label('start_work', trans('adminlte_lang::message.start_work') ) !!}
				{!! Form::date('start_work', ($type == 'update' ? $employee->start_work : \Carbon\Carbon::now()->subDay(0)->format('Y-m-d')) , ['class'=>'form-control']) !!}
			</div>
		</div>

		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				{!! Form::label('end_work', trans('adminlte_lang::message.end_work') ) !!}
				{!! Form::date('end_work', ($type == 'update' ? $employee->end_work : \Carbon\Carbon::now()->subDay(0)->format('Y-m-d')) , ['class'=>'form-control']) !!}
			</div>
		</div>

		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				{!! Form::label('note', trans('adminlte_lang::message.note') ) !!}
				{!! Form::text('note', ($type == 'update' ? $employee->note : null) , ['class'=>'form-control']) !!}
			</div>
		</div>
	</div>
</div>

@include('secure_card.form')