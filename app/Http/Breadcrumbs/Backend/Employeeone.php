<?php

Breadcrumbs::register('admin.employeeones.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.employeeones.management'), route('admin.employeeones.index'));
});

Breadcrumbs::register('admin.employeeones.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.employeeones.index');
    $breadcrumbs->push(trans('menus.backend.employeeones.create'), route('admin.employeeones.create'));
});

Breadcrumbs::register('admin.employeeones.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.employeeones.index');
    $breadcrumbs->push(trans('menus.backend.employeeones.edit'), route('admin.employeeones.edit', $id));
});
