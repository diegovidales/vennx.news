<div>
    @if($responsive)
        <x-layouts.responsive-nav-link href="#" wire:click="logout">
            {{ __('Log Out') }}
        </x-layouts.responsive-nav-link>
    @else
        <x-dropdown.link href="#" wire:click="logout">
            {{ __('Log Out') }}
        </x-dropdown.link>
    @endif
</div>