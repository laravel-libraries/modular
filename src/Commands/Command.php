<?php
namespace LaraLibs\Modular\Commands;

use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;
use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Command as BaseCommand;

class Command extends BaseCommand
{
    /**
     * The base folder
     *
     * @var string
     */
    protected $baseFolder = 'modules';

    /**
     * {@inheritdoc}
     * Extend the storage local to use the basepath/root folder
     */
    public function __construct()
    {
        parent::__construct();

        Storage::extend('local', function($app, $config) {
            $client = new Local(base_path());

            return new Filesystem($client);
        });
    }
}
