<header>
    <div class="container-fluid position-relative no-side-padding">

        <a href="{{ route('home') }}"
            class="logo"><img src="{{ asset('assets/fontend') }}/images/logo.png"
                alt="Logo Image"></a>

        <div class="menu-nav-icon"
            data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

        <ul class="main-menu visible-on-click"
            id="main-menu">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="#">Categories</a></li>
            <li><a href="#">Features</a></li>
            @guest
            <li><a href="{{ route('login') }}">LogIn </a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
            @else
            @if (Auth::user()->role_id == 1)
            <li><a href="{{ route('admin.dashboard') }}">Dashobard </a></li>
            @endif
            @if (Auth::user()->role_id == 2)
            <li><a href="{{ route('author.dashboard') }}">Dashobard </a></li>
            @endif
            @endguest



        </ul><!-- main-menu -->

        <div class="src-area col-6">
            <form>
                <button class="src-btn"
                    type="submit"><i class="ion-ios-search-strong"></i></button>
                <input class="src-input"
                    type="text"
                    placeholder="Type of search">
            </form>

        </div>


    </div><!-- conatiner -->
</header>
