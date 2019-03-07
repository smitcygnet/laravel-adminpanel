<?php

Breadcrumbs::register('admin.smittests.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.smittests.management'), route('admin.smittests.index'));
});

Breadcrumbs::register('admin.smittests.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.smittests.index');
    $breadcrumbs->push(trans('menus.backend.smittests.create'), route('admin.smittests.create'));
});

Breadcrumbs::register('admin.smittests.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.smittests.index');
    $breadcrumbs->push(trans('menus.backend.smittests.edit'), route('admin.smittests.edit', $id));
});
