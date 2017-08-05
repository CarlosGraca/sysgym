<div class="row">
    <div class="col-lg-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <strong>{{ trans('adminlte_lang::message.'.$type_people) }}: </strong><span>{{ $people->name }}</span>
                </h3>
                <div class="pull-right box-tools">
                    <a href="#" class="btn btn-primary btn-sm" data-dismiss="modal" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.close') }}">
                        <i class="fa  fa-close"></i>
                    </a>
                </div><!-- /. tools -->
            </div><!-- /.box-header -->

            <div class="box-body">
                @include('people.show',['people' => $people,'setting'=>['photo'=>true,'contact'=>true,'report'=>false,'work'=>true,'type_people'=> $type_people]])
            </div>
        </div>
    </div>
</div>
