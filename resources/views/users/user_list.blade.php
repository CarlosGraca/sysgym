<?php
    $system = \App\System::all()->first();
    \Carbon\Carbon::setLocale($system->lang);
?>
<!-- USERS LIST -->
<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title"> <i class="fa fa-users"></i> {{ trans('adminlte_lang::message.recent_users') }}</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
            </button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <ul class="users-list clearfix">
            @foreach($recent_users as $user)
                <li>
                    <img src="{{ asset($user->avatar) }}" alt="User Image" >
                    <a class="users-list-name" href="{{ $user->employee_id != 0 ? route('employees.show',$user->employee_id) : '' }}" data-toggle="tooltip" title="{{ $user->name }}">{{$user->name}}</a>
                    <span class="users-list-date">{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
        <!-- /.users-list -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer text-center">
        <a href="{{ url('users') }}" class="uppercase">{{ trans('adminlte_lang::message.view_all_users') }}</a>
    </div>
    <!-- /.box-footer -->
</div>
<!--/.box -->