<div class='box-body'>
	<div class ='form-group'>
		{{ Form::label('title', trans('labels.backend.lives.title'), ['class' => 'col-lg-2 control-label required']) }}
			<div class='col-lg-10'>
				{{Form::text('title', null,['class' => 'form-control box-size','placeholder' => trans('labels.backend.lives.title'),'required'    => 'required', ]) }}
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('comment', trans('labels.backend.lives.comment'), ['class' => 'col-lg-2 control-label ']) }}
			<div class='col-lg-10'>
				{{Form::textarea('comment', null,['class' => 'form-control','placeholder' => trans('labels.backend.lives.comment'), 'rows' => 2]) }}
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('dropdown', trans('labels.backend.lives.dropdown'), ['class' => 'col-lg-2 control-label required']) }}
			<div class='col-lg-4'>
				{{Form::select('dropdown',['Option1','Option2','Option3'], null,['class' => 'form-control select2 status box-size','placeholder' => trans('labels.backend.lives.dropdown'),'required'    => 'required', ]) }}
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('explaination', trans('labels.backend.lives.explaination'), ['class' => 'col-lg-2 control-label required']) }}
			<div class='col-lg-10'>
				{{Form::textarea('explaination', null,['class' => 'form-control','placeholder' => trans('labels.backend.lives.explaination'), 'rows' => 2]) }}
			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('datethree', trans('labels.backend.lives.datethree'), ['class' => 'col-lg-2 control-label ']) }}
			<div class='col-lg-4'>
@if(!empty($life->datethree))
                {{ Form::text('datethree', \Carbon\Carbon::parse($life->datethree)->format('m/d/Y h:i a'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.blogs.publish'),  'id' => 'datethree']) }}
            @else
                {{ Form::text('datethree', null, ['class' => 'form-control datethree box-size', 'placeholder' => trans('validation.attributes.backend.blogs.publish'),  'id' => 'datethree']) }}
            @endif			</div><!--col-lg-10-->
	</div><!--form-group-->

					<div class ='form-group'>
		{{ Form::label('profile_pic', trans('labels.backend.lives.profile_pic'), ['class' => 'col-lg-2 control-label ']) }}
			<div class='col-lg-10'>
		@if(!empty($Lives->profile_pic))
			<div class='col-lg-1'>
				<img src='<?php echo Storage::url('img/lives/'.$Lives->profile_pic); ?>' height='80' width='80'>
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
 Backend.Life.init('{{ config('locale.languages.' . app()->getLocale())[1] }}'); //Everything in here would execute after the DOM is ready to manipulated.
 });
 </script>
 @endsection
</div><!--box-body-->
