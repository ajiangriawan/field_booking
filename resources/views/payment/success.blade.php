<x-app-layout>
    <x-slot name="header">
        <h2 class="sport-font text-3xl font-bold bg-gradient-to-r from-sport-primary via-sport-accent to-sport-secondary bg-clip-text text-transparent">
            Booking Success
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-sport-primary/10 via-sport-accent/5 to-sport-secondary/10 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center">
                    <div class="mb-6">
                        <svg class="mx-auto h-12 w-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>

                    <h3 class="text-2xl font-bold text-green-600 mb-4">Pembayaran Berhasil!</h3>
                    <p class="text-sport-text mb-6">
                        Terima kasih! Pembayaran Anda telah berhasil diproses.
                    </p>

                    <div class="space-y-2">
                        <a href="{{ route('dashboard') }}"
                            class="inline-block btn-sport flex items-center justify-center bg-gradient-to-br from-sport-primary to-sport-accent rounded-2xl text-white font-bold py-2 px-4 rounded">
                            Lihat Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>