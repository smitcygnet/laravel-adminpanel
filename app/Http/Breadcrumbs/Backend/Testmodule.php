<?php

Breadcrumbs::register('admin.testmodules.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.testmodules.management'), route('admin.testmodules.index'));
});

Breadcrumbs::register('admin.testmodules.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.testmodules.index');
    $breadcrumbs->push(trans('menus.backend.testmodules.create'), route('admin.testmodules.create'));
});

Breadcrumbs::register('admin.testmodules.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.testmodules.index');
    $breadcrumbs->push(trans('menus.backend.testmodules.edit'), route('admin.testmodules.edit', $id));
});
