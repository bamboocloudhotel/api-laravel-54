<?php

  namespace App\Console\Commands;

  use App\BambooInstance;
  use App\InventoryUpdate;
  use Illuminate\Console\Command;

  class ModifyBookingEngineInventory extends Command
  {
    private $bookingEngine;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cr:put_inventory
                            {start-date : Fecha inicial}
                            {end-date : Fecha final}
                            {room-class : Id de la clase de habitación}
                            {booking-engine : Código del motor de reservas.}
                            {hotel-code? : Código del hotel (rategain).}';

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
      $class = 'App\\' . studly_case($this->argument('booking-engine')) . '\\' . studly_case($this->argument('booking-engine'));
      $this->bookingEngine = new $class();
      //
      if ($this->argument('hotel-code')) {
        $this->setRateGainConfig($this->argument('hotel-code'));
      } else {
        return;
      }

      $typeRoom = config(snake_case(studly_case($this->argument('booking-engine'))) . '.rooms_lc.' . $this->argument('room-class'));

      if ($typeRoom) {
        $period = new \DatePeriod(
          new \DateTime($this->argument('start-date')),
          new \DateInterval('P1D'),
          new \DateTime($this->argument('end-date'))
        );

        $datesToCheck = [];

        foreach ($period as $key => $value) {
          $datesToCheck[] = $value->format('Y-m-d');
        }

        foreach ($datesToCheck as $dateToCheck) {
          $availability = $this->bookingEngine->getBambooQuantityAvailability($dateToCheck, $dateToCheck, $this->argument('room-class'));
          $availability['date'] = $dateToCheck;
          $availabilities[] = $availability;
        }

        // dd($availabilities);

        $modifies = [];

        foreach ($availabilities as $availability) {
          $modifies[] = $this->bookingEngine->modifyInventory(
            $availability['date'],
            $availability['date'],
            $availability['class'],
            $this->argument('hotel-code'),
            $availability['rooms']
          );
        }

        // dd($modifies);

        if ($this->argument('booking-engine') == 'rategain') {
          foreach ($modifies as $modify) {
            foreach ($modify as $mod) {
              InventoryUpdate::create([
                'booking_engine' => $mod['booking_engine'],
                'room_class_cloud' => $mod['room'],
                'room_class_local' => $this->argument('room-class'),
                'date_updated' => $mod['date'],
                'quantity' => $mod['quantity'],
                'xml' => $mod['xml'],
              ]);
            }
          }
        }

        return;
      }

      return;
    }

    public function setRateGainConfig($rgHotelCode)
    {
      $instance = BambooInstance::with('bambooInstanceRooms')
        ->where(
          'rg_hotel_code', $rgHotelCode
        )->first()
        ->toArray();

      \Config::set("database.connections.on_the_fly", [
        "driver" => "mysql",
        "host" => $instance['db_host'],
        "port" => $instance['db_password'],
        "database" => $instance['db_database'],
        "username" => $instance['db_username'],
        "password" => $instance['db_password'],
        "unix_socket" => "",
        "charset" => "utf8",
        "collation" => "utf8_general_ci",
        "prefix" => "",
        "strict" => true,
        "engine" => null,
      ]);

      $rooms_cl = [];

      $rooms_lc = [];

      foreach ($instance['bamboo_instance_rooms'] as $key => $value) {
        $rooms_cl[$value['rg_room']] = $value['bb_room'];
        $rooms_lc[$value['bb_room']] = $value['rg_room'];
      }

      \Config::set("rategain", [
        'url' => $instance['rg_api'],
        'auth' => $instance['rg_auth'],
        'username' => $instance['rg_username'],
        'password' => $instance['rg_password'],
        'hotelCode' => $instance['rg_hotel_code'],
        'rooms_cl' => $rooms_cl,
        'rooms_lc' => $rooms_lc,
        'paymentType' => $instance['payment_type'],
        'warrantyType' => $instance['warranty_type'],
        'programType' => $instance['program_type'],
        'codpla' => $instance['codpla'],
        'tipres' => $instance['tipres'],
      ]);
    }
  }
