@extends('layouts.app')

@section('content')

    <div class="col-12"
         style="padding-left: 2rem;">
        <h3>Users</h3>
    </div>

    <table class="table">
        <tr>
            <td>
                <form action="{{url('/users')}}">
                    <input type="text"
                           name="search"
                           value="{{isset($request['search']) ? $request['search'] : ''}}">
                    <button type="submit">
                        Search
                    </button>
                </form>
            </td>
            <td>
                <a href="{{url('/users/0')}}">New user</a>
            </td>
        </tr>
    </table>


    <table class="table table-bordered">

        <thead>

        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Instances</th>

            <th width="300px;">Action</th>

        </tr>

        </thead>

        <tbody>

        @if(!empty($users) && $users->count())
            @foreach($users as $key => $value)
                <tr>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>
                            @foreach($value->roles as $role)
                                {{$role->name}}@if(!$loop->last), @endif
                            @endforeach
                    </td>
                    <td>
                        @if(!empty($value->instances) && $value->instances->count())
                            @foreach($value->instances as $instance)
                                {{$instance->name}}@if(!$loop->last), @endif
                            @endforeach
                        @endif
                    </td>

                    <td width="300px;">
                        <a href="{{url('/users/' . $value->id)}}"
                           class="btn btn-info">View
                        </a>
                    </td>

                </tr>
            @endforeach
        @else
            <tr>

                <td colspan="5">There are no data.</td>

            </tr>
        @endif

        </tbody>

    </table>

    {!! $users->links() !!}


@endsection
