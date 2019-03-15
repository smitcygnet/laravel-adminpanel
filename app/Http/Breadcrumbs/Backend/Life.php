<?php

Breadcrumbs::register('admin.lives.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.lives.management'), route('admin.lives.index'));
});

Breadcrumbs::register('admin.lives.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.lives.index');
    $breadcrumbs->push(trans('menus.backend.lives.create'), route('admin.lives.create'));
});

Breadcrumbs::register('admin.lives.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.lives.index');
    $breadcrumbs->push(trans('menus.backend.lives.edit'), route('admin.lives.edit', $id));
});
