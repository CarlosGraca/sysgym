<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <?php $branch = \App\Models\Branch::where('id',Auth::user()->branch_id)->first(); ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img  src="{{ url('/') }}/{{Auth::user()->avatar}}" class="img-circle" alt="Cinque Terre" >
                </div>
                <div class="pull-left info">
                    <p>
                        <a class="users-list-name" href="#" data-toggle="tooltip"  data-placement="bottom" title="{{ Auth::user()->name }}" style="max-width:150px;">{{Auth::user()->name}}</a>
                    </p>
                    <!-- Status -->
                    <a href="#">
                        <!--
                            <i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}
                        -->
                            {{ trans('adminlte_lang::message.branch') }} : {{ $branch != null ? $branch->name : trans('adminlte_lang::message.all_branch') }}
                    </a>
                </div>
            </div>
        @endif

        {!! Helpers::sidebar() !!}
        
    </section>
    <!-- /.sidebar -->
</aside>
