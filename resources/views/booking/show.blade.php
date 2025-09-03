<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Booking {{ $field->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('booking.store') }}">
                        @csrf
                        <input type="hidden" name="field_id" value="{{ $field->id }}">
                        
                        <div class="mb-6">
                            <label for="booking_date" class="block text-sm font-medium text-gray-700">Tanggal Booking</label>
                            <input type="date" 
                                   name="booking_date" 
                                   id="booking_date" 
                                   min="{{ date('Y-m-d') }}"
                                   required 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div class="mb-6" id="schedule-container" style="display: none;">
                            <label class="block text-sm font-medium text-gray-700 mb-3">Pilih Jadwal</label>
                            <div id="schedules-list" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Schedules will be loaded here -->
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-3">Metode Pembayaran</label>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="transfer" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" required>
                                    <span class="ml-2">Transfer (Midtrans)</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="cash" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" required>
                                    <span class="ml-2">Cash (Bayar di tempat)</span>
                                </label>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="notes" class="block text-sm font-medium text-gray-700">Catatan (Opsional)</label>
                            <textarea name="notes" 
                                      id="notes" 
                                      rows="3" 
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                      placeholder="Tambahkan catatan jika diperlukan..."></textarea>
                        </div>

                        <div class="flex justify-between">
                            <a href="{{ route('booking.index') }}" 
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Kembali
                            </a>
                            <button type="submit" 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Booking Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('booking_date').addEventListener('change', function() {
            const date = this.value;
            const fieldId = {{ $field->id }};
            
            if (date) {
                fetch(`/booking/${fieldId}/schedules?date=${date}`)
                    .then(response => response.json())
                    .then(schedules => {
                        const container = document.getElementById('schedule-container');
                        const schedulesList = document.getElementById('schedules-list');
                        
                        schedulesList.innerHTML = '';
                        
                        if (schedules.length > 0) {
                            schedules.forEach(schedule => {
                                const scheduleDiv = document.createElement('div');
                                scheduleDiv.className = `border rounded-lg p-4 ${schedule.is_booked ? 'bg-gray-100 border-gray-300' : 'bg-white border-gray-200 hover:border-blue-500 cursor-pointer'}`;
                                
                                scheduleDiv.innerHTML = `
                                    <label class="flex items-center ${schedule.is_booked ? 'cursor-not-allowed' : 'cursor-pointer'}">
                                        <input type="checkbox" 
                                               name="field_schedule_ids[]" 
                                               value="${schedule.id}" 
                                               ${schedule.is_booked ? 'disabled' : ''}
                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <div class="ml-3 flex-1">
                                            <div class="flex justify-between items-center">
                                                <span class="font-medium">${schedule.start_time} - ${schedule.end_time}</span>
                                                <span class="text-lg font-bold text-green-600">Rp ${new Intl.NumberFormat('id-ID').format(schedule.price)}</span>
                                            </div>
                                            ${schedule.is_booked ? '<span class="text-sm text-red-500">Sudah dibooking</span>' : '<span class="text-sm text-gray-500">Tersedia</span>'}
                                            <div class="text-xs text-gray-400 mt-1">
                                                DP (20%): Rp ${new Intl.NumberFormat('id-ID').format(schedule.price * 0.2)}
                                            </div>
                                        </div>
                                    </label>
                                `;
                                
                                schedulesList.appendChild(scheduleDiv);
                            });
                            
                            container.style.display = 'block';
                        } else {
                            container.style.display = 'none';
                            alert('Tidak ada jadwal tersedia untuk tanggal ini.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat memuat jadwal.');
                    });
            } else {
                document.getElementById('schedule-container').style.display = 'none';
            }
        });
    </script>
</x-app-layout>