<div class="box-body">
    <div class="form-group">
        <!-- Create Your Field Label Here -->
        {{ Form::label('name', trans('labels.backend.standards.name'), ['class' => 'col-lg-2 control-label required']) }}

        <!-- Look Below Example for reference -->
        {{-- {{ Form::label('name', trans('labels.backend.blogs.title'), ['class' => 'col-lg-2 control-label required']) }} --}}

        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
             {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.standards.name'), 'required' => 'required']) }}
            <!-- Look Below Example for reference -->
            {{-- {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.blogs.title'), 'required' => 'required']) }} --}}
        </div><!--col-lg-10-->
    </div><!--form-group-->

    <div class="form-group">
        <!-- Create Your Field Label Here -->
        {{ Form::label('status', trans('labels.backend.standards.status'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <div class="control-group">
                <label class="control control--checkbox">
                        @if(isset($standard->status) && !empty ($standard->status))
                            {{ Form::checkbox('status', 1, true) }}
                        @else
                            {{ Form::checkbox('status', 1, false) }}
                        @endif
                    <div class="control__indicator"></div>
                </label>
            </div>
        </div><!--col-lg-10-->
    </div><!--form-group-->


</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">
        //Put your javascript needs in here.
        //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
        //if your create or edit blade contains javascript of its own
        $( document ).ready( function() {
            //Everything in here would execute after the DOM is ready to manipulated.
        });
    </script>
@endsection
