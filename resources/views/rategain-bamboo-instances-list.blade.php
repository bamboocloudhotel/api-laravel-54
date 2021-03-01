@extends('layouts.app')

@section('content')

    <table class="table">
        <tr>
            <td>
                <form action="/rategain-bamboo-instances" method="get">
                    <input type="text" name="search" value="{{isset($_GET['search']) ? $_GET['search'] : ''}}">
                    <button type="submit">
                        Search
                    </button>
                </form>
            </td>
            <td>
                <a href="/rategain-bamboo-instances/0">New instance</a>
            </td>
        </tr>
    </table>


    <table class="table table-bordered">

        <thead>

        <tr>

            <th>Name</th>
            <th>Host</th>
            <th>RateGain Hotel</th>

            <th width="300px;">Action</th>

        </tr>

        </thead>

        <tbody>

        @if(!empty($instances) && $instances->count())

            @foreach($instances as $key => $value)

                <tr>

                    <td>{{ $value->name}}</td>
                    <td>{{ $value->db_host }}</td>
                    <td>{{ $value->rg_hotel_code }}</td>

                    <td>

                        <a href="/rategain-bamboo-instances/{{$value->id}}" class="btn btn-info">View</a>

                    </td>

                </tr>

            @endforeach

        @else

            <tr>

                <td colspan="10">There are no data.</td>

            </tr>

        @endif

        </tbody>

    </table>

@endsection
