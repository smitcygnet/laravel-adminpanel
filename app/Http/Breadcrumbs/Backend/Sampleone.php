<?php

Breadcrumbs::register('admin.sampleones.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.sampleones.management'), route('admin.sampleones.index'));
});

Breadcrumbs::register('admin.sampleones.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.sampleones.index');
    $breadcrumbs->push(trans('menus.backend.sampleones.create'), route('admin.sampleones.create'));
});

Breadcrumbs::register('admin.sampleones.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.sampleones.index');
    $breadcrumbs->push(trans('menus.backend.sampleones.edit'), route('admin.sampleones.edit', $id));
});
