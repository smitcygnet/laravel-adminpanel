<?php

Breadcrumbs::register('admin.smitendras.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.smitendras.management'), route('admin.smitendras.index'));
});

Breadcrumbs::register('admin.smitendras.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.smitendras.index');
    $breadcrumbs->push(trans('menus.backend.smitendras.create'), route('admin.smitendras.create'));
});

Breadcrumbs::register('admin.smitendras.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.smitendras.index');
    $breadcrumbs->push(trans('menus.backend.smitendras.edit'), route('admin.smitendras.edit', $id));
});
