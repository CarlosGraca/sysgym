{{--MODAL AGENDA--}}
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel-Agenda">Detalhes do Item</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <span class="pull-left">
                &copy {{ date('Y') }} - <a href="{{ url('/') }}">{{ trans('adminlte_lang::message.app_name') }}</a> - {{ trans('adminlte_lang::message.copyright') }}
                </span>
                <span class="pull-right">
                    {{trans('adminlte_lang::message.version')}}:  {{ config('app.version') }}
                </span>
            </div>
        </div>
    </div>
</div>
