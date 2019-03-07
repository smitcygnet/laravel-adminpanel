<?php

Breadcrumbs::register('admin.sampletwos.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.sampletwos.management'), route('admin.sampletwos.index'));
});

Breadcrumbs::register('admin.sampletwos.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.sampletwos.index');
    $breadcrumbs->push(trans('menus.backend.sampletwos.create'), route('admin.sampletwos.create'));
});

Breadcrumbs::register('admin.sampletwos.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.sampletwos.index');
    $breadcrumbs->push(trans('menus.backend.sampletwos.edit'), route('admin.sampletwos.edit', $id));
});
