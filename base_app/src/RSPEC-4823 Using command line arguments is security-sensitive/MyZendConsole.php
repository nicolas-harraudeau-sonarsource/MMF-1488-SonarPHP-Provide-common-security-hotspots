<?php

use Zend;

// https://docs.zendframework.com/zend-console/getopt/rules/

$opts = new Zend\Console\Getopt(['myopt|m' => 'this is an option']); // Questionable