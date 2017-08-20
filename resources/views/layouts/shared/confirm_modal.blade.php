<div class="modal fade" id="confirm-modal" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
		    <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="confirm-modal-title">Detalhes do Item</h4>
            </div>
			<div class="modal-body">
                <p><strong>{{ trans('adminlte_lang::message.message_print_invoice') }}</strong></p>         
            </div>
			<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('adminlte_lang::message.no') }}</button>
                <a class="btn btn-success btn-ok">{{ trans('adminlte_lang::message.yes') }}</a>
               <!--  <span class="pull-left">
                &copy {{ date('Y') }} - <a href="{{ url('/') }}">{{ trans('adminlte_lang::message.app_name') }}</a> - {{ trans('adminlte_lang::message.copyright') }}
                </span>
                    <span class="pull-right">
                    {{trans('adminlte_lang::message.version')}}:  {{ config('app.version') }}
                </span> -->
			</div>
		</div>
	</div>
</div>