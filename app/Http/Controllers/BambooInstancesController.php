<?php

namespace App\Http\Controllers;

use App\BambooInstance;
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

        $bambooInstances->get();

        return view('rategain-bamboo-instances-list', [
            'instances' => $bambooInstances,
        ]);
    }

    public function show(Request $request, $id = 0)
    {

        $instance = [];

        if ($id = 0) {
            return view('rategain-bamboo-instances-list', [
                'instance' => $instance,
                'action' => 'create',
            ]);
        }

        $bambooInstance = BambooInstance::with('bambooInstanceRooms');
        $bambooInstance->find($id);

        if ($bambooInstance) {
            $instance = $bambooInstance->toArray();
        }

        return view('rategain-bamboo-instances-list', [
            'instance' => $instance,
            'action' => count($instance) ? 'update' : 'create',
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $bambooInstance = BambooInstance::with('bambooInstanceRooms');
            $bambooInstance->find($id);

            $bambooInstance->update($request->all());
        } catch (\Exception $exception) {
            dd($exception->getMessage(), $exception->getFile(), $exception->getLine());
        }


        return redirect('/rategain-bamboo-instances');

    }

    public function store(Request $request)
    {

        try {
            BambooInstance::create($request->all());
        } catch (\Exception $exception) {
            dd($exception->getMessage(), $exception->getFile(), $exception->getLine());
        }

        return redirect('/rategain-bamboo-instances');
    }
}
