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
                <a class="btn btn-app" data-url="{{ url('patients/create') }}" id="tool_bar_button_patients" data-toggle="modal">
                    <i class="fa fa-user-plus"></i> {{ trans('adminlte_lang::message.patient') }}
                </a>
                <a class="btn btn-app" data-url="{{ url('employees/create') }}" id="tool_bar_button_employee" data-toggle="modal">
                    <i class="fa fa-user-plus"></i> {{ trans('adminlte_lang::message.employee') }}
                </a>
            -->
            <!-- START BUTTON INLINE -->
            <a class="btn btn-app" href="{{ url('patients/create') }}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_patient') }}">
                <i class="fa fa-user-plus"></i> {{ trans('adminlte_lang::message.patient') }}
            </a>
            <a class="btn btn-app" href="{{ url('employees/create') }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_employee') }}">
                <i class="fa fa-user-plus"></i> {{ trans('adminlte_lang::message.employee') }}
            </a>
            <!-- END -->

            <a class="btn btn-app" href="{{ url('agenda') }}">
                <i class="fa fa-calendar"></i> {{ trans('adminlte_lang::message.agenda') }}
            </a>

            <a class="btn btn-app" href="{{ url('consult/create') }}">
                <i class="fa fa-stethoscope"></i> {{ trans('adminlte_lang::message.consult') }}
            </a>

            <a class="btn btn-app" href="{{ url('budget/create') }}">
               <i class="fa"><img src="{{asset('img/icon/budget-calculator-20.png')}}"></i>  {{ trans('adminlte_lang::message.budget') }}
            </a>

            <a class="btn btn-app">
                <i class="fa"><img src="{{asset('img/icon/credit-card-swipe-20.png')}}"></i>  {{ trans('adminlte_lang::message.payments') }}
            </a>

            <a class="btn btn-app">
                <i class="fa"><img src="{{asset('img/icon/caixa-20.png')}}"></i>  {{ trans('adminlte_lang::message.cashier') }}
            </a>

            <a class="btn btn-app" href="{{ url('system') }}">
                <i class="fa fa-wrench"></i>  {{ trans('adminlte_lang::message.system') }}
            </a>

        </div>
        </div>
    </div>

</div>
