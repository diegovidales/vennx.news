<template x-teleport="body">
    <div
        x-dialog
        x-model="open"
        style="display: none"
        class="fixed inset-0 overflow-y-auto z-10 text-left"
    >
        <!-- Overlay -->
        <div x-dialog:overlay x-transition:enter.opacity class="fixed inset-0 bg-black/25"></div>
    
        <!-- Panel -->
        <div class="relative min-h-full flex items-end md:items-center justify-center p-0 sm:p-4">
            <div
                x-dialog:panel
                x-transition.in
                class="relative max-w-xl w-full bg-white rounded-t-xl sm:rounded-b-xl shadow-lg overflow-y-auto"
            >
                {{-- Arrasta pra baixo no mobile --}}
                <div
                    class="sm:hidden absolute top-[-10px] left-0 right-0 h-[50px]"
                    x-data="{ startY: 0, currentY: 0, moving: false, get distance() { return this.moving ? Math.max(0, this.currentY - this.startY): 0 } }"
                    x-on:touchstart="moving = true; startY = currentY = $event.touches[0].clientY"
                    x-on:touchmove="currentY = $event.touches[0].clientY"
                    x-on:touchend="if (distance > 100) $dialog.close(); moving = false;"
                    x-effect="$el.parentElement.style.transform = 'translateY('+distance+'px)'"
                >
                    <div class="flex justify-center pt-[24px]">
                        <div class="bg-gray-400 rounded-full w-[10%] h-[5px]"></div>
                    </div>
                </div>

                <!-- Close Button -->
                <div class="absolute top-0 right-0 pt-4 pr-4">
                    <button type="button" @click="$dialog.close()" class="bg-gray-50 rounded-lg p-2 text-gray-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2">
                        <span class="sr-only">{{ __('Close modal') }}</span><x-icon.close-button />
                    </button>
                </div>
                <!-- Panel -->
                <div class="p-8">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</template>