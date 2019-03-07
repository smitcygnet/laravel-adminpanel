<?php

Breadcrumbs::register('admin.barbers.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.barbers.management'), route('admin.barbers.index'));
});

Breadcrumbs::register('admin.barbers.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.barbers.index');
    $breadcrumbs->push(trans('menus.backend.barbers.create'), route('admin.barbers.create'));
});

Breadcrumbs::register('admin.barbers.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.barbers.index');
    $breadcrumbs->push(trans('menus.backend.barbers.edit'), route('admin.barbers.edit', $id));
});
