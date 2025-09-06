<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Booking {{ $field->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-sport-primary/10 via-sport-accent/5 to-sport-secondary/10 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('booking.store') }}">
                        @csrf
                        <input type="hidden" name="field_id" value="{{ $field->id }}">
                        
                        <div class="mb-6">
                            <label for="booking_date" class="block text-sm font-medium text-sport-text mb-2">Tanggal Booking</label>
                            <div class="relative">
                                        <input type="date" 
                                               name="booking_date" 
                                               id="booking_date" 
                                               min="{{ date('Y-m-d') }}"
                                               required 
                                               class="sport-input w-full pl-12 pr-4 py-4 bg-sport-gray/30 border-2 border-sport-primary/30 rounded-xl text-sport-text focus:border-sport-primary focus:bg-sport-gray/50 transition-all duration-300">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i class="fas fa-calendar text-sport-primary"></i>
                                        </div>
                                    </div>
                                </div>

                        <div class="mb-6" id="schedule-container" style="display: none;">
                            <label class="block text-sm font-medium text-sport-text mb-3">Pilih Jadwal</label>
                            <div id="schedules-list" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Schedules will be loaded here -->
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-sport-text mb-3">Metode Pembayaran</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="transfer" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" required>
                                    <div class="ml-2 w-10 h-10 bg-sport-primary/20 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-university text-sport-primary"></i>
                                    </div>
                                    <span class="ml-2 text-sport-text">Transfer (Online)</span>
                                </label>
                                
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="cash" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" required>
                                    <div class="ml-2 w-10 h-10 bg-sport-accent/20 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-money-bill-wave text-sport-accent"></i>
                                    </div>
                                    <span class="ml-2 text-sport-text">Cash (Bayar di tempat)</span>
                                </label>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="notes" class="block text-sm font-medium text-sport-text mb-2">Catatan (Opsional)</label>
                            <textarea name="notes" 
                                      id="notes" 
                                      rows="4" 
                                      class="sport-input w-full pl-4 pr-4 py-4 bg-sport-gray/30 border-2 border-sport-primary/30 rounded-xl text-sport-text placeholder-sport-text-muted/70 focus:border-sport-primary focus:bg-sport-gray/50 transition-all duration-300 resize-none"
                                      placeholder="Tambahkan catatan jika diperlukan..."></textarea>
                        </div>

                        <div class="flex justify-between">
                            <a href="{{ route('booking.index') }}" 
                               class="flex items-center justify-center space-x-2 px-6 py-3 bg-sport-gray/50 hover:bg-sport-gray/70 border-2 border-sport-primary/20 text-sport-text rounded-xl font-medium transition-all duration-300 group">
                                Kembali
                            </a>
                            <button type="submit" 
                                    class="btn-sport flex items-center justify-center bg-gradient-to-br from-sport-primary to-sport-accent rounded-2xl space-x-2 px-8 py-3 text-lg font-semibold group">
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
                                scheduleDiv.className = `border rounded-lg p-4 ${schedule.is_booked ? 'bg-gray-100 border-gray-300' : 'bg-sport-gray/20 border-sport-primary/20 hover:border-sport-accent/50 hover:bg-sport-accent/5 border-gray-200 hover:border-blue-500 cursor-pointer'}`;
                                
                                scheduleDiv.innerHTML = `
                                    <label class="flex items-center ${schedule.is_booked ? 'cursor-not-allowed' : 'cursor-pointer'}">
                                        <input type="checkbox" 
                                               name="field_schedule_ids[]" 
                                               value="${schedule.id}" 
                                               ${schedule.is_booked ? 'disabled' : ''}
                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 ">
                                        <div class="ml-3 flex-1">
                                            <div class="flex justify-between items-center ">
                                                <span class="font-medium text-white mr-2">${schedule.start_time} - ${schedule.end_time}</span>
                                                <span class="text-lg font-bold text-green-600">Rp ${new Intl.NumberFormat('id-ID').format(schedule.price)}</span>
                                            </div>
                                            ${schedule.is_booked ? '<span class="text-sm text-red-500">Sudah dibooking</span>' : '<span class="text-sm text-green-600">Tersedia</span>'}
                                            <div class="text-xs text-sport-text mt-1">
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