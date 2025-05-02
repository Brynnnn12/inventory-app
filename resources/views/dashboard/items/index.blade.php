<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-sm card">
        <x-breadcrumb :links="[
            'items' => null,
        ]" />

        <!-- Notifikasi Sukses atau Error -->
        <x-dashboard.message />

        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Daftar Barang</h3>
            <x-link href="{{ route('dashboard.items.create') }}">
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
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Supplier
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">stock
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($items as $index => $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ ($items->currentPage() - 1) * $items->perPage() + $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $item->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $item->category->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $item->supplier->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $item->stock }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $item->unit }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('dashboard.items.edit', $item) }}"
                                    class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                <form action="{{ route('dashboard.items.destroy', $item) }}" method="POST"
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
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">Tidak ada item.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->

        <x-paginate :paginator="$items" />


    </div>
</x-app-layout>
