<div>
    <x-modal>
        <x-modal.panel>
            <div class="flex flex-col gap-6" x-data="{ confirmation: '' }">
                <h2 class="font-semibold text-3xl">{{ __("Are you sure?") }}</h2>
                <h2 class="text-lg text-slate-700">{{ __("This operation is permanant and can't be reversed. This news will be deleted forever.") }}</h2>
                <x-form.field>
                    <x-form.label for="confirmation">{{ __("Type 'CONFIRM'") }}</x-form.label>
                    <x-form.input id="confirmation" name="confirmation" x-model="confirmation"/>
                </x-form.field>
        
                <x-modal.footer>
                    <x-modal.close>
                        <button type="button" class="text-center rounded-xl bg-slate-300 text-slate-800 px-6 py-2 font-semibold">{{ __("Cancel")}}</button>
                    </x-modal.close>
        
                    <x-modal.close>
                        <button :disabled="confirmation != '{{ __("CONFIRM") }}'" wire:click="delete" type="button" class="text-center rounded-xl bg-red-500 text-white px-6 py-2 font-semibold disabled:cursor-not-allowed disabled:opacity-50">{{ __("Delete")}}</button>
                    </x-modal.close>
                </x-modal.footer>
            </div>
        </x-modal.panel>
    </x-modal>
</div>