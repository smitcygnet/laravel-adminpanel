<?php

Breadcrumbs::register('admin.samplesevennews.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.samplesevennews.management'), route('admin.samplesevennews.index'));
});

Breadcrumbs::register('admin.samplesevennews.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.samplesevennews.index');
    $breadcrumbs->push(trans('menus.backend.samplesevennews.create'), route('admin.samplesevennews.create'));
});

Breadcrumbs::register('admin.samplesevennews.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.samplesevennews.index');
    $breadcrumbs->push(trans('menus.backend.samplesevennews.edit'), route('admin.samplesevennews.edit', $id));
});
