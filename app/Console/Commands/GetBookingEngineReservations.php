<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GetBookingEngineReservations extends Command
{
    private $bookingEngine;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cr:get_reservations
                            {booking-engine : Código del motor de reservas.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Obtiene las reservas de un motor de reservas.';

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
        $class = '\\App\\' . studly_case($this->argument('booking-engine')) . '\\' . studly_case($this->argument('booking-engine'));
        $this->bookingEngine = new $class();

        //
        $this->info($this->argument('booking-engine'));

        $yesterday =  date('Y-m-d', strtotime("-1 days"));
        $today =  date('Y-m-d', strtotime("+1 days"));

        $reservations = $this->bookingEngine->getReservations($yesterday, $today, null, true);
		
		if ($reservations['error']) {
			Log::error('CM Reservas ' . $reservations['data']->error->{'@attributes'}->code . ': ' . $reservations['data']->error->{'@attributes'}->message);
			return;
		}

        $this->bookingEngine->saveReservations($reservations);
    }
}
