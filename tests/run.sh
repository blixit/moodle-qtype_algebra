#!/bin/bash

set -e

#Parameters
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
MOODLE_ROOT=$DIR/../../../..
MOODLE_PHPUNIT=$MOODLE_ROOT/vendor/bin/phpunit
TEST_DIR="question/type/algebra/tests"


if [[ ! -f $MOODLE_PHPUNIT ]]; then
    echo "Moodle Phunit Binary Not Found";
    exit -1;
fi

if [[ ! -d "tests" ]]; then
    echo "'tests' direcotry Not Found";
    exit -1;
fi

cd $MOODLE_ROOT/
cmd="$MOODLE_PHPUNIT $TEST_DIR/ --stop-on-warning --test-suffix=test.php -v "
eval $cmd
exit $?