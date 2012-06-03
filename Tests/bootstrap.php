<?php
/**
 * User: Toni Van de Voorde (toni [dot] vdv [AT] gmail [dot] com)
 * Date: 2/06/12
 * Time: 11:31
 */

spl_autoload_register(function ($class) {
  if (0 === strpos(ltrim($class, '/'), 'ToniVdv\PhpDomUtils')) {
    if (file_exists($file = __DIR__.'/../'.substr(str_replace('\\', '/', $class), strlen('ToniVdv\PhpDomUtils')).'.php')) {
      require_once $file;
    }
  }
});