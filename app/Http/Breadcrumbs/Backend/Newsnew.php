<?php

Breadcrumbs::register('admin.newsnews.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.newsnews.management'), route('admin.newsnews.index'));
});

Breadcrumbs::register('admin.newsnews.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.newsnews.index');
    $breadcrumbs->push(trans('menus.backend.newsnews.create'), route('admin.newsnews.create'));
});

Breadcrumbs::register('admin.newsnews.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.newsnews.index');
    $breadcrumbs->push(trans('menus.backend.newsnews.edit'), route('admin.newsnews.edit', $id));
});
