#!/bin/bash
phpbrew install 5.6 +openssl +mysql +pdo

# This script prepares the environment for running the code
for php_version in "php-7.2.12" "php-5.6.38"; do
    # Changing PHP version
    phpbrew use "$php_version"
    phpbrew ext install mbstring
    phpbrew ext install hash
    phpbrew ext install mssql
    phpbrew ext install pgsql
    # phpbrew ext install 
done