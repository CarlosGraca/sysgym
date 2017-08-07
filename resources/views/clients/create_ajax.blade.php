<div class="row">
	<div class="col-lg-12">
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">
				 {{--<span>{{ trans('adminlte_lang::message.new_client') }} </span>--}}
			  </h3>
				<div class="pull-right box-tools">
					<a href="#" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="add-client">
						 <i class="fa fa-save"></i> {{ trans('adminlte_lang::message.save') }}
					</a>
					<a href="#" class="btn btn-primary btn-sm" data-dismiss="modal" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.close') }}">
						<i class="fa  fa-close"></i> {{ trans('adminlte_lang::message.close') }}
					</a>
				</div><!-- /. tools -->
			</div><!-- /.box-header -->

			<div class="box-body">
				{!! Form::open(['route'=>'clients.store', 'id'=>'client-form','files'=>true]) !!}
					@include('clients.form', ['type'=>'create'])
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

<script>
	$(":file").filestyle({
		input: true,
		icon: true,
		buttonName: "btn-primary",
		buttonText: "",
		iconName: "fa fa-folder-open",
		badge: false,
		placeholder: '{{ trans('adminlte_lang::message.browser_avatar') }}',
	});
</script>