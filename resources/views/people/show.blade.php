<!-- PERSONAL INFORMATION -->
<div class="row">
    <span ><strong class="title"> <i class="fa fa-id-card-o"></i> {{ trans('adminlte_lang::message.personal_information') }}</strong></span>
    <hr class="h-divider" >

    @if($setting['photo'] == true)
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-2" style="margin-top: 10px;">
            <img class="thumbnail avatar" src="{{ asset($people->avatar) }}" style="max-width: 100%; margin: 0 auto;">
        </div>
    @endif

    <div class="@if($setting['photo'] == true) col-lg-5 col-md-5 @else col-lg-6 col-md-6 @endif col-sm-6 @if($setting['report'] == true) col-xs-5 @endif">
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item" style="border-top:none;">
                <i class="fa fa-user"></i>  <b>{{ trans('adminlte_lang::message.name') }}: </b>
                <a> {{ $people->name }} </a>
            </li>
            <li class="list-group-item">
                <i class="fa fa-venus-mars"></i>  <b>{{ trans('adminlte_lang::message.genre') }}: </b>
                <a> {{trans('adminlte_lang::message.'.$people->genre)}} </a>
            </li>
            <li class="list-group-item">
                <i class="fa fa-heart"></i>  <b>{{ trans('adminlte_lang::message.civil_state') }}: </b>
                <a>{{ trans('adminlte_lang::message.'.$people->civil_state.'') }}</a>
            </li>
            <li class="list-group-item">
                <i class="fa fa-birthday-cake"></i>  <b>{{ trans('adminlte_lang::message.birthday') }}: </b>
                <a>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $people->birthday)->format('d/m/Y') }}</a>
            </li>
        </ul>
    </div>

    <div class="@if($setting['photo'] == true) col-lg-5 col-md-5 @else col-lg-6 col-md-6 @endif col-sm-6 @if($setting['report'] == true) col-xs-5 @endif">
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item" style="border-top:none;">
                <i class="fa fa-id-card"></i>  <b>{{ trans('adminlte_lang::message.nationality') }}: </b>
                <a> {{ $people->nationality }} </a>
            </li>
            <li class="list-group-item">
                <i class="fa fa-vcard-o"></i>  <b>{{ trans('adminlte_lang::message.bi') }}: </b>
                <a> {{$people->bi}} </a>
            </li>
            <li class="list-group-item">
                <i class="fa fa-vcard-o"></i>  <b>{{ trans('adminlte_lang::message.nif') }}: </b>
                <a>{{ $people->nif }}</a>
            </li>
            <li class="list-group-item">
                <i class="fa fa-users"></i>  <b>{{ trans('adminlte_lang::message.parents') }}: </b>
                <a>{{  $people->parents }}</a>
            </li>
        </ul>
    </div>
</div>

