<div x-data="{ open: false, type: '', message: '' }" x-init="@if (session('success')) open = true; type = 'success'; message = '{{ session('success') }}'; 
@elseif (session('error')) 
    open = true; type = 'error'; message = '{{ session('error') }}'; @endif;
setTimeout(() => open = false, 5000);" x-show="open" x-transition x-cloak class="mb-4 p-4 rounded-lg"
    :class="{
        'bg-green-100 text-green-800 border-green-300': type === 'success',
        'bg-red-100 text-red-800 border-red-300': type === 'error'
    }">

    <i class="fas"
        :class="{
            'fa-check-circle': type === 'success',
            'fa-times-circle': type === 'error'
        }"></i>

    <span x-text="message"></span>
</div>
