<?php

namespace App\Console;

use Illuminate\Console\Application as Artisan;

/**
 * Artisan application that uses LaravelAwareCommandLoader so commands
 * resolved from the container always have the Laravel app set (fixes
 * "Call to a member function make() on null" during package:discover).
 */
class Application extends Artisan
{
    /**
     * Set the container command loader for lazy resolution.
     * Use our loader so resolved commands get setLaravel() called.
     *
     * @return $this
     */
    public function setContainerCommandLoader()
    {
        $this->setCommandLoader(new LaravelAwareCommandLoader($this->laravel, $this->commandMap));

        return $this;
    }
}
