<nav class="navbar navbar-expand-lg navbar-dark black">
        <a class="navbar-brand" href="/">Progify</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/album">Albums</a>
                </li>
                
            </ul>
            <ul class="nav navbar-nav pull-xs-right">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="/home">Dashboard</a></li>
                                @if (auth()->user()->isAdmin())
                                <li><a href="/admin">Adminpanel</a></li>
                                @endif
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>

            <form action="{{ URL::action( 'searchController@index' ) }}" class="form-inline my-2 my-lg-0 ml-auto">
            <input class="form-control" type="search" name="s" value="{{ isset($s) ? $s : ''}}" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit">Search</button>
            </form>
        </div>
    </nav>