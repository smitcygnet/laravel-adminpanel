<?php

Breadcrumbs::register('admin.samples.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.samples.management'), route('admin.samples.index'));
});

Breadcrumbs::register('admin.samples.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.samples.index');
    $breadcrumbs->push(trans('menus.backend.samples.create'), route('admin.samples.create'));
});

Breadcrumbs::register('admin.samples.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.samples.index');
    $breadcrumbs->push(trans('menus.backend.samples.edit'), route('admin.samples.edit', $id));
});
