@extends('layouts.auth')

@section('htmlheader_title')
  {{ trans('adminlte_lang::message.login') }}
@endsection

@section('content')
<body class="hold-transition lockscreen content-wrapper-login">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="{{ url('#') }}"><b>Sys</b>Gym</a>
  </div>

  @if ( session('error') )
    <div class="alert alert-danger alert-dismissible" role="info">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong><i class="fa fa-close"></i></strong>
      {{--<span class="pull-right text-red" style="margin-left: 60px;text-align: center;"></span>--}}
      {{ session('error') }}
    </div>
  @endif

  <!-- User name -->
  <div class="lockscreen-name">{{ \Auth::user()->name }}</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="{{ asset(\Auth::user()->avatar) }}" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="post" action="{{ url('/lockscreen') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="input-group">
        <input type="password" name="password" id="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" required>

        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->


  </div>

  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    {{ trans('adminlte_lang::message.lockscreen_entrer_password') }}
  </div>
  <div class="text-center">
    <a href="{{ url('/login') }}"> {{ trans('adminlte_lang::message.lockscreen_sign_in') }}</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; {{ date('Y') }} <b><a href="{{ url('/') }}" class="text-black">{{ config('app.name') }}</a></b><br>
    {{ trans('adminlte_lang::message.copyright') }}
  </div>
</div>
<!-- /.center -->
@include('layouts.partials.scripts_auth')

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>

</body>

@endsection
