<div class="grow relative text-sm text-gray-800">
    <div class="absolute pl-2 left-0 top-0 bottom-0 flex items-center pointer-events-none text-gray-500">
        <x-icon.search />
    </div>

    <input {{ $attributes }} type="text" placeholder="{{ __('Search') }}" class="block w-full rounded-lg border-0 py-2 pl-10 text-gray-900 ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
</div>