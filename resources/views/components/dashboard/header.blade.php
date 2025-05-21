<header x-data="{ mobileMenuOpen: false, profileDropdownOpen: false }"
    class="w-full bg-white border-b border-gray-100 py-3 px-4 sm:px-6 flex items-center justify-between sticky top-0 z-50">
    <!-- Logo and Greeting -->
    <div class="flex items-center">
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="mr-4 sm:hidden text-gray-600 hover:text-gray-900">
            <i :class="mobileMenuOpen ? 'fas fa-times' : 'fas fa-bars'" class="text-xl"></i>
        </button>
        <p class="text-lg sm:text-xl font-semibold text-gray-800 truncate max-w-xs">Hi, {{ Auth::user()->name }}</p>
    </div>

    <!-- Desktop Profile Dropdown -->
    <div class="hidden sm:block relative">
        <button @click="profileDropdownOpen = !profileDropdownOpen"
            class="flex items-center space-x-2 focus:outline-none group" aria-label="User menu">
            <div
                class="w-9 h-9 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-medium group-hover:bg-indigo-200 transition">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->name, strpos(Auth::user()->name, ' ') + 1, 1)) }}
            </div>
        </button>

        <!-- Dropdown Menu -->
        <div x-show="profileDropdownOpen" @click.away="profileDropdownOpen = false"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 py-1 z-50">
            <a href="{{ route('profile.edit') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div x-show="mobileMenuOpen" @click="mobileMenuOpen = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-40 sm:hidden"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    </div>

    <!-- Mobile Sidebar Menu -->
    <aside x-show="mobileMenuOpen" x-cloak class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg z-50 sm:hidden"
        x-transition:enter="transition ease-in-out duration-300" x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">
        <div class="h-full flex flex-col">
            <!-- Menu Header -->
            <div class="px-4 py-5 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-900">Menu</h3>
                <button @click="mobileMenuOpen = false" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Menu Items -->
            <nav class="flex-1 overflow-y-auto py-4">
                <div class="space-y-1 px-2">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 group">
                        <i class="fas fa-tachometer-alt mr-3 text-gray-500 group-hover:text-indigo-500"></i>
                        Dashboard
                    </a>

                    @role('admin')
                        <a href="{{ route('dashboard.items.index') }}"
                            class="flex items-center px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 group">
                            <i class="fas fa-boxes mr-3 text-gray-500 group-hover:text-indigo-500"></i>
                            Barang Inventory
                        </a>
                        <a href="{{ route('dashboard.users.index') }}"
                            class="flex items-center px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 group">
                            <i class="fas fa-users mr-3 text-gray-500 group-hover:text-indigo-500"></i>
                            Karyawan
                        </a>
                        <a href="{{ route('dashboard.categories.index') }}"
                            class="flex items-center px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 group">
                            <i class="fas fa-tags mr-3 text-gray-500 group-hover:text-indigo-500"></i>
                            Kategori
                        </a>
                        <a href="{{ route('dashboard.suppliers.index') }}"
                            class="flex items-center px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 group">
                            <i class="fas fa-truck mr-3 text-gray-500 group-hover:text-indigo-500"></i>
                            Suppliers
                        </a>
                    @endrole

                    <div class="border-t border-gray-200 my-2"></div>

                    <a href="{{ route('dashboard.itemsIn.index') }}"
                        class="flex items-center px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 group">
                        <i class="fas fa-arrow-down mr-3 text-gray-500 group-hover:text-indigo-500"></i>
                        Barang Masuk
                    </a>
                    <a href="{{ route('dashboard.itemsOut.index') }}"
                        class="flex items-center px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 group">
                        <i class="fas fa-arrow-up mr-3 text-gray-500 group-hover:text-indigo-500"></i>
                        Barang Keluar
                    </a>
                </div>
            </nav>

            <!-- Menu Footer -->
            <div class="px-4 py-3 border-t border-gray-100">
                <div class="flex items-center">
                    <div
                        class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-medium mr-3">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->name, strpos(Auth::user()->name, ' ') + 1, 1)) }}
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-xs text-gray-500 hover:text-indigo-600">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</header>
