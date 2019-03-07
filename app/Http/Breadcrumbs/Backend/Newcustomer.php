<?php

Breadcrumbs::register('admin.newcustomers.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.newcustomers.management'), route('admin.newcustomers.index'));
});

Breadcrumbs::register('admin.newcustomers.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.newcustomers.index');
    $breadcrumbs->push(trans('menus.backend.newcustomers.create'), route('admin.newcustomers.create'));
});

Breadcrumbs::register('admin.newcustomers.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.newcustomers.index');
    $breadcrumbs->push(trans('menus.backend.newcustomers.edit'), route('admin.newcustomers.edit', $id));
});
