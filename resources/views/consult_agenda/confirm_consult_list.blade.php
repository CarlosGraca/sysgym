@if(count($agenda) == 0)
    <div class="text-center">
        <img src="{{ asset('img/no_agenda_regist.png') }}" alt="" style="margin: 20px 0;">
        <p>Congratulations! <br>All consult agenda for today is already confirmed.</p>
    </div>

@else
    @include('components.consult_agenda_list',['consult_agenda'=>$agenda,'table_name'=>'table_row_scheduled','type'=>'scheduled'])
@endif