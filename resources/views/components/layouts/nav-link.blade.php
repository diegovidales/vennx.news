@props(['active'])

<a class="{{ $active ? 'border-b-2 border-blue-500 text-sm font-medium leading-5 text-white focus:outline-none transition-all duration-300 ease-in-out' 
    : 'border-transparent text-sm font-medium leading-5 text-white  hover:border-blue-500 focus:outline-none transition-all duration-400 ease-in-out'}} 
    inline-flex items-center px-1 pt-1 border-b-2"
   aria-current="{{ $active ? 'page': 'false' }}"
   {{ $attributes }}
>{{ $slot }}</a>