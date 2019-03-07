<?php

Breadcrumbs::register('admin.employeetwos.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.employeetwos.management'), route('admin.employeetwos.index'));
});

Breadcrumbs::register('admin.employeetwos.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.employeetwos.index');
    $breadcrumbs->push(trans('menus.backend.employeetwos.create'), route('admin.employeetwos.create'));
});

Breadcrumbs::register('admin.employeetwos.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.employeetwos.index');
    $breadcrumbs->push(trans('menus.backend.employeetwos.edit'), route('admin.employeetwos.edit', $id));
});
