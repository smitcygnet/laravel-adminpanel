<?php

Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push(__('navs.backend.dashboard'), route('admin.dashboard'));
});

require __DIR__.'/Search.php';
require __DIR__.'/Access/User.php';
require __DIR__.'/Access/Role.php';
require __DIR__.'/Access/Permission.php';
require __DIR__.'/Page.php';
require __DIR__.'/Setting.php';
require __DIR__.'/Blog_Category.php';
require __DIR__.'/Blog_Tag.php';
require __DIR__.'/Blog_Management.php';
require __DIR__.'/Faqs.php';
require __DIR__.'/Menu.php';
require __DIR__.'/LogViewer.php';

require __DIR__.'/Standard.php';
require __DIR__.'/Student.php';

require __DIR__.'/Tempone.php';
require __DIR__.'/Temptwo.php';
require __DIR__.'/Vision.php';
require __DIR__.'/Life.php';
require __DIR__.'/Sampleone.php';
require __DIR__.'/Sampletwo.php';
require __DIR__.'/Samplethree.php';
require __DIR__.'/Samplefour.php';
require __DIR__.'/Samplefive.php';
require __DIR__.'/Samplesix.php';
require __DIR__.'/Sampleseven.php';
require __DIR__.'/Sampletemp.php';
require __DIR__.'/Samplesevennew.php';