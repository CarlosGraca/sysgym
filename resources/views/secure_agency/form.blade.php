<div class="row">
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 text-center">
            <span ><strong class="title">{{ trans('adminlte_lang::message.logo') }}</strong></span>
            <hr class="h-divider" >

			<img  src="{{ url('/') }}/{{ ($type == 'update' ? $agency->avatar : 'img/round-logo.jpg') }}" class="img-thumbnail avatar" alt="Cinque Terre" width="300" style="padding: 25px auto; max-height: 225px; max-width: 300px; width: auto; height: auto;">
			{!! Form::hidden('avatar', ($type == 'update' ? $agency->avatar : 'img/round-logo.jpg') , ['class'=>'form-control']) !!}
			<div class="form-group" style="margin-top: 10px;" data-type='secure_agency'>
				{{ Form::file('avatar', null, ['class' =>  'filestyle', 'data-input'=>'false', 'data-buttonText'=>'Select Image'])}}
			</div>
	</div>
    <div class="col-lg-9 col-md-6 col-sm-6 col-xs-12">
		<div class="row">
			<span ><strong class="title">{{ trans('adminlte_lang::message.personal_information') }}</strong></span>
			<hr class="h-divider" >

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('name',trans('adminlte_lang::message.name')) !!}
					{!! Form::text('name', ($type == 'update' ? $agency->name : null) , ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('nif',trans('adminlte_lang::message.nif')) !!}
					{!! Form::number('nif', ($type == 'update' ? $agency->nif : null) , ['class'=>'form-control']) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<span ><strong class="title">{{ trans('adminlte_lang::message.contact_information') }}</strong></span>
			<hr class="h-divider" >

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('email',trans('adminlte_lang::message.email')) !!}
					{!! Form::email('email', ($type == 'update' ? $agency->email : null), ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('phone',trans('adminlte_lang::message.phone')) !!}
					{!! Form::tel('phone', ($type == 'update' ? $agency->phone : null) , ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('fax',trans('adminlte_lang::message.fax')) !!}
					{!! Form::text('fax', ($type == 'update' ? $agency->fax : null) , ['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('address',trans('adminlte_lang::message.address')) !!}
					{!! Form::textArea('address', ($type == 'update' ? $agency->address : null) , ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					{!! Form::label('city',trans('adminlte_lang::message.city') ) !!}
					{!! Form::text('city', ($type == 'update' ? $agency->city : null) , ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					{!! Form::label('island',trans('adminlte_lang::message.island') ) !!}
					{!! Form::select('island', $island, ($type == 'update' ? $agency->island_id : null) , ['class'=>'form-control','id'=>'island']) !!}
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					{!! Form::label('zip_code',trans('adminlte_lang::message.zip_code') ) !!}
					{!! Form::text('zip_code', ($type == 'update' ? $agency->zip_code : null) , ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					{!! Form::label('facebook',trans('adminlte_lang::message.facebook') ) !!}
					{!! Form::text('facebook', ($type == 'update' ? $agency->facebook : null) , ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					{!! Form::label('website',trans('adminlte_lang::message.website') ) !!}
					{!! Form::url('website', ($type == 'update' ? $agency->website : null) , ['class'=>'form-control']) !!}
				</div>
			</div>

		</div>
	</div>	
</div>