@if($setting['contact'] == true)

    <!-- CONTACT INFORMATION -->
    <div class="row">
        <span ><strong class="title"> <i class="fa fa-phone"></i> {{ trans('adminlte_lang::message.contact_information') }}</strong></span>
        <hr class="h-divider" >
        <div class="col-lg-6 col-md-6 col-sm-6 @if($setting['report'] == true) col-xs-6 @endif">
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item" style="border-top:none;">
                    <i class="fa fa-map-marker"></i>  <b>{{ trans('adminlte_lang::message.address') }}: </b>
                    <a> {{ $people->address }}, {{ $people->city }} </a>
                </li>
                <li class="list-group-item">
                    <i class="fa fa-at"></i>  <b>{{ trans('adminlte_lang::message.email') }}: </b>
                    <a> {{$people->email }} </a>
                </li>
                <li class="list-group-item">
                    <i class="fa fa-phone"></i>  <b>{{ trans('adminlte_lang::message.phone') }}: </b>
                    <a>{{ $people->phone }}</a>
                </li>
                <li class="list-group-item">
                    <i class="fa fa-mobile"></i>  <b>{{ trans('adminlte_lang::message.mobile') }}: </b>
                    <a>{{ $people->mobile}}</a>
                </li>
            </ul>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 @if($setting['report'] == true) col-xs-6 @endif">
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item" style="border-top:none;">
                    <i class="fa fa-id-card"></i>  <b>{{ trans('adminlte_lang::message.zip_code') }}: </b>
                    <a> {{ $people->zip_code }} </a>
                </li>
                <li class="list-group-item">
                    <i class="fa fa-globe"></i>  <b>{{ trans('adminlte_lang::message.website') }}: </b>
                    <a> {{$people->website}} </a>
                </li>
                <li class="list-group-item">
                    <i class="fa fa-facebook-official"></i>  <b>{{ trans('adminlte_lang::message.facebook') }}: </b>
                    <a>{{ $people->facebook }}</a>
                </li>
                {{--<li class="list-group-item">--}}
                    {{--<i class="fa fa-shield"></i>  <b>{{ trans('adminlte_lang::message.has_secure') }}: </b>--}}
                    {{--<a>{{  $people->has_secure == 1 ? trans('adminlte_lang::message.yes') : trans('adminlte_lang::message.not') }}</a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>

@endif

@if($setting['work'] == true)
    <!-- WORK INFORMATION -->
    <div class="row">
        <span ><strong class="title"> <i class="fa fa-briefcase"></i> {{ trans('adminlte_lang::message.work_information') }}</strong></span>
        <hr class="h-divider" >
        @if($setting['type_people'] == 'employee')

            <div class="col-lg-6 col-md-6 col-sm-6 @if($setting['report'] == true) col-xs-6 @endif">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <i class="fa fa-info"></i>  <b>{{ trans('adminlte_lang::message.branch_name') }}: </b>
                        <a> {{ $people->branch->name }} </a>
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-map-marker"></i>  <b>{{ trans('adminlte_lang::message.address') }}: </b>
                        <a> {{ $people->branch->address }} </a>
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-phone"></i>  <b>{{ trans('adminlte_lang::message.work_phone') }}: </b>
                        <a> {{ $people->branch->phone }} </a>
                    </li>
        
                    <li class="list-group-item">
                        <i class="fa fa-quote-left"></i>  <b>{{ trans('adminlte_lang::message.note') }}: </b>
                        <a> {{ $people->note }} </a>
                    </li>
                </ul>
            </div>
    
            <div class="col-lg-6 col-md-6 col-sm-6 @if($setting['report'] == true) col-xs-6 @endif">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <i class="fa fa-user-md"></i>  <b>{{ trans('adminlte_lang::message.category') }}: </b>
                        <a> {{$people->category->name }} </a>
                    </li>
        
                    <li class="list-group-item">
                        <i class="fa fa-calendar"></i>  <b>{{ trans('adminlte_lang::message.start_work') }}: </b>
                        <a> {{ \Carbon\Carbon::createFromFormat('Y-m-d', $people->start_work)->format('d/m/Y') }} </a>
                    </li>
        
                    <li class="list-group-item">
                        <i class="fa fa-calendar"></i>  <b>{{ trans('adminlte_lang::message.end_work') }}: </b>
                        <a> {{ \Carbon\Carbon::createFromFormat('Y-m-d', $people->end_work)->format('d/m/Y') }} </a>
                    </li>
                </ul>
            </div>
        @endif

        @if($setting['type_people'] == 'client')
            <div class="col-lg-6 col-md-6 col-sm-6 @if($setting['report'] == true) col-xs-6 @endif">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <i class="fa fa-map-marker"></i>  <b>{{ trans('adminlte_lang::message.address') }}: </b>
                        <a> {{ $people->work_address }} </a>
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-briefcase"></i>  <b>{{ trans('adminlte_lang::message.profession') }}: </b>
                        <a> {{$people->profession }} </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 @if($setting['report'] == true) col-xs-6 @endif">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <i class="fa fa-phone"></i>  <b>{{ trans('adminlte_lang::message.work_phone') }}: </b>
                        <a> {{ $people->work_phone }} </a>
                    </li>
                </ul>
            </div>
        @endif
    </div>    
@endif


