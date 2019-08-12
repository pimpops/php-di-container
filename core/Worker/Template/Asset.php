<?php

namespace Core\Worker\Template;

class Asset {

    const EXT_JS   = '.js';
    const EXT_CSS  = '.css';
    const EXT_LESS = '.less';
    const JS_SCRIPT_MASK = '<script src="%s" type="text/javascript"></script>';
    const CSS_LINK_MASK  = '<link rel="stylesheet" href="%s">';

    public static $container = [];
    public static $assetsFolderName = 'assets';

    public static function getUrl() {
      return Theme::getUrl() . DS . self::$assetsFolderName . DS;
    }

    public static function css($link, $external = false) {
      if (!$external) {
        $file = Theme::getThemePath() . DS . self::$assetsFolderName . DS . $link . self::EXT_CSS;

        if (is_file($file)) {
            self::$container['css'][] = [
                'file' => self::getUrl() . $link . self::EXT_CSS
            ];
        }
      } else {
          self::$container['css'][] = [
              'file' => $link . self::EXT_CSS
          ];
      }
    }

    public static function js($link, $external = false) {
      if (!$external) {
        $file = Theme::getThemePath() . DS . self::$assetsFolderName . DS . $link . self::EXT_JS;

        if (is_file($file)) {
            self::$container['js'][] = [
                'file' => self::getUrl() . $link . self::EXT_JS
            ];
        }
      } else {
        self::$container['js'][] = [
            'file' => $link . self::EXT_JS
        ];
      }
    }

    public static function render($extension) {
        $listAssets = isset(self::$container[$extension]) ? self::$container[$extension] : false;
        if ($listAssets) {
            $renderMethod = 'render' . ucfirst($extension);
            self::$renderMethod($listAssets);
        }
    }

    public static function renderJs($list) {
        foreach ($list as $item) {
            echo sprintf(
                self::JS_SCRIPT_MASK,
                $item['file']
            );
        }
    }

    public static function renderCss($list) {

        foreach ($list as $item) {
            echo sprintf(
                self::CSS_LINK_MASK,
                $item['file']
            );
        }
    }
}
