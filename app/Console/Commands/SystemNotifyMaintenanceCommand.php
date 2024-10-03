<?php

namespace App\Console\Commands;

use App\Events\SystemMaintenanceEvent;
use Illuminate\Console\Command;

class SystemNotifyMaintenanceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:notify-maintenance';

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
        // $time = $this->ask('When should it happen?');

        // event(new SystemMaintenanceEvent($time));

        event(new SystemMaintenanceEvent(now()->toDateTimeString()));

    }
}
