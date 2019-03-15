<?php

Breadcrumbs::register('admin.visions.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.visions.management'), route('admin.visions.index'));
});

Breadcrumbs::register('admin.visions.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.visions.index');
    $breadcrumbs->push(trans('menus.backend.visions.create'), route('admin.visions.create'));
});

Breadcrumbs::register('admin.visions.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.visions.index');
    $breadcrumbs->push(trans('menus.backend.visions.edit'), route('admin.visions.edit', $id));
});
