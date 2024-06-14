<div
    x-data="{ open: false }"
    x-modelable="open"
    wire:model="showModal"
    {{ $attributes }}
    tabindex="-1"
>
    {{ $slot }}
</div>
