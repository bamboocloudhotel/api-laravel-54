@extends('layouts.app')

@section('content')

    <div class="col-12" style="padding-left: 2rem;">
        <h3>Instances</h3>
    </div>

    <table class="table">
        <tr>
            <td>
                <form action="/api-laravel-54/public/index.php/rategain-bamboo-instances" method="get">
                    <input type="text" name="search" value="{{isset($_GET['search']) ? $_GET['search'] : ''}}">
                    <button type="submit">
                        Search
                    </button>
                </form>
            </td>
            <td>
                <a href="/api-laravel-54/public/index.php/rategain-bamboo-instances/0">New instance</a>
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

                        <a href="/api-laravel-54/public/index.php/rategain-bamboo-instances/{{$value->id}}" class="btn btn-info">View</a>

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
