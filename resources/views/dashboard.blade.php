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
                    <p class="text-gray-500 text-sm font-medium">Low Stock</p>
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
                    <p class="text-gray-500 text-sm font-medium">Categories</p>
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
                    <p class="text-gray-500 text-sm font-medium">Inventory Value</p>
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
        <div class="bg-white p-6 rounded-xl shadow-sm card">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Stock Levels</h3>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium">In Stock</span>
                        <span>824 items (66%)</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 66%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium">Low Stock</span>
                        <span>47 items (4%)</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill bg-yellow-500" style="width: 4%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium">Out of Stock</span>
                        <span>12 items (1%)</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill bg-red-500" style="width: 1%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium">Overstock</span>
                        <span>365 items (29%)</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill bg-purple-500" style="width: 29%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inventory Table -->
    <div class="bg-white p-6 rounded-xl shadow-sm card">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Recent Inventory Items</h3>
            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition-colors duration-300 mt-4 md:mt-0">
                <i class="fas fa-plus mr-2"></i> Add Item
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 inventory-table">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Item</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Stock</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status</th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div
                                    class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-box text-blue-600"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Premium Widget</div>
                                    <div class="text-sm text-gray-500">SKU: WDG-001</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Widgets</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">128</div>
                            <div class="text-xs text-gray-500">Min: 50</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$24.99</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-badge status-in-stock">In Stock</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                            <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div
                                    class="flex-shrink-0 h-10 w-10 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-cog text-green-600"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Deluxe Gizmo</div>
                                    <div class="text-sm text-gray-500">SKU: GZM-205</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Gizmos</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">42</div>
                            <div class="text-xs text-gray-500">Min: 50</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$49.99</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-badge status-low-stock">Low Stock</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                            <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div
                                    class="flex-shrink-0 h-10 w-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-tools text-purple-600"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Basic Toolset</div>
                                    <div class="text-sm text-gray-500">SKU: TOL-112</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Tools</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">0</div>
                            <div class="text-xs text-gray-500">Min: 10</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$19.99</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-badge status-out-of-stock">Out of Stock</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                            <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div
                                    class="flex-shrink-0 h-10 w-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-box-open text-yellow-600"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Standard Container</div>
                                    <div class="text-sm text-gray-500">SKU: CNT-308</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Containers</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">256</div>
                            <div class="text-xs text-gray-500">Min: 100</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$12.99</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-badge status-in-stock">In Stock</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                            <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 flex items-center justify-between border-t border-gray-200">
            <div class="text-sm text-gray-500">
                Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span
                    class="font-medium">1248</span> items
            </div>
            <div class="flex space-x-2">
                <button
                    class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                    Previous
                </button>
                <button
                    class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                    1
                </button>
                <button
                    class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                    2
                </button>
                <button
                    class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                    3
                </button>
                <button
                    class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                    Next
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
