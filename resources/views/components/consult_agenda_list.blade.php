<div class="box-body slimscroll table-responsive no-padding">
    <table id="table-consult_agenda" class="table table-hover table-responsive">

        <tbody>
        @foreach ($consult_agenda as $agenda)
            <tr class="{{ $table_name }}" data-key="{{ $agenda->id }}" data-date="{{ $agenda->date }}">
                <td class="col-md-6">

                    <div class="user-panel">
                        <div class="pull-left image">
                            <img  src="{{ asset($agenda->client_avatar) }}" class="list_image" alt="Cinque Terre" style="max-height: 50px; max-width: 50px; min-height: 50px; min-width: 50px;">
                        </div>
                        <div class="pull-left info">
                            <p>
                                <a class="users-list-name" href="{{ route('clients',$agenda->client_id) }}" data-toggle="tooltip"  data-placement="bottom" title="{{ $agenda->client }}" style="margin-bottom: 5px;" >{{ $agenda->client }}</a>
                                <a href="tel:{{ $agenda->mobile  }}" style="color: rgba(0, 0, 0, 0.51); " ><i class="fa fa-mobile"></i> {{ $agenda->mobile  }} /</a>  <a href="tel:{{ $agenda->phone }}" style="color: rgba(0, 0, 0, 0.51); " ><i class="fa fa-phone"></i> {{ $agenda->phone  }}</a>
                                <br>
                                <a href="#" style="color: rgba(0, 0, 0, 0.51);  margin-top:15px;" ><i class="fa fa-at"></i> {{ $agenda->email  }}</a>
                            </p>
                            <!-- Status -->
                        </div>
                    </div>

                </td>

                <td class="col-md-3">
                    <div class="user-panel">
                        <div class="text-center">
                            <p>
                                <a class="users-list-name" href="#" data-toggle="tooltip"  data-placement="bottom" title="{{ \Carbon\Carbon::parse($agenda->date)->diffForHumans() }}" >{{ \Carbon\Carbon::createFromFormat('Y-m-d', $agenda->date)->format('d/m/Y') }} @if($type == 'scheduled')  {{ $agenda->starttime }} - {{ $agenda->endtime }} @endif</a>
                                <span style="color: rgba(0, 0, 0, 0.51); display: block; white-space: nowrap; text-overflow: ellipsis;">
								  {{ trans('adminlte_lang::message.by') }} <a href="#" style=" color: rgba(0, 0, 0, 0.51);"  data-toggle="tooltip"  data-placement="top" title="{{ $agenda->user_name  }}" >{{ $agenda->user_name  }}</a>
								</span>
                            </p>
                            <!-- Status -->
                        </div>
                    </div>
                </td>

                <td class="col-md-3">
                    <div class="user-panel">
                        <div class="pull-right text-center">
                            <div class="btn-group">

                                <a href="#!view" data-url="{{ route('consult_agenda.show',$agenda->id) }}" data-toggle="tooltip"  data-title="{{ trans('adminlte_lang::message.details_consult_agenda') }}" data-placement="left" class="show-agenda-modal" title="{{ trans('adminlte_lang::message.view') }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                @if($type == 'scheduled')
                                    <a href="#!confirm" data-toggle="tooltip" data-placement="left"  data-key="{{ $agenda->id }}" id="agenda_confirm" title="{{ trans('adminlte_lang::message.confirm') }}">
                                        <i class="fa fa-check"></i>
                                    </a>

                                    <a href="#!edit" data-url="{{ route('consult_agenda.edit',$agenda->id) }}" data-placement="left" class="show-agenda-modal" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" data-title="{{ trans('adminlte_lang::message.update_consult_agenda') }}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="#!cancel" data-toggle="tooltip" data-placement="left"  data-key="{{ $agenda->id }}" id="agenda_cancel" title="{{ trans('adminlte_lang::message.cancel') }}">
                                        <i class="fa fa-ban"></i>
                                    </a>

                                @else
                                    <a href="#!re-agenda" data-toggle="tooltip" data-placement="left"  data-key="{{ $agenda->id }}" data-date="{{ $agenda->date }}" id="agenda_re_agenda" title="{{ trans('adminlte_lang::message.re_agenda') }}">
                                        <i class="fa fa-repeat"></i>
                                    </a>
                                @endif


                                <a href="#!notification" data-toggle="tooltip" data-placement="left" data-key="{{ $agenda->id }}" id="agenda_notificate" title="{{ trans('adminlte_lang::message.send_notification') }}">
                                    <i class="fa fa-send"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        <tbody>

    </table>
</div>