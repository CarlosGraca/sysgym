@extends('layouts.auth')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.login') }}
@endsection

@section('content')
<body class="hold-transition content-wrapper-login">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}"><b>Sys</b>Gym</a>
        </div><!-- /.login-logo -->


        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ( session('status') )
            <div class="alert alert-info alert-dismissible" role="info">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><i class="fa fa-info-circle"></i></strong> {{ session('status') }}
            </div>

            {{--<div class="alert alert-info">--}}
                {{--<i class="fa fa-info-circle"></i> <span class="text-center">{{ session('status') }}</span>--}}
            {{--</div>--}}
        @endif

    <div class="login-box-body">
    <p class="login-box-msg"> {{ trans('adminlte_lang::message.siginsession') }} </p>
    <form action="{{ url('/login') }}" method="post" id="form-login">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-7">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember"> {{ trans('adminlte_lang::message.remember') }}
                    </label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-5">
                <button type="submit" class="btn btn-primary btn-block btn-flat submit">{{ trans('adminlte_lang::message.buttonsign') }} <i class="fa fa-sign-in"></i></button>
            </div><!-- /.col -->
        </div>
    </form>

    

    <a href="{{ url('/forgot/password') }}">{{ trans('adminlte_lang::message.forgotpassword') }}</a><br>
    <!--
        <a href="{{ url('/register') }}" class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a>
    -->
    

</div><!-- /.login-box-body -->

</div><!-- /.login-box -->

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
