<?php

Breadcrumbs::register('admin.samplefours.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.samplefours.management'), route('admin.samplefours.index'));
});

Breadcrumbs::register('admin.samplefours.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.samplefours.index');
    $breadcrumbs->push(trans('menus.backend.samplefours.create'), route('admin.samplefours.create'));
});

Breadcrumbs::register('admin.samplefours.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.samplefours.index');
    $breadcrumbs->push(trans('menus.backend.samplefours.edit'), route('admin.samplefours.edit', $id));
});
