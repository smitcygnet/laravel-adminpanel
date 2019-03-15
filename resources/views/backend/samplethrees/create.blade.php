@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.samplethrees.management') . ' | ' . trans('labels.backend.samplethrees.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.samplethrees.management') }}
        <small>{{ trans('labels.backend.samplethrees.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.samplethrees.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'files' => true, 'id' => 'create-samplethree']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.samplethrees.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.samplethrees.partials.samplethrees-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.samplethrees.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.samplethrees.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!-- form-group -->
            </div><!--box-body-->
        </div><!--box box-success-->
    {{ Form::close() }}
@endsection
