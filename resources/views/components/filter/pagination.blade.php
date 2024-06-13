@props(['paginate'])

<div class="pt-4 flex justify-between items-center">
    <div class="text-gray-700 text-sm">
        {{ __('Result') }}: {{ $paginate->total() }} {{ __('news') }}
    </div>
    {{ $paginate->links('livewire.pagination') }}
</div>