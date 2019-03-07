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
require __DIR__.'/Comment.php';
require __DIR__.'/Test.php';
require __DIR__.'/Referencemodule.php';
require __DIR__.'/Customer.php';
require __DIR__.'/School.php';
require __DIR__.'/Newschool.php';
require __DIR__.'/Newnew.php';
require __DIR__.'/Newsnew.php';
require __DIR__.'/Smtnew.php';
require __DIR__.'/Smittest.php';
require __DIR__.'/Newcustomer.php';
require __DIR__.'/Teacher.php';
require __DIR__.'/Testmodule.php';
require __DIR__.'/Barber.php';
require __DIR__.'/Testmodulenew.php';
require __DIR__.'/Smitendra.php';
require __DIR__.'/Tempmodule.php';
require __DIR__.'/Customnew.php';
require __DIR__.'/Sample.php';
require __DIR__.'/Samplenew.php';
require __DIR__.'/Sampleone.php';
require __DIR__.'/Sampletwo.php';
require __DIR__.'/Samplethree.php';
require __DIR__.'/Samplefour.php';
require __DIR__.'/Employeeone.php';
require __DIR__.'/Employeetwo.php';
require __DIR__.'/Testmone.php';
require __DIR__.'/Testmtwo.php';
require __DIR__.'/Testmthree.php';
require __DIR__.'/Testmfour.php';