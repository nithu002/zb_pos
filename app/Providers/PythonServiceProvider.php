<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\Process\Process;

class PythonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->singleton('python-service', function() {
            return new class {
                protected $process;

                public function startServer()
                {
                    if ($this->isRunning()) {
                        return;
                    }

                    $pythonPath = base_path('python');
                    $this->process = new Process([
                        config('python.binary', 'python3'),
                        'app.py'
                    ], $pythonPath, null, null, null);

                    $this->process->start();
                    sleep(2); // Wait for server to start
                }

                public function stopServer()
                {
                    if ($this->process && $this->process->isRunning()) {
                        $this->process->stop();
                    }
                }

                public function isRunning()
                {
                    try {
                        return file_get_contents(config('python.url').'/health') !== false;
                    } catch (\Exception $e) {
                        return false;
                    }
                }
            };
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        if (config('python.auto_start', false)) {
            app('python-service')->startServer();
        }
    }
}
