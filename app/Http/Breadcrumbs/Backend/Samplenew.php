<?php

Breadcrumbs::register('admin.samplenews.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.samplenews.management'), route('admin.samplenews.index'));
});

Breadcrumbs::register('admin.samplenews.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.samplenews.index');
    $breadcrumbs->push(trans('menus.backend.samplenews.create'), route('admin.samplenews.create'));
});

Breadcrumbs::register('admin.samplenews.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.samplenews.index');
    $breadcrumbs->push(trans('menus.backend.samplenews.edit'), route('admin.samplenews.edit', $id));
});
