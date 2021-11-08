<?php

  namespace App\Jobs;

  use App\BambooInstance;
  use App\Http\Controllers\Api\TestSoapController;
  use App\InventoryUpdate;
  use Illuminate\Bus\Queueable;
  use Illuminate\Queue\SerializesModels;
  use Illuminate\Queue\InteractsWithQueue;
  use Illuminate\Contracts\Queue\ShouldQueue;
  use Illuminate\Foundation\Bus\Dispatchable;

  class ModifyBookingEngineInventory implements ShouldQueue
  {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $bookingEngine;
    private $bookingEngineCode;
    private $startDate;
    private $endDate;
    private $roomClass;
    private $hotelId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($startDate, $endDate, $roomClass, $bookingEngineCode, $hotelId = null)
    {
      //
      $this->hotelId = $hotelId;
      $this->startDate = $startDate;
      $this->endDate = $endDate;
      $this->roomClass = $roomClass;
      $this->bookingEngineCode = $bookingEngineCode;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        $instance = BambooInstance::where('rg_hotel_code', $this->hotelId)->with('bambooInstanceRooms')->first()->toArray();

        $return = [];

        if ($instance) {
            foreach ($instance['bamboo_instance_rooms'] as $room) {

                $resp = $this->bookingEngine->sendAvailability($this->startDate, $this->startDate, $room['bb_room'], $room['rg_room'], $instance['rg_hotel_code']);

                $return[] = $resp;

                foreach ($resp as $res) {
                    InventoryUpdate::create([
                        'booking_engine' => 'rategain',
                        'room_class_cloud' => $room['rg_room'],
                        'room_class_local' => $room['bb_room'],
                        'date_updated' => $res['date'],
                        'quantity' => $res['quantity'],
                        'xml' => $res['xml'],
                        'hotel' => $instance['name'],
                        'xml_request' => $res['request']
                    ]);
                }
            }
        }
    }
  }

