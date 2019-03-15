<div class='box-body'>
<div class ='form-group'>
		{{ Form::label('first_name', trans('labels.backend.samplesevennews.first_name'), ['class' => 'col-lg-2 control-label required']) }}

			<div class='col-lg-10'>
				{{Form::text('first_name', null,['class' => 'form-control box-size','placeholder' => trans('labels.backend.samplesevennews.first_name'),'required'    => 'required', ]) }}

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('last_name', trans('labels.backend.samplesevennews.last_name'), ['class' => 'col-lg-2 control-label ']) }}

			<div class='col-lg-10'>
				{{Form::text('last_name', null,['class' => 'form-control box-size','placeholder' => trans('labels.backend.samplesevennews.last_name'), ]) }}

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('age', trans('labels.backend.samplesevennews.age'), ['class' => 'col-lg-2 control-label required']) }}

			<div class='col-lg-10'>
				{{Form::text('age', null,['class' => 'form-control box-size','placeholder' => trans('labels.backend.samplesevennews.age'),'required'    => 'required', ]) }}

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('comment', trans('labels.backend.samplesevennews.comment'), ['class' => 'col-lg-2 control-label ']) }}

			<div class='col-lg-10'>
				{{Form::textarea('comment', null,['class' => 'form-control','placeholder' => trans('labels.backend.samplesevennews.comment'), 'rows' => 2]) }}

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('dropdown', trans('labels.backend.samplesevennews.dropdown'), ['class' => 'col-lg-2 control-label required']) }}

			<div class='col-lg-4'>
				{{Form::select('dropdown',['Option1','Option2','Option3'], null,['class' => 'form-control select2 status box-size','placeholder' => trans('labels.backend.samplesevennews.dropdown'),'required'    => 'required', ]) }}

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('explaination', trans('labels.backend.samplesevennews.explaination'), ['class' => 'col-lg-2 control-label required']) }}

			<div class='col-lg-10'>
				{{Form::textarea('explaination', null,['class' => 'form-control','placeholder' => trans('labels.backend.samplesevennews.explaination'), 'rows' => 2]) }}

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('gender', trans('labels.backend.samplesevennews.gender'), ['class' => 'col-lg-2 control-label required']) }}

			<div class='col-lg-4'>
				{{Form::select('gender',['Male','Female'], null,['class' => 'form-control select2 status box-size','placeholder' => trans('labels.backend.samplesevennews.gender'),'required'    => 'required', ]) }}

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('associated_roles', trans('labels.backend.samplesevennews.associated_roles'), ['class' => 'col-lg-2 control-label required']) }}

			<div class='col-lg-4'>
				<div>
					<label for='administrator' class='control control--radio'>
						<input type='radio' value='administrator' name='associated_roles' id='administrator' class='get-role-for-permissions'
						{{ @$samplesevennews->associated_roles == 'administrator' ? 'checked' : ''  }}
						/> Administrator
						<div class='control__indicator'></div>
					</label>
					<label for='executive' class='control control--radio'>
						<input type='radio' value='executive' name='associated_roles' id='executive' class='get-role-for-permissions'
						{{ @$samplesevennews->associated_roles == 'executive' ? 'checked' : ''  }}
						/> Executive
						<div class='control__indicator'></div>
					</label>
					<label for='user' class='control control--radio'>
						<input type='radio' value='user' name='associated_roles' id='user' class='get-role-for-permissions'
						{{ @$samplesevennews->associated_roles == 'user' ? 'checked' : ''  }}
						/> User
						<div class='control__indicator'></div>
					</label>
				</div>

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('dataone', trans('labels.backend.samplesevennews.dataone'), ['class' => 'col-lg-2 control-label ']) }}

			<div class='col-lg-4'>
			@if(!empty($samplesevennews->dataone))
			    {{ Form::text('dataone', \Carbon\Carbon::parse($samplesevennews->dataone)->format('m/d/Y h:i a'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('labels.backend.samplesevennews.dataone'),  'id' => 'dataone']) }}
			@else
			    {{ Form::text('dataone', null, ['class' => 'form-control dataone box-size', 'placeholder' => trans('labels.backend.samplesevennews.dataone'),  'id' => 'dataone']) }}
			@endif
			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('datetwo', trans('labels.backend.samplesevennews.datetwo'), ['class' => 'col-lg-2 control-label required']) }}

			<div class='col-lg-4'>
			@if(!empty($samplesevennews->datetwo))
			    {{ Form::text('datetwo', \Carbon\Carbon::parse($samplesevennews->datetwo)->format('m/d/Y h:i a'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('labels.backend.samplesevennews.datetwo'), 'required'    => 'required', 'id' => 'datetwo']) }}
			@else
			    {{ Form::text('datetwo', null, ['class' => 'form-control datetwo box-size', 'placeholder' => trans('labels.backend.samplesevennews.datetwo'), 'required'    => 'required', 'id' => 'datetwo']) }}
			@endif
			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('datethree', trans('labels.backend.samplesevennews.datethree'), ['class' => 'col-lg-2 control-label ']) }}

			<div class='col-lg-4'>
			@if(!empty($samplesevennews->datethree))
			    {{ Form::text('datethree', \Carbon\Carbon::parse($samplesevennews->datethree)->format('m/d/Y h:i a'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('labels.backend.samplesevennews.datethree'),  'id' => 'datethree']) }}
			@else
			    {{ Form::text('datethree', null, ['class' => 'form-control datethree box-size', 'placeholder' => trans('labels.backend.samplesevennews.datethree'),  'id' => 'datethree']) }}
			@endif
			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('profile_pic', trans('labels.backend.samplesevennews.profile_pic'), ['class' => 'col-lg-2 control-label ']) }}

			<div class='col-lg-10'>
		@if(!empty($Samplesevennew->profile_pic))
			<div class='col-lg-1'>
				<img src='<?php echo Storage::url('img/samplesevennews/'.$Samplesevennew->profile_pic); ?>' height='80' width='80'>
			</div>
		<div class='col-lg-5'>
			<div class='custom-file-input'>
				<input type='file' name='profile_pic' id='file-profile_pic' class='inputfile inputfile-profile_pic' data-multiple-caption='{count} files selected' />
			<label for='file-profile_pic'><i class='fa fa-upload'></i><span>Choose a file</span></label>
			</div>
		</div>
		@else
		<div class='col-lg-5'>
			<div class='custom-file-input'>
				<input type='file' name='profile_pic' id='file-profile_pic' class='inputfile inputfile-profile_pic' data-multiple-caption='{count} files selected' />
			<label for='file-profile_pic'><i class='fa fa-upload'></i><span>Choose a file</span></label>
			</div>
		</div>
		@endif

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('profile_img', trans('labels.backend.samplesevennews.profile_img'), ['class' => 'col-lg-2 control-label ']) }}

			<div class='col-lg-10'>
		@if(!empty($Samplesevennew->profile_img))
			<div class='col-lg-1'>
				<img src='<?php echo Storage::url('img/samplesevennews/'.$Samplesevennew->profile_img); ?>' height='80' width='80'>
			</div>
		<div class='col-lg-5'>
			<div class='custom-file-input'>
				<input type='file' name='profile_img' id='file-profile_img' class='inputfile inputfile-profile_img' data-multiple-caption='{count} files selected' />
			<label for='file-profile_img'><i class='fa fa-upload'></i><span>Choose a file</span></label>
			</div>
		</div>
		@else
		<div class='col-lg-5'>
			<div class='custom-file-input'>
				<input type='file' name='profile_img' id='file-profile_img' class='inputfile inputfile-profile_img' data-multiple-caption='{count} files selected' />
			<label for='file-profile_img'><i class='fa fa-upload'></i><span>Choose a file</span></label>
			</div>
		</div>
		@endif

			</div><!--col-lg-10-->
	</div><!--form-group-->


				
@section('after-scripts')
<script type='text/javascript'>
	// Put your javascript needs in here.
	// Don't forget to put `@`parent exactly after `@`section('after-scripts'),
	// if your create or edit blade contains javascript of its own.
	$( document ).ready( function() {
		Backend.Samplesevennew.init('{{ config('locale.languages.' . app()->getLocale())[1] }}');
		//Everything in here would execute after the DOM is ready to manipulated.
	});
</script>
@endsection</div><!--box-body-->
