#!/usr/bin/env bash

if [ ! -f "${LARAVEL_FOLDER}/composer.json" ]; then
    composer create-project laravel/laravel:${LARAVEL_VERSION} ${LARAVEL_FOLDER}

    cd ${LARAVEL_FOLDER}

    composer update

    if [[ -v PACKAGE_PROVIDER ]]; then
        echo "$(awk '/'\''providers'\''[^\n]*?\[/ { print; print "'$(sed -e 's/\s*//g' <<<${PACKAGE_PROVIDER})',"; next }1' \
            config/app.php)" > config/app.php
    fi

    if [[ -v SEED_CLASS ]]; then
        echo "$(cat database/seeds/DatabaseSeeder.php | \
            sed ':a;N;$!ba;s/\(public function run().*\?{\)/\1\n\t\$this->call('$SEED_CLASS');/g')" \
            > database/seeds/DatabaseSeeder.php
    fi

    php artisan vendor:publish

    composer dumpautoload
fi

cd ..
