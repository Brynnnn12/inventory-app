<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl sidebar-shadow">
    <div class="p-6 flex items-center">
        <div class="bg-white p-2 rounded-lg mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
        </div>
        <a href="index.html" class="text-white text-2xl font-bold hover:text-gray-300">InventoryPro</a>
    </div>

    <nav class="text-white text-base font-semibold pt-6 px-4">
        <a href="index.html" class="flex items-center active-nav-link text-white py-3 pl-4 nav-item">
            <i class="fas fa-tachometer-alt mr-3 text-blue-300"></i>
            Dashboard
        </a>
        <a href="{{ route('dashboard.items.index') }}"
            class="flex items-center text-white opacity-75 hover:opacity-100 py-3 pl-4 nav-item">
            <i class="fas fa-boxes mr-3 text-blue-300"></i>
            Inventory Items
        </a>
        <a href="{{ route('dashboard.categories.index') }}"
            class="flex items-center text-white opacity-75 hover:opacity-100 py-3 pl-4 nav-item">
            <i class="fas fa-tags mr-3 text-blue-300"></i>
            Categories
        </a>
        <a href="{{ route('dashboard.suppliers.index') }}"
            class="flex items-center text-white opacity-75 hover:opacity-100 py-3 pl-4 nav-item">
            <i class="fas fa-truck mr-3 text-blue-300"></i>
            Suppliers
        </a>

        <a href="{{ route('dashboard.itemsIn.index') }}"
            class="flex items-center text-white opacity-75 hover:opacity-100 py-3 pl-4 nav-item">
            <i class="fas fa-chart-bar mr-3 text-blue-300"></i>
            Barang Masuk
        </a>
        <a href="{{ route('dashboard.itemsOut.index') }}"
            class="flex items-center text-white opacity-75 hover:opacity-100 py-3 pl-4 nav-item">
            <i class="fas fa-chart-bar mr-3 text-blue-300"></i>
            Barang Keluar
        </a>
        <a href="reports.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-3 pl-4 nav-item">
            <i class="fas fa-chart-bar mr-3 text-blue-300"></i>
            Reports
        </a>

    </nav>

</aside>
