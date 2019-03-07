<?php

Breadcrumbs::register('admin.testmthrees.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.testmthrees.management'), route('admin.testmthrees.index'));
});

Breadcrumbs::register('admin.testmthrees.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.testmthrees.index');
    $breadcrumbs->push(trans('menus.backend.testmthrees.create'), route('admin.testmthrees.create'));
});

Breadcrumbs::register('admin.testmthrees.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.testmthrees.index');
    $breadcrumbs->push(trans('menus.backend.testmthrees.edit'), route('admin.testmthrees.edit', $id));
});
