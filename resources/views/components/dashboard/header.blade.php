<header x-data="{ dropdownOpen: false }" class="w-full bg-white py-3 px-6 flex items-center justify-between shadow-sm">
    <!-- Logo -->
    <p class="text-xl sm:text-2xl font-bold text-gray-800">Selamat Datang {{ Auth::user()->name }}</p>

    <!-- Mobile Menu Button -->
    <button @click="isOpen = !isOpen" class="sm:hidden text-gray-500 text-2xl focus:outline-none">
        <i :class="isOpen ? 'fas fa-times' : 'fas fa-bars'"></i>
    </button>

    <!-- Desktop Nav + Profile -->
    <div class="hidden sm:flex items-center space-x-6">
        <!-- Optional: Desktop links here if needed -->
        <div x-data="{ dropdownOpen: false }" class="relative">
            <button @click="dropdownOpen = !dropdownOpen"
                class="w-10 h-10 rounded-full overflow-hidden border-2 border-gray-200 hover:border-blue-500 focus:outline-none transition">
                <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=500&q=80"
                    alt="Profile" class="w-full h-full object-cover">
            </button>
            <!-- Overlay -->
            <button x-show="dropdownOpen" @click="dropdownOpen = false"
                class="fixed inset-0 w-full h-full z-10"></button>

            <!-- Dropdown Menu -->
            <div x-show="dropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20 py-1">
                <a href="{{ route('profile.edit') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your Profile</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Nav -->
<nav x-show="isOpen" x-transition class="sm:hidden bg-sidebar text-white px-6 pt-4 pb-8 space-y-3">
    <a href="{{ route('dashboard') }}" class="flex items-center text-white py-2 pl-2 nav-item">
        <i class="fas fa-tachometer-alt mr-3 text-blue-300"></i> Dashboard
    </a>

    <!-- Show for admin role -->
    @role('admin')
        <a href="{{ route('dashboard.items.index') }}"
            class="flex items-center text-white py-2 pl-2 nav-item hover:opacity-100 opacity-75">
            <i class="fas fa-boxes mr-3 text-blue-300"></i> Barang Inventory
        </a>
        <a href="{{ route('dashboard.categories.index') }}"
            class="flex items-center text-white py-2 pl-2 nav-item hover:opacity-100 opacity-75">
            <i class="fas fa-tags mr-3 text-blue-300"></i> Kategori
        </a>
        <a href="{{ route('dashboard.suppliers.index') }}"
            class="flex items-center text-white py-2 pl-2 nav-item hover:opacity-100 opacity-75">
            <i class="fas fa-truck mr-3 text-blue-300"></i> Suppliers
        </a>
        <a href="{{ route('dashboard.itemsIn.index') }}"
            class="flex items-center text-white py-2 pl-2 nav-item hover:opacity-100 opacity-75">
            <i class="fas fa-truck mr-3 text-blue-300"></i> Barang Masuk
        </a>
        <a href="{{ route('dashboard.itemsOut.index') }}"
            class="flex items-center text-white py-2 pl-2 nav-item hover:opacity-100 opacity-75">
            <i class="fas fa-truck mr-3 text-blue-300"></i> Barang Keluar
        </a>
    @endrole

    <!-- Show for user role -->
    @role('user')
        <a href="{{ route('dashboard.itemsIn.index') }}"
            class="flex items-center text-white py-2 pl-2 nav-item hover:opacity-100 opacity-75">
            <i class="fas fa-truck mr-3 text-blue-300"></i> Barang Masuk
        </a>
        <a href="{{ route('dashboard.itemsOut.index') }}"
            class="flex items-center text-white py-2 pl-2 nav-item hover:opacity-100 opacity-75">
            <i class="fas fa-truck mr-3 text-blue-300"></i> Barang Keluar
        </a>
    @endrole

    <!-- Logout button -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="flex items-center text-white py-2 pl-2 nav-item hover:opacity-100 opacity-75">
            <i class="fas fa-user -bar mr-3 text-blue-300"></i> Logout
        </button>
    </form>
</nav>
