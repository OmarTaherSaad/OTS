<?php

namespace App\Console;

use Illuminate\Console\Command;
use Illuminate\Console\ContainerCommandLoader;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

/**
 * Wraps ContainerCommandLoader so that commands resolved from the container
 * always have the Laravel application set on them (setLaravel).
 *
 * Works around Laravel issue where commands loaded via the command loader
 * can run with $this->laravel === null, causing "Call to a member function
 * make() on null" in Command::run() (e.g. during php artisan package:discover).
 *
 * @see https://github.com/laravel/framework/issues/56098
 * @see https://github.com/laravel/framework/issues/58023
 */
class LaravelAwareCommandLoader extends ContainerCommandLoader
{
    /**
     * Resolve a command from the container and ensure it has the Laravel app set.
     */
    public function get(string $name): SymfonyCommand
    {
        $command = parent::get($name);

        if ($command instanceof Command) {
            $command->setLaravel($this->container);
        }

        return $command;
    }
}
