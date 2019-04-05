@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.posts.management') . ' | ' . trans('labels.backend.posts.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.posts.management') }}
        <small>{{ trans('labels.backend.posts.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($post, ['route' => ['admin.posts.update', $post], 'class' => 'form-horizontal', 'role' => 'form', 'files' => true, 'method' => 'PATCH', 'id' => 'edit-post']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.posts.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.posts.partials.posts-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.posts.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.posts.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
