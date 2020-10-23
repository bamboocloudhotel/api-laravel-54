<?php

namespace App\Http\Controllers;

use App\RategainRequest;
use Illuminate\Http\Request;

class RategainRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    	$rateGainRequests = RategainRequest::whereNotNull('reference');

    	if ($request->get('search')) {
    	    $rateGainRequests->where('type', 'like', '%' . $request->get('search') . '%')
                ->orWhere('reference', 'like', '%' . $request->get('search') . '%');
        }

        $rateGainRequests = $rateGainRequests->paginate(100);

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
    public function show(RategainRequest $rategainRequest)
    {
        //
        // $rategainRequest->json = str_replace();

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
