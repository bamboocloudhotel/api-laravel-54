<?php

namespace App\Http\Controllers;

use App\BambooInstance;
use App\BambooInstanceRoom;
use Illuminate\Http\Request;

class BambooInstancesController extends Controller
{
    //

    public function index(Request $request)
    {
        $bambooInstances = BambooInstance::with('bambooInstanceRooms');

        if ($request->get('search')) {
            $bambooInstances->where('name', 'LIKE', '%' . $request->get('search') . '%');
        }

        $bambooInstances = $bambooInstances->get();

        return view('rategain-bamboo-instances-list', [
            'instances' => $bambooInstances,
        ]);
    }

    public function show(Request $request, $id)
    {

        $instance = [];

        if ($id == 0) {
            return view('rategain-bamboo-instances-form', [
                'instance' => $instance,
                'action' => 'create',
            ]);
        }


        $bambooInstance = BambooInstance::with('bambooInstanceRooms')->find($id);

        if ($bambooInstance) {
            $instance = $bambooInstance->toArray();
        }

        // dd($instance);

        return view('rategain-bamboo-instances-form', [
            'instance' => $instance,
            'action' => count($instance) ? 'update' : 'create',
        ]);
    }

    public function update(Request $request, $id)
    {

        // dd('update', $request->all());

        \DB::beginTransaction();
        try {

            $requestRooms  = $request->get('rooms');

            // dd($requestRooms);

            $bambooInstance = BambooInstance::with('bambooInstanceRooms')->find($id);

            $requestData = $request->all();

            unset($requestData['rooms']);

            $bambooInstance->update($requestData);

            BambooInstanceRoom::where('bamboo_instance_id', $id)->delete();

            $rooms = [];

            $cntIds = 0;
            foreach ($requestRooms['id'] as $id) {
                $rooms[$cntIds]['bb_room'] = $id;
                $cntIds++;
            }

            $cntCodes = 0;
            foreach ($requestRooms['code'] as $code) {
                $rooms[$cntCodes]['rg_room'] = $code;
                $cntCodes++;
            }

            foreach ($rooms as $room) {
                $room['bamboo_instance_id'] = $bambooInstance->id;
                BambooInstanceRoom::create($room);
            }


        } catch (\Exception $exception) {
            \DB::rollBack();
            dd($exception->getMessage(), $exception->getFile(), $exception->getLine());
        }
        \DB::commit();


        return redirect('/api-laravel-54/public/index.php/rategain-bamboo-instances');

    }

    public function store(Request $request)
    {

        // dd('create', $request->all());

        \DB::beginTransaction();

        try {
            $instance = BambooInstance::create($request->all());

            // dd($request->all());

            $rooms = [];

            $cntIds = 0;
            foreach ($request->get('rooms')['id'] as $id) {
                $rooms[$cntIds]['bb_room'] = $id;
                $cntIds++;
            }

            $cntCodes = 0;
            foreach ($request->get('rooms')['code'] as $code) {
                $rooms[$cntCodes]['rg_room'] = $code;
                $cntCodes++;
            }

            foreach ($rooms as $room) {
                $room['bamboo_instance_id'] = $instance->id;
                BambooInstanceRoom::create($room);
            }

        } catch (\Exception $exception) {
            \DB::rollBack();
            dd($exception->getMessage(), $exception->getFile(), $exception->getLine());
        }

        \DB::commit();

        return redirect('/api-laravel-54/public/index.php/rategain-bamboo-instances');
    }
}
