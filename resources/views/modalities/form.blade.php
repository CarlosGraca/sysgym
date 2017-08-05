<div class="row">
	{!! Form::hidden('modality_id', ($type == 'update' ? $modality->id : null), ['class'=>'form-control','id'=>'modality_id']) !!}
	{!! Form::hidden('item_id', ($type == 'update' ? $modality->id : null), ['class'=>'form-control','id'=>'item_id']) !!}
	{!! Form::hidden('user_id', \Auth::user()->id, ['class'=>'form-control','id'=>'user_id']) !!}
    {!! Form::hidden('avatar_crop', null , ['class'=>'form-control','id'=>'avatar_crop']) !!}

    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
        <div class="row">
            <span ><strong class="title">{{ trans('adminlte_lang::message.modality_information') }}</strong></span>
            <hr class="h-divider" >

            <div class="col-lg-3 col-md-4 col-sm-6 text-center">
                <img  src="{{ asset(($type == 'update' ? $modality->avatar : 'img/clinic/doctor_icon.png')) }}" class="img-thumbnail avatar-crop" alt="Cinque Terre" width="150" height="150">
                <div style="margin-top: 10px">
                    <div class="col-xs-12 text-center">
                        <div class="form-group" data-type='modalities' data-crop="true">
                            {!! Form::file('avatar', '', ['class' =>  'filestyle upload_image','data-input'=>'false', 'data-buttonText'=>'Select Image', 'data-placeholder'=> trans('adminlte_lang::message.browser_avatar') ]) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    {!! Form::label('name','(*)'.trans('adminlte_lang::message.name')) !!}
                    {!! Form::text('name', ($type == 'update' ? $modality->name : null) , ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    {!! Form::label('price','(*)'.trans('adminlte_lang::message.price')) !!}
                    {!! Form::number('price', ($type == 'update' ? $modality->price : null) , ['class'=>'form-control','onfocus'=>'onfocus']) !!}
                </div>
            </div>
        </div>
        @include('schedules.form',['schedules'=>(isset($schedules) ? $schedules : null),'weeks'=>$weeks,'flag'=>2])

    </div>
</div>