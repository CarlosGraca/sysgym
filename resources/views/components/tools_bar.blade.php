<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box box-success">
        <div class="box-header with-border">
            <i class="fa fa-gears"></i>
            <h3 class="box-title">{{ trans('adminlte_lang::message.tools_bar') }}</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <!-- BUTTON ADD ON MODAL -->
            <!--
                <a class="btn btn-app" data-url="{{ url('clients') }}" id="client_add_popup" data-toggle="modal">
                    <i class="fa fa-user-plus"></i> {{ trans('adminlte_lang::message.client') }}
                </a>
                <a class="btn btn-app" data-url="{{ url('employees/create') }}" id="tool_bar_button_employee" data-toggle="modal">
                    <i class="fa fa-user-plus"></i> {{ trans('adminlte_lang::message.employee') }}
                </a>
            -->
            @can('add_client')
            <!-- START BUTTON INLINE -->
            <a class="btn btn-app" href="{{ url('clients/create') }}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_client') }}">
                <i class="fa fa-user-plus"></i> {{ trans('adminlte_lang::message.client') }}
            </a>
            @endcan
            @can('add_employee')
            <a class="btn btn-app" href="{{ url('employees/create') }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_employee') }}">
                <i class="fa fa-user-plus"></i> {{ trans('adminlte_lang::message.employee') }}
            </a>
            <!-- END -->
            @endcan
            @can('view_agenda_page')
                @if(\Auth::user()->branch_id != 0)
                    <a class="btn btn-app" href="{{ url('agenda') }}">
                        <i class="fa fa-calendar"></i> {{ trans('adminlte_lang::message.agenda') }}
                    </a>
                @endif
            @endcan
            @can('view_consult_page')
            <a class="btn btn-app" href="{{ url('consult/create') }}">
                <i class="fa fa-stethoscope"></i> {{ trans('adminlte_lang::message.consult') }}
            </a>
            @endcan
            @can('view_matriculation_page')
            <a class="btn btn-app" href="{{ url('matriculation') }}">
               <i class="fa fa-file-o"> </i>  {{ trans('adminlte_lang::message.matriculation') }}
            </a>
            @endcan
            {{--<img src="{{asset('img/icon/credit-card-swipe-20.png')}} ">  <img src="{{asset('img/icon/matriculation-calculator-20.png')}}"></i>--}}
            @can('view_payment_page')
            <a class="btn btn-app" href="{{ url('payments') }}">
                <i class="fa fa-money"></i>  {{ trans('adminlte_lang::message.payments') }}
            </a>
            @endcan
            @can('view_cashier_page')
            <a class="btn btn-app">
                <i class="fa"><img src="{{asset('img/icon/caixa-20.png')}}"></i>  {{ trans('adminlte_lang::message.cashier') }}
            </a>
            @endcan
            @can('view_system_page')
            <a class="btn btn-app" href="{{ url('system') }}">
                <i class="fa fa-wrench"></i>  {{ trans('adminlte_lang::message.system') }}
            </a>
            @endcan

        </div>
        </div>
    </div>

</div>
