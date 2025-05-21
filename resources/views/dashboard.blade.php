<x-app-layout>

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Sistem Inventory</h1>

    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-sm card stat-card total">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Barang</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $barang }}</h3>
                    <p class="text-green-500 text-xs font-medium mt-2 flex items-center">
                        <i class="fas fa-arrow-{{ $itemsPercentChange >= 0 ? 'up' : 'down' }} mr-1"></i>
                        {{ abs($itemsPercentChange) }}% dari bulan lalu
                    </p>
                </div>
                <div class="bg-blue-100 p-3 rounded-lg">
                    <i class="fas fa-boxes text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm card stat-card low">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Barang Masuk</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $barangMasuk }}</h3>
                    <p
                        class="{{ $itemInPercentChange >= 0 ? 'text-green-500' : 'text-red-500' }} text-xs font-medium mt-2 flex items-center">
                        <i class="fas fa-arrow-{{ $itemInPercentChange >= 0 ? 'up' : 'down' }} mr-1"></i>
                        {{ abs($itemInPercentChange) }}% dari bulan lalu
                    </p>
                </div>
                <div class="bg-red-100 p-3 rounded-lg">
                    <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm card stat-card categories">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Barang Keluar</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $barangKeluar }}</h3>
                    <p class="text-green-500 text-xs font-medium mt-2 flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> {{ $newItemsOut }} new this month
                    </p>
                </div>
                <div class="bg-green-100 p-3 rounded-lg">
                    <i class="fas fa-tags text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

    </div>



</x-app-layout>
