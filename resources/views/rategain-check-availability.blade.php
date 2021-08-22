@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Check inventory availability</h3>
            </div>
        </div>
        <div class="row">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Instance Name</label>
                <div class="col-sm-9">
                    <select required
                            onchange="setRooms($('#instance').val())"
                            class="form-control"
                            name="instance"
                            id="instance">
                        <option value="">Select one...</option>
                        @foreach($instances as $instance)
                            <option value="{{$instance['rg_hotel_code']}}">{{$instance['rg_hotel_code']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Room type</label>
                <div class="col-sm-9">
                    <select required
                            class="form-control"
                            name="room"
                            id="room">
                        <option value="">Select one...</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Start date</label>
                <div class="col-sm-9">
                    <input type="date"
                           required
                           value="getToday()"
                           min="getToday()"
                           onchange="setMinDate()"
                           class="form-control"
                           name="start"
                           id="start">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">End date</label>
                <div class="col-sm-9">
                    <input type="date"
                           required
                           min="getMinDate()"
                           class="form-control"
                           name="end"
                           id="end">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group row text-right" style="margin-right: .15rem;">
                <button id="searchAvailability"
                        type="button"
                        onclick="getAvailability()"
                        class="btn btn-info">Search
                </button>

                <button id="sendHotelAvailability"
                        type="button"
                        onclick="sendHotelAvailability()"
                        class="btn btn-success">Send Hotel Availibility
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                Available rooms (<span id="availableTotal">0</span>): <span id="available"></span>
                <br>
                Not available rooms (<span id="notAvailableTotal">0</span>): <span id="notAvailable"></span>
            </div>
        </div>

    </div>

@endsection

@section('script')
    <script>

        var loading = false;

        function getToday() {
            var date = new Date();
            return date.toISOString().slice(0, 19).replace('T', ' ');

        }

        function setMinDate() {
            var start = $('#start').val();
            console.log(start);
            $('#end').attr('min', start);
            return start;
        }

        function getMinDate() {
            return '';
        }

        function sendHotelAvailability() {
            loading = true;
            $('#sendHotelAvailability').attr('disabled', true);
            var instance = $('#instance').val();
            var start = $('#start').val();
            var end = $('#end').val();
            if (!instance || !start | !end) {
                alert('You must select a instance, start date and end date!');
                $('#sendHotelAvailability').attr('disabled', false);
                return;
            }

            sendAvailability();

        }

        function sendAvailability() {

            var instance = $('#instance').val();
            var start = $('#start').val();
            var end = $('#end').val();

            $('#sendHotelAvailability').attr('disabled', true);
            axios.get('http://45.32.223.244/api-laravel-54/public/index.php/api/test/set-availability?bookingEngine=rategain&hotelId=' + instance + '&feclle=' + start + '&fecsal=' + end)
                .then(function (response) {
                    console.log(response);
                    loading = false;
                    $('#sendHotelAvailability').attr('disabled', false);
                })
                .catch(function (error) {
                    console.log(error);
                    loading = false;
                    $('#sendHotelAvailability').attr('disabled', false);
                });
        }

        function getAvailability() {
            loading = true;
            $('#searchAvailability').attr('disabled', true);
            axios.get('http://45.32.223.244/api-laravel-54/public/index.php/api/test/availability?bookingEngine=rategain&hotelId=' + $('#instance').val() + '&feclle=' + $('#start').val() + '&fecsal=' + $('#end').val() + '&codcla=' + $('#room').val())
                .then(function (response) {
                    $('#available').html(response.data.available.join(', '));
                    $('#availableTotal').html(response.data.availableCount);
                    $('#notAvailable').html(response.data.notAvailable.join(', '));
                    $('#notAvailableTotal').html(response.data.notAvailableCount);
                    loading = false;
                    $('#searchAvailability').attr('disabled', false);
                })
                .catch(function (error) {
                    console.log(error);
                    loading = false;
                    $('#available').html('');
                    $('#availableTotal').html('0');
                    $('#notAvailable').html('');
                    $('#notAvailableTotal').html('0');
                    $('#searchAvailability').attr('disabled', false);
                });
        }

        function setRooms(event) {
            $('#room option').remove();
            $('#room').append( '<option value="">Select one...</option>' );
            var instances = {!! $instances->toJson() !!};
            var html = '<option value="">Select one...</option>';
            for (let i = 0; i < instances.length; i++) {
                if (instances[i].rg_hotel_code === event) {
                    for (let j = 0; j < instances[i].bamboo_instance_rooms.length; j++) {
                        $('#room').append( '<option value="' + instances[i].bamboo_instance_rooms[j].bb_room + '">' + instances[i].bamboo_instance_rooms[j].rg_room + '</option>' );
                        // html += '<option value="' + instances[i].bamboo_instance_rooms[j].bb_room + '">' + instances[i].bamboo_instance_rooms[j].rg_room + '</option>'
                    }
                }
            }
        }
    </script>
@endsection
