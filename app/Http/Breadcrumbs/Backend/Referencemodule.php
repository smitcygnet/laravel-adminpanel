<?php

Breadcrumbs::register('admin.referencemodules.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.referencemodules.management'), route('admin.referencemodules.index'));
});

Breadcrumbs::register('admin.referencemodules.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.referencemodules.index');
    $breadcrumbs->push(trans('menus.backend.referencemodules.create'), route('admin.referencemodules.create'));
});

Breadcrumbs::register('admin.referencemodules.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.referencemodules.index');
    $breadcrumbs->push(trans('menus.backend.referencemodules.edit'), route('admin.referencemodules.edit', $id));
});
