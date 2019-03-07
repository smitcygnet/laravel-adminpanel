<?php

Breadcrumbs::register('admin.testmones.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.testmones.management'), route('admin.testmones.index'));
});

Breadcrumbs::register('admin.testmones.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.testmones.index');
    $breadcrumbs->push(trans('menus.backend.testmones.create'), route('admin.testmones.create'));
});

Breadcrumbs::register('admin.testmones.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.testmones.index');
    $breadcrumbs->push(trans('menus.backend.testmones.edit'), route('admin.testmones.edit', $id));
});
