@extends('layouts.app')

@section('content')

    <div class="col-12"
         style="padding-left: 2rem;">
        <h3>User {{$user->name}}</h3>
    </div>

    <div class="container">
        <div class="row">
            <form data-action="{{$action}}"
                  action="{{$action == 'create' ? url('/users') : url('/users/' . $user->id)}}"
                  method="post">

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text"
                               @if($action === 'create') required @endif
                               autocomplete="off"
                               class="form-control"
                               name="name"
                               id="name"
                               value="{{$user->name}}"
                               placeholder="Pedro Jimenez">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email"
                               required
                               autocomplete="off"
                               class="form-control"
                               name="email"
                               id="email"
                               value="{{$user->email}}"
                               placeholder="pedrojimenez@gmail.com">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password"
                               autocomplete="off"
                               class="form-control"
                               name="password"
                               id="password"
                               value=""
                               minlength="6"
                               placeholder="******">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <h4>Roles</h4>
                        @foreach($roles as $role)
                        <div class="form-check">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="role_ids[]"
                                   @if ($user)
                                   {!! in_array($role->id, array_column($user->roles->toArray(), 'id')) ? 'checked="checked"' : '' !!}
                                   @endif
                                   value="{{$role->id}}"
                                   id="role-{{$role->id}}">
                            <label class="form-check-label"
                                   for="role-{{$role->id}}">
                                {{$role->name}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <h4>Instances</h4>
                        @foreach($instances as $instance)
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       name="instance_ids[]"
                                       @if ($user)
                                       {!! in_array($instance->id, array_column($user->instances->toArray(), 'id')) ? 'checked="checked"' : '' !!}
                                       @endif
                                       value="{{$instance->id}}"
                                       id="instance-{{$instance->id}}">
                                <label class="form-check-label"
                                       for="instance-{{$instance->id}}">
                                    {{$instance->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit"
                                class="btn btn-success">Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>

    </script>

@endsection
