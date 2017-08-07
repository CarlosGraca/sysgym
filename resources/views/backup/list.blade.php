@inject('Defaults', 'App\Http\Controllers\Defaults')

<table id="table-backup" class="table table-bordered table-responsive table-design">
    <thead>
    <tr>
        <th class="col-md-5">{{ trans('adminlte_lang::message.name') }}</th>
        <th class="col-md-2 text-center">{{ trans('adminlte_lang::message.size') }}</th>
        <th class="col-md-2 text-center">{{ trans('adminlte_lang::message.create_time') }}</th>
        <th class="col-md-2 text-center">{{ trans('adminlte_lang::message.modified_time') }}</th>
        <th class="col-md-1"></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($backups as $backup)
        <tr>
            <td>{{ $backup['name'] }}</td>
            <td class="text-center">{{ $Defaults->human_filesize($backup['size']) }}</td>
            <td class="text-center"><a data-toggle="tooltip" title="{{ $backup['create_time'] }}">{{ Carbon\Carbon::parse( $backup['create_time'] )->diffForHumans() }} </a></td>
            <td class="text-center"><a data-toggle="tooltip" title="{{ $backup['modified_time'] }}">{{ Carbon\Carbon::parse( $backup['modified_time'])->diffForHumans() }}</a></td>
            <td class="text-center">
                {{--@can('download_backup')--}}
                <a href="{{ url('backups/'.$backup['name'].'/download') }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.download') }}">
                    <i class="fa fa-cloud-download"></i>
                </a>
                {{--@endcan--}}
{{--                @can('restore_backup')--}}
                <a href="#restore-backup" data-url="{{ url('backups/restore') }}" id="restore-backup" data-type="{{ trans('adminlte_lang::message.restore') }}" data-form="{{ trans('adminlte_lang::message.database_backup') }}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.restore') }}"  data-key="{{ $backup['id'] }}" data-name="{{ $backup['name'] }}" data-message="{{ trans('adminlte_lang::message.remove_info') }}">
                    <i class="glyphicon glyphicon-import"></i>
                </a>
                {{--@endcan--}}
{{--                @can('remove_backup')--}}
                <a href="#remove-backup" data-url="{{ url('backups/remove') }}" style="color: #dd4b39" data-toggle="tooltip" id="remove-backup" title="{{ trans('adminlte_lang::message.remove') }}" data-key="{{ $backup['id'] }}" data-name="{{ $backup['name'] }}" data-message="{{ trans('adminlte_lang::message.remove_info') }}">
                    <i class="fa fa-trash"></i>
                </a>
                {{--@endcan--}}
            </td>

        </tr>
    @endforeach
    <tbody>
</table>

<script>
//    $(function () {
        @if($type == 'load')
            $('#table-backup').DataTable({
                "colVis": {
                    "buttonText": "Columns",
                    "overlayFade": 0,
                    "align": "right"
                },
                "language": {
                    "lengthMenu": '_MENU_ {{  trans('adminlte_lang::message.entries_per_page') }} ',
                    "search": '{{  trans('adminlte_lang::message.search') }}',
                    "paginate": {
                        "previous": '<i class="fa fa-angle-left"></i>',
                        "next": '<i class="fa fa-angle-right"></i>'
                    },
                    "emptyTable": "{{  trans('adminlte_lang::message.no_data_available') }}",
                }
            });
        @endif
//    });

</script>