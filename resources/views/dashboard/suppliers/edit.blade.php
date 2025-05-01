<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-sm card">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Edit Category</h3>
            <a href="{{ route('dashboard.categories.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg flex items-center transition-colors duration-300 mt-4 md:mt-0">
                <i class="fas fa-arrow-left mr-2"></i> Back to suppliers
            </a>
        </div>

        <form action="{{ route('dashboard.suppliers.update', $supplier) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6 max-w-lg">
                <div>
                    <x-input-label for="name" value="Suplier Name" />

                    <x-text-input id="name" name="name" value="{{ old('name', $supplier->name) }}" required />

                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition-colors duration-300">
                        <i class="fas fa-save mr-2"></i> Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
