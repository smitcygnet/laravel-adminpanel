<div class='box-body'>
<div class ='form-group'>
		{{ Form::label('title', trans('labels.backend.posts.title'), ['class' => 'col-lg-2 control-label required']) }}

			<div class='col-lg-10'>
				{{Form::text('title', null,['class' => 'form-control box-size','placeholder' => trans('labels.backend.posts.title'),'required'    => 'required', ]) }}

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('name', trans('labels.backend.posts.name'), ['class' => 'col-lg-2 control-label ']) }}

			<div class='col-lg-10'>
				{{Form::text('name', null,['class' => 'form-control box-size','placeholder' => trans('labels.backend.posts.name'), ]) }}

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('comment', trans('labels.backend.posts.comment'), ['class' => 'col-lg-2 control-label ']) }}

			<div class='col-lg-10'>
				{{Form::textarea('comment', null,['class' => 'form-control','placeholder' => trans('labels.backend.posts.comment'), 'rows' => 2]) }}

			</div><!--col-lg-10-->
	</div><!--form-group-->


				
@section('after-scripts')
<script type='text/javascript'>
	// Put your javascript needs in here.
	// Don't forget to put `@`parent exactly after `@`section('after-scripts'),
	// if your create or edit blade contains javascript of its own.
	$( document ).ready( function() {
		Backend.Post.init('{{ config('locale.languages.' . app()->getLocale())[1] }}');
		//Everything in here would execute after the DOM is ready to manipulated.
	});
</script>
@endsection</div><!--box-body-->
