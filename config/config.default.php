<?php
/**
 * Default configuration for XHGui.
 *
 * To change these, create a called `config.php` file in the same directory,
 * and return an array from there with your overriding settings.
 */

return array(
    'debug' => false,
    'mode' => 'development',
    'save.handler' => 'mongodb',
    'extension' => 'tideways_xhprof',
    'db.host' => 'mongodb://127.0.0.1:27017',
    'db.db' => 'xhprof',
    'db.options' => array(),
    'profiler.enable' => function() {
        return true;
    },
    'profiler.simple_url' => function($url) {
        return preg_replace('/\=\d+/', '', $url);
    },
    'profiler.options' => array(),
    'date.format' => 'M jS H:i:s',
    'detail.count' => 6,
    'page.limit' => 25,
    'templates.path' => dirname(__DIR__) . '/src/templates',
);