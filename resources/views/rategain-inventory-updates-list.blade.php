@extends('layouts.app')

@section('content')

    <div class="col-12"
         style="padding-left: 2rem;">
        <h3>Inventory Updates</h3>
    </div>

    <table class="table">
        <tr>
            <td>
                <form action="/api-laravel-54/public/index.php/rategain-inventory-updates">
                    <input type="text"
                           name="search"
                           value="{{isset($request['search']) ? $request['search'] : ''}}">
                    <button type="submit">
                        Search
                    </button>
                </form>
            </td>
        </tr>
    </table>


    <table class="table table-bordered">

        <thead>

            <tr>
                <th>Hotel</th>
                <th>Room</th>
                <th>Date</th>
                <th>Quantity</th>
                <th>Source</th>

                <th width="300px;">Action</th>

            </tr>

        </thead>

        <tbody>

            @if(!empty($rateGainInventoryUpdates) && $rateGainInventoryUpdates->count())

                @foreach($rateGainInventoryUpdates as $key => $value)

                    <tr>

                        <td>{{ $value->hotel}}</td>
                        <td>{{ $value->room_class_cloud}}</td>
                        <td>{{ $value->date_updated }}</td>
                        <td>{{ $value->quantity }}</td>
                        <td>{{ $value->source }}</td>

                        <td>

                            <a href="/api-laravel-54/public/index.php/rategain-inventory-updates/{{$value->id}}"
                               class="btn btn-info">View
                            </a>

                        </td>

                    </tr>

                @endforeach

            @else

                <tr>

                    <td colspan="6">There are no data.</td>

                </tr>

            @endif

        </tbody>

    </table>



    {!! $rateGainInventoryUpdates->links() !!}



@endsection
