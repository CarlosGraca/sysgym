<?php
    $file_extension = ['jpeg', 'jpg', 'gif', 'png'];

?>

<div class="row">
    <div class="col-lg-12" style="text-align: justify;">

        @if(in_array($file->media_type,$file_extension))
            <img src="{{ url($file->full_path) }}" class="profile-user-img img-responsive preview-image" title="" alt="{{ $file->name_original }}"
            style="width: auto; height: auto;">
        @elseif($file->media_type == 'pdf')
            <div class='embed-responsive' style='padding-bottom:55%'>
                <object data='{{ url($file->full_path) }}' type='{{ $file->mime_type }}' width='100%' height='100%' id="preview"></object>
            </div>
        @endif
    </div>
</div>
