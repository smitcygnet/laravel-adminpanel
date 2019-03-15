<div class='box-body'>
	<div class ='form-group'>
		{{ Form::label('vision_name', trans('labels.backend.visions.vision_name'), ['class' => 'col-lg-2 control-label required']) }}
			<div class='col-lg-10'>
				{{Form::text('vision_name', null,['class' => 'form-control box-size','placeholder' => trans('labels.backend.visions.vision_name'),'required'    => 'required', ]) }}
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('since', trans('labels.backend.visions.since'), ['class' => 'col-lg-2 control-label required']) }}
			<div class='col-lg-10'>
				{{Form::text('since', null,['class' => 'form-control box-size','placeholder' => trans('labels.backend.visions.since'),'required'    => 'required', ]) }}
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('notes', trans('labels.backend.visions.notes'), ['class' => 'col-lg-2 control-label ']) }}
			<div class='col-lg-10'>
				{{Form::textarea('notes', null,['class' => 'form-control','placeholder' => trans('labels.backend.visions.notes'), 'rows' => 2]) }}
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('company', trans('labels.backend.visions.company'), ['class' => 'col-lg-2 control-label required']) }}
			<div class='col-lg-4'>
				{{Form::select('company',['Private','Public'], null,['class' => 'form-control select2 status box-size','placeholder' => trans('labels.backend.visions.company'),'required'    => 'required', ]) }}
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('associated_roles', trans('labels.backend.visions.associated_roles'), ['class' => 'col-lg-2 control-label required']) }}
			<div class='col-lg-4'>
<div>
	<label for='administrator' class='control control--radio'>
            <input type='radio' value='administrator' name='associated_roles' id='administrator' class='get-role-for-permissions'
            {{ @$vision->associated_roles == 'administrator' ? 'checked' : ''  }}
            /> Administrator
            	<div class='control__indicator'></div>

            </label>
	<label for='executive' class='control control--radio'>
            <input type='radio' value='executive' name='associated_roles' id='executive' class='get-role-for-permissions'
            {{ @$vision->associated_roles == 'executive' ? 'checked' : ''  }}
            /> Executive
            	<div class='control__indicator'></div>

            </label>
	<label for='user' class='control control--radio'>
            <input type='radio' value='user' name='associated_roles' id='user' class='get-role-for-permissions'
            {{ @$vision->associated_roles == 'user' ? 'checked' : ''  }}
            /> User
            	<div class='control__indicator'></div>

            </label>
</div>
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('dateone', trans('labels.backend.visions.dateone'), ['class' => 'col-lg-2 control-label ']) }}
			<div class='col-lg-4'>
@if(!empty($vision->dateone))
                {{ Form::text('dateone', \Carbon\Carbon::parse($vision->dateone)->format('m/d/Y h:i a'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.blogs.publish'),  'id' => 'dateone']) }}
            @else
                {{ Form::text('dateone', null, ['class' => 'form-control dateone box-size', 'placeholder' => trans('validation.attributes.backend.blogs.publish'),  'id' => 'dateone']) }}
            @endif			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('profile_pic', trans('labels.backend.visions.profile_pic'), ['class' => 'col-lg-2 control-label ']) }}
			<div class='col-lg-10'>
		@if(!empty($Visions->profile_pic))
			<div class='col-lg-1'>
				<img src='<?php echo Storage::url('img/visions/'.$Visions->profile_pic); ?>' height='80' width='80'>
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

				@section('after-scripts')
<script type='text/javascript'>
// Put your javascript needs in here.
// Don\'t forget to put `@`parent exactly after `@`section('after-scripts'),
// if your create or edit blade contains javascript of its own
 $( document ).ready( function() {
 Backend.Vision.init('{{ config('locale.languages.' . app()->getLocale())[1] }}'); //Everything in here would execute after the DOM is ready to manipulated.
 });
 </script>
 @endsection
</div><!--box-body-->
