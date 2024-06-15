<div>
    <x-modal>
        <x-modal.panel>
            @if(isset($news->news))
                @if($news->news->id)
                    <x-modal.header>{{ __('Update News') }}</x-modal.header>
                @else
                    <x-modal.header>{{ __('Create News') }}</x-modal.header>
                @endif
            @endif
            <!-- Corpo do Modal -->
            <div class="p-2">
                {{-- Upload de imagem --}}
                <x-form.field>
                    <x-form.label for="image">{{ __('News Image') }}</x-form.label>
                    <x-form.input-image :$image :$news />
                    <x-form.error name="image" />
                </x-form.field>
                {{-- Titulo da notícia --}}
                <x-form.field class="mt-2">
                    <x-form.label for="news.title">{{ __('Title') }}</x-form.label>
                    <div class="mt-2"> 
                        <x-form.input wire:model="news.title" name="news.title" id="news.title" type="text" required />
                        <x-form.error name="news.title" />
                    </div>
                </x-form.field>
                <x-form.field class="mt-2">
                    <x-form.label for="news.description">{{ __('Description') }}</x-form.label>
                    <div class="mt-2">
                        <x-form.textarea wire:model="news.description" name="news.description" id="news.description" rows="6" ></x-form.textarea>
                        <x-form.error name="news.description" />
                    </div>
                </x-form.field>
            </div>
            <x-form.saved-indicator indicator="showSuccessIndicator">
                {{ __("Saved news!") }}
            </x-form.saved-indicator>
            {{-- Footer do modal --}}
            <x-modal.footer>
                <x-modal.close>
                    <button type="button" class="text-center rounded-xl bg-slate-300 text-slate-800 px-6 py-2 font-semibold">{{ __("Cancel") }}</button>
                </x-modal.close>
                <button wire:loading.attr="disabled" wire:click="save" type="submit" class="text-center rounded-xl bg-blue-500 text-white px-6 py-2 font-semibold disabled:cursor-not-allowed disabled:opacity-50">{{ __("Save") }}</button>
            </x-modal.footer>
        </x-modal.panel>
    </x-modal>
</div>