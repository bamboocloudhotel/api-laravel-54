@extends('layouts.app')



@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {{$rateGainInventoryUpdate->room_class_cloud}} - {{$rateGainInventoryUpdate->quantity}} - {{$rateGainInventoryUpdate->date_updated}}<br>
                {{$rateGainInventoryUpdate->crearted_at}}

            </div>
            <div class="col-md-8 col-md-offset-2">
                <pre>{{$sxe}}</pre>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {{$rateGainInventoryUpdate->xml}}
            </div>
        </div>
    </div>

@endsection
