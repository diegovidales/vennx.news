<div>
    <x-slot:header>
        {{ __('News') }}
    </x-slot:header>
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
            <ul>
                @foreach($news as $newsItem)
                    <li wire:key="{{ $newsItem->id }}">
                        <div class="mb-4 max-w-md mx-auto bg-sky-100 shadow-md overflow-hidden md:max-w-2xl border border-gray-200 rounded-lg">
                            <div class="md:flex">
                                <div class="md:flex-shrink-0">
                                    @if( $newsItem->image_path )
                                        <img class="h-48 w-full object-cover md:w-48" src="{{ $newsItem->image_path }}" alt="Imagem da notícia">
                                    @else
                                        <img class="h-48 w-full object-cover md:w-48" src="img/no-image.jpg" alt="Imagem da notícia">
                                    @endif    
                                </div>
                                <div class="p-4 flex-1 relative">
                                    <div class="absolute top-0 right-0 mt-4 mr-4 text-xs text-gray-500">{{ $newsItem->date }}</div>
                                    <a href="#" class="block text-lg leading-tight font-medium text-black hover:underline">{{ Illuminate\Support\Str::of($newsItem->title)->limit(34) }}</a>
                                    <p class="mt-2 text-gray-500">{{ Illuminate\Support\Str::of($newsItem->description)->limit(150) }}</p>
                                    <div class="mt-4">
                                        <span class="text-gray-600">{{ __('Author') }}: {{ $newsItem->user->name }}</span>
                                    </div>
                                    <div class="mt-4">
                                        <a href="#" class="inline-block px-4 py-2 leading-none bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">{{ __("Read more") }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>                                                   
                    </li>
                @endforeach
            </ul>
            <x-misc.loading />
        </div>
        <x-filter.pagination :paginate="$news"></x-table.pagination>
    </div>
</div>
