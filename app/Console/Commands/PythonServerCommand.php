<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PythonServerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'python:serve {action?}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage Python image generation server';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $action = $this->argument('action') ?? 'status';

        switch ($action) {
            case 'start':
                app('python-service')->startServer();
                $this->info('Python server started');
                break;

            case 'stop':
                app('python-service')->stopServer();
                $this->info('Python server stopped');
                break;

            case 'status':
                $this->info(
                    app('python-service')->isRunning()
                    ? 'Python server is running'
                    : 'Python server is not running'
                );
                break;

            default:
                $this->error('Invalid action. Use start, stop, or status');
        }
    }
}
