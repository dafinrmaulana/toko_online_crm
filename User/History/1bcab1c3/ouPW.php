<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Clean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear cached config application';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->callSilent('config:cache');
        $this->callSilent('config:clear');
        $this->callSilent('cache:clear');
        $this->callSilent('view:cache');
        $this->callSilent('optimize');
        $this->info("Cached cleaned!");
    }
}
