@props(['name', 'show' => false, 'focusable' => false])

<div x-data="{
    show: @js($show),
    focusable: @js($focusable),
}" x-show="show" @open-modal.window="if ($event.detail === '{{ $name }}') show = true"
    @close.window="show = false" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800/75"
    style="display: none;" role="dialog" aria-modal="true">
    <div x-show="show" x-transition @click.outside="show = false"
        class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-lg w-full">
        {{ $slot }}
    </div>
</div>
