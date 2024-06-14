<div>
    <x-slot:header>
        {{ __('My News') }}
    </x-slot:header>
    <livewire:my-news.table lazy/>
    <livewire:modals.update-news lazy/>
    <livewire:modals.delete-news lazy/>
</div>