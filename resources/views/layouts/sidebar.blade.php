<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">{{ config('app.name', 'ClassPilot') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">{{ substr(config('app.name', 'ClassPilot'), 0, 2) }}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('dashboard.general') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard') }}">General Dashboard</a>
                    </li>
                    <li class="{{ request()->routeIs('dashboard.ecommerce') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard', ['type' => 'ecommerce']) }}">Ecommerce Dashboard</a>
                    </li>
                </ul>
            </li>

            <!-- We're keeping only Dashboard menu as requested -->
        </ul>
    </aside>
</div>
