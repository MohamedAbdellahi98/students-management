<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <!-- User panel -->
        <li class="nav-item ">
            <div class="user-panel d-flex">
                <div class="image">
                    <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="/standard_users/dashboard" class="d-block">{{ optional(Auth::user())->name }}</a>
                </div>
            </div>
        </li>

    </ul>

    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">
        <!-- Dropdown menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-bars"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                <a href="{{ url('/standard_users/dashboard') }}" class="dropdown-item">
                    <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('standard.students') }}" class="dropdown-item">
                    <i class="nav-icon fas fa-users"></i> Students
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('standard.announcements') }}" class="dropdown-item">
                    <i class="nav-icon fas fa-bullhorn"></i> Announcements
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('standard.messages.create') }}" class="dropdown-item">
                    <i class="nav-icon fas fa-envelope"></i> Send Message
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('standard.update-password') }}" class="dropdown-item">
                    <i class="nav-icon fas fa-key"></i> Update Password
                </a>
            </div>
        </li>
        <!-- End of dropdown menu -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="botton" href="{{ route('standard.messages.index') }}" >
            <i class="fas fa-comments"></i>
            <span class="badge badge-danger navbar-badge">{{ $unread_messages_count }}</span>
            </a>
        </li>
        <!-- Logout Button -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>

</nav>
