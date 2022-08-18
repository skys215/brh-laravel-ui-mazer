<?php

namespace Skys215\MazerPreset;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;

class MazerPresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        UiCommand::macro('mazer', function (UiCommand $command) {
            $adminLTEPreset = new MazerPreset($command);
            $adminLTEPreset->install();

            $command->info('Mazer scaffolding installed successfully.');

            if ($command->option('auth')) {
                $adminLTEPreset->installAuth();
                $command->info('Mazer CSS auth scaffolding installed successfully.');
            }

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });

        UiCommand::macro('mazer-localized', function (UiCommand $command) {
            $adminLTEPreset = new MazerLocalizedPreset($command);
            $adminLTEPreset->install();

            $command->info('Mazer scaffolding installed successfully with localization.');

            if ($command->option('auth')) {
                $adminLTEPreset->installAuth();
                $command->info('Mazer CSS auth scaffolding installed successfully with localization.');
            }

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });

        UiCommand::macro('mazer-fortify', function (UiCommand $command) {
            $fortifyMazerPreset = new MazerPreset($command, true);
            $fortifyMazerPreset->install();

            $command->info('Mazer scaffolding installed successfully for Laravel Fortify.');

            if ($command->option('auth')) {
                $fortifyMazerPreset->installAuth();
                $command->info('Mazer CSS auth scaffolding installed successfully for Laravel Fortify.');
            }

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });

        if (class_exists(Fortify::class)) {
            Fortify::loginView(function () {
                return view('auth.login');
            });

            Fortify::registerView(function () {
                return view('auth.register');
            });

            Fortify::confirmPasswordView(function () {
                return view('auth.passwords.confirm');
            });

            Fortify::requestPasswordResetLinkView(function () {
                return view('auth.passwords.email');
            });

            Fortify::resetPasswordView(function () {
                return view('auth.passwords.reset');
            });

            Fortify::verifyEmailView(function () {
                return view('auth.verify');
            });
        }
    }
}
