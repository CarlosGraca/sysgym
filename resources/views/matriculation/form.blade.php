@inject('Defaults', 'App\Http\Controllers\Defaults')
<?php
    $status = [trans('adminlte_lang::message.canceled'),trans('adminlte_lang::message.draft'),trans('adminlte_lang::message.published'),trans('adminlte_lang::message.approved'),trans('adminlte_lang::message.rejected')];
    $status_color = ['danger','default','info','success','warning'];
    $form_status = ($type == 'update' ? ($matriculation->status != 1 ? 'disabled' : '') : '');
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		{!! Form::hidden('matriculation_id', ($type == 'update' ? $matriculation->id : null), ['class'=>'form-control','id'=>'matriculation_id']) !!}
		{!! Form::hidden('client_id',($type == 'update' ? $matriculation->client->id : null), ['class'=>'form-control','id'=>'client_id']) !!}
		{!! Form::hidden('user_id', \Auth::user()->id, ['class'=>'form-control','id'=>'user_id']) !!}
        {!! Form::hidden('modality_id', '', ['class'=>'form-control','id'=>'modality_id']) !!}
        {!! Form::hidden('total', ($type == 'update' ? ( $matriculation->total != null ? $matriculation->total : 0 ) : 0), ['class'=>'form-control','id'=>'total']) !!}

        <span id="last-modality_id" style="display:none;">{{ $last_modality != null ? $last_modality->id : "0"}}</span>

        <div class="row">
			<span ><strong class="title">{{ trans('adminlte_lang::message.client_information') }}</strong></span>
			<hr class="h-divider" >
			<div class="col-lg-3 col-md-4 col-sm-6 text-center col-xs-12">
				<div class="form-group form-group-sm">
					<img  src="{{ asset( ($type == 'update' ? $matriculation->client->avatar : 'img/avatar.png') ) }}" class="img-thumbnail avatar-client" alt="Cinque Terre" width="200" id="client_avatar">
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('client','(*) '.trans('adminlte_lang::message.client')) !!}
					{!! Form::text('client', ($type == 'update' ? $matriculation->client->name : null) , ['class'=>'form-control','onfocus'=>'onfocus','placeholder'=>trans('adminlte_lang::message.type_client_name'), ($type == 'update' ? 'readonly' : '')]) !!}
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('email',trans('adminlte_lang::message.email') ) !!}
					{!! Form::email('email', ($type == 'update' ? $matriculation->client->email : null) , ['class'=>'form-control','readonly'=>'readonly']) !!}
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('mobile',trans('adminlte_lang::message.mobile') ) !!}
					{!! Form::text('mobile', ($type == 'update' ? $matriculation->client->mobile : null) , ['class'=>'form-control','readonly'=>'readonly']) !!}
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('phone',trans('adminlte_lang::message.phone') ) !!}
					{!! Form::text('phone', ($type == 'update' ? $matriculation->client->phone : null) , ['class'=>'form-control','readonly'=>'readonly']) !!}
				</div>
			</div>

		</div>

		{{--BUDGET INFORMATIONS--}}
		<div class="row">
			<span ><strong class="title">{{ trans('adminlte_lang::message.matriculation_information') }}</strong></span>
			<hr class="h-divider" >

            <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    {!! Form::label('created_at',trans('adminlte_lang::message.create_date') ) !!}
                    {!! Form::date('created_at', ($type == 'update' ? $matriculation->created_at : \Carbon\Carbon::now()->subDay(0)->format('Y-m-d')) , ['class'=>'form-control','readonly'=>'readonly']) !!}
                </div>
            </div>

			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('branch',trans('adminlte_lang::message.branch') ) !!}
					{!! Form::text('branch', ($type == 'update' ? $matriculation->branch->name : \Auth::user()->branch->name) , ['class'=>'form-control','readonly'=>'readonly']) !!}
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					{!! Form::label('employee',trans('adminlte_lang::message.employee') ) !!}
					{!! Form::text('employee', ($type == 'update' ? $matriculation->user->name : \Auth::user()->name) , ['class'=>'form-control','readonly'=>'readonly']) !!}
				</div>
			</div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    {!! Form::label('note',trans('adminlte_lang::message.note') ) !!}
                    {!! Form::textarea('note', ($type == 'update' ? $matriculation->note : null) , ['class'=>'form-control', $form_status]) !!}
                </div>
            </div>

            {{--<div class="col-md-2 col-sm-6 col-xs-12">--}}
                {{--<div class="form-group form-group-sm">--}}
                    {{--{!! Form::label('status',trans('adminlte_lang::message.status') ) !!}--}}
                    {{--{!! Form::text('status', $status[($type == 'update' ? $matriculation->status : 1)] , ['class'=>'form-control','disabled'=>'disabled']) !!}--}}
                {{--</div>--}}
            {{--</div>--}}

		</div>

        {{--MODALITY--}}
		<div class="row">
			<span ><strong class="title">{{ trans('adminlte_lang::message.modality') }}</strong></span>
			<hr class="h-divider" >

			@if($type=='create' || ($type=='update'  && $matriculation->status == 1))
				
			<div class="col-md-4 col-sm-10 col-xs-10">
				<div class="form-group form-group-sm">
					{!! Form::label('modality',trans('adminlte_lang::message.modality') ) !!}
                    {!! Form::text('modality', '' , ['class'=>'form-control','placeholder'=>trans('adminlte_lang::message.type_modality_name'), ($type == 'update' && ($matriculation->status != 1) ? 'readonly' : ' ') ]) !!}
                </div>
			</div>

			<div class="col-md-2 col-sm-1 col-xs-2">
                <div class="form-group form-group-sm">
                    {!! Form::label('add-matriculation_modality','ADD',['style'=>'visibility: hidden;'] ) !!}
                    <a href="#!add-modality" class="btn btn-primary btn-sm {{ $type == 'update' && $matriculation->status == 1 ? '' : 'disabled' }}" style="display: table;" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.add_modality') }}" id="add-matriculation_modality" data-message="NO MODALITY TYPED">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>

			@endif

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">{{ trans('adminlte_lang::message.list_modality') }}</h3>
						<div class="pull-right">
							<span style="margin-right: 20px;">
								<b>{{ trans('adminlte_lang::message.total_with_desc') }}: </b><span id="matriculation-sum-discount" data-value="{{ ($type == 'update' ? ( $matriculation->total_discount != null ? $matriculation->total_discount : 0 ) : 0) }}"> {{ ($type == 'update' ? ( $matriculation->total_discount != null ? $Defaults->currency( $matriculation->total_discount ) : $Defaults->currency(0) )   : $Defaults->currency(0)) }} </span>
							</span>
							<span>
								<b>{{ trans('adminlte_lang::message.total') }}: </b><span id="matriculation-sum-total" data-value="{{ ($type == 'update' ? ( $matriculation->total != null ? $matriculation->total : 0 ) : 0) }}"> {{ ($type == 'update' ? ( $matriculation->total != null ? $Defaults->currency( $matriculation->total ) : $Defaults->currency(0) )   : $Defaults->currency(0)) }} </span>
							</span>
						</div>
					</div><!-- /.box-header -->

					<div class="box-body">
						<table id="table-matriculation-modality" class="table table-bordered table-striped">

							<thead>
								<th class="col-md-4 text-center">{{ trans('adminlte_lang::message.modality') }}</th>
								<th class="col-md-2 text-center">{{ trans('adminlte_lang::message.price_with_iva') }}</th>
								<th class="col-md-1 text-center">{{ trans('adminlte_lang::message.iva') }} (%)</th>
								<th class="col-md-2 text-center">{{ trans('adminlte_lang::message.discount') }}</th>
								<th class="col-md-2 text-center">{{ trans('adminlte_lang::message.total') }}</th>
								<th class="col-md-1 action_button"></th>
							</thead>
							{{--$m_modality = Matriculation Modality--}}
							<?php  $system = \App\System::all()->first();?>
                            @if(isset($matriculation))
                                @foreach($matriculation->modality->where('status',1) as $m_modality)
                                <tr class="m_modality-table-row" data-key="{{ $m_modality->id }}" data-total="{{ doubleval($m_modality->total + $m_modality->discount) }}">
                                    <td class="m_modality-modality" data-value="{{ $m_modality->modality_id }}" >{{ $m_modality->modality->name }}</td>
                                    <td class="m_modality-price text-center" data-value="{{ $m_modality->price }}" >{{ $Defaults->currency($m_modality->price) }}</td>
									<td class="m_modality-iva text-center" data-value="{{ $m_modality->iva }}">{{ $m_modality->iva }} %</td>
									<td class="m_modality-discount text-center" data-value="{{ $m_modality->discount }}" >{{ $Defaults->currency($m_modality->discount) }}</td>
									<td class="m_modality-total text-center" data-value="{{ $m_modality->total }}" >{{ $Defaults->currency($m_modality->total) }}</td>
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
