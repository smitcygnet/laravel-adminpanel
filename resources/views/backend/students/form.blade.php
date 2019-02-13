<div class="box-body">
    <div class="form-group">
        {{ Form::label('first_name', trans('labels.backend.students.first_name'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::text('first_name', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.students.first_name'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form-group-->
    <div class="form-group">
        {{ Form::label('last_name', trans('labels.backend.students.last_name'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::text('last_name', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.students.last_name'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form-group-->
    <div class="form-group">
        {{ Form::label('gender', trans('labels.backend.students.gender'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            <div>
            <label for="male" class="control control--radio">
            <input type="radio" value="male" name="gender" id="male" class="get-role-for-permissions"/> Male
            <div class="control__indicator"></div>

            </label>
            <label for="female" class="control control--radio">
            <input type="radio" value="female" name="gender" id="female" class="get-role-for-permissions"/>  Female
            <div class="control__indicator"></div>

            </label>
            </div>

        </div><!--col-lg-10-->
    </div><!--form-group-->

<div class="form-group">
        {{ Form::label('hobbies', trans('labels.backend.students.hobbies'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::textarea('hobbies', null,['class' => 'form-control', 'placeholder' => trans('labels.backend.students.hobbies'),
            'required' => 'required','rows' => 2]) }}
        </div><!--col-lg-10-->
    </div><!--form-group-->

 <div class="form-group">
        {{ Form::label('profile_picture', trans('labels.backend.students.profile_picture'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            <div class="custom-file-input">
                {!! Form::file('profile_picture', array('class'=>'form-control inputfile inputfile-1' )) !!}
                <label for="profile_picture">
                    <i class="fa fa-upload"></i>
                    <span>Choose a file</span>
                </label>
            </div>
        </div><!--col-lg-10-->
 </div><!--form-group-->
 <?php /*
 <div class="form-group">
        {{ Form::label('standard', trans('labels.backend.students.standard'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            <div class="col-lg-10">
           {{ Form::select('standard', $standards, null, ['class' => 'form-control select2 status box-size', 'placeholder' => trans('labels.backend.students.standard'), 'required' => 'required']) }}
        </div><!--col-lg-3-->
        </div><!--col-lg-10-->
 </div><!--form-group-->

 */ ?>
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
