<?php

Breadcrumbs::register('admin.smtnews.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.smtnews.management'), route('admin.smtnews.index'));
});

Breadcrumbs::register('admin.smtnews.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.smtnews.index');
    $breadcrumbs->push(trans('menus.backend.smtnews.create'), route('admin.smtnews.create'));
});

Breadcrumbs::register('admin.smtnews.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.smtnews.index');
    $breadcrumbs->push(trans('menus.backend.smtnews.edit'), route('admin.smtnews.edit', $id));
});
