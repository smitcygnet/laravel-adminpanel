@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.sampletemps.management') . ' | ' . trans('labels.backend.sampletemps.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.sampletemps.management') }}
        <small>{{ trans('labels.backend.sampletemps.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($sampletemp, ['route' => ['admin.sampletemps.update', $sampletemp], 'class' => 'form-horizontal', 'role' => 'form', 'files' => true, 'method' => 'PATCH', 'id' => 'edit-sampletemp']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.sampletemps.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.sampletemps.partials.sampletemps-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.sampletemps.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.sampletemps.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
