<div class="row">
    <div class="col-md-12 text-center">
        <div class="col-lg-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title with-border text-center">
                        <i class="fa fa-camera"></i> <span>{{ trans('adminlte_lang::message.camera') }}</span>
                    </h3>
                </div>
                <div class="box-body" style="padding: 2px;">
                    <div id="my_camera"></div>
                </div>
                <div class="box-footer text-center">
                    <a class="btn btn-primary" onclick="take_snapshot()"><i class="fa fa-camera-retro"></i> {{ trans('adminlte_lang::message.snapshot') }} </a>
                </div>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title with-border text-center">
                        <i class="fa fa-photo"></i> <span>{{ trans('adminlte_lang::message.photo') }}</span>
                    </h3>
                </div>
                <div class="box-body" style="padding: 2px; min-height: 250px;">
                    <div id="results"></div>
                </div>
                <div class="box-footer text-center">
                    <a class="btn btn-success" id="save-snapshot"><i class="fa fa-save"></i> {{ trans('adminlte_lang::message.save') }} </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
//   Configure a few settings and attach camera
    Webcam.set({
        width: 250,
        height: 250,
        image_format: 'png',
        jpeg_quality: 90,
    });
    Webcam.attach('#my_camera');

//    Code to handle taking the snapshot and displaying it locally
    function take_snapshot() {
        // take snapshot and get image data
        Webcam.snap( function(data_uri) {
            // display results in page
            $('#results').html('<img src="'+data_uri+'" id="capture_image"/>');
        } );
    }

    $(function(){

        $(document).on('click','#save-snapshot',function(e){
            e.preventDefault();
            var photo = $('#capture_image');

            if(photo[0] != undefined){
                $(".avatar-crop").attr('src',photo.attr('src'));
                $('#avatar_crop').val(photo.attr('src'));
                $('#avatar_type').val('capture');
                $('#modal-md').modal('hide');
            }else{
                alert('no photo captured');
            }
        });

    });

</script>
