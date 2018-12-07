<?php

use Cake\Routing\Router;

Router::scope('/', function ($routes) { // Questionable
    // ...
});

Router::connect('/', ['controller' => 'MyController', 'action' => 'index']); // Questionable

Router::plugin('MyPlugin', function ($routes) { // Questionable
    // ...
});

Router::prefix('admin', function ($routes) { // Questionable
    // ...
});