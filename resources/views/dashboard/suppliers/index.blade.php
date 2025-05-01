<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-sm card">
        <!-- Notifikasi Sukses atau Error -->
        <x-dashboard.message />

        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Recent Inventory Items</h3>
            <x-link href="{{ route('dashboard.suppliers.create') }}">
                <i class="fas fa-plus mr-2"></i> Add Item
            </x-link>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 inventory-table">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($suppliers as $index => $supplier)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ ($suppliers->currentPage() - 1) * $suppliers->perPage() + $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $supplier->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('dashboard.suppliers.edit', $supplier->id) }}"
                                    class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                <form action="{{ route('dashboard.suppliers.destroy', $supplier) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">No suppliers found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 flex items-center justify-between border-t border-gray-200">
            <div class="text-sm text-gray-500">
                Showing
                <span class="font-medium">{{ $suppliers->firstItem() }}</span>
                to
                <span class="font-medium">{{ $suppliers->lastItem() }}</span>
                of
                <span class="font-medium">{{ $suppliers->total() }}</span>
                items
            </div>
            <div>
                {{ $suppliers->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
