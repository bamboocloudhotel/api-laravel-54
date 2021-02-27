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

        return view('rategain-bamboo-instances-list.blade', [
            'instances' => $bambooInstances,
        ]);
    }
}
