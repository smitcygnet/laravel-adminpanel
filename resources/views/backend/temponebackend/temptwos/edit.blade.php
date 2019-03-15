@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.temptwos.management') . ' | ' . trans('labels.backend.temptwos.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.temptwos.management') }}
        <small>{{ trans('labels.backend.temptwos.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($temptwo, ['route' => ['admin.temptwos.update', $temptwo], 'class' => 'form-horizontal', 'role' => 'form', 'files' => true, 'method' => 'PATCH', 'id' => 'edit-temptwo']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.temptwos.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.temptwos.partials.temptwos-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.temptwos.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.temptwos.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
