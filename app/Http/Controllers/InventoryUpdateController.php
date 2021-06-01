<?php

namespace App\Http\Controllers;

use App\InventoryUpdate;
use Illuminate\Http\Request;

class InventoryUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $rateGainInventoryUpdates = InventoryUpdate::whereBookingEngine('rategain');

        if ($request->get('search')) {
            $rateGainInventoryUpdates->where('room_class_cloud', 'like', '%' . $request->get('search') . '%')
                ->orWhere('hotel', 'like', '%' . $request->get('search') . '%')
                ->orWhere('date_updated', 'like', '%' . $request->get('search') . '%')
                ->orWhere('quantity', 'like', '%' . $request->get('search') . '%');
        }

        $rateGainInventoryUpdates = $rateGainInventoryUpdates->orderBy('id', 'desc')->paginate(20);

        return view('rategain-inventory-updates-list', ['rateGainInventoryUpdates' => $rateGainInventoryUpdates, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InventoryUpdate  $inventoryUpdate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $rateGainInventoryUpdate = InventoryUpdate::findOrFail($id);

        // dd($rategainRequest->toArray());
		
		try {
			$sxe = new \SimpleXMLElement($rateGainInventoryUpdate->xml);
			$sxe = json_encode($sxe);
		} catch(\Exception $e) {
			$sxe = "{}";
		}

        

        return view('rategain-inventory-updates-view', ['rateGainInventoryUpdate' => $rateGainInventoryUpdate, 'sxe' => $sxe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventoryUpdate  $inventoryUpdate
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryUpdate $inventoryUpdate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InventoryUpdate  $inventoryUpdate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventoryUpdate $inventoryUpdate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventoryUpdate  $inventoryUpdate
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryUpdate $inventoryUpdate)
    {
        //
    }
}
