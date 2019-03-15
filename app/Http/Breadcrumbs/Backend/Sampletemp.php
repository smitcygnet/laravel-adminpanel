<?php

Breadcrumbs::register('admin.sampletemps.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.sampletemps.management'), route('admin.sampletemps.index'));
});

Breadcrumbs::register('admin.sampletemps.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.sampletemps.index');
    $breadcrumbs->push(trans('menus.backend.sampletemps.create'), route('admin.sampletemps.create'));
});

Breadcrumbs::register('admin.sampletemps.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.sampletemps.index');
    $breadcrumbs->push(trans('menus.backend.sampletemps.edit'), route('admin.sampletemps.edit', $id));
});
