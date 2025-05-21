<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-sm card">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Edit Barang</h3>
            <a href="{{ route('dashboard.items.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg flex items-center transition-colors duration-300 mt-4 md:mt-0">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <form action="{{ route('dashboard.items.update', $item) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-1 max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Name --}}
                <div>
                    <x-input-label for="name" value="Item Name" />
                    <x-text-input id="name" name="name" value="{{ old('name', $item->name) }}" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                {{-- Category --}}
                <div>
                    <x-input-label for="category_id" value="Category" />
                    <select name="category_id" id="category_id" class="w-full border-gray-300 rounded-lg">
                        @foreach ($categories as $id => $name)
                            <option value="{{ $id }}"
                                {{ old('category_id', $item->category_id) == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach

                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-1" />
                </div>

                {{-- Supplier --}}
                <div>
                    <x-input-label for="supplier_id" value="Supplier" />
                    <select name="supplier_id" id="supplier_id" class="w-full border-gray-300 rounded-lg">
                        @foreach ($suppliers as $id => $name)
                            <option value="{{ $id }}"
                                {{ old('supplier_id', $item->supplier_id) == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach

                    </select>
                    <x-input-error :messages="$errors->get('supplier_id')" class="mt-1" />
                </div>

                {{-- Stock --}}
                <div>
                    <x-input-label for="stock" value="Stock" />
                    <x-text-input id="stock" name="stock" type="number" min="0"
                        value="{{ old('stock', $item->stock) }}" required />
                    <x-input-error :messages="$errors->get('stock')" class="mt-1" />
                </div>

                {{-- Unit --}}
                <div>
                    <x-input-label for="unit" value="Unit" />
                    <x-text-input id="unit" name="unit" value="{{ old('unit', $item->unit) }}" required />
                    <x-input-error :messages="$errors->get('unit')" class="mt-1" />
                </div>
            </div>

            {{-- Button --}}
            <div class="flex justify-end mt-6">
                <x-primary-button>
                    <i class="fas fa-save mr-2"></i> Save
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
