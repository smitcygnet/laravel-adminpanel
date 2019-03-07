<?php

Breadcrumbs::register('admin.tempmodules.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.tempmodules.management'), route('admin.tempmodules.index'));
});

Breadcrumbs::register('admin.tempmodules.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.tempmodules.index');
    $breadcrumbs->push(trans('menus.backend.tempmodules.create'), route('admin.tempmodules.create'));
});

Breadcrumbs::register('admin.tempmodules.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.tempmodules.index');
    $breadcrumbs->push(trans('menus.backend.tempmodules.edit'), route('admin.tempmodules.edit', $id));
});
