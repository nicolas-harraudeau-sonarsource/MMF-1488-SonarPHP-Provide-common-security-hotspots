<?php

use Cake\Auth\BaseAuthorize;
use Cake\Controller\Controller;

class MyAuthorize extends BaseAuthorize { // Questionable. Method extending Cake\Auth\BaseAuthorize.
    // ...
}

class MyController extends Controller {
    public function isAuthorized($user) { // Questionable. Method called isAuthorized in a Cake\Controller\Controller.
        // ...
    }
}