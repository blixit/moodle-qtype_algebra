#!/bin/bash

#Parameters
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
MOODLE_ROOT=$DIR/../../../..
MOODLE_PHPUNIT=$MOODLE_ROOT/vendor/bin/phpunit
PHP_EXT=.php
REPLACE_WITH=


if [[ ! -f $MOODLE_PHPUNIT ]]; then
    echo "Moodle Phunit Binary Not Found";
    exit -1;
fi

if [[ ! -d "tests" ]]; then
    echo "'tests' direcotry Not Found";
    exit -1;
fi

cd $MOODLE_ROOT
for file in $DIR/*.php
do
    filename="${file##*/}"
    classname="${filename/$PHP_EXT}"
    cmd="$MOODLE_PHPUNIT $classname $file"

    echo "Testing " $classname " ..."
    eval $cmd
    if [[ ! $? -eq 0 ]]; then
        echo "Tests failed"
        exit -1;
    fi
done