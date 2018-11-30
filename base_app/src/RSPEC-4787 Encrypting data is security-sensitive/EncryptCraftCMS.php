<?php

use Craft;

//  Only CraftCMS version 3 is supported here

// Similar to Yii as it used by CraftCMS
// https://docs.craftcms.com/api/v3/craft-services-security.html#public-properties
function craftEncrypt($data, $key, $password) {
    Craft::$app->security->encryptByKey($data, $key); // Questionable
    Craft::$app->getSecurity()->encryptByKey($data, $key); // Questionable
    Craft::$app->security->encryptByPassword($data, $password); // Questionable
    Craft::$app->getSecurity()->encryptByPassword($data, $password); // Questionable
}