#!/bin/sh
source ~/.phpbrew/bashrc

# This script simply runs all the code examples just to
# make sure that they are valid PHP code

# coloring functions
purple=`tput setaf 5`
yellow=`tput setaf 3`
green=`tput setaf 2`
reset=`tput sgr0`

# Running all the code examples
run() {
    for file in src/**/*.php; do
        echo "${yellow}EXECUTING  ${green} $file ${reset}"
        php "$file"
    done
}

for php_version in "php-7.2.12" "php-5.6.38"; do
    # Changing PHP version
    phpbrew use "$php_version"
    echo "${purple}PHP${php_version} - STARTING TO EXECUTE ALL CODE EXAMPLES${reset}"
    run;
    echo "${purple}FINISHED${reset}"
done