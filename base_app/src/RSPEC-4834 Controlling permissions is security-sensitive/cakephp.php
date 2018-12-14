<?php

use Cake\Auth\BaseAuthorize;
use Cake\Controller\Controller;

abstract class MyAuthorize extends BaseAuthorize { // Questionable. Method extending Cake\Auth\BaseAuthorize.
    // ...
}

abstract class  MyController extends Controller {
    public function isAuthorized($user) { // Questionable. Method called isAuthorized in a Cake\Controller\Controller.
        return false;
    }
}