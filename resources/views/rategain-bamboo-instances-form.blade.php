@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <form data-action="{{$action}}"
                  action="{{$action == 'create' ? '/api-laravel-54/public/index.php/rategain-bamboo-instances' : '/api-laravel-54/public/index.php/rategain-bamboo-instances/' . $instance['id']}}"
                  method="post">

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Instance Name</label>
                    <div class="col-sm-9">
                        <input type="text"
                               required
                               autocomplete="off"
                               class="form-control"
                               name="name"
                               id="name"
                               value="{{$instance['name']}}"
                               placeholder="parque93">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">DB host</label>
                    <div class="col-sm-9">
                        <input type="text"
                               required
                               autocomplete="off"
                               class="form-control"
                               name="db_host"
                               id="db_host"
                               value="{{$instance['db_host']}}"
                               placeholder="192.168.0.1">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">DB port</label>
                    <div class="col-sm-9">
                        <input type="text"
                               required
                               autocomplete="off"
                               class="form-control"
                               name="db_port"
                               id="db_port"
                               value="{{$instance['db_port']}}"
                               placeholder="3306">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">DB database</label>
                    <div class="col-sm-9">
                        <input type="text"
                               required
                               autocomplete="off"
                               class="form-control"
                               name="db_database"
                               id="db_database"
                               value="{{$instance['db_database']}}"
                               placeholder="hparque93">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">DB username</label>
                    <div class="col-sm-9">
                        <input type="text"
                               required
                               autocomplete="off"
                               class="form-control"
                               name="db_username"
                               id="db_username"
                               value="{{$instance['db_username']}}"
                               placeholder="root">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">DB password</label>
                    <div class="col-sm-9">
                        <input type="text"
                               required
                               autocomplete="off"
                               class="form-control"
                               name="db_password"
                               id="db_password"
                               value="{{$instance['db_password']}}"
                               placeholder="******">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">RateGain API URL</label>
                    <div class="col-sm-9">
                        <input type="text"
                               required
                               autocomplete="off"
                               class="form-control"
                               name="rg_api"
                               id="rg_api"
                               value="{{$instance['rg_api']}}"
                               placeholder="https://rzhospicert.rategain.com/rgbridgeapi/ari/receive">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">RateGain Auth</label>
                    <div class="col-sm-9">
                        <input type="text"
                               required
                               autocomplete="off"
                               class="form-control"
                               name="rg_auth"
                               id="rg_auth"
                               value="{{$instance['rg_auth']}}"
                               placeholder="Authorization: Basic dXNlcm5hbWU6cGFzc3dvcmQ=">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">RateGain hotel code</label>
                    <div class="col-sm-9">
                        <input type="text"
                               required
                               autocomplete="off"
                               class="form-control"
                               name="rg_hotel_code"
                               id="rg_hotel_code"
                               value="{{$instance['rg_hotel_code']}}"
                               placeholder="20915">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">RateGain username</label>
                    <div class="col-sm-9">
                        <input type="text"
                               required
                               autocomplete="off"
                               class="form-control"
                               name="rg_username"
                               id="rg_username"
                               value="{{$instance['rg_username']}}"
                               placeholder="jefe.revenue@germanmoraleshoteles.com">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">RateGain password</label>
                    <div class="col-sm-9">
                        <input type="text"
                               required
                               autocomplete="off"
                               class="form-control"
                               name="rg_password"
                               id="rg_password"
                               value="{{$instance['rg_password']}}"
                               placeholder="****************">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Bamboo payment type ID</label>
                    <div class="col-sm-9">
                        <input type="text"
                               required
                               autocomplete="off"
                               class="form-control"
                               name="payment_type"
                               id="payment_type"
                               value="{{$instance['payment_type']}}"
                               placeholder="46">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Bamboo warranty type ID</label>
                    <div class="col-sm-9">
                        <input type="text"
                               required
                               autocomplete="off"
                               class="form-control"
                               name="warranty_type"
                               id="warranty_type"
                               value="{{$instance['warranty_type']}}"
                               placeholder="34">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Bamboo program type ID</label>
                    <div class="col-sm-9">
                        <input type="text"
                               required
                               autocomplete="off"
                               class="form-control"
                               name="program_type"
                               id="program_type"
                               value="{{$instance['program_type']}}"
                               placeholder="34">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Bamboo plan code ID</label>
                    <div class="col-sm-9">
                        <input type="text"
                               required
                               autocomplete="off"
                               class="form-control"
                               name="codpla"
                               id="codpla"
                               value="{{$instance['codpla']}}"
                               placeholder="34">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Bamboo reservation type ID</label>
                    <div class="col-sm-9">
                        <input type="text"
                               required
                               autocomplete="off"
                               class="form-control"
                               name="tipres"
                               id="tipres"
                               value="{{$instance['tipres']}}"
                               placeholder="34">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <h3>Rooms</h3>
                    </div>
                </div>

                <div id="rooms">

                    @if(!empty($instance['bamboo_instance_rooms']) && count($instance['bamboo_instance_rooms']))
                        @foreach($instance['bamboo_instance_rooms'] as $room)
                            <div class="form-group row"
                                 id="inputFormRow">
                                <div class="form-group col-md-5">
                                    <label for="">Bamboo room ID</label>
                                    <input type="text"
                                           required
                                           autocomplete="off"
                                           class="form-control"
                                           id=""
                                           value="{{$room['bb_room']}}"
                                           name="rooms[id][]">
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="">RateGain room code</label>
                                    <input type="text"
                                           required
                                           autocomplete="off"
                                           class="form-control"
                                           id=""
                                           value="{{$room['rg_room']}}"
                                           name="rooms[code][]">
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="">&nbsp;</label><br>
                                    <a href="javascript:void(0)"
                                       class="btn btn-danger"
                                       id="removeRow">Remove</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="form-group row"
                             id="inputFormRow">
                            <div class="form-group col-md-5">
                                <label for="">Bamboo room ID</label>
                                <input type="text"
                                       required
                                       autocomplete="off"
                                       class="form-control"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace('.', '').replace(',', '');"
                                       id=""
                                       name="rooms[id][]">
                            </div>

                            <div class="form-group col-md-5">
                                <label for="">RateGain room code</label>
                                <input type="text"
                                       required
                                       autocomplete="off"
                                       class="form-control"
                                       id=""
                                       name="rooms[code][]">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="">&nbsp;</label><br>
                                <a href="javascript:void(0)"
                                   class="btn btn-danger"
                                   id="removeRow">Remove</a>
                            </div>
                        </div>
                    @endif

                </div>


                <div class="form-group row">
                    <button id="addRoom"
                            type="button"
                            class="btn btn-default">Add room
                    </button>
                </div>

                <div class="form-group row">
                    <button type="submit"
                            class="btn btn-lg btn-info">Save
                    </button>
                </div>

            </form>
        </div>

    </div>



@endsection
