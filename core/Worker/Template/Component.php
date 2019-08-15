<?php

namespace Core\Worker\Template;

class Component {
    
    public static function load($name, $data = []) {
        
        $templateFile = Theme::getThemePath() . DS . $name . '.php';

        if (is_file($templateFile)) {
            extract(array_merge($data, Theme::getData()));
            require($templateFile);
        } else {
            throw new \Exception(
                sprintf('View file %s does not exist!', $templateFile)
            );
        }
    }
}