<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token"
              content="{{ csrf_token() }}">

        <title>RateGain Integration</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}"
              rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button"
                                class="navbar-toggle collapsed"
                                data-toggle="collapse"
                                data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand"
                           href="{{ url('/') }}">
                            RateGain Integration
                        </a>
                    </div>

                    <div class="collapse navbar-collapse"
                         id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        @if(Auth::user())
                        <ul class="nav navbar-nav">
                            @if(Auth::user()->hasRole('admin'))
                            <li>
                                <a href="{{url('/rategain-bamboo-instances')}}">Instances</a>
                            </li>
                            @endif
                            @if(Auth::user()->hasAnyRole(['reservations', 'admin']))
                            <li>
                                <a href="{{url('/rategain-requests')}}">Requests</a>
                            </li>
                            @endif
                            @if(Auth::user()->hasAnyRole(['reception', 'admin']))
                            <li>
                                <a href="{{url('/rategain-availability')}}">Inventory</a>
                            </li>
                            @endif
                            @if(Auth::user()->hasAnyRole(['reception', 'admin']))
                            <li>
                                <a href="{{url('/rategain-inventory-updates')}}">Inventory updates</a>
                            </li>
                            @endif
                            @if(Auth::user()->hasAnyRole(['admin']))
                                <li>
                                    <a href="{{url('/users')}}">Users</a>
                                </li>
                            @endif
                        </ul>
                        @endif

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li>
                                    <a href="{{ route('login') }}">Login</a>
                                </li>
<!--                                <li>
                                    <a href="{{ route('register') }}">Register</a>
                                </li>-->
                            @else
                                <li class="dropdown">
                                    <a href="#"
                                       class="dropdown-toggle"
                                       data-toggle="dropdown"
                                       role="button"
                                       aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu"
                                        role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form"
                                                  action="{{ route('logout') }}"
                                                  method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript">
            var jsonStr = $("pre").text();
            var jsonObj = jsonStr ? JSON.parse(jsonStr) : '';
            var jsonPretty = JSON.stringify(jsonObj, null, '\t');

            $("pre").text(jsonPretty);
        </script>

        <script type="text/javascript">
            // add row
            $("#addRoom").click(function () {
                var html = '';
                html += '<div class="form-group row" id="inputFormRow">';
                html += '<div class="form-group col-md-5">';
                html += '<label for="">Bamboo room ID</label>';
                html += '<input type="text"';
                html += ' required autocomplete="off"';
                html += ' oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(\'.\', \'\').replace(\',\', \'\');"';
                html += ' class="form-control"';
                html += ' id=""';
                html += ' name="rooms[id][]">';
                html += '</div>';
                html += '<div class="form-group col-md-5">';
                html += '<label for="">RateGain room code</label>';
                html += '<input type="text"';
                html += ' required autocomplete="off"';
                html += ' class="form-control"';
                html += ' id=""';
                html += ' name="rooms[code][]">';
                html += '</div>';
                html += '<div class="form-group col-md-2">';
                html += '<label for="">&nbsp;</label><br>';
                html += '<a href="javascript:void(0)" class="btn btn-danger" id="removeRow">Remove</a>';
                html += '</div>';
                html += '</div>';

                $('#rooms').append(html);
            });

            // remove row
            $(document).on('click', '#removeRow', function () {
                $(this).closest('#inputFormRow').remove();
            });


        </script>

        @yield('script')

    </body>
</html>
