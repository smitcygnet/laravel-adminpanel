<?php

Breadcrumbs::register('admin.comments.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.comments.management'), route('admin.comments.index'));
});

Breadcrumbs::register('admin.comments.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.comments.index');
    $breadcrumbs->push(trans('menus.backend.comments.create'), route('admin.comments.create'));
});

Breadcrumbs::register('admin.comments.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.comments.index');
    $breadcrumbs->push(trans('menus.backend.comments.edit'), route('admin.comments.edit', $id));
});
