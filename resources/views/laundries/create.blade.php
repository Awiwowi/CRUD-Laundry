<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Cucian</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('laundries.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="w-full border border-gray-300 p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Berat (Kg)</label>
                        <input type="number" step="0.01" name="berat" class="w-full border border-gray-300 p-2 rounded" required>
                    </div>

                    <div class="mt-4">
                        <button type="submit" 
                            style="background-color: blue; color: white; padding: 10px 20px; border-radius: 5px; font-weight: bold; cursor: pointer;">
                            SIMPAN DATA
                        </button>
                        
                        <a href="{{ route('laundries.index') }}" 
                           style="color: gray; text-decoration: underline; margin-left: 10px;">
                           Batal
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>