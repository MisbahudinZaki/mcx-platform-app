<div class="table-responsive table-content">
    <table {{ $attributes->merge(['class' => 'table table-hover align-middle']) }}>
        <thead class="table-head">
            {{ $head }}
        </thead>

        <tbody class="table-body">
            {{ $body }}
        </tbody>
    </table>

    @isset($footer)
        <div class="table-footer">
            {{ $footer }}
        </div>
    @endisset
</div>
