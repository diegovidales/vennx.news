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
    </div>
    <div class="relative overflow-x-auto mt-4">
        <x-table>
            <x-table.head>
                <tr>
                    <x-table.heading>{{ __("Created at") }}</x-table.heading>
                    <x-table.heading>{{ __("Title") }}</x-table.heading>
                    <x-table.heading>{{ __("Description") }}</x-table.heading>
                    <x-table.heading>Editar</x-table.heading>
                </tr>
            </x-table.head>
            <x-table.body>
                @foreach($news as $newsItem)
                    <tr wire:key="{{ $newsItem->id }}">
                        <x-table.data>{{ $newsItem->date }}</x-table.data>
                        <x-table.data>{{ Illuminate\Support\Str::of($newsItem->title)->limit(20) }}</x-table.data>
                        <x-table.data>{{ Illuminate\Support\Str::of($newsItem->description)->limit(50) }}</x-table.data>
                        <x-table.data></x-table.data>
                    </tr>    
                @endforeach
            </x-table.body>
        </x-table>
        <x-misc.loading />
    </div>
    <x-filter.pagination :paginate="$news"></x-table.pagination>
</div>
