<div class='box-body'>
	<div class ='form-group'>
		{{ Form::label('last_name', trans('labels.backend.sampletwos.last_name'), ['class' => 'col-lg-2 control-label ']) }}
			<div class='col-lg-10'>
				{{Form::text('last_name', null,['class' => 'form-control box-size','placeholder' => trans('labels.backend.sampletwos.last_name'), ]) }}
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('age', trans('labels.backend.sampletwos.age'), ['class' => 'col-lg-2 control-label required']) }}
			<div class='col-lg-10'>
				{{Form::text('age', null,['class' => 'form-control box-size','placeholder' => trans('labels.backend.sampletwos.age'),'required'    => 'required', ]) }}
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('datethree', trans('labels.backend.sampletwos.datethree'), ['class' => 'col-lg-2 control-label ']) }}
			<div class='col-lg-4'>
@if(!empty($sampletwo->datethree))
                {{ Form::text('datethree', \Carbon\Carbon::parse($sampletwo->datethree)->format('m/d/Y h:i a'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.blogs.publish'),  'id' => 'datethree']) }}
            @else
                {{ Form::text('datethree', null, ['class' => 'form-control datethree box-size', 'placeholder' => trans('validation.attributes.backend.blogs.publish'),  'id' => 'datethree']) }}
            @endif			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('profile_pic', trans('labels.backend.sampletwos.profile_pic'), ['class' => 'col-lg-2 control-label ']) }}
			<div class='col-lg-10'>
		@if(!empty($Sampletwo->profile_pic))
			<div class='col-lg-1'>
				<img src='<?php echo Storage::url('img/sampletwos/'.$Sampletwo->profile_pic); ?>' height='80' width='80'>
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
		{{ Form::label('profile_img', trans('labels.backend.sampletwos.profile_img'), ['class' => 'col-lg-2 control-label ']) }}
			<div class='col-lg-10'>
		@if(!empty($Sampletwo->profile_img))
			<div class='col-lg-1'>
				<img src='<?php echo Storage::url('img/sampletwos/'.$Sampletwo->profile_img); ?>' height='80' width='80'>
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
 Backend.Sampletwo.init('{{ config('locale.languages.' . app()->getLocale())[1] }}'); //Everything in here would execute after the DOM is ready to manipulated.
 });
 </script>
 @endsection
</div><!--box-body-->
