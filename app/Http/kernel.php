<?php

// app/Http/Kernel.php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // Middleware lainnya
        'role' => \App\Http\Middleware\CheckRole::class, // Pastikan ini berada di dalam array ini
    ];
}
