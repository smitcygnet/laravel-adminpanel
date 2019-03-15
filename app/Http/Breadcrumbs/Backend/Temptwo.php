<?php

Breadcrumbs::register('admin.temptwos.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.temptwos.management'), route('admin.temptwos.index'));
});

Breadcrumbs::register('admin.temptwos.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.temptwos.index');
    $breadcrumbs->push(trans('menus.backend.temptwos.create'), route('admin.temptwos.create'));
});

Breadcrumbs::register('admin.temptwos.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.temptwos.index');
    $breadcrumbs->push(trans('menus.backend.temptwos.edit'), route('admin.temptwos.edit', $id));
});
