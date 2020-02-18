<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class KillQueue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kill:queue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        //
        $process = $this->osProcessIsRunning('queue:work');
        if ($process) {
            foreach ($process as $pro) {
                $this->info($pro);
                $pid = substr($pro, 10, 5);
                exec('kill ' . $pid, $ret);
                $this->info('Terminated');
            }
            return;
        }

        $this->info('No queue process running!');
        return;

    }

    /**
     * checks, if a process with $needle in the name is running
     *
     * @param string $needle
     * @return bool
     */
    protected function osProcessIsRunning($needle)
    {
        // get process status. the "-ww"-option is important to get the full output!
        exec('ps aux -ww', $process_status);

        // search $needle in process status
        $result = array_filter($process_status, function ($var) use ($needle) {
            return strpos($var, $needle);
        });

        // if the result is not empty, the needle exists in running processes
        if (!empty($result)) {

            return $result;
        }

        return false;
    }
}
