@props(["name"])

<input
    name = {{ $name }}
    {{ $attributes }}
    @class([
        'px-3 py-2 rounded-lg w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500',
        'border border-slate-300' => $errors->missing($name),
        'border-2 border-red-500' => $errors->has($name),
    ])
>