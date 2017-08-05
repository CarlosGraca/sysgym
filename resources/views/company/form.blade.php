<div class="row">	
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 text-center">
		<span ><strong class="title" style="text-align: left;">{{ trans('adminlte_lang::message.company_logo') }}</strong></span>
		<hr class="h-divider" >
		@if (isset($company))
	       @if(($company->logo))
		    	<img  src="/{{$company->logo}}" class="img-thumbnail avatar-company" alt="Cinque Terre" width="300" height="150">
		    	{!! Form::hidden('logo', $company->logo , ['class'=>'form-control']) !!}
		    @else
		    	<img  src="/img/round-logo.jpg" class="img-thumbnail avatar-company" alt="Cinque Terre" width="300" height="150">
	        @endif
	    @else
		   <img  src="{{asset('/img/round-logo.jpg')}}" class="img-thumbnail avatar-company" alt="Cinque Terre" width="300" style="padding: 25px auto; max-height: 225px; max-width: 250px; width: auto; height: auto;">
	    @endif
	    <div class="form-group" style="margin-top: 10px;" data-type='company'>
            {{ Form::file('logo', null, ['class' =>  'filestyle upload_image', 'data-input'=>'false', 'data-buttonText'=>'Select Image'])}}
        </div>
    </div>
    <div class="col-lg-9 col-md-6 col-sm-6 col-xs-12">
		<div class="row">
			<span ><strong class="title">{{ trans('adminlte_lang::message.personal_information') }}</strong></span>
			<hr class="h-divider" >
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('name','(*)'.trans('adminlte_lang::message.name')) !!}
					{!! Form::text('name', ($type == 'update' ? $company->name : null) , ['class'=>'form-control','required'=>'true']) !!}
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('nif','(*)'.trans('adminlte_lang::message.nif')) !!}
					{!! Form::number('nif', ($type == 'update' ? $company->nif : null) , ['class'=>'form-control','required'=>'true']) !!}
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('owner','(*)'.trans('adminlte_lang::message.owner')) !!}
					{!! Form::text('owner', ($type == 'update' ? $company->owner : null) , ['class'=>'form-control','required'=>'true']) !!}
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('area','(*)'.trans('adminlte_lang::message.area')) !!}
					{!! Form::text('area', ($type == 'update' ? $company->area : null) , ['class'=>'form-control','required'=>'true']) !!}
				</div>
			</div>

		</div>
		<div class="row">
			<span ><strong class="title">{{ trans('adminlte_lang::message.contact_information') }}</strong></span>
			<hr class="h-divider" >

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('email','(*)'.trans('adminlte_lang::message.email')) !!}
					{!! Form::email('email', ($type == 'update' ? $company->email : null), ['class'=>'form-control','required'=>'true']) !!}
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('phone','(*)'.trans('adminlte_lang::message.phone')) !!}
					{!! Form::tel('phone', ($type == 'update' ? $company->phone : null) , ['class'=>'form-control','required'=>'true']) !!}
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('fax',trans('adminlte_lang::message.fax')) !!}
					{!! Form::text('fax', ($type == 'update' ? $company->fax : null) , ['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('address','(*)'.trans('adminlte_lang::message.address')) !!}
					{!! Form::text('address', ($type == 'update' ? $company->address : null) , ['class'=>'form-control','required'=>'true']) !!}
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					{!! Form::label('city','(*)'.trans('adminlte_lang::message.city') ) !!}
					{!! Form::text('city', ($type == 'update' ? $company->city : null) , ['class'=>'form-control','required'=>'true']) !!}
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					{!! Form::label('island','(*)'.trans('adminlte_lang::message.island') ) !!}
					{!! Form::select('island', $island, ($type == 'update' ? $company->island_id : null) , ['class'=>'form-control','id'=>'island','placeholder'=>' (SELECT ISLAND) ']) !!}
				</div>
			</div>


			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('zip_code',trans('adminlte_lang::message.zip_code')) !!}
					{!! Form::number('zip_code', ($type == 'update' ? $company->zip_code : 0) , ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('facebook',trans('adminlte_lang::message.facebook')) !!}
					{!! Form::text('facebook', ($type == 'update' ? $company->facebook : null) , ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('website',trans('adminlte_lang::message.website')) !!}
					{!! Form::url('website', ($type == 'update' ? $company->website : null) , ['class'=>'form-control']) !!}
				</div>
			</div>
		</div>
	</div>	
</div>