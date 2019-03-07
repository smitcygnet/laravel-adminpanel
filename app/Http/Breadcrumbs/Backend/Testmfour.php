<?php

Breadcrumbs::register('admin.testmfours.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.testmfours.management'), route('admin.testmfours.index'));
});

Breadcrumbs::register('admin.testmfours.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.testmfours.index');
    $breadcrumbs->push(trans('menus.backend.testmfours.create'), route('admin.testmfours.create'));
});

Breadcrumbs::register('admin.testmfours.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.testmfours.index');
    $breadcrumbs->push(trans('menus.backend.testmfours.edit'), route('admin.testmfours.edit', $id));
});
