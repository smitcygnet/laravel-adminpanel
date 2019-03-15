@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.visions.management') . ' | ' . trans('labels.backend.visions.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.visions.management') }}
        <small>{{ trans('labels.backend.visions.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($vision, ['route' => ['admin.visions.update', $vision], 'class' => 'form-horizontal', 'role' => 'form', 'files' => true, 'method' => 'PATCH', 'id' => 'edit-vision']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.visions.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.visions.partials.visions-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.visions.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.visions.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
