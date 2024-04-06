<?php

namespace App\Http\Controllers;

use App\RategainRequest;
use App\RategainRequestBackup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class RategainRequestController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        //
        auth()->user()->authorizeRoles(['admin', 'reservations']);

        $instances = auth()->user()->instances->pluck('rg_hotel_code')->toArray();

    	$rateGainRequests = RategainRequest::whereNotNull('reference');

    	if ($request->get('search')) {
    	    $rateGainRequests->where('reference', 'like', '%' . $request->get('search') . '%');/*where('type', 'like', '%' . $request->get('search') . '%')
                ->orWhere('hotel', 'like', '%' . $request->get('search') . '%')
                ->orWhere('reference', 'like', '%' . $request->get('search') . '%')*/;
        }

        $rateGainRequests->whereIn('hotel', $instances);

        $rateGainRequests = $rateGainRequests->orderByDesc('id')->simplePaginate(100);

        return view('rategain-requests-list', ['rateGainRequests' => $rateGainRequests, 'request' => $request->all()]);

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
     * @param  \App\RategainRequest  $rategainRequest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        auth()->user()->authorizeRoles(['admin', 'reservations']);
        
        $rategainRequest = RategainRequest::find($id);

        // dd($rategainRequest->toArray());

        return view('rategain-requests-view', ['rategainRequest' => $rategainRequest]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RategainRequest  $rategainRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(RategainRequest $rategainRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RategainRequest  $rategainRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RategainRequest $rategainRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RategainRequest  $rategainRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(RategainRequest $rategainRequest)
    {
        //
    }

    public static function removeOld()
    {
        $date = date('Y-m-d', strtotime('-3 month'));

        $rategainRequests = RategainRequest::where('created_at', '<', $date)
            ->orderBy('created_at')
            ->limit(100)->toSql();
        $db = DB::connection()->getPdo();
        $query = $db->prepare($rategainRequests);
        $query->execute([$date]);

        foreach ($query as $rategainRequest) {
            RategainRequestBackup::create($rategainRequest)->toSql();

            $request = RategainRequest::where('id', $rategainRequest['id'])->first();
            $request->delete();
        }
        return response()->json(['message' => 'Old requests removed']);
    }
}
