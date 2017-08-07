<div class="callout" id="backup-upload-message" style="display: none;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="$(this).parent().hide()" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.close') }}">×</button>

    <p id="message"></p>
</div>


<div class="progress" style="display: none;">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
    </div>
</div>


{{--<div class="alert alert-dismissible" id="backup-upload-message" style="display: none;">--}}
    {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
    {{--<p id="message"></p>--}}
{{--</div>--}}


{!! Form::open(['url'=>'backups/upload', 'id'=>'backup-form','files'=>true]) !!}

<div class="row">
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
        <div class="form-group form-group-sm">
            {!! Form::label('file','(*) '.trans('adminlte_lang::message.file')) !!}
            {!! Form::file('file', '', ['class' =>  'filestyle','data-input'=>'false', 'data-buttonText'=>'Select File', 'accept'=>'*', 'data-placeholder'=> trans('adminlte_lang::message.browser_avatar') ]) !!}
        </div>
    </div>

    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        <div class="form-group form-group-sm">
            <div class="form-group form-group-sm">
                {!! Form::label('upload-backup-save','upload',['style'=>'visibility: hidden;'] ) !!}
                <a href="#upload-backup" class="btn btn-primary btn-sm " style="display: table;" data-message="NO PROCEDURE TYPED" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.upload_backup') }}" id="upload-backup-save">
                    <i class="fa fa-cloud-upload"></i>
                </a>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}

<script>
    $(":file").filestyle({
        input: true,
        icon: true,
        buttonName: "btn-primary",
        buttonText: "",
        iconName: "fa fa-folder-open",
        badge: false,
        placeholder: '{{ trans('adminlte_lang::message.browser_file') }}',
    });

    $(':file').attr('accept','.sql');

</script>