<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <table class="table no-border">
            <tr class="form-group form-group-sm">
                <td  class="col-lg-2 col-md-2 col-sm-3 text-right">{!! Form::label('old_password','(*) '.trans('adminlte_lang::message.old_password')) !!}</td>
                <td  class="col-lg-10 col-md-10 col-sm-9">
                    {{--<div class="form-group form-group-sm">--}}
                        <input name="old_password" type="password" value="" id="old_password" style="width: 50%;" class="form-control" required>
                    {{--</div>--}}
                </td>
            </tr>
            <tr class="form-group form-group-sm">
                <td  class="col-lg-2 col-md-2 col-sm-3  text-right">{!! Form::label('new_password','(*) '.trans('adminlte_lang::message.new_password')) !!}</td>
                <td  class="col-lg-10 col-md-10 col-sm-9">
                    {{--<div class="form-group form-group-sm">--}}
                        <input name="new_password" type="password" value="" id="new_password" style="width: 50%;" class="form-control" required>
                    {{--</div>--}}
                </td>
            </tr>
            <tr class="form-group form-group-sm">
                <td  class="col-lg-2 col-md-2 col-sm-3  text-right">{!! Form::label('confirm_new_password','(*) '.trans('adminlte_lang::message.confirm_new_password')) !!}</td>
                <td  class="col-lg-10 col-md-10 col-sm-9">
                    {{--<div class="form-group form-group-sm">--}}
                        <input name="confirm_new_password" type="password" value="" id="confirm_new_password" style="width: 50%;" class="form-control" required>
                    {{--</div>--}}
                </td>
            </tr>

            <tr>
                <td  class="col-lg-2 col-md-2 col-sm-3"> </td>
                <td  class="col-lg-10 col-md-10 col-sm-9"><a href="#" id="password-change-submit" class="btn btn-primary" style="margin-top:20px;">{{ trans('adminlte_lang::message.change_password') }}</a></td>
            </tr>
        </table>
    </div>

</div>