<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-sm card">
        <x-breadcrumb :links="[
            'itemsOut' => null,
        ]" />

        <!-- Notifikasi Sukses atau Error -->
        <x-dashboard.message />

        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Daftar Barang Keluar</h3>
            <x-link href="{{ route('dashboard.itemsOut.create') }}">
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
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal Keluar
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($itemsOut as $index => $itemOut)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ ($itemsOut->currentPage() - 1) * $itemsOut->perPage() + $index + 1 }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $itemOut->item->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $itemOut->user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $itemOut->quantity }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $itemOut->date_out }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('dashboard.itemsOut.edit', $itemOut) }}"
                                    class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                <form action="{{ route('dashboard.itemsOut.destroy', $itemOut) }}" method="POST"
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
        <x-paginate :paginator="$itemsOut" />


    </div>
</x-app-layout>
