<aside class="relative bg-gradient-to-b from-blue-800 to-blue-900 h-screen w-64 hidden sm:block shadow-xl">
    <!-- Header Sidebar - Minimal -->
    <div class="p-4 flex items-center justify-center border-b gap-2 border-blue-700">
        <i class="fas fa-box text-blue-300 text-xl"></i>
        <h2 class="text-white text-lg font-semibold">Sistem Inventory</h2>
    </div>

    <!-- Menu Navigasi -->
    <nav class="text-white mt-6 px-4 space-y-1">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
            class="flex items-center px-4 py-3 rounded-lg transition-all hover:bg-white/10 group active:bg-white/20">
            <i class="fas fa-tachometer-alt mr-3 text-blue-300 group-hover:text-blue-200"></i>
            <span>Dashboard</span>
        </a>

        @role('admin')
            <!-- Menu Admin -->
            <div class="mt-4">
                <p class="text-xs uppercase text-blue-300 font-semibold px-4 mb-2 tracking-wider">Management</p>

                <a href="{{ route('dashboard.items.index') }}"
                    class="flex items-center px-4 py-3 rounded-lg transition-all hover:bg-white/10 group">
                    <i class="fas fa-boxes mr-3 text-blue-300 group-hover:text-blue-200"></i>
                    <span>Barang Inventory</span>
                </a>

                <a href="{{ route('dashboard.users.index') }}"
                    class="flex items-center px-4 py-3 rounded-lg transition-all hover:bg-white/10 group">
                    <i class="fas fa-users mr-3 text-blue-300 group-hover:text-blue-200"></i>
                    <span>Karyawan</span>
                </a>

                <a href="{{ route('dashboard.categories.index') }}"
                    class="flex items-center px-4 py-3 rounded-lg transition-all hover:bg-white/10 group">
                    <i class="fas fa-tags mr-3 text-blue-300 group-hover:text-blue-200"></i>
                    <span>Kategori</span>
                </a>

                <a href="{{ route('dashboard.suppliers.index') }}"
                    class="flex items-center px-4 py-3 rounded-lg transition-all hover:bg-white/10 group">
                    <i class="fas fa-truck mr-3 text-blue-300 group-hover:text-blue-200"></i>
                    <span>Suppliers</span>
                </a>
            </div>

            <div class="mt-4">
                <p class="text-xs uppercase text-blue-300 font-semibold px-4 mb-2 tracking-wider">Transaksi</p>

                <a href="{{ route('dashboard.itemsIn.index') }}"
                    class="flex items-center px-4 py-3 rounded-lg transition-all hover:bg-white/10 group">
                    <i class="fas fa-arrow-down mr-3 text-blue-300 group-hover:text-blue-200"></i>
                    <span>Barang Masuk</span>
                </a>

                <a href="{{ route('dashboard.itemsOut.index') }}"
                    class="flex items-center px-4 py-3 rounded-lg transition-all hover:bg-white/10 group">
                    <i class="fas fa-arrow-up mr-3 text-blue-300 group-hover:text-blue-200"></i>
                    <span>Barang Keluar</span>
                </a>
            </div>
        @endrole

        @role('user')
            <!-- Menu User -->
            <div class="mt-4">
                <p class="text-xs uppercase text-blue-300 font-semibold px-4 mb-2 tracking-wider">Transaksi</p>

                <a href="{{ route('dashboard.itemsIn.index') }}"
                    class="flex items-center px-4 py-3 rounded-lg transition-all hover:bg-white/10 group">
                    <i class="fas fa-arrow-down mr-3 text-blue-300 group-hover:text-blue-200"></i>
                    <span>Barang Masuk</span>
                </a>

                <a href="{{ route('dashboard.itemsOut.index') }}"
                    class="flex items-center px-4 py-3 rounded-lg transition-all hover:bg-white/10 group">
                    <i class="fas fa-arrow-up mr-3 text-blue-300 group-hover:text-blue-200"></i>
                    <span>Barang Keluar</span>
                </a>
            </div>
        @endrole
    </nav>
</aside>
