<?php

Breadcrumbs::register('admin.tempones.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.tempones.management'), route('admin.tempones.index'));
});

Breadcrumbs::register('admin.tempones.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.tempones.index');
    $breadcrumbs->push(trans('menus.backend.tempones.create'), route('admin.tempones.create'));
});

Breadcrumbs::register('admin.tempones.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.tempones.index');
    $breadcrumbs->push(trans('menus.backend.tempones.edit'), route('admin.tempones.edit', $id));
});
