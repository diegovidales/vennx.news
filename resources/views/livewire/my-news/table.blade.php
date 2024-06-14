<div class="min-h-72">
    <div class="flex items-center gap-4">
        <div class="flex flex-col gap-8 flex-grow">
            <div class="flex flex-col md:flex-row justify-between gap-2">
                <x-filter.search wire:model.live.debounce.500ms="search" />
            </div>
        </div>
        <div class="flex gap-2">
            <x-filter.range :$filters />
        </div>
        <div class="flex gap-2">
            <x-form.button wire:click="$dispatch('show-update-news-modal')">{{ __("Create News") }}</x-form.button>
        </div>
    </div>
    <div class="relative overflow-x-auto mt-4">
        <x-table>
            <x-table.head>
                <tr>
                    <x-table.heading>{{ __("Created at") }}</x-table.heading>
                    <x-table.heading>{{ __("Title") }}</x-table.heading>
                    <x-table.heading>{{ __("Description") }}</x-table.heading>
                    <x-table.heading></x-table.heading>
                </tr>
            </x-table.head>
            <x-table.body>
                @foreach($this->news as $newsItem)
                    <tr wire:key="{{ $newsItem->id }}">
                        <x-table.data>{{ $newsItem->date }}</x-table.data>
                        <x-table.data>{{ Illuminate\Support\Str::of($newsItem->title)->limit(20) }}</x-table.data>
                        <x-table.data>{{ Illuminate\Support\Str::of($newsItem->description)->limit(50) }}</x-table.data>
                        <x-table.data>
                            <x-menu>
                                <x-menu.button>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </x-menu.button>
                                <x-menu.items>
                                    <x-menu.item wire:click="$dispatch('show-update-news-modal', { news: {{ $newsItem }} })">
                                        <x-icon.edit /> {{ __("Edit") }}
                                    </x-menu.item>
                                    <x-menu.item wire:click="$dispatch('show-delete-news-modal', { news: {{ $newsItem }} })">
                                        <x-icon.delete /> {{ __("Delete") }}
                                    </x-menu.item>
                                </x-menu.items>
                            </x-menu>
                        </x-table.data>
                    </tr>    
                @endforeach
            </x-table.body>
        </x-table>
        <x-misc.loading />
    </div>
    <x-filter.pagination :paginate="$this->news"></x-table.pagination>
</div>
