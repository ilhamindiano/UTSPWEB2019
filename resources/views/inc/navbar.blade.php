<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger" href="/#page-top">{{config('app.name','Nope Note.')}}</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="/#page-top">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="/#about">Why?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="/#features">Feature</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="/#contact">Contact us</a>
                    </li>
                <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Log in') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a style="font-weight:bold" class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                                <a class="dropdown-item" href="/home" style="font-weight:bold">Notes</a>
                                <a class="dropdown-item" href="/notes/create" style="font-weight:bold">Create</a>

                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
</nav>