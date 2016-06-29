cd ${LARAVEL_FOLDER}
composer require ${PACKAGE_NAME}:dev-${TRAVIS_BRANCH}
composer update
ls

./artisan cache:clear
./artisan config:clear

vendor/bin/phpunit -c vendor/${PACKAGE_NAME}/phpunit.xml --testsuite ${TEST_SUITE}
