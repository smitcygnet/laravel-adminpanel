<?php

Breadcrumbs::register('admin.newschools.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.newschools.management'), route('admin.newschools.index'));
});

Breadcrumbs::register('admin.newschools.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.newschools.index');
    $breadcrumbs->push(trans('menus.backend.newschools.create'), route('admin.newschools.create'));
});

Breadcrumbs::register('admin.newschools.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.newschools.index');
    $breadcrumbs->push(trans('menus.backend.newschools.edit'), route('admin.newschools.edit', $id));
});
