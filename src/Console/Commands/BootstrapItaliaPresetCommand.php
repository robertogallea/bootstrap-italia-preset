<?php

namespace RobertoGallea\BootstrapItaliaPreset\Console\Commands;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Laravel\Ui\Presets\Preset;

class BootstrapItaliaPresetCommand extends Preset
{
    public static function install()
    {
        static::updatePackages();
        static::updateStyles();
        static::updateBootstrapping();
        static::updateWelcomePage();
        static::removeNodeModules();
    }

    public static function installAuth()
    {
        static::scaffoldController();
        static::scaffoldAuth();
    }

    protected static function updatePackageArray(array $packages)
    {
        return array_merge([
            'bootstrap-italia' => '^1.4.3',
            'laravel-mix' => '^6.0.6',
            'resolve-url-loader' => '^3.1.3',
            'sass' => '^1.34.0',
            'sass-loader' => '^11.1.1',
        ], Arr::except($packages, [
            'popper.js',
            'jquery',
            'bootstrap',
            'bootstrap-select',
        ]));
    }

    protected static function updateStyles()
    {
        File::cleanDirectory(resource_path('scss'));
        tap(new Filesystem, function ($filesystem) {
            $filesystem->deleteDirectory(resource_path('sass'));
            $filesystem->delete(public_path('js/app.js'));
            $filesystem->delete(public_path('css/app.css'));

            if (!$filesystem->isDirectory($directory = resource_path('scss'))) {
                $filesystem->makeDirectory($directory, 0755, true);
            }

            copy(__DIR__ . '/../../../bootstrap-italia-stubs/resources/scss/app.scss', resource_path('scss/app.scss'));
        });

    }

    protected static function updateBootstrapping()
    {
        copy(__DIR__ . '/../../../bootstrap-italia-stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    protected static function updateWelcomePage()
    {
        (new Filesystem)->delete(resource_path('views/welcome.blade.php'));

        copy(__DIR__ . '/../../../bootstrap-italia-stubs/resources/views/welcome.blade.php', resource_path('views/welcome.blade.php'));
    }

}
