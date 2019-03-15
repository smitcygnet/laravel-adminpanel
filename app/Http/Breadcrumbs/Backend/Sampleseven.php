<?php

Breadcrumbs::register('admin.samplesevens.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.samplesevens.management'), route('admin.samplesevens.index'));
});

Breadcrumbs::register('admin.samplesevens.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.samplesevens.index');
    $breadcrumbs->push(trans('menus.backend.samplesevens.create'), route('admin.samplesevens.create'));
});

Breadcrumbs::register('admin.samplesevens.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.samplesevens.index');
    $breadcrumbs->push(trans('menus.backend.samplesevens.edit'), route('admin.samplesevens.edit', $id));
});
