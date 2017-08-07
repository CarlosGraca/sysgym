{!! Form::hidden('avatar_crop', null , ['class'=>'form-control','id'=>'avatar_crop']) !!}
{!! Form::hidden('avatar_type', null , ['class'=>'form-control','id'=>'avatar_type']) !!}

{{--PERSONAL INFORMATION--}}
<div class="row">
    <span style="display: none;"> </span>
    <span ><strong class="title">{{ trans('adminlte_lang::message.personal_information') }}</strong></span>
    <hr class="h-divider" >
    <div class="col-lg-3 col-md-4 col-sm-6 text-center">
        <img  src="{{ asset(($type == 'update' ? $people->avatar : 'img/avatar.png')) }}" class="img-thumbnail avatar-crop" alt="Cinque Terre" width="150" height="150">
        <div style="margin-top: 10px">
            <div class="col-xs-12 text-center">
                <div class="form-group form-group-sm" style="float: right; max-width: 15%;">
                    <button class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.capture') }}" data-message="{{ trans('adminlte_lang::message.camera_capture') }}" style="padding: 7px 10px;" id="camera-capture">
                        <i class="fa  fa-camera"></i>
                    </button>
                </div>
                <div class="form-group" data-type='{{ $type_form }}' data-crop="true" style="float:left; max-width: 85%;">
                    {!! Form::file('avatar', '', ['class' =>  'filestyle upload_image','data-input'=>'false', 'data-buttonText'=>'Select Image', 'data-placeholder'=> trans('adminlte_lang::message.browser_avatar') ]) !!}
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
            {!! Form::label('name','(*) '.trans('adminlte_lang::message.name')) !!}
            {!! Form::text('name', ($type == 'update' ? $people->name : null) , ['class'=>'form-control','onfocus'=>'onfocus','required'=>'']) !!}
            <p class="has-error" style="display: none"></p>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
            {!! Form::label('genre','(*) '.trans('adminlte_lang::message.genre')) !!}
            {!! Form::select('genre', [ 'male'=>trans('adminlte_lang::message.male'),'female'=>trans('adminlte_lang::message.female')],($type == 'update' ? $people->genre : null), ['class'=>'form-control', 'placeholder' => trans('adminlte_lang::message.genre_empty')]) !!}
            <p class="has-error" style="display: none"></p>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
            {!! Form::label('civil_state','(*) '.trans('adminlte_lang::message.civil_state') ) !!}
            {!! Form::select('civil_state', ['single'=>trans('adminlte_lang::message.single'),'married'=>trans('adminlte_lang::message.married'),'divorced'=>trans('adminlte_lang::message.divorced'),'widowed'=>trans('adminlte_lang::message.widowed')],($type == 'update' ? $people->civil_state : null), ['class'=>'form-control', 'placeholder' => trans('adminlte_lang::message.civil_state_empty')]) !!}
            <p class="has-error" style="display: none"></p>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
            {!! Form::label('birthday', '(*) '.trans('adminlte_lang::message.birthday') ) !!}
            {!! Form::date('birthday', ($type == 'update' ? $people->birthday : null) , ['class'=>'form-control']) !!}
            <p class="has-error" style="display: none"></p>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
            {!! Form::label('nationality',trans('adminlte_lang::message.nationality') ) !!}
            {!! Form::text('nationality', ($type == 'update' ? $people->nationality : null) , ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
            {!! Form::label('bi', trans('adminlte_lang::message.bi') ) !!}
            {!! Form::number('bi', ($type == 'update' ? $people->bi : null) , ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
            {!! Form::label('nif',trans('adminlte_lang::message.nif') ) !!}
            {!! Form::number('nif', ($type == 'update' ? $people->nif : null) , ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="col-lg-6 col-md-8 col-sm-12">
        <div class="form-group form-group-sm">
            {!! Form::label('parents',trans('adminlte_lang::message.parents') ) !!}
            {!! Form::textarea('parents', ($type == 'update' ? $people->parents : null) , ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

{{--CONTACT INFORMATION--}}
<div class="row">
    <span ><strong class="title">{{ trans('adminlte_lang::message.contact_information') }}</strong></span>
    <hr class="h-divider" >

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
            {!! Form::label('address','(*) '.trans('adminlte_lang::message.address') ) !!}
            {!! Form::text('address', ($type == 'update' ? $people->address : null) , ['class'=>'form-control']) !!}
            <p class="has-error" style="display: none"></p>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
            {!! Form::label('city','(*) '.trans('adminlte_lang::message.city') ) !!}
            {!! Form::text('city', ($type == 'update' ? $people->city : null) , ['class'=>'form-control']) !!}
            <p class="has-error" style="display: none"></p>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
            {!! Form::label('email',trans('adminlte_lang::message.email') ) !!}
            {!! Form::email('email', ($type == 'update' ? $people->email : null) , ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
            {!! Form::label('mobile',trans('adminlte_lang::message.mobile') ) !!}
            {!! Form::text('mobile', ($type == 'update' ? $people->mobile : null) , ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
            {!! Form::label('phone',trans('adminlte_lang::message.phone') ) !!}
            {!! Form::text('phone', ($type == 'update' ? $people->phone : null) , ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
            {!! Form::label('zip_code',trans('adminlte_lang::message.zip_code') ) !!}
            {!! Form::number('zip_code', ($type == 'update' ? $people->zip_code : 0) , ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
            {!! Form::label('website',trans('adminlte_lang::message.website') ) !!}
            {!! Form::text('website', ($type == 'update' ? $people->website : null) , ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
            {!! Form::label('facebook',trans('adminlte_lang::message.facebook') ) !!}
            {!! Form::text('facebook', ($type == 'update' ? $people->facebook : null) , ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group form-group-sm">
            {!! Form::label('note',trans('adminlte_lang::message.note') ) !!}
            {!! Form::textarea('note', ($type == 'update' ? $people->note : null) , ['class'=>'form-control']) !!}
        </div>
    </div>

</div>