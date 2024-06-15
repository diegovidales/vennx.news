@props(['indicator'])
<div
        x-show="$wire.{{ $indicator }}"
        x-transition.out.opacity.duration.1500ms
        x-effect="if($wire.{{ $indicator }}) setTimeout(() => $wire.{{ $indicator }} = false, 3000)"
        class="flex justify-end pt-4"
>
    <div class="flex gap-2 items-center text-green-500 text-sm font-medium">
        {{ $slot }} <x-icon.saved-check />
    </div>
</div>
