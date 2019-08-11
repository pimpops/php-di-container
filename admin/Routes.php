<?php

$this->router->add('login', '/admin/login/', 'LoginController:form');
$this->router->add('logout', '/admin/logout/', 'AdminController:logout');
$this->router->add('auth-admin', '/admin/auth/', 'LoginController:authAdmin', 'POST');
$this->router->add('dashboard', '/admin/', 'DashboardController:index');

// Pages Routes (GET)
$this->router->add('pages', '/admin/pages/', 'PageController:listing');
$this->router->add('page-create', '/admin/pages/create/', 'PageController:create');
$this->router->add('page-edit', '/admin/pages/edit/(id:int)', 'PageController:edit');

// Pages Routes (POST)
$this->router->add('page-add', '/admin/page/add/', 'PageController:add', 'POST');
$this->router->add('page-update', '/admin/page/update/', 'PageController:update', 'POST');

// Settings Routes (GET)
$this->router->add('settings-general', '/admin/settings/general/', 'SettingController:general');

// Settings Routes (POST)
$this->router->add('setting-update', '/admin/settings/update/', 'SettingController:updateSetting', 'POST');

?>
