<?php

function path($section) {

    $env = ENV === 'Site' ? mb_strtolower(ENV) . '/' : '';

    $pathMask = ROOT_DIR . DS . $env . '%s';

    // Return path to correct section.
    switch (strtolower($section))
    {
        case 'controller':
            return sprintf($pathMask, 'Controller');
        case 'config':
            return sprintf($pathMask, 'Config');
        case 'model':
            return sprintf($pathMask, 'Model');
        case 'view':
            return sprintf($pathMask, 'View');
        case 'language':
            return sprintf($pathMask, 'Language');
        default:
            return ROOT_DIR;
    }
}

function languages() {
    $directory = path('language');
    $list      = scandir($directory);
    $languages = [];
    if (!empty($list)) {
        unset($list[0]);
        unset($list[1]);
        foreach ($list as $dir) {
            $pathLangDir = $directory . DS . $dir;
            $pathConfig  = $pathLangDir . '/config.json';
            if (is_dir($pathLangDir) and is_file($pathConfig)) {
                $config = file_get_contents($pathConfig);
                $info   = json_decode($config);
                $languages[] = $info;
            }
        }
    }
    return $languages;
}
