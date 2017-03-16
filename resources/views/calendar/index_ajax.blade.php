<!-- /.box-body -->
<div class="box box-primary">
    <div class="box-header with-border">
        <i class="fa fa-calendar"></i>
        <h3 class="box-title">{{ trans('adminlte_lang::message.consult_calendar') }}</h3>

        <div class="box-tools">
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" id="add-agenda" data-url="{{ url('consult_agenda/create') }}">
                    <i class="fa fa-plus"></i></button>

                <button type="button" class="btn btn-primary btn-sm show-agenda-modal" data-toggle="modal" data-url="{{ url('calendar') }}">
                    <i class="fa fa-arrows-alt"></i></button>
            </div>
        </div>
    </div>

    <div class="box-body">
        <!-- THE CALENDAR -->
        <div id="calendar"></div>
    </div>
    <!-- /.box-body -->
</div>