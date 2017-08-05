<div class="input-group input-group-sm" id="field-{{$name}}">
    @if($type == 'text')
        {!! Form::text($name, $value, ['class'=>'form-control','id'=>$name,'placeholder'=>$placeholder]) !!}
    @elseif($type == 'number')
        {!! Form::number($name, $value, ['class'=>'form-control','id'=>$name,'placeholder'=>$placeholder]) !!}
    @elseif($type == 'email')
        {!! Form::email($name, $value, ['class'=>'form-control','id'=>$name]) !!}
    @elseif($type == 'select')
        {!! Form::select($name, $value, $selected , ['class'=>'form-control','id'=>$name,'placeholder'=>$placeholder]) !!}
    @endif
    <span class="input-group-btn">
          <button type="button" class="btn btn-default btn-flat" id="save-{{$name}}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}"><i class="fa fa-save"></i></button>
    </span>
</div>

<div class="loader-{{$name}}" style="display:none; text-align:center;">
    <img src="{{asset('img/gears_32x32.gif')}}" />
</div>