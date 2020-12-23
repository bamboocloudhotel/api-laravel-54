@extends('layouts.app')

  

@section('content')

<table class="table">
    <tr>
        <td>
            <form action="/api-laravel-54/public/index.php/rategain-requests">
                <input type="text" name="search" value="{{isset($request['search']) ? $request['search'] : ''}}">
                <br>
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

            <th>Name</th>

            <th>Type</th>

            <th width="300px;">Action</th>

        </tr>

    </thead>

    <tbody>

        @if(!empty($rateGainRequests) && $rateGainRequests->count())

            @foreach($rateGainRequests as $key => $value)

                <tr>

                    <td>{{ $value->reference }}</td>

                    <td>{{ $value->type }}</td>

                    <td>

                        <a href="/api-laravel-54/public/index.php/rategain-requests/{{$value->id}}" class="btn btn-info">View</a>

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

   

{!! $rateGainRequests->links() !!}

  

@endsection