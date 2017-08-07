<div class="progress" style="display: none;">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
    </div>
</div>

{!! Form::open(['route'=>'files.store', 'id'=>'files-form','files'=>true]) !!}
{!! Form::hidden('item_id', $item_id, ['class'=>'form-control','id'=>'item_id']) !!}
{!! Form::hidden('flag', $flag, ['class'=>'form-control','id'=>'flag']) !!}
@include('files.form', ['type'=>'create'])
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

    $(':file').attr('accept','image/*,video/*,.pdf');

</script>