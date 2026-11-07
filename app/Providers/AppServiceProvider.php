<?php

namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->prepareEphemeralDatabase();
    }

    /**
     * On serverless hosts (Vercel) the only writable disk is /tmp, which is wiped between cold starts.
     * When EPHEMERAL_SQLITE is on, create and migrate the SQLite file on first use so the forms work.
     * Data stored this way is temporary — point DB_* at a hosted database to keep submissions.
     */
    private function prepareEphemeralDatabase(): void
    {
        if (! config('ssk.ephemeral_sqlite') || config('database.default') !== 'sqlite') {
            return;
        }

        $path = config('database.connections.sqlite.database');

        if (is_string($path) && ! file_exists($path)) {
            touch($path);
            Artisan::call('migrate', ['--force' => true]);
        }
    }
}
