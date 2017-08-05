<div class="row">
    <span ><strong class="title">{{ trans('adminlte_lang::message.schedule') }}</strong></span>
    <hr class="h-divider" >
    {!! Form::hidden('office_hours_id', null, ['class'=>'form-control','id'=>'office_hours_id']) !!}
    {!! Form::hidden('flag', $flag, ['class'=>'form-control','id'=>'flag']) !!}
    <span id="last-schedules_id" style="display:none;">{{ $last_schedules != null ? $last_schedules->id : "0"}}</span>
    <div class="col-md-4 col-sm-10 col-xs-10">
        <div class="form-group form-group-sm">
            {!! Form::label('week_day',trans('adminlte_lang::message.week_day') ) !!}
            {!! Form::select('week_day', $weeks, null , ['class'=>'form-control','id'=>'branch_week','placeholder'=>' (SELECT WEEK DAY) ']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="form-group form-group-sm">
            {!! Form::label('start_time',trans('adminlte_lang::message.start_time') ) !!}
            {!! Form::time('start_time', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="form-group form-group-sm">
            {!! Form::label('end_time',trans('adminlte_lang::message.end_time') ) !!}
            {!! Form::time('end_time', null , ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-1 col-sm-1 col-xs-2">
        <div class="form-group form-group-sm">
            {!! Form::label('','Add',['style'=>'visibility: hidden;'] ) !!}
            {!! Form::button('<i class="fa fa-plus"></i>', ['class'=>'form-control btn btn-primary btn-sm','id'=>'add-office_hours','data-action'=>'create']) !!}
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"> <i class="fa fa-clock-o"></i>{{ trans('adminlte_lang::message.schedule') }}</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                <table id="table-office_hours" class="table table-bordered table-striped">

                    <thead>
                    <th class="col-md-5">{{ trans('adminlte_lang::message.week_day') }}</th>
                    <th class="col-md-3 text-center">{{ trans('adminlte_lang::message.start_time') }}</th>
                    <th class="col-md-3 text-center">{{ trans('adminlte_lang::message.end_time') }}</th>
                    <th class="col-md-1 action_button"></th>
                    </thead>

                    <tbody>
                    @if(isset($schedules))
                        @foreach($schedules as $schedule)
                            <tr class="office_hours_table" data-key="{{ $schedule->id }}"  data-week="{{ $schedule->week_day }}">
                                <td class="week_name" data-value="{{ $schedule->week_day }}">{{ trans('adminlte_lang::message.'.$schedule->week_day) }}</td>
                                <td class="start_time text-center" >{{ $schedule->start_time }}</td>
                                <td class="end_time text-center" >{{ $schedule->end_time }}</td>
                                <td class="action_button text-center">
                                    <a href="#!copy" class="copy_schedule" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.copy') }}"><i class="fa fa-clone"></i></a>
                                    <a href="#!edit" class="edit_schedule" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}"><i class="fa fa-edit"></i></a>
                                    <a href="#!remove" class="remove_schedule" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.remove') }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>