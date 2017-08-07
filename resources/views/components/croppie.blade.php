{{--CROPPIE PLUGIN--}}
<script src="{{ asset('/plugins/croppie/css/bootstrap-3.min.css') }}"></script>
<link rel="stylesheet" href="{{ asset('/plugins/croppie/css/croppie.css') }}">


    <div class="row">
        <div class="col-md-12">
            <div id="upload-demo"  data-type="{{ $type }}" data-src="{{ $src }}"></div>
        </div>
        <div class="col-md-12 text-center">
            <button class="btn btn-success upload-result"><i class="fa fa-crop"></i> Crop </button>
        </div>
    </div>

<script type="text/javascript">
    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: 250,
            height: 250,
            type: 'squad'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $uploadCrop.croppie('bind', {
        url: $('#upload-demo').attr('data-src')
    }).then(function(){
        console.log('jQuery bind complete');
    });

    $('.upload-result').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
            $(".avatar-crop").attr('src',resp);
            $('#avatar_crop').val(resp);
            $('#avatar_type').val('upload');
            $('#croppie_modal').modal('hide');
        });
    });

</script>