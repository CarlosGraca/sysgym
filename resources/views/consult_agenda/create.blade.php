<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                 <strong>{{ trans('adminlte_lang::message.system_user') }}: </strong><span>{{ Auth::user()->name }}</span>
              </h3>

                <div class="pull-right box-tools">
                    <a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-consult_agenda-button" style="display: none;">
                        <i class="fa fa-edit"></i>
                    </a>

                    <a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save" id="add-consult_agenda">
                         <i class="fa fa-save"></i>
                    </a>

                    <a href="#" class="btn btn-primary btn-sm" data-dismiss="modal" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.close') }}">
                        <i class="fa  fa-close"></i>
                    </a>
                </div><!-- /. tools -->
            </div><!-- /.box-header -->

            <div class="box-body">
                {!! Form::open(['route'=>'consult_agenda.store', 'id'=>'consult_agenda-form','files'=>true]) !!}
                    @include('consult_agenda.form', ['type'=>'create'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
