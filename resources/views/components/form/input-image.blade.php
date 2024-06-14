<div>
    <div 
        x-data="{ isDropping: false }" 
        x-on:dragover.prevent="isDropping = true" 
        x-on:dragleave.prevent="isDropping = false" 
        x-on:drop.prevent="isDropping = false; $refs.fileInput.files = $event.dataTransfer.files; $refs.fileInput.dispatchEvent(new Event('change'))"
        x-on:click="$refs.fileInput.click()"
        class="flex items-center justify-center p-4 border-2 border-dashed rounded-lg cursor-pointer" 
        :class="{'border-blue-500': isDropping, 'border-gray-300': !isDropping}">
        
        <input type="file" wire:model="image" class="hidden" x-ref="fileInput" name="image" id="image">

        <div class="text-center">
            @if ($image)
                <p class="mt-2"> 
                    <img class="h-48" src="{{  $image->temporaryUrl() }}">
                </p>
            @elseif($news->image_path)
                <img class="h-48" src="{{  $news->image_path }}">
            @else
                <p class="text-gray-500">{{ __("Drag the image here or click to select") }}</p>
            @endif
        </div>    
    </div>
    @if ($image)
        <div class="flex justify-center space-x-4">
            <button type="button" wire:click="$set('image',null)" class="mt-2 px-4 py-2 bg-red-500 text-white rounded">{{ __("Delete Image") }}</button>
        </div>
    @elseif($news->image_path)
        <div class="flex justify-center space-x-4">
            <button type="button" wire:click="$set('news.image_path',null)" class="mt-2 px-4 py-2 bg-red-500 text-white rounded">{{ __("Delete Image") }}</button>
        </div>
    @endif
</div>