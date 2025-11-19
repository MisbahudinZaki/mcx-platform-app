<!DOCTYPE html>
<html lang="en" data-theme="light">
    <x-head />
<body>

<div class="layout-wrapper">
    <x-sidebar />

    <main class="dashboard-main">

        @hasSection('header')
            @yield('header')
        @else
            <x-header title="Dashboard" />
        @endif

        <div class="dashboard-main-body">
            @yield('content')
        </div>

        <x-footer />
    </main>
</div>

<x-script />
</body>
</html>
p