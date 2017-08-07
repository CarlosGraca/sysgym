/**
 * Created by MS-INSYS on 14/10/2016.
 */

$(function () {

    //UPDATE SYSTEM DATA
    $(document).on('click','#update-system',function (e) {
        e.preventDefault();
        save($('#system-form'),$('#system-form')[0],'update');
    });


    $(document).on('click','#edit-system-button',function (e) {
        e.preventDefault();
        $(this).css('display', 'none');
        field_status_change('enable', $('#system-form'));
        $('#update-system').removeAttr('style');
    });

    $(document).on('change','#theme',function (e) {
        e.preventDefault();

        var my_skins = [
            "skin-blue",
            "skin-black",
            "skin-red",
            "skin-yellow",
            "skin-purple",
            "skin-green",
            "skin-blue-light",
            "skin-black-light",
            "skin-red-light",
            "skin-yellow-light",
            "skin-purple-light",
            "skin-green-light"
        ];

        var theme = $('#theme').val();

        $.each(my_skins, function (i) {
            $("body").removeClass(my_skins[i]);
        });

        $("body").addClass(theme);
    });


    $(document).on('change','#layout',function (e) {
        e.preventDefault();

       var layouts =  [
           'fixed',
           'layout-boxed',
           'layout-top-nav',
           'sidebar-collapse'
        ];

        var layout = $(this).val();

        $.each(layouts, function (i) {
            $("body").removeClass(layouts[i]);
        });

        $("body").addClass(layout);
    });


    $(document).on('click','#tool_bar_button_employee',function (e) {
        e.preventDefault();
        $('#myModalLabel').text('New Employee');
        $('#modal').modal('show')
            .find('.modal-body')
            .load($(this).data('url'));
        $('#modal').css('overflow','auto');
    });



    //SETUP SYSTEM
    $('#setup_wizard').bootstrapWizard({
        onTabShow: function(tab, navigation, index) {
            _handleTabShow(tab, navigation, index, $('#setup_wizard'));
        },
        onNext: function(tab, navigation, index) {
            var form = $('#setup_wizard').find('.form-validation-'+index);
            var valid = form.valid();

            if(!valid) {
                form.data('validator').focusInvalid();
                return false;
            }else{
                //INSERT TAB ACTIVE AND INACTIVE
                $('#setup_wizard').find('.nav li.active').next('li').removeClass('disabled');
                $('#setup_wizard').find('.nav li.active').next('li').find('a').attr("data-toggle","tab");

                //VERIFY IF YOU ARE IN THE LAST TAB
                if(index == 2){
                    $('.next').css('display','none');
                    $('.submit').css('display','block');
                }
            }
        },
        onPrevious:function (tab, navigation, index) {
            $('.next').removeAttr('style');
            $('.submit').css('display','none');
        },
        onTabChange:function (tab, navigation, index) {
            var id = $('#nav-tab').find('.active').data('key');
            if(id == 3){
                $('.next').css('display','none');
                $('.submit').css('display','block');
            }else{
                $('.next').removeAttr('style');
                $('.submit').css('display','none');
            }
        }
    });



    $(document).on('click','#send',function () {
        var company_form;
        var user_form;
        var system_form;

       // alert('submited');
        
        save($('#system-form'),$('#system-form')[0],'update');
        save($('#user-form'),$('#user-form')[0],'create');
        save($('#company-form'),$('#company-form')[0],'create');
        

        //console.log(company_form);
        //console.log(user_form);
        //console.log(system_form);

        //window.location.href = 'http://odontsoft.cv';
        // location.reload();

        reloadPage();
    });

    //NAV TAB
    $('#setup_wizard').find('.nav li').not('.active').addClass('disabled');
    $('#setup_wizard').find('.nav li').not('.active').find('a').removeAttr("data-toggle");

    //VALIDATE PASSWORD
    $('#setup_wizard').find(".form-validation-3").validate({
        rules: {
            password: {
                required: true,
                minlength: 6
            },
            password_confirmation: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            },
        }
    });

   var has_secure = $('#has_secure').val();

    if(has_secure == 1 && has_secure != undefined){
        $('#secure_card').css('display','block');
    }else{
        $('#secure_card').css('display','none');
    }

    var menu = localStorage.getItem('menu');



    if(menu != undefined){
        // console.log(menu);
        if(menu == 'active'){
            $('body').addClass('sidebar-collapse');
        }else{
            $('body').removeClass('sidebar-collapse');
        }
    }

    $('.sidebar-toggle').on('click',function () {
        if($('body').hasClass('sidebar-collapse')){
            localStorage.setItem('menu','inactive');
        }else{
            localStorage.setItem('menu','active');
        }
    });

    $(document).on('change','#has_secure',function () {
        if($(this).val() == 1){
            $('#secure_card').css('display','block');
        }else{
            $('#secure_card').css('display','none');
        }
    });

    //ABOUT SYSTEM MODAL POPUP
    $(document).on('click','#about_system',function (e) {
        e.preventDefault();

        $('#myModalLabel').html('<i class="fa fa-info-circle"></i> ');
        $('#myModalLabel').append($(this).text());
        $('#modal').modal('show')
            .find('.modal-body')
            .load($(this).data('url'));
        $('#modal').css('overflow','auto');
    });

    $(".carousel").carousel();

    $(window).resize(function () {
        $(".carousel").carousel();
    });


});

function changeBackground(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.content-wrapper').css('background','url(\''+e.target.result+'\') no-repeat center center fixed');
            $('.layout-boxed').css('background','url(\''+e.target.result+'\') no-repeat center center fixed');

        }
        reader.readAsDataURL(input.files[0]);
    }
}

//Validation
function _handleTabShow(tab, navigation, index, wizard){
    var total = navigation.find('li').length;
    var current = index + 0;
    var percent = (current / (total - 1)) * 100;
    // var percentWidth = 100 - (100 / total) + '%';

    if(current == 1){
        $('.next').removeClass('disabled');
    }

    navigation.find('li').removeClass('done');
    navigation.find('li.active').prevAll().addClass('done');

    wizard.find('.progress-bar').css({width: percent + '%'}).text(percent + '%');
    $('.form-wizard-horizontal').find('.progress').css({'width': '100%'});
}

