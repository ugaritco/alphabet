<?php

use Heritage\Foundation\Application;
use Heritage\Foundation\Configuration\Exceptions;

return Application::configure(basePath: dirname(__DIR__))
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
