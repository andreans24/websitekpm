<ul class="nav">
    <li class="nav-item nav-profile">
        <a href="{{ route('dashboard') }}" class="nav-link">
            <div class="nav-profile-image">
                <img src="{{ isset($profile->image) ? asset('images/' . $profile->image) : asset('admin-purple/src/assets/images/faces/face1.jpg') }}"
                    alt="profile" />
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
            </div>
            <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">{{ Auth::guard('admin')->user()->name }}</span>
                <span class="text-secondary text-small"> {{ Auth::guard('admin')->user()->unitkerja }} </span>
            </div>
            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}" target="_blank">
            <span class="menu-title">View Website</span>
            <i class="mdi mdi-web menu-icon"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <span class="menu-title">Dashboard</span>
            <i class="mdi mdi-home menu-icon"></i>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-title">Data Master</span>
            <i class="menu-arrow"></i>
            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about-index') }}"
                        class="{{ request()->is('about-index') ? 'active' : '' }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('serv') }}"
                        class="{{ request()->is('serv') ? 'active' : '' }}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('portfolios-index') }}">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('team-index') }}">Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news-index') }}">News</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('slider-index') }}" class="nav-link">Slide</a>
                </li>
            </ul>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="{{ route('office') }}">
            <span class="menu-title">Office Address</span>
            <i class="mdi mdi-map-marker menu-icon"></i>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('profile') }}">
            <span class="menu-title">Profile</span>
            <i class="mdi mdi-account-circle menu-icon"></i>
        </a>
    </li>
</ul>
