<?php

namespace Core\Worker\Template;

use Core\DI;
use Site\Model\Menu\MenuRepository;
use Site\Model\MenuItem\MenuItemRepository;

class Menu {

    protected static $di;
    protected static $menuRepository;
    protected static $menuItemRepository;

    public function __construct($di) {
        self::$di = $di;
        self::$menuRepository = new MenuRepository(self::$di);
        self::$menuItemRepository = new MenuItemRepository(self::$di);
    }
    public static function show() {
    }

    public static function getItems($menuId) {
        return self::$menuItemRepository->getItems($menuId);
    }
}
