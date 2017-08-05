{!! Form::hidden('employee_id', ($type == 'update' ? $employee->id : null), ['class'=>'form-control','id'=>'employee_id']) !!}
{!! Form::hidden('employee_category_id', ($type == 'update' ? $employee->id : null), ['class'=>'form-control','id'=>'employee_category_id']) !!}
{!! Form::hidden('avatar_crop', null , ['class'=>'form-control','id'=>'avatar_crop']) !!}

@include('people.form',['people'=>(isset($employee) ? $employee : null),'type'=>$type,'type_form'=>'employee'])

<div class="row">
	<span ><strong class="title">{{ trans('adminlte_lang::message.work_information') }}</strong></span>
	<hr class="h-divider" >
	<div class="col-lg-12 no-padding">
		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				{!! Form::label('category',trans('adminlte_lang::message.category') ) !!}
				{!! Form::text('category', ($type == 'update' ? $employee->category->name : null) , ['class'=>'form-control','id'=>'category', 'placeholder' => trans('adminlte_lang::message.category')]) !!}

				{{--{!! Form::select('category', $category, ($type == 'update' ? $employee->category_id : null) , ['class'=>'form-control','id'=>'category', 'placeholder' => ' (SELECT CATEGORY) ']) !!}--}}
			</div>
		</div>

		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				{!! Form::label('salary',trans('adminlte_lang::message.salary') ) !!}
				{!! Form::number('salary', ($type == 'update' ? $employee->salary : null) , ['class'=>'form-control']) !!}
			</div>
		</div>

		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				{!! Form::label('branch','(*) '.trans('adminlte_lang::message.branch') ) !!}
				{!! Form::select('branch', $branches, ($type == 'update' ? $employee->branch_id : null) , ['class'=>'form-control','id'=>'branch','placeholder' => ' (SELECT BRANCH) ']) !!}
			</div>
		</div>

		{{--<div class="col-lg-3 col-md-4 col-sm-6">--}}
			{{--<div class="form-group form-group-sm">--}}
				{{--{!! Form::label('doctor_check',trans('adminlte_lang::message.doctor') ) !!}--}}
				{{--{!! Form::select('doctor_check',[0 =>trans('adminlte_lang::message.not'), 1 =>trans('adminlte_lang::message.yes') ], ($type == 'update' ? $employee->doctor : null) , ['class'=>'form-control','id'=>'doctor_check']) !!}--}}
			{{--</div>--}}
		{{--</div>--}}
	</div>
	<div class="col-lg-12 no-padding">
		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				{!! Form::label('start_work', trans('adminlte_lang::message.start_work') ) !!}
				{!! Form::date('start_work', ($type == 'update' ? $employee->start_work : \Carbon\Carbon::now()->subDay(0)->format('Y-m-d')) , ['class'=>'form-control']) !!}
			</div>
		</div>

		<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				{!! Form::label('end_work', trans('adminlte_lang::message.end_work') ) !!}
				{!! Form::date('end_work', ($type == 'update' ? $employee->end_work : \Carbon\Carbon::now()->subDay(0)->format('Y-m-d')) , ['class'=>'form-control']) !!}
			</div>
		</div>

		<div class="col-lg-6 col-md-4 col-sm-6">
			<div class="form-group form-group-sm">
				{!! Form::label('note', trans('adminlte_lang::message.note') ) !!}
				{!! Form::textarea('note', ($type == 'update' ? $employee->note : null) , ['class'=>'form-control']) !!}
			</div>
		</div>
	</div>
</div>

{{--@include('secure_card.form')--}}