<?php

namespace KamalSroor\LaravelSettings;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Manager;

class SettingsManager extends Manager
{
    /**
     * Create an instance of the database settings driver.
     *
     * @return \KamalSroor\LaravelSettings\DatabaseSettingsHandler
     */
    public function createDatabaseDriver()
    {
        return new DatabaseSettingsHandler(app());
    }

    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return Config::get('laravel-settings.driver');
    }

    /**
     * Set the default driver name.
     *
     * @param string $name
     *
     * @return void
     */
    public function setDefaultDriver($name)
    {
        Config::set(['laravel-settings.driver' => $name]);
    }
}
