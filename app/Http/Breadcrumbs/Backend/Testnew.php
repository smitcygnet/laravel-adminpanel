<?php

Breadcrumbs::register('admin.testnews.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.testnews.management'), route('admin.testnews.index'));
});

Breadcrumbs::register('admin.testnews.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.testnews.index');
    $breadcrumbs->push(trans('menus.backend.testnews.create'), route('admin.testnews.create'));
});

Breadcrumbs::register('admin.testnews.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.testnews.index');
    $breadcrumbs->push(trans('menus.backend.testnews.edit'), route('admin.testnews.edit', $id));
});
