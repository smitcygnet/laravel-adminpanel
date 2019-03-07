<?php

Breadcrumbs::register('admin.testmtwos.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.testmtwos.management'), route('admin.testmtwos.index'));
});

Breadcrumbs::register('admin.testmtwos.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.testmtwos.index');
    $breadcrumbs->push(trans('menus.backend.testmtwos.create'), route('admin.testmtwos.create'));
});

Breadcrumbs::register('admin.testmtwos.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.testmtwos.index');
    $breadcrumbs->push(trans('menus.backend.testmtwos.edit'), route('admin.testmtwos.edit', $id));
});
