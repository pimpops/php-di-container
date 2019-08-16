<?php

namespace Core\Worker\Template;

use Core\Worker\Config\Config;

class Theme {

  public $path;
  public static $themeMask;

  protected static $url = '';
  protected static $data = [];

  public $asset;
  public $theme;

  public function __construct() {
    $this->path = path('view');
    self::$themeMask = DS . mb_strtolower(ENV) . '/View/themes/%s';

    $this->theme = $this;
    $this->asset = new Asset();
  }

  const RULES_NAME_FILE = [
    'header' => 'header-%s',
    'footer' => 'footer-%s',
    'sidebar' => 'sidebar-%s'
  ];

  public static function getUrl() {

      $currentTheme = Config::item('defaultTheme', 'main');
      return sprintf(self::$themeMask, $currentTheme);
  }

  public static function getData() {
    return static::$data;
  }

  public function setData($data) {
    static::$data = $data;
  }

  public static function title() {
    $nameSite = Setting::get('name_site');
    $description = Setting::get('description');

    echo $nameSite . ' | ' . $description;
  }

  public function header($name = '') {
    $name = (string) $name;
    $file = 'header';

    if ($name !== '') {
      $file = sprintf(self::RULES_NAME_FILE['header'], $name);
    }

    $this->loadTemplateFile($file);
  }

  public function footer($name = '') {
    $name = (string) $name;
    $file = 'footer';

    if ($name !== '') {
      $file = sprintf(self::RULES_NAME_FILE['footer'], $name);
    }

    $this->loadTemplateFile($file);
  }

  public function sidebar($name = '') {

  }

  public static function block($name = '', $data = [])
    {
        $name = (string) $name;
        if ($name !== '') {
            Component::load($name, $data);
        }
    }

  private function loadTemplateFile($nameFile, $data = []) {

    $templateFile = self::getThemePath() . DS . $nameFile . '.php';

    if (is_file($templateFile)) {
      extract($this->getData());
      extract($data);
      require $templateFile;
    } else {
      throw new \Exception(
        sprintf('View file %s does not exist!', $templateFile)
      );
    }
  }

  public static function getThemePath() {
    $theme = Config::item('defaultTheme');

    if (ENV === 'Site') {
      $theme = Setting::get('active_theme');
    }

    return path('view') . '/themes/' . $theme;
  }
}
