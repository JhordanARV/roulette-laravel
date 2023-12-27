<?php

namespace App\Console\Commands;

use App\Http\Controllers\HomeController;
use Illuminate\Console\Command;

class RunHomeControllerInvoke extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run-home-controller-invoke';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $controller = new HomeController();
        $controller();
        echo "HomeController invoked\n";
        return 0;
    }
}
