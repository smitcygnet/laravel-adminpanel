<div class='box-body'>
<div class ='form-group'>
		{{ Form::label('first_name', trans('labels.backend.samples.first_name'), ['class' => 'col-lg-2 control-label required']) }}

			<div class='col-lg-10'>
				{{Form::text('first_name', null,['class' => 'form-control box-size','placeholder' => trans('labels.backend.samples.first_name'),'required'    => 'required', ]) }}

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('amountt', trans('labels.backend.samples.amountt'), ['class' => 'col-lg-2 control-label ']) }}

			<div class='col-lg-10'>
				{{Form::text('amountt', null,['class' => 'form-control box-size','placeholder' => trans('labels.backend.samples.amountt'), ]) }}

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('level', trans('labels.backend.samples.level'), ['class' => 'col-lg-2 control-label ']) }}

			<div class='col-lg-10'>
				{{Form::text('level', null,['class' => 'form-control box-size','placeholder' => trans('labels.backend.samples.level'), ]) }}

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('comment', trans('labels.backend.samples.comment'), ['class' => 'col-lg-2 control-label ']) }}

			<div class='col-lg-10'>
				{{Form::textarea('comment', null,['class' => 'form-control','placeholder' => trans('labels.backend.samples.comment'), 'rows' => 2]) }}

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('explaination', trans('labels.backend.samples.explaination'), ['class' => 'col-lg-2 control-label required']) }}

			<div class='col-lg-10'>
				{{Form::textarea('explaination', null,['class' => 'form-control','placeholder' => trans('labels.backend.samples.explaination'), 'rows' => 2]) }}

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('gender', trans('labels.backend.samples.gender'), ['class' => 'col-lg-2 control-label required']) }}

			<div class='col-lg-4'>
				{{Form::select('gender',['Male','Female'], null,['class' => 'form-control select2 status box-size','placeholder' => trans('labels.backend.samples.gender'),'required'    => 'required', ]) }}

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('associated_roles', trans('labels.backend.samples.associated_roles'), ['class' => 'col-lg-2 control-label required']) }}

			<div class='col-lg-4'>
				<div>
					<label for='administrator' class='control control--radio'>
						<input type='radio' value='administrator' name='associated_roles' id='administrator' class='get-role-for-permissions'
						{{ @$sample->associated_roles == 'administrator' ? 'checked' : ''  }}
						/> Administrator
						<div class='control__indicator'></div>
					</label>
					<label for='executive' class='control control--radio'>
						<input type='radio' value='executive' name='associated_roles' id='executive' class='get-role-for-permissions'
						{{ @$sample->associated_roles == 'executive' ? 'checked' : ''  }}
						/> Executive
						<div class='control__indicator'></div>
					</label>
					<label for='user' class='control control--radio'>
						<input type='radio' value='user' name='associated_roles' id='user' class='get-role-for-permissions'
						{{ @$sample->associated_roles == 'user' ? 'checked' : ''  }}
						/> User
						<div class='control__indicator'></div>
					</label>
				</div>

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('dateone', trans('labels.backend.samples.dateone'), ['class' => 'col-lg-2 control-label ']) }}

			<div class='col-lg-4'>
			@if(!empty($sample->dateone))
			    {{ Form::text('dateone', \Carbon\Carbon::parse($sample->dateone)->format('m/d/Y h:i a'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('labels.backend.samples.dateone'),  'id' => 'dateone']) }}
			@else
			    {{ Form::text('dateone', null, ['class' => 'form-control dateone box-size', 'placeholder' => trans('labels.backend.samples.dateone'),  'id' => 'dateone']) }}
			@endif
			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('profile_pic', trans('labels.backend.samples.profile_pic'), ['class' => 'col-lg-2 control-label ']) }}

			<div class='col-lg-10'>
		@if(!empty($sample->profile_pic))
			<div class='col-lg-2'>
				<img src='<?php echo Storage::url('img/samples/profile_pic/'.$sample->profile_pic); ?>' height='80' width='80'>
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
		{{ Form::label('profile_img', trans('labels.backend.samples.profile_img'), ['class' => 'col-lg-2 control-label ']) }}

			<div class='col-lg-10'>
		@if(!empty($sample->profile_img))
			<div class='col-lg-2'>
				<img src='<?php echo Storage::url('img/samples/profile_img/'.$sample->profile_img); ?>' height='80' width='80'>
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
		Backend.Sample.init('{{ config('locale.languages.' . app()->getLocale())[1] }}');
		//Everything in here would execute after the DOM is ready to manipulated.
	});
</script>
@endsection</div><!--box-body-->
