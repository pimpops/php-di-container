<?php

namespace Site\Plugin\LiveTest;

class Plugin extends \Core\Plugin {

    public function details() {
        return [
            'name'        => 'Live Test Demo',
            'description' => 'Demonstration plugin.',
            'author'      => 'Andrii Pereverziev',
            'icon'        => 'icon-leaf'
        ];
    }

    public function init() {
      echo 222;
    }
}
