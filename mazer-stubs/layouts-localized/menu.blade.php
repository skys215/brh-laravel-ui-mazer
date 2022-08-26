<li class="sidebar-item {{ Request::is('home') ? ' active' : '' }}">
    <a href="{{ url('home') }}" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>{{ __('Dashboard') }}</span>
    </a>
</li>
