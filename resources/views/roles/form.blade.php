<div class="row">
	{!! Form::hidden('role_id', ($type == 'update' ? $role->id : null), ['class'=>'form-control','id'=>'role_id']) !!}
	{!! Form::hidden('user_id', \Auth::user()->id, ['class'=>'form-control','id'=>'user_id']) !!}
	<span ><strong class="title">{{ trans('adminlte_lang::message.roles_information') }}</strong></span>
    <hr class="h-divider" >
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('name','(*) '.trans('adminlte_lang::message.name')) !!}
			{!! Form::text('name', ($type == 'update' ? $role->name : null) , ['class'=>'form-control','onfocus'=>'onfocus']) !!}
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			{!! Form::label('label',trans('adminlte_lang::message.description') ) !!}
			{!! Form::textarea('label', ($type == 'update' ? $role->label : null) , ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="row">

	<span ><strong class="title">{{ trans('adminlte_lang::message.permissions') }}</strong></span>
	<hr class="h-divider" >
	<div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> </h3>
                <div class="pull-right box-tools">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-group-sm">
                            {!! Form::text('search', null , ['class'=>'form-control','onfocus'=>'onfocus','id'=>'search-permission', 'placeholder'=> trans('adminlte_lang::message.search'),'style'=>'width: 200px;' ]) !!}
                        </div>
                    </div>

                </div><!-- /. tools -->
            </div><!-- /.box-header -->

            <?php
                $status_color = ['default','success'];
            ?>
            <div class="box-body">
                <table id="table-permissions-header" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center col-md-1"> <input name="select-all-permission" type="checkbox" value="yes" id="select-all-permission"> </th>
                        <th class="col-md-3">{{ trans('adminlte_lang::message.name') }}</th>
                        <th class="col-md-8">{{ trans('adminlte_lang::message.description') }}</th>

                    </tr>
                </table>
                <div class="slimscroll">
                    <table id="table-permissions" class="table table-hover">
                        @foreach ($permissions as $permission)
                            {{--data-key="{'id':'{{ $permission->id }}','name': '{{ $permission->name }}' }"--}}
                            <tr class="permissions bg-{{ $status_color[($type == 'update' ? ( !!count( $role->permission->where('name',$permission->name)->first() ) ) : 0)] }} ">
                                <td class="text-center permission">
                                    {!! Form::checkbox('permissions[]',$permission->name, ($type == 'update' ? ( !!count( $role->permission->where('name',$permission->name)->first() ) ) : false)) !!}
                                    <input name="delete_permission[]" type="hidden" value="">
                                </td>
                                <td class="name">{{ $permission->name }}</td>
                                <td class="description">{{ $permission->label }}</td>
                            </tr>
                        @endforeach
                        <tfoot style="visibility: hidden;">
                            <tr>
                                <th class="text-center col-md-1"> <input name="select-all-permission" type="checkbox" value="yes" id="select-all-permission"> </th>
                                <th class="col-md-3">{{ trans('adminlte_lang::message.name') }}</th>
                                <th class="col-md-8">{{ trans('adminlte_lang::message.description') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
	</div>
</div>