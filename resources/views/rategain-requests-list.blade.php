@extends('layouts.app')

@section('content')

    <div class="col-12"
         style="padding-left: 2rem;">
        <h3>Reservation Requests</h3>
    </div>

    <table class="table">
        <tr>
            <td>
                <form action="/api-laravel-54/public/index.php/rategain-requests">
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

                <th>Name</th>

                <th>Type</th>
				
                <th>Response ID</th>

                <th>Date</th>

                <th width="300px;">Action</th>

            </tr>

        </thead>

        <tbody>

            @if(!empty($rateGainRequests))

                @foreach($rateGainRequests as $value)

                    <tr>

                        <td>{{ $value['hotel'] }}</td>

                        <td>{{ $value['reference'] }}</td>

                        <td>{{ $value['type'] }}</td>
						
                        <td>{{ $value['confirmation_id'] }}</td>

                        <td>{{ $value['created_at'] }}</td>

                        <td>

                            <a href="/api-laravel-54/public/index.php/rategain-requests/{{$value['id']}}"
                               class="btn btn-info">View
                            </a>

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



    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link"
                   disabled="{{ $links['prevPage'] ? '' : 'disabled' }}"
                   href="?page={{ $links['prevPage'] }}"
                   aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link"
                   href="?page={{ $links['nextPage'] }}"
                   aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>



@endsection
