<div class="navbar w-nav">
        <nav class="navbar-expand " >
            <div class="container" >
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    @if(Auth::check())
                        <a href="/posts" class="nav-link navbar-logo w-nav-link w--current">MyCVOnline</a>
                    @elseif(!Auth::check())
                        <a href="/" class="nav-link navbar-logo w-nav-link w--current">MyCVOnline</a>
                        <a href="/posts/create" class="nav-link w-nav-link">Post a job</a>
                        <a href="/c_v_s/create" class="nav-link w-nav-link ">Create your CV</a>
                    @else
                        <a href="/" class="nav-link navbar-logo w-nav-link w--current">MyCVOnline</a>
                    @endif
                    @if(Auth::check() && Auth::user()->accountType == 'company' )
                        <a href="/posts/create" class="nav-link w-nav-link">Post a job</a>
                    @elseif( Auth::check() )
                        <a href="/c_v_s/create" class="nav-link w-nav-link ">Create your CV</a>
                    @endif
                    {{-- <a href="/posts/create" class="nav-link w-nav-link">Employers / Post a job</a>
                    <a href="/c_v_s/create" class="nav-link w-nav-link ">Create your CV</a> --}}
                    @if(Auth::check() && Auth::user()->accountType == 'company' )
                        <a href="/posts" class="nav-link w-nav-link">View The Jobs Posted</a>
                    @else
                        <a href="/posts" class="nav-link w-nav-link">Find Jobs</a>
                    @endif
                        
                        
                    </ul>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if( Auth::user()->accountType == 'company')
                                    <a href="/dashboard" class="dropdown-item">Dashboard</a>
                                @else
                                    <a href="/dashboard" class="dropdown-item">My CV</a>
                                @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        </div>