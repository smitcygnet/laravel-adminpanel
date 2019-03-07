<?php

Breadcrumbs::register('admin.schools.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.schools.management'), route('admin.schools.index'));
});

Breadcrumbs::register('admin.schools.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.schools.index');
    $breadcrumbs->push(trans('menus.backend.schools.create'), route('admin.schools.create'));
});

Breadcrumbs::register('admin.schools.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.schools.index');
    $breadcrumbs->push(trans('menus.backend.schools.edit'), route('admin.schools.edit', $id));
});
