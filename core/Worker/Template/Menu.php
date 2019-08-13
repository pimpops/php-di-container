<?php

namespace Core\Worker\Template;

use Core\DI;
use Site\Model\Menu\MenuRepository;

class Menu {

    protected static $di;
    protected static $menuRepository;
    public function __construct($di) {
        self::$di = $di;
        self::$menuRepository = new MenuRepository(self::$di);
    }
    public static function show() {
    }
    public static function getItems() {
        return self::$menuRepository->getAllItems();
    }
}
