<!-- Main Footer -->
<footer class="main-footer"
        {{--style="--}}
    {{--position: fixed;--}}
    {{--right: 0;--}}
    {{--bottom: 0;--}}
    {{--left: 0;--}}
{{--" --}}
>
    <!-- To the right -->
    <span>
        &copy {{ date('Y') }} - <a href="{{ url('/') }}">{{ trans('adminlte_lang::message.app_name') }}</a> - {{ trans('adminlte_lang::message.copyright') }}
    </span>
    <span class="pull-right hidden-xs">
        {{trans('adminlte_lang::message.version')}}:  {{ config('app.version') }}
    </span>
</footer>