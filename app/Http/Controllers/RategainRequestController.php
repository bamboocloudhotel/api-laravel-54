<?php

namespace App\Http\Controllers;

use App\RategainRequest;
use Illuminate\Http\Request;

class RategainRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        auth()->user()->authorizeRoles(['admin', 'reservations']);

        $instances = auth()->user()->instances->pluck('rg_hotel_code')->toArray();

    	$rateGainRequests = RategainRequest::whereNotNull('reference');

    	if ($request->get('search')) {
    	    $rateGainRequests->where('type', 'like', '%' . $request->get('search') . '%')
                ->orWhere('hotel', 'like', '%' . $request->get('search') . '%')
                ->orWhere('reference', 'like', '%' . $request->get('search') . '%');
        }

        $rateGainRequests->whereIn('hotel', $instances);

        $rateGainRequests = $rateGainRequests->orderBy('id', 'desc')->paginate(100);

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
}