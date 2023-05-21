<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-chevron-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                <a href="{{ url('dashboard') }}" class="dropdown-item">
                    <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('users.index') }}" class="dropdown-item">
                    <i class="nav-icon fas fa-users"></i> Users
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('students.index') }}" class="dropdown-item">
                    <i class="nav-icon fas fa-users"></i> Students
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('announcements.index') }}" class="dropdown-item">
                    <i class="nav-icon fas fa-bullhorn"></i> Announcements
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('messages.index') }}" class="dropdown-item">
                    <i class="nav-icon fas fa-envelope"></i> Messages
                </a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="botton" href="{{ route('messages.index') }}" >
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
