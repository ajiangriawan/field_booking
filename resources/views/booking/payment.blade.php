<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pembayaran
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Detail Pembayaran</h3>
                    
                    <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <strong>Kode Booking:</strong><br>
                                {{ $booking->booking_code }}
                            </div>
                            <div>
                                <strong>Lapangan:</strong><br>
                                {{ $booking->field->name }}
                            </div>
                            <div>
                                <strong>Tanggal:</strong><br>
                                {{ $booking->booking_date->format('d/m/Y') }}
                            </div>
                            <div>
                                <strong>Jadwal:</strong><br>
                                @foreach($booking->fieldSchedules as $schedule)
                                <div>
                                    {{ ucfirst($schedule->day_of_week) }},
                                    {{ $schedule->start_time }} - {{ $schedule->end_time }}
                                </div>
                                @endforeach
                            </div>
                            <div>
                                <strong>Total Harga:</strong><br>
                                Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                            </div>
                            <div>
                                <strong>Jumlah Bayar:</strong><br>
                                <span class="text-lg font-bold text-green-600">
                                    Rp {{ number_format($payment->amount, 0, ',', '.') }}
                                </span>
                                <br>
                                <small class="text-gray-500">
                                    {{ $payment->payment_type === 'dp' ? '(DP 20%)' : '(Pelunasan)' }}
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button id="pay-button" 
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-lg">
                            Bayar Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay('{{ $snap_token }}', {
                onSuccess: function(result){
                    window.location.href = '{{ route("payment.success") }}';
                },
                onPending: function(result){
                    window.location.href = '{{ route("payment.pending") }}';
                },
                onError: function(result){
                    window.location.href = '{{ route("payment.error") }}';
                }
            });
        });
    </script>
</x-app-layout>