#!/bin/bash
phpbrew install 5.6 +openssl +mysql +pdo

# This script prepares the environment for running the code
for php_version in "php-7.2.12" "php-5.6.38"; do
    # Changing PHP version
    phpbrew use "$php_version"

    # required by Phan
    phpbrew ext install ast
    phpbrew ext install filter

    phpbrew ext install mbstring
    phpbrew ext install hash
    phpbrew ext install mssql
    phpbrew ext install pgsql

    # HTTP REQUESTS
    phpbrew ext install raphf # required by pecl_http
    phpbrew ext install propro # required by pecl_http
    phpbrew ext install pecl_http # for HTTP client rules

    phpbrew ext install curl

    # for cakephp
    phpbrew ext install intl

    # for craftcms/cms
    phpbrew ext install pdo
    phpbrew ext install zip

    # for league/flysystem
    phpbrew ext install fileinfo

    # for yiisoft/yii2
    phpbrew ext install ctype

    # for nette/neon
    phpbrew ext install iconv

    # for zendframework/zend-soap
    phpbrew ext install soap
    # phpbrew ext install 
done