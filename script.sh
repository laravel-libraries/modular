cd ${LARAVEL_FOLDER}
composer require ${PACKAGE_NAME}:dev-${TRAVIS_BRANCH}
composer update --no-scripts
ls

./artisan cache:clear
./artisan config:clear

vendor/bin/phpunit -c vendor/${PACKAGE_NAME}/phpunit.xml
