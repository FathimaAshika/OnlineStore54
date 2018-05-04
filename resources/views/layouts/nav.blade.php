<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#1e90ff;">
    <div class="container">
        <div class="navbar-header">
            <button type="button"
                    class="navbar-toggle collapsed"
                    data-toggle="collapse"
                    data-target="#navbar" aria-expanded="false"
                    aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/')}}" style="color:white;"  >Online Store </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse pull-right">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ url('/')}}">Home</a></li>
                <li><a href="#about">About</a></li>
                @if (Auth::check() && Auth::user()->isAdmin())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                           role="button" aria-haspopup="true" aria-expanded="false">
                            Users<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/user')}}">Users</a></li>
                            <li><a href="{{ url('/profile')}}">Profiles</a></li>
                        </ul>
                    </li>

                @endif
                <li class="dropdown"><a href="#" class="dropdown-toggle"
                                        data-toggle="dropdown" role="button" aria-haspopup="true"
                                        aria-expanded="false">Content <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('chat') }} ">Chat</a></li>
                        @if (Auth::check() && Auth::user()->isAdmin())
                            <li><a href="{{ url('/marketing-image') }}">Marketing Images</a></li>
                        @endif
                        <li><a href=" {{ url('widget') }}">Widgets</a></li>
                    </ul>
                </li>
                @if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @if(Auth::user()->isAdmin())
                                <li><a href="{{url('admin')}}">Admin</a></li>
                            @endif
                            <li><a href="{{url('determine-profile-route')}}">Profile</a></li>
                            <li><a href="{{url('/settings')}} ">Settings</a></li>
                            <li>
                                <a href=""
                                   onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li><img class="circ" src="{{ Gravatar::get(Auth::user()->email)  }}"></li>
                @else
                    <li><a href="{{ url('login') }}">Login</a></li>
                    <li><a href="{{ url('register') }}">Register</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
