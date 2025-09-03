<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pilih Lapangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($fields as $field)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        @if($field->image)
                            <img src="{{ Storage::url($field->image) }}" alt="{{ $field->name }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">No Image</span>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-2">{{ $field->name }}</h3>
                            @if($field->description)
                                <p class="text-gray-600 mb-4">{{ $field->description }}</p>
                            @endif
                            
                            <a href="{{ route('booking.show', $field) }}" 
                               class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block text-center">
                                Pilih Lapangan
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>