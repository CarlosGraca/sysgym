@if(count($canceled) == 0)
    <div class="text-center">
        <img src="{{ asset('img/no_agenda_regist.png') }}" alt="" style="margin: 20px 0;">
        <p>Congratulations! <br>No Consult Canceled.</p>
    </div>

@else
    @include('components.consult_agenda_list',['consult_agenda'=>$canceled,'table_name'=>'table_row_cancel','type'=>'cancel'])
@endif