<div class='box-body'>
	<div class ='form-group'>
		{{ Form::label('first_name', trans('labels.backend.tempones.first_name'), ['class' => 'col-lg-2 control-label required']) }}
			<div class='col-lg-10'>
				{{Form::text('first_name', null,['class' => 'form-control box-size','placeholder' => trans('labels.backend.tempones.first_name'),'required'    => 'required', ]) }}
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('last_name', trans('labels.backend.tempones.last_name'), ['class' => 'col-lg-2 control-label ']) }}
			<div class='col-lg-10'>
				{{Form::text('last_name', null,['class' => 'form-control box-size','placeholder' => trans('labels.backend.tempones.last_name'), ]) }}
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('age', trans('labels.backend.tempones.age'), ['class' => 'col-lg-2 control-label required']) }}
			<div class='col-lg-10'>
				{{Form::text('age', null,['class' => 'form-control box-size','placeholder' => trans('labels.backend.tempones.age'),'required'    => 'required', ]) }}
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('comment', trans('labels.backend.tempones.comment'), ['class' => 'col-lg-2 control-label ']) }}
			<div class='col-lg-10'>
				{{Form::textarea('comment', null,['class' => 'form-control','placeholder' => trans('labels.backend.tempones.comment'), 'rows' => 2]) }}
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('dropdown', trans('labels.backend.tempones.dropdown'), ['class' => 'col-lg-2 control-label required']) }}
			<div class='col-lg-4'>
				{{Form::select('dropdown',['Option1','Option2','Option3'], null,['class' => 'form-control select2 status box-size','placeholder' => trans('labels.backend.tempones.dropdown'),'required'    => 'required', ]) }}
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('explaination', trans('labels.backend.tempones.explaination'), ['class' => 'col-lg-2 control-label required']) }}
			<div class='col-lg-10'>
				{{Form::textarea('explaination', null,['class' => 'form-control','placeholder' => trans('labels.backend.tempones.explaination'), 'rows' => 2]) }}
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('gender', trans('labels.backend.tempones.gender'), ['class' => 'col-lg-2 control-label required']) }}
			<div class='col-lg-4'>
				{{Form::select('gender',['Male','Female'], null,['class' => 'form-control select2 status box-size','placeholder' => trans('labels.backend.tempones.gender'),'required'    => 'required', ]) }}
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('associated_roles', trans('labels.backend.tempones.associated_roles'), ['class' => 'col-lg-2 control-label required']) }}
			<div class='col-lg-4'>
<div>
	<label for='administrator' class='control control--radio'>
            <input type='radio' value='administrator' name='associated_roles' id='administrator' class='get-role-for-permissions'
            {{ @$tempone->associated_roles == 'administrator' ? 'checked' : ''  }}
            /> Administrator
            	<div class='control__indicator'></div>

            </label>
	<label for='executive' class='control control--radio'>
            <input type='radio' value='executive' name='associated_roles' id='executive' class='get-role-for-permissions'
            {{ @$tempone->associated_roles == 'executive' ? 'checked' : ''  }}
            /> Executive
            	<div class='control__indicator'></div>

            </label>
	<label for='user' class='control control--radio'>
            <input type='radio' value='user' name='associated_roles' id='user' class='get-role-for-permissions'
            {{ @$tempone->associated_roles == 'user' ? 'checked' : ''  }}
            /> User
            	<div class='control__indicator'></div>

            </label>
</div>
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('dataone', trans('labels.backend.tempones.dataone'), ['class' => 'col-lg-2 control-label ']) }}
			<div class='col-lg-4'>
