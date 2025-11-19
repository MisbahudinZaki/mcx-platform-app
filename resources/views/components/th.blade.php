<th 
    {{ $attributes->merge(['class' => 'text-nowrap']) }}
    role="button"
>
    {{ $slot }}

    @if ($sortable ?? false)
        <i class="bi bi-arrow-down-up ms-1"></i>
    @endif
</th>
