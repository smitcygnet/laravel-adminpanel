<?php

Breadcrumbs::register('admin.samplethrees.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.samplethrees.management'), route('admin.samplethrees.index'));
});

Breadcrumbs::register('admin.samplethrees.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.samplethrees.index');
    $breadcrumbs->push(trans('menus.backend.samplethrees.create'), route('admin.samplethrees.create'));
});

Breadcrumbs::register('admin.samplethrees.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.samplethrees.index');
    $breadcrumbs->push(trans('menus.backend.samplethrees.edit'), route('admin.samplethrees.edit', $id));
});
