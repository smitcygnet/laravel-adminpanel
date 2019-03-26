<div class='box-body'>
<div class ='form-group'>
		{{ Form::label('first_name', trans('labels.backend.customers.first_name'), ['class' => 'col-lg-2 control-label ']) }}

			<div class='col-lg-10'>
				{{Form::text('first_name', null,['class' => 'form-control box-size','placeholder' => trans('labels.backend.customers.first_name'), ]) }}

			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('active', trans('labels.backend.customers.active'), ['class' => 'col-lg-2 control-label ']) }}

			<div class='col-lg-4'>
	<div class="control-group">
        <label class="control control--checkbox">
        	 @if(isset($customer->active))
               {{ Form::checkbox('active', '1', $customer->active == 1 ) }}
             @else
        	   {{ Form::checkbox('active', '1') }}
			@endif
        <div class="control__indicator"></div>
        </label>
    </div>
			</div><!--col-lg-10-->
	</div><!--form-group-->


				<div class ='form-group'>
		{{ Form::label('last_name', trans('labels.backend.customers.last_name'), ['class' => 'col-lg-2 control-label ']) }}

			<div class='col-lg-10'>
				{{Form::text('last_name', null,['class' => 'form-control box-size','placeholder' => trans('labels.backend.customers.last_name'), ]) }}

			</div><!--col-lg-10-->
	</div><!--form-group-->


				
@section('after-scripts')
<script type='text/javascript'>
	// Put your javascript needs in here.
	// Don't forget to put `@`parent exactly after `@`section('after-scripts'),
	// if your create or edit blade contains javascript of its own.
	$( document ).ready( function() {
		//Backend.Customer.init('{{ config('locale.languages.' . app()->getLocale())[1] }}');
		//Everything in here would execute after the DOM is ready to manipulated.
	});
</script>
@endsection</div><!--box-body-->
