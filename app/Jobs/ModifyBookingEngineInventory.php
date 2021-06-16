<?php

  namespace App\Jobs;

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
      $class = 'App\\' . studly_case($this->bookingEngineCode) . '\\' . studly_case($this->bookingEngineCode);
      $this->bookingEngine = new $class();
      //

      $typeRoom = config(snake_case(studly_case($this->bookingEngineCode)) . '.rooms_lc.' . $this->roomClass);

      if ($typeRoom) {
        $testRequest = new \Illuminate\Http\Request();

        $testRequest->setMethod('POST');
        $testRequest->request->add(['bookingEngine' => $this->bookingEngineCode]);
        $testRequest->request->add(['hotelId' => $this->hotelId]);

        $soapCtrl = new TestSoapController($testRequest);

        $soapCtrl->modifyInventoryByDatesAndRoom(
          $testRequest,
          $this->startDate,
          $this->endDate,
          $this->roomClass
        );
      }
    }
  }

