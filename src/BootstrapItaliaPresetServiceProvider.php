<?php


namespace RobertoGallea\BootstrapItaliaPreset;


use Laravel\Ui\UiCommand;
use RobertoGallea\BootstrapItaliaPreset\Console\Commands\BootstrapItaliaPresetCommand;

class BootstrapItaliaPresetServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        UiCommand::macro('bootstrap-italia', function ($command) {
            BootstrapItaliaPresetCommand::install();

            $command->info("Bootstrap-italia preset successfully insatlled");

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }

}
