<?php

use Yii;

// Only Yii version 2 is supported here

// Similar to CraftCMS as it uses Yii
// https://www.yiiframework.com/doc/api/2.0/yii-base-security#$cipher-detail
function YiiEncrypt($data, $key, $password) {
    // Yii::$app->getSecurity()
    Yii::$app->security->encryptByKey($data, $key); // Questionable
    Yii::$app->getSecurity()->encryptByKey($data, $key); // Questionable
    Yii::$app->security->encryptByPassword($data, $password); // Questionable
    Yii::$app->getSecurity()->encryptByPassword($data, $password); // Questionable
}