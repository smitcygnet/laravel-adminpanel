@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.samplesevens.management') . ' | ' . trans('labels.backend.samplesevens.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.samplesevens.management') }}
        <small>{{ trans('labels.backend.samplesevens.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($sampleseven, ['route' => ['admin.samplesevens.update', $sampleseven], 'class' => 'form-horizontal', 'role' => 'form', 'files' => true, 'method' => 'PATCH', 'id' => 'edit-sampleseven']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.samplesevens.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.samplesevens.partials.samplesevens-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.samplesevens.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.samplesevens.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
