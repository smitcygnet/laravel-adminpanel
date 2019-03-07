<?php

Breadcrumbs::register('admin.testmodulenews.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.testmodulenews.management'), route('admin.testmodulenews.index'));
});

Breadcrumbs::register('admin.testmodulenews.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.testmodulenews.index');
    $breadcrumbs->push(trans('menus.backend.testmodulenews.create'), route('admin.testmodulenews.create'));
});

Breadcrumbs::register('admin.testmodulenews.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.testmodulenews.index');
    $breadcrumbs->push(trans('menus.backend.testmodulenews.edit'), route('admin.testmodulenews.edit', $id));
});
