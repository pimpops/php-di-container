<?php

namespace Site\Plugin\ExamplePlugin;

class Plugin extends \Core\Plugin {

    public function details() {
        return [
            'name'        => 'Plugin Demo',
            'description' => 'Demonstration plugin.',
            'author'      => 'Andrii Pereverziev',
            'icon'        => 'icon-leaf'
        ];
    }

    public function init() {
      echo 111; 
    }
}
