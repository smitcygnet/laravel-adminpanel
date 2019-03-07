<?php

Breadcrumbs::register('admin.customnews.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.customnews.management'), route('admin.customnews.index'));
});

Breadcrumbs::register('admin.customnews.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.customnews.index');
    $breadcrumbs->push(trans('menus.backend.customnews.create'), route('admin.customnews.create'));
});

Breadcrumbs::register('admin.customnews.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.customnews.index');
    $breadcrumbs->push(trans('menus.backend.customnews.edit'), route('admin.customnews.edit', $id));
});
