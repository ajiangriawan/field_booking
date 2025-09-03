<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pilih Lapangan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-bold mb-4">Silakan pilih lapangan untuk booking:</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($fields as $field)
                            <div class="border rounded-lg p-4 flex flex-col items-start">
                                <div class="font-semibold text-xl mb-2">{{ $field->name }}</div>
                                <div class="mb-4 text-gray-600">Status: {{ $field->is_active ? 'Aktif' : 'Tidak Aktif' }}</div>
                                <a href="{{ route('booking.show', $field->id) }}"
                                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Pilih Lapangan
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>