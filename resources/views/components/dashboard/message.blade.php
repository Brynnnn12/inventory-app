{{-- filepath: resources/views/components/dashboard/message.blade.php --}}
@php
    $alertType = session('success')
        ? 'success'
        : (session('error')
            ? 'error'
            : (session('warning')
                ? 'warning'
                : (session('info')
                    ? 'info'
                    : null)));
    $alertMessage = session('success') ?? (session('error') ?? (session('warning') ?? session('info')));
@endphp

@if ($alertType && $alertMessage)
    <div x-data="{
        open: true,
        type: '{{ $alertType }}',
        message: @js($alertMessage),
        pauseOnHover: true,
        timer: null,
        startTimer() {
            this.timer = setTimeout(() => {
                this.open = false;
            }, 5000);
        },
        clearTimer() {
            if (this.timer) {
                clearTimeout(this.timer);
                this.timer = null;
            }
        }
    }" x-init="startTimer()" @mouseenter="pauseOnHover && clearTimer()"
        @mouseleave="pauseOnHover && startTimer()" x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-0 translate-x-8" x-cloak
        class="fixed top-4 right-4 z-[9999] w-80 pointer-events-auto overflow-hidden rounded-lg shadow-lg"
        :class="{
            'bg-emerald-50 border border-emerald-200': type === 'success',
            'bg-red-50 border border-red-200': type === 'error',
            'bg-amber-50 border border-amber-200': type === 'warning',
            'bg-blue-50 border border-blue-200': type === 'info'
        }">
        <div class="flex items-start p-4">
            <div class="flex-shrink-0">
                <i class="text-xl"
                    :class="{
                        'text-emerald-500 fas fa-check-circle': type === 'success',
                        'text-red-500 fas fa-times-circle': type === 'error',
                        'text-amber-500 fas fa-exclamation-circle': type === 'warning',
                        'text-blue-500 fas fa-info-circle': type === 'info'
                    }"></i>
            </div>

            <div class="ml-3 flex-1 pt-0.5">
                <p x-text="message" class="text-sm font-medium"
                    :class="{
                        'text-emerald-800': type === 'success',
                        'text-red-800': type === 'error',
                        'text-amber-800': type === 'warning',
                        'text-blue-800': type === 'info'
                    }">
                </p>
            </div>

            <div class="ml-4 flex-shrink-0 flex">
                <button @click="open = false" class="inline-flex rounded-md focus:outline-none"
                    :class="{
                        'text-emerald-500 hover:text-emerald-700': type === 'success',
                        'text-red-500 hover:text-red-700': type === 'error',
                        'text-amber-500 hover:text-amber-700': type === 'warning',
                        'text-blue-500 hover:text-blue-700': type === 'info'
                    }">
                    <span class="sr-only">Close</span>
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <!-- Progress bar -->
        <div x-show="open" class="h-1 w-full origin-left bg-opacity-30"
            :class="{
                'bg-emerald-500': type === 'success',
                'bg-red-500': type === 'error',
                'bg-amber-500': type === 'warning',
                'bg-blue-500': type === 'info'
            }"
            x-transition:enter="transition-transform duration-[5000ms] ease-linear"
            x-transition:enter-start="scale-x-100" x-transition:enter-end="scale-x-0" x-transition:leave="opacity-0">
        </div>
    </div>
@endif
