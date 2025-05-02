<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-sm card">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Create New Category</h3>
            <a href="{{ route('dashboard.suppliers.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg flex items-center transition-colors duration-300 mt-4 md:mt-0">
                <i class="fas fa-arrow-left mr-2"></i> Back to suppliers
            </a>
        </div>

        <form action="{{ route('dashboard.suppliers.store') }}" method="POST">
            @csrf
            <div class="space-y-6 max-w-lg">
                <div>
                    <x-input-label for="name" value="Suplier Name" />

                    <x-text-input id="name" name="name" value="{{ old('name') }}" required />

                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="email" value="Suplier Email" />

                    <x-text-input id="email" name="email" value="{{ old('email') }}" required />

                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="phone_number" value="Suplier Notelpon" class="mb-2" />

                    <x-text-input id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required />

                    <x-input-error :messages="$errors->get('phone_number')" class="mt-1" />
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition-colors duration-300">
                        <i class="fas fa-save mr-2"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
