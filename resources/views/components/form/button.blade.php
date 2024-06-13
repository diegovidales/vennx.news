<button wire:loading.attr="disabled" {{ $attributes->merge(['class'=>"text-center rounded-xl bg-blue-600 hover:bg-blue-500 text-white px-6 py-2 font-semibold disabled:cursor-not-allowed disabled:opacity-50", 'type' => 'submit']) }}>
    {{ $slot }}
</button>
