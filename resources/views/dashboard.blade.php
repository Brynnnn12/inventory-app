<x-app-layout>

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Inventory Dashboard</h1>
        <div class="flex items-center space-x-2 mt-4 md:mt-0">
            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition-colors duration-300">
                <i class="fas fa-file-export mr-2"></i> Export
            </button>
            <button
                class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-lg flex items-center transition-colors duration-300">
                <i class="fas fa-filter mr-2"></i> Filter
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-sm card stat-card total">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Items</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">1,248</h3>
                    <p class="text-green-500 text-xs font-medium mt-2 flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> 12.5% from last month
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
                    <p class="text-gray-500 text-sm font-medium">Items In</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">47</h3>
                    <p class="text-red-500 text-xs font-medium mt-2 flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> 5.2% from last month
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
                    <p class="text-gray-500 text-sm font-medium">Items out</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">24</h3>
                    <p class="text-green-500 text-xs font-medium mt-2 flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> 2 new this month
                    </p>
                </div>
                <div class="bg-green-100 p-3 rounded-lg">
                    <i class="fas fa-tags text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm card stat-card value">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Inventory</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">$124,589</h3>
                    <p class="text-green-500 text-xs font-medium mt-2 flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> 8.3% from last month
                    </p>
                </div>
                <div class="bg-yellow-100 p-3 rounded-lg">
                    <i class="fas fa-dollar-sign text-yellow-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Inventory Table -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Inventory Status Chart -->
        <div class="bg-white p-6 rounded-xl shadow-sm card lg:col-span-2">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Inventory Status</h3>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-auto px-3 py-1">
                    <option selected>Last 30 days</option>
                    <option>Last 7 days</option>
                    <option>Last 3 months</option>
                    <option>Last year</option>
                </select>
            </div>
            <div class="h-64 bg-gray-50 rounded-lg flex items-center justify-center">
                <!-- Placeholder for chart -->
                <p class="text-gray-400">Inventory status chart will appear here</p>
            </div>
        </div>

        <!-- Stock Levels -->
        <x-dashboard.stock :items="$items" :itemsin="$itemsin" :itemsout="$itemsout" />

    </div>


</x-app-layout>
