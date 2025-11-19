@props([
    'id' => 'modal',
    'show' => false,
    'title' => null,
])

<div id="{{ $id }}" class="modal {{ $show ? 'show' : '' }}">
    <div class="modal-content">
        {{-- Header --}}
        @isset($header)
            <div class="modal-header">
                {{ $header }}
            </div>
        @elseif($title)
            <div class="modal-header">
                <h3>{{ $title }}</h3>
            </div>
        @endisset

        {{-- Body --}}
        <div class="modal-body">
            {{ $slot }}
        </div>

        {{-- Footer --}}
        @isset($footer)
            <div class="modal-footer">
                {{ $footer }}
            </div>
        @endisset
    </div>
</div>
