<?php

namespace Core\Worker\Plugin;

use Admin\Model\Plugin\PluginRepository;
use Core\Service;

class Plugin extends Service {

    public function install($directory) {

        $this->getLoad()->model('Plugin');
        $pluginModel = $this->getModel('plugin');
        if (!$pluginModel->isInstallPlugin($directory)) {
            $pluginModel->addPlugin($directory);
        }
    }
    public function activate($id, $active)
    {
        $this->getLoad()->model('Plugin');
        $pluginModel = $this->getModel('plugin');
        print_r($active);
        $pluginModel->activatePlugin($id, $active);
    }

    public function getActivePlugins() {
        $this->getLoad()->model('Plugin');
        /** @var PluginRepository $pluginModel */
        $pluginModel = $this->getModel('plugin');
        return $pluginModel->getActivePlugins();
    }
}
