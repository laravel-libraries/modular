<?php

require getcwd().'/bootstrap/autoload.php';

$app = require getcwd().'/bootstrap/app.php';

$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
