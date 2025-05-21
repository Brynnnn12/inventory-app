<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-sm card">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Edit Item Keluar</h3>
            <a href="{{ route('dashboard.itemsOut.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg flex items-center transition-colors duration-300 mt-4 md:mt-0">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <form action="{{ route('dashboard.itemsOut.update', $itemsOut) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mx-auto grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Pilih Item --}}
                <div>
                    <x-input-label for="item_id" value="Pilih Barang" />
                    <select name="item_id" id="item_id" class="w-full mt-1 border-gray-300 rounded-lg">
                        @foreach ($items as $id => $name)
                            <option value="{{ $id }}"
                                {{ old('item_id', $itemsOut->item_id) == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('item_id')" class="mt-1" />
                </div>

                {{-- Jumlah Keluar --}}
                <div>
                    <x-input-label for="quantity" value="Jumlah Keluar" />
                    <x-text-input id="quantity" name="quantity" type="number" min="1"
                        value="{{ old('quantity', $itemsOut->quantity) }}" required />
                    <x-input-error :messages="$errors->get('quantity')" class="mt-1" />
                </div>

                {{-- Tanggal Keluar --}}
                <div>
                    <x-input-label for="date_out" value="Tanggal Keluar" />
                    <x-text-input id="date_out" name="date_out" type="date"
                        value="{{ old('date_out', $itemsOut->date_out) }}" required />
                    <x-input-error :messages="$errors->get('date_out')" class="mt-1" />
                </div>
            </div>

            {{-- Tombol Simpan --}}
            <div class="flex justify-end mt-6">
                <x-primary-button>
                    <i class="fas fa-save mr-2"></i> Simpan
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
