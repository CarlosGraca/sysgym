<?php
    $system = \Auth::user()->branch_id != 0 ? \Auth::user()->branch->system :  \App\Models\System::where(['branch_id'=>\Auth::user()->branch_id,'tenant_id'=>\Auth::user()->tenant_id])->first();
    \Carbon\Carbon::setLocale(count($system) > 0 ? $system->lang : config('app.locale'));
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ count($system) > 0 ? $system->lang : config('app.locale') }}">

@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<style>

    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px;
    }

    #client-avatar{
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }

    .content-wrapper {
        background: url('{{ asset( count($system) > 0 ? $system->background_image : config('app.background') ) }}') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .layout-boxed {
        background: url('{{ asset( count($system) > 0 ? $system->background_image : config('app.background') ) }}') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .list_image{
        border-radius: 50%;
        max-width: 100%;
        height: auto;
    }

</style>

<body class=" {{ count($system) > 0 ? $system->theme : config('app.theme') }} sidebar-mini {{ count($system) > 0 ? $system->layout : config('app.layout') }}">
<div class="wrapper">

    @include('layouts.partials.mainheader')

    @include('layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('layouts.partials.contentheader')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    {{--@include('layouts.partials.controlsidebar')--}}
    @include('layouts.shared.modal')

    {{--@include('layouts.shared.modal_lg')--}}
    @include('layouts.shared.modal_md')
    {{--@include('layouts.shared.modal_del')--}}

    @include('layouts.shared.croppie_modal')
    
    @include('layouts.shared.confirm_modal')

    @include('layouts.partials.footer')

    <div class="loader" style="display:none; position:fixed; right:0; bottom:0; top:50px;">
        <img src="{{asset('img/gears.gif')}}" />
    </div>

    <!--
    <div style="position:fixed; bottom: 15px; right: 15px;">
        <a href="#" class="btn btn-app"><i class="fa fa-comments"></i></a>
    </div>
    -->
</div><!-- ./wrapper -->

@section('scripts')
    @include('layouts.partials.scripts')
@show

</body>
</html>