@if(!empty($tempone->dataone))
                {{ Form::text('dataone', \Carbon\Carbon::parse($tempone->dataone)->format('m/d/Y h:i a'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.blogs.publish'),  'id' => 'dataone']) }}
            @else
                {{ Form::text('dataone', null, ['class' => 'form-control dataone box-size', 'placeholder' => trans('validation.attributes.backend.blogs.publish'),  'id' => 'dataone']) }}
            @endif			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('datetwo', trans('labels.backend.tempones.datetwo'), ['class' => 'col-lg-2 control-label required']) }}
			<div class='col-lg-4'>
@if(!empty($tempone->datetwo))
                {{ Form::text('datetwo', \Carbon\Carbon::parse($tempone->datetwo)->format('m/d/Y h:i a'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.blogs.publish'), 'required'    => 'required', 'id' => 'datetwo']) }}
            @else
                {{ Form::text('datetwo', null, ['class' => 'form-control datetwo box-size', 'placeholder' => trans('validation.attributes.backend.blogs.publish'), 'required'    => 'required', 'id' => 'datetwo']) }}
            @endif			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('datethree', trans('labels.backend.tempones.datethree'), ['class' => 'col-lg-2 control-label ']) }}
			<div class='col-lg-4'>
@if(!empty($tempone->datethree))
                {{ Form::text('datethree', \Carbon\Carbon::parse($tempone->datethree)->format('m/d/Y h:i a'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.blogs.publish'),  'id' => 'datethree']) }}
            @else
                {{ Form::text('datethree', null, ['class' => 'form-control datethree box-size', 'placeholder' => trans('validation.attributes.backend.blogs.publish'),  'id' => 'datethree']) }}
            @endif			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('profile_pic', trans('labels.backend.tempones.profile_pic'), ['class' => 'col-lg-2 control-label ']) }}
			<div class='col-lg-10'>
		@if(!empty($Tempone->profile_pic))
			<div class='col-lg-1'>
				<img src='<?php echo Storage::url('img/tempones/'.$Tempone->profile_pic); ?>' height='80' width='80'>
			</div>
		<div class='col-lg-5'>
			<div class='custom-file-input'>
				<input type='file' name='profile_pic' id='file-1' class='inputfile inputfile-1' data-multiple-caption='{count} files selected' />
			<label for='file-1'><i class='fa fa-upload'></i><span>Choose a file</span></label>
			</div>
		</div>
		@else
		<div class='col-lg-5'>
			<div class='custom-file-input'>
				<input type='file' name='profile_pic' id='file-1' class='inputfile inputfile-1' data-multiple-caption='{count} files selected' />
			<label for='file-1'><i class='fa fa-upload'></i><span>Choose a file</span></label>
			</div>
		</div>
		@endif
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('profile_img', trans('labels.backend.tempones.profile_img'), ['class' => 'col-lg-2 control-label ']) }}
			<div class='col-lg-10'>
		@if(!empty($Tempone->profile_img))
			<div class='col-lg-1'>
				<img src='<?php echo Storage::url('img/tempones/'.$Tempone->profile_img); ?>' height='80' width='80'>
			</div>
		<div class='col-lg-5'>
			<div class='custom-file-input'>
				<input type='file' name='profile_img' id='file-1' class='inputfile inputfile-1' data-multiple-caption='{count} files selected' />
			<label for='file-1'><i class='fa fa-upload'></i><span>Choose a file</span></label>
			</div>
		</div>
		@else
		<div class='col-lg-5'>
			<div class='custom-file-input'>
				<input type='file' name='profile_img' id='file-1' class='inputfile inputfile-1' data-multiple-caption='{count} files selected' />
			<label for='file-1'><i class='fa fa-upload'></i><span>Choose a file</span></label>
			</div>
		</div>
		@endif
			</div><!--col-lg-10-->
	</div><!--form-group-->

				@section('after-scripts')
<script type='text/javascript'>
// Put your javascript needs in here.
// Don\'t forget to put `@`parent exactly after `@`section('after-scripts'),
// if your create or edit blade contains javascript of its own
 $( document ).ready( function() {
 Backend.Tempone.init('{{ config('locale.languages.' . app()->getLocale())[1] }}'); //Everything in here would execute after the DOM is ready to manipulated.
 });
 </script>
 @endsection
</div><!--box-body-->
