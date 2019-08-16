<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/functions.php';

class_alias('Core\\Worker\\Template\\Asset', 'Asset');
class_alias('Core\\Worker\\Template\\Theme', 'Theme');
class_alias('Core\\Worker\\Template\\Setting', 'Setting');
class_alias('Core\\Worker\\Template\\Menu', 'Menu');
class_alias('Core\\Worker\\Customize\\Customize', 'Customize');

use Core\DI;
use Core\Starter;

try {

  $di = new DI();

  $providers = require __DIR__ . '/Provider/providerList.php';

  foreach($providers as $item) {
    $provider = new $item($di);
    $provider->init();
  }

  $starter = new Starter($di);
  $starter->run();

} catch(\ErrorException $e) {
  echo $e->getMessage();
}

?>
