<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Laundry') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div style="margin-bottom: 20px;">
                        <a href="{{ route('laundries.create') }}" 
                           style="background-color: blue; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">
                            + TAMBAH DATA (KLIK SINI)
                        </a>
                    </div>
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 p-2">No</th>
                                <th class="border border-gray-300 p-2">Pelanggan</th>
                                <th class="border border-gray-300 p-2">Berat (kg)</th>
                                <th class="border border-gray-300 p-2">Total (Rp)</th>
                                <th class="border border-gray-300 p-2">Status</th>
                                <th class="border border-gray-300 p-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($laundries as $key => $item)
                                <tr>
                                    <td class="border border-gray-300 p-2 text-center">{{ $key + 1 }}</td>
                                    <td class="border border-gray-300 p-2">{{ $item->nama_pelanggan }}</td>
                                    <td class="border border-gray-300 p-2 text-center">{{ $item->berat }}</td>
                                    <td class="border border-gray-300 p-2">Rp {{ number_format($item->total_harga) }}</td>
                                    <td class="border border-gray-300 p-2 text-center">
                                        <span class="px-2 py-1 rounded text-white text-xs font-bold bg-gray-500">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    <td class="border border-gray-300 p-2 text-center">
                                        <a href="{{ route('laundries.edit', $item->id) }}" style="color: blue;">Edit</a>
                                        |
                                        <form action="{{ route('laundries.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="color: red;">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-4 text-center text-gray-500">
                                        Belum ada data. Silakan klik tombol biru di atas!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>