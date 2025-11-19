@php
    $group = Auth::user()->group ?? 'obn'; // sesuaikan field 'group' user-mu
    $menus = config('menu')[$group] ?? [];
@endphp

<aside id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <span class="logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="img-fluid">
        </span>

        <button id="btn-toggle-sidebar" class="toggle-btn">
            <i class="bi bi-list"></i>
        </button>
    </div>

    <ul class="sidebar-menu">
        @foreach ($menus as $menu)
            <li>
                <a href="{{ route($menu['route']) }}"
                   class="menu-item {{ request()->routeIs($menu['route']) ? 'active' : '' }}">
                    @isset($menu['icon'])
                        <i class="{{ $menu['icon'] }}"></i>
                    @endisset

                    {{ $menu['title'] }}
                </a>
            </li>
        @endforeach
    </ul>
</aside>
