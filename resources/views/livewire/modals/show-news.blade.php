<div>
    <x-modal>
        <x-modal.panel>
            @if(isset($news->news))
                <div class="flex justify-center mb-4">
                    @if( $news->news->image_path )
                        <img class="h-80 w-full object-cover rounded-xl" src="{{ $news->news->image_path }}" alt="Imagem da notícia">
                    @else
                        <img class="hw-80 w-full object-cover rounded-xl" src="img/no-image.jpg" alt="Imagem da notícia">
                    @endif    
                </div>
                <h2 class="font-semibold text-3xl mb-2">{{ $news->news->title }}</h2>
                <p>{{ $news->news->description }}</p>
            @endif
            <x-modal.footer>
                <x-modal.close>
                    <button type="button" class="text-center rounded-xl bg-slate-300 text-slate-800 px-6 py-2 font-semibold">{{ __("Close")}}</button>
                </x-modal.close>
            </x-modal.footer>
        </x-modal.panel>
    </x-modal>
</div>