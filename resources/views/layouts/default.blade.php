{{-- <?php 
$system = \App\Models\System::where('id',\Auth::user()->branch_id)->first();
 ?> --}}
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en" class="report">

    @section('htmlheader')
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        @include('layouts.partials.htmlheader')
        {{-- <style>
            .content-wrapper-login {
                background: url('{{ asset( count($system) > 0 ? $system->background_image : 'img/background.jpg'  ) }}') no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        </style> --}}
    @show

    <body class="layout-boxed content-wrapper-login">
        <!-- Main content -->
        <div class="container">
            <!-- Portfolio Item Heading -->


            <!-- /.row -->
            <!-- Your Page Content Here -->

            @yield('main-content')

        </div><!-- /.content -->

        <div class="loader" style="display:none; position:fixed; right:0; bottom:0; top: 0;">
            <img src="{{asset('img/gears.gif')}}" />
        </div>

    @section('scripts')
        @include('layouts.partials.scripts')
    @show
    </body>
</html>
