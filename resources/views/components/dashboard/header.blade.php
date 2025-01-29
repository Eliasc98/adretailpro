<nav class="dashboard-nav">
    <div class="nav-container">
        <div class="logo">AdRetail Pro</div>
        <div class="user-menu">
            <span class="user-name">{{ auth()->user()->name }}</span>
            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4F46E5&color=fff&size=40&rounded=true&bold=true" 
                 alt="{{ auth()->user()->name }}" 
                 class="profile-img">
            <div class="dropdown-menu">
                <a href="{{ route('profile.edit') }}">
                    <i class="fas fa-user"></i> Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>
