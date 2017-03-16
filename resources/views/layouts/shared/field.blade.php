<div class="input-group input-group-sm" id="field-{{$name}}">
  {!! Form::text($name, $value, ['class'=>'form-control','id'=>$name]) !!}
  <span class="input-group-btn">
      <button type="button" class="btn btn-default btn-flat" id="save-{{$name}}"><i class="fa fa-save"></i></button>
  </span>
</div>
<div class="loader-{{$name}}" style="display:none; text-align:center;">
  <img src="{{asset('img/gears_32x32.gif')}}" />
</div>
