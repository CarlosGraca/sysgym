@inject('Defaults', 'App\Http\Controllers\Defaults')
<?php
    $status = [trans('adminlte_lang::message.canceled'),trans('adminlte_lang::message.draft'),trans('adminlte_lang::message.published'),trans('adminlte_lang::message.approved'),trans('adminlte_lang::message.rejected')];
    $status_color = ['danger','default','info','success','warning'];
    $form_status = ($type == 'update' ? ($matriculation->status != 1 ? 'disabled' : '') : '');
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		{!! Form::hidden('client_id',($type == 'update' ? $matriculation->client->id : $client === null ? null : $client->id), ['class'=>'form-control','id'=>'client_id']) !!}
		{!! Form::hidden('user_id', \Auth::user()->id, ['class'=>'form-control','id'=>'user_id']) !!}
        {!! Form::hidden('modality_id', '', ['class'=>'form-control','id'=>'modality_id']) !!}
        {!! Form::hidden('total', ($type == 'update' ? ( $matriculation->total != null ? $matriculation->total : 0 ) : 0), ['class'=>'form-control','id'=>'total']) !!}

        <span id="last-modality_id" style="display:none;">{{ $last_modality != null ? $last_modality->id : "0"}}</span>

        <div class="row">
			<span ><strong class="title">{{ trans('adminlte_lang::message.client_information') }}</strong></span>
			<hr class="h-divider" >
			<div class="col-lg-3 col-md-4 col-sm-6 text-center col-xs-12">
				<div class="form-group form-group-sm">
					<img  src="{{ asset( ($type == 'update' ? $matriculation->client->avatar : $client === null ?  'img/avatar.png' : $client->avatar) ) }}" class="img-thumbnail avatar-client" alt="Cinque Terre" width="200" id="client_avatar">
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

				@if($type == 'create' && $client === null)
					<div class="input-group input-group-sm">
						{!! Form::label('client','(*) '.trans('adminlte_lang::message.client')) !!}
						{!! Form::text('client', ($type == 'update' ? $matriculation->client->name : null) , ['class'=>'form-control','onfocus'=>'onfocus','placeholder'=>trans('adminlte_lang::message.type_client_name'), ($type == 'update' ? 'readonly' : '')]) !!}
						<span class="input-group-btn" style="font-size: inherit;">
							{!! Form::label('client_add_popup','ADD',['style'=>'visibility: hidden;'] ) !!}
							<a class="btn btn-success btn-flat form-control" id="client_add_popup" data-url="{{ url('clients/create') }}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.add_client') }}" data-title="{{ trans('adminlte_lang::message.new_client') }}"><i class="fa fa-user-plus"></i></a>
								</span>
					</div>
				@else
					<div class="form-group form-group-sm">
						{!! Form::label('client','(*) '.trans('adminlte_lang::message.client')) !!}
						{!! Form::text('client', ($type == 'update' ? $matriculation->client->name : $client === null ? null : $client->name) , ['class'=>'form-control','onfocus'=>'onfocus','placeholder'=>trans('adminlte_lang::message.type_client_name'), ($type == 'update' ? 'readonly' : '')]) !!}
					</div>
				@endif
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('email',trans('adminlte_lang::message.email') ) !!}
					{!! Form::email('email', ($type == 'update' ? $matriculation->client->email : $client === null ? null : $client->email) , ['class'=>'form-control','readonly'=>'readonly']) !!}
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('mobile',trans('adminlte_lang::message.mobile') ) !!}
					{!! Form::text('mobile', ($type == 'update' ? $matriculation->client->mobile : $client === null ? null : $client->mobile) , ['class'=>'form-control','readonly'=>'readonly']) !!}
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('phone',trans('adminlte_lang::message.phone') ) !!}
					{!! Form::text('phone', ($type == 'update' ? $matriculation->client->phone : $client === null ? null : $client->phone) , ['class'=>'form-control','readonly'=>'readonly']) !!}
				</div>
			</div>

		</div>

        {{--MODALITY--}}
		<div class="row">

			<span ><strong class="title">{{ trans('adminlte_lang::message.modality') }}</strong></span>
			<span id="div_add_modality">
                <hr class="h-divider" >

			{{--@if($type=='create' || ($type=='update'  && $matriculation->status == 1))--}}
{{----}}
                {{--<div class="col-md-4 col-sm-10 col-xs-10">--}}
                    {{--<div class="form-group form-group-sm">--}}
                        {{--{!! Form::label('modality_id',trans('adminlte_lang::message.payment_type')) !!}--}}
                        {{--{!! Form::select('modality_id', ,($type == 'update' ? $payment->payment_type : null), ['class'=>'form-control','placeholder' => trans('adminlte_lang::message.select_payment_type')]) !!}--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="col-md-4 col-sm-10 col-xs-10">
                    <div class="form-group form-group-sm">
                        {!! Form::label('modality',' (*) '.trans('adminlte_lang::message.modality') ) !!}
                        {!! Form::text('modality', '' , ['class'=>'form-control','placeholder'=>trans('adminlte_lang::message.type_modality_name'), ($type == 'update' && ($matriculation->status != 1) ? 'readonly' : ' ') ]) !!}
                    </div>
                </div>

                <div class="col-md-2 col-sm-1 col-xs-2">
                    <div class="form-group form-group-sm">
                        {!! Form::label('add-matriculation_modality','ADD',['style'=>'visibility: hidden;'] ) !!}
                        <a href="#!add-modality" class="btn btn-primary btn-sm" style="display: table;" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.add_modality') }}" id="add-matriculation_modality" data-message="NO MODALITY TYPED">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>

			{{--@endif--}}
            </span>


			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="box box-primary">
					{{--<div class="box-header with-border">--}}
						{{--<h3 class="box-title">{{ trans('adminlte_lang::message.list_modality') }}</h3>--}}
						{{--<div class="pull-right">--}}
							{{--<span style="margin-right: 20px;">--}}
								{{--<b>{{ trans('adminlte_lang::message.total_with_desc') }}: </b><span id="matriculation-sum-discount" data-value="{{ ($type == 'update' ? ( $matriculation->total_discount != null ? $matriculation->total_discount : 0 ) : 0) }}"> {{ ($type == 'update' ? ( $matriculation->total_discount != null ? $Defaults->currency( $matriculation->total_discount ) : $Defaults->currency(0) )   : $Defaults->currency(0)) }} </span>--}}
							{{--</span>--}}
							{{--<span>--}}
								{{--<b>{{ trans('adminlte_lang::message.total') }}: </b><span id="matriculation-sum-total" data-value="{{ ($type == 'update' ? ( $matriculation->total != null ? $matriculation->total : 0 ) : 0) }}"> {{ ($type == 'update' ? ( $matriculation->total != null ? $Defaults->currency( $matriculation->total ) : $Defaults->currency(0) )   : $Defaults->currency(0)) }} </span>--}}
							{{--</span>--}}
						{{--</div>--}}
					{{--</div><!-- /.box-header -->--}}

					<div class="box-body">
						<table id="table-matriculation-modality" class="table table-bordered table-striped">

							<thead>
								<th class="col-md-6">{{ trans('adminlte_lang::message.modality') }}</th>
								<th class="col-md-5 text-center">{{ trans('adminlte_lang::message.price') }}</th>
								{{--<th class="col-md-1 text-center">{{ trans('adminlte_lang::message.iva') }} (%)</th>--}}
{{--								<th class="col-md-2 text-center">{{ trans('adminlte_lang::message.discount') }}</th>--}}
{{--								<th class="col-md-2 text-center">{{ trans('adminlte_lang::message.total') }}</th>--}}
								<th class="col-md-1 action_button"></th>
							</thead>
							{{--$m_modality = Matriculation Modality--}}
                            @if(isset($matriculation))
                                @foreach($matriculation->modality->where('status',1) as $m_modality)
                                <tr class="m_modality-table-row" data-key="{{ $m_modality->id }}" data-total="{{ doubleval($m_modality->total + $m_modality->discount) }}">
                                    <td class="m_modality-modality" data-value="{{ $m_modality->modality_id }}" >{{ $m_modality->modality->name }}</td>
                                    <td class="m_modality-price text-center" data-value="{{ $m_modality->price }}" >{{ $Defaults->currency($m_modality->price) }}</td>
									{{--<td class="m_modality-iva text-center" data-value="{{ $m_modality->iva }}">{{ $m_modality->iva }} %</td>--}}
									{{--<td class="m_modality-discount text-center" data-value="{{ $m_modality->discount }}" >{{ $Defaults->currency($m_modality->discount) }}</td>--}}
									{{--<td class="m_modality-total text-center" data-value="{{ $m_modality->total }}" >{{ $Defaults->currency($m_modality->total) }}</td>--}}
                                    <td class="text-center action_button">
										@if($matriculation->status == 1)
                                        	<a href="#!remove" class="remove-modality-row" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.remove') }}"><i class="fa fa-trash"></i></a>
										@endif
                                    </td>
                                </tr>
                                @endforeach
                            @endif

						</table>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
