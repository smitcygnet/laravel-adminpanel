<?php

Breadcrumbs::register('admin.samplefives.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.samplefives.management'), route('admin.samplefives.index'));
});

Breadcrumbs::register('admin.samplefives.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.samplefives.index');
    $breadcrumbs->push(trans('menus.backend.samplefives.create'), route('admin.samplefives.create'));
});

Breadcrumbs::register('admin.samplefives.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.samplefives.index');
    $breadcrumbs->push(trans('menus.backend.samplefives.edit'), route('admin.samplefives.edit', $id));
});
