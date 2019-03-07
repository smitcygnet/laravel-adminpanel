<?php

Breadcrumbs::register('admin.newnews.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.newnews.management'), route('admin.newnews.index'));
});

Breadcrumbs::register('admin.newnews.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.newnews.index');
    $breadcrumbs->push(trans('menus.backend.newnews.create'), route('admin.newnews.create'));
});

Breadcrumbs::register('admin.newnews.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.newnews.index');
    $breadcrumbs->push(trans('menus.backend.newnews.edit'), route('admin.newnews.edit', $id));
});
