<?php

Breadcrumbs::register('admin.samplesixes.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.samplesixes.management'), route('admin.samplesixes.index'));
});

Breadcrumbs::register('admin.samplesixes.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.samplesixes.index');
    $breadcrumbs->push(trans('menus.backend.samplesixes.create'), route('admin.samplesixes.create'));
});

Breadcrumbs::register('admin.samplesixes.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.samplesixes.index');
    $breadcrumbs->push(trans('menus.backend.samplesixes.edit'), route('admin.samplesixes.edit', $id));
});
