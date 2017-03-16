/**
 * Created by MS-INSYS on 23/02/2017.
 */

$(function () {

    $('#add-file').click(function () {
        var _file = $(':file');
        //console.log(_file.val());

        if(_file.val() == ''){
            toastr.error('no file browsed',{timeOut: 5000} ).css("width","500px");
        }else if($('#file_type').val() == ''){
            toastr.error('no type file selected',{timeOut: 5000} ).css("width","500px");
        }else{
            save($('#files-form'), $('#files-form')[0], 'create');
        }
    });

    $(document).on('click','.file-preview',function () {
        $('#modal').css('overflow','auto');
        console.log(($(window).height() - 100));
        $('#modal').find('.modal-content').css('height',($(window).height() - 100)+'px');
        $('#modal').find('#myModalLabel').html('<i class="fa fa-eye"></i> ');
        $('#modal').find('#myModalLabel').append($(this).data('original-title'));

        $('#modal').find('.modal-body').load($(this).data('url'));
        var footer_html = $('#modal').find('.modal-body').find('#app_footer').html();
        $('#modal').find('.modal-footer').html(footer_html);

       // $('#modal').find('.modal-body').find('.preview-image').attr('style','max-height: 100%;height: 400px; width: auto; margin: 0 auto; z-index: -1;');


        $('#modal').modal();



        $('#modal').find('.modal-body').slimScroll({
            height: ($(window).height()-200)
        });
        $('#modal').find('.slimScrollDiv').attr('style','overflow: auto; height: '+($(window).height()-200)+'px;');

    });

    $(document).on('click','.file-remove',function () {
        var _alert = confirm('Are you sure?');
        var _tr_element = $(this).parent().parent();

       // $('#confirmDelete').modal();

        //console.log(_tr_element);
        if (_alert){
           // remove_table_schedule_data(_element);
            $.get($(this).attr('data-url'),function (data) {
                console.log(_tr_element);
                _tr_element.remove();
                toastr.success(data.message,{timeOut: 5000} ).css("width","300px");
            },"json");
        }

    });
    
});


function file_table_data(value) {
    var table = $('#table-documents');

    /*
    *  <tr class="file_document" data-key="{{ $pfile->file->id }}">
     <td class="name_original"><a href="#">{{$pfile->file->name_original}} </a> </td>
     <td style="text-align: center" class="media_type">{{$pfile->file->media_type}}</td>
     <td>
     <a href="#" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.view') }}" class="file-preview" data-url="{{ url('files') }}/{{$pfile->file->id}}/preview" style="visibility: {{ $pfile->file->media_type != 'doc' ? 'visible':'hidden' }};"><i class="fa fa-eye"></i>
     </a>
     <a href="{{ url('files') }}/{{$pfile->file->id}}/download" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.download') }}" ><i class="fa fa-download"></i>
     </a>
     <a href="#" data-url="{{ url('files') }}/{{$pfile->file->id}}/remove" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.remove') }}" class="file-remove"><i class="fa fa-trash"></i>
     </a>
     </td>
     </tr>
    * 
    * */

    table.append(
        '<tr class="file_document" data-key="' + value["id"] + '">' +
        '<td class="name_original">' + value["name_original"] + '</td>' +
        '<td class="media_type" style="text-align: center" >' + value["media_type"] + '</td>' +
        '<td class="action_button"> ' +
            '<a href="#!preview" class="file-preview" data-url="'+_file_url+'/'+value["id"]+'/preview" data-toggle="tooltip" title="'+_view_text+'" style="visibility: ' + (value["media_type"] != "doc" ? "visible" : "hidden") +';" ><i class="fa fa-eye"></i></a> ' +
            '<a href="'+_file_url+'/'+value["id"]+'/download" class="edit_schedule" data-toggle="tooltip" title="'+_download_text+'"><i class="fa fa-download"></i></a> ' +
            '<a href="#!remove" class="file-remove" data-url="'+_file_url+'/'+value["id"]+'/remove" data-toggle="tooltip" title="'+_remove_text+'"><i class="fa fa-trash"></i></a> ' +
        '</td>' +
        '</tr>'
    );
}