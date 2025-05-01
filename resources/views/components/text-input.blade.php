@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge(['class' => 'mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500']) }}>
