@props([
    'title' => 'Dashboard',
    'subtitle' => null,
    'customSubtitle' => null,
])

<div class="dashboard-header">
    <div class="header-left">
        <h2 class="page-title">{{ $title }}</h2>

        @if ($customSubtitle)
            {!! $customSubtitle !!}
        @elseif ($subtitle)
            <p class="page-subtitle">{!! $subtitle !!}</p>
        @endif
    </div>

    <div class="header-right d-flex align-items-center gap-2">
        <img src="{{ asset('assets/images/avatar.jpg') }}" class="rounded-circle" alt="User Avatar" width="36" height="36">
        <div class="dropdown">
            <button class="btn p-0 dropdown-toggle d-flex align-items-center" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="user-info text-start">
                    <p class="user-name mb-0">{{ Auth::user()->name ?? 'Guest' }}</p>
                    <p class="user-role mb-0 text-muted small">{{ strtoupper(Auth::user()->role ?? 'User') }}</p>
                </div>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userMenu">
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>