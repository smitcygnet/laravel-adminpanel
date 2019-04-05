<?php

Breadcrumbs::register('admin.posts.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.posts.management'), route('admin.posts.index'));
});

Breadcrumbs::register('admin.posts.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.posts.index');
    $breadcrumbs->push(trans('menus.backend.posts.create'), route('admin.posts.create'));
});

Breadcrumbs::register('admin.posts.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.posts.index');
    $breadcrumbs->push(trans('menus.backend.posts.edit'), route('admin.posts.edit', $id));
});
