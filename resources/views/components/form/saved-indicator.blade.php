<div
        x-show="$wire.showSuccessIndicator"
        x-transition.out.opacity.duration.1500ms
        x-effect="if($wire.showSuccessIndicator) setTimeout(() => $wire.showSuccessIndicator = false, 3000)"
        class="flex justify-end pt-4"
    >
        <div class="flex gap-2 items-center text-green-500 text-sm font-medium">
            {{ __("Saved news!") }} <x-icon.saved-check />
        </div>
    </div>
</div>