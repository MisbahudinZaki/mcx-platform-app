@props([
    'extraClass' => '',
])

<div {{ $attributes->merge(['class' => "card-content $extraClass"]) }}>
    {{ $slot }}
</div>