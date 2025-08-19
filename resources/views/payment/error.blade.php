<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pembayaran Gagal
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center">
                    <div class="mb-6">
                        <svg class="mx-auto h-12 w-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-red-600 mb-4">Pembayaran Gagal</h3>
                    <p class="text-gray-600 mb-6">
                        Maaf, terjadi kesalahan saat memproses pembayaran Anda. Silakan coba lagi.
                    </p>
                    
                    <div class="space-y-2">
                        <a href="{{ route('dashboard') }}" 
                           class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Lihat Dashboard
                        </a>
                        <br>
                        <a href="{{ route('booking.index') }}" 
                           class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Booking Ulang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>