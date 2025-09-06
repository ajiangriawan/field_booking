<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="sport-font text-3xl font-bold bg-gradient-to-r from-sport-primary via-sport-accent to-sport-secondary bg-clip-text text-transparent">
                    Booking {{ $field->name }}
                </h2>
                <p class="text-sport-text-muted text-sm mt-1">Complete your reservation in a few simple steps</p>
            </div>
            <div class="hidden md:flex items-center space-x-4">
                <div class="glass-dark border border-sport-primary/20 px-4 py-2 rounded-lg">
                    <div class="flex items-center space-x-2 text-sm">
                        <i class="fas fa-shield-alt text-sport-accent"></i>
                        <span class="text-sport-text">Secure Booking</span>
                    </div>
                </div>
                <div class="w-2 h-2 bg-sport-accent rounded-full animate-pulse"></div>
            </div>
        </div>
    </x-slot>

    <div class="py-6 lg:py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Booking Form -->
                <div class="lg:col-span-2">
                    <div class="glass-morphism border border-sport-primary/20 rounded-2xl overflow-hidden animate-fade-in-up">
                        <!-- Form Header -->
                        <div class="bg-gradient-to-r from-sport-primary/10 via-sport-accent/5 to-sport-secondary/10 p-6 border-b border-sport-primary/10">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-sport-primary to-sport-accent rounded-xl flex items-center justify-center">
                                    <i class="fas fa-calendar-plus text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-sport-text">Book Your Session</h3>
                                    <p class="text-sport-text-muted text-sm">Fill in the details to reserve your spot</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Booking Form -->
                        <form method="POST" action="{{ route('booking.store') }}" class="p-6 lg:p-8">
                            @csrf
                            <input type="hidden" name="field_id" value="{{ $field->id }}">
                            
                            <!-- Progress Indicator -->
                            <div class="mb-8">
                                <div class="flex items-center justify-between text-sm text-sport-text-muted mb-2">
                                    <span>Step 1</span>
                                    <span>Step 2</span>
                                    <span>Step 3</span>
                                </div>
                                <div class="w-full bg-sport-gray rounded-full h-2">
                                    <div id="progress-bar" class="bg-gradient-to-r from-sport-primary to-sport-accent h-2 rounded-full transition-all duration-500" style="width: 33%"></div>
                                </div>
                            </div>

                            <!-- Step 1: Date Selection -->
                            <div class="mb-8 animate-fade-in-up">
                                <div class="flex items-center mb-4">
                                    <div class="w-8 h-8 bg-sport-primary rounded-full flex items-center justify-center mr-3">
                                        <span class="text-white text-sm font-bold">1</span>
                                    </div>
                                    <h4 class="text-lg font-semibold text-sport-text">Select Date</h4>
                                </div>
                                
                                <div class="group">
                                    <label for="booking_date" class="block text-sm font-medium text-sport-text mb-2">
                                        <i class="fas fa-calendar-alt text-sport-primary mr-2"></i>
                                        Tanggal Booking
                                    </label>
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
                                    <p class="text-xs text-sport-text-muted mt-2">Select your preferred booking date</p>
                                </div>
                            </div>

                            <!-- Step 2: Schedule Selection -->
                            <div id="schedule-container" class="mb-8 animate-fade-in-up" style="display: none; animation-delay: 0.2s;">
                                <div class="flex items-center mb-4">
                                    <div class="w-8 h-8 bg-sport-accent rounded-full flex items-center justify-center mr-3">
                                        <span class="text-white text-sm font-bold">2</span>
                                    </div>
                                    <h4 class="text-lg font-semibold text-sport-text">Choose Time Slots</h4>
                                </div>
                                
                                <div class="glass-dark border border-sport-primary/20 rounded-xl p-4 mb-4">
                                    <div class="flex items-center justify-between text-sm">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex items-center text-sport-accent">
                                                <div class="w-3 h-3 bg-sport-accent rounded-full mr-2"></div>
                                                <span>Available</span>
                                            </div>
                                            <div class="flex items-center text-red-400">
                                                <div class="w-3 h-3 bg-red-400 rounded-full mr-2"></div>
                                                <span>Booked</span>
                                            </div>
                                        </div>
                                        <div class="text-sport-text-muted">
                                            <i class="fas fa-info-circle mr-1"></i>
                                            Select multiple slots if needed
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="schedules-list" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Schedules will be loaded here -->
                                </div>
                                
                                <div id="selected-summary" class="mt-4 p-4 bg-sport-primary/10 border border-sport-primary/20 rounded-xl hidden">
                                    <h5 class="font-semibold text-sport-text mb-2">
                                        <i class="fas fa-check-circle text-sport-accent mr-2"></i>
                                        Selected Slots
                                    </h5>
                                    <div id="summary-content" class="space-y-2"></div>
                                </div>
                            </div>

                            <!-- Step 3: Payment & Details -->
                            <div class="space-y-6 animate-fade-in-up" style="animation-delay: 0.4s;">
                                <div class="flex items-center mb-4">
                                    <div class="w-8 h-8 bg-sport-secondary rounded-full flex items-center justify-center mr-3">
                                        <span class="text-white text-sm font-bold">3</span>
                                    </div>
                                    <h4 class="text-lg font-semibold text-sport-text">Payment & Notes</h4>
                                </div>
                                
                                <!-- Payment Method -->
                                <div class="group">
                                    <label class="block text-sm font-medium text-sport-text mb-3">
                                        <i class="fas fa-credit-card text-sport-primary mr-2"></i>
                                        Metode Pembayaran
                                    </label>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <label class="relative cursor-pointer group">
                                            <input type="radio" name="payment_method" value="transfer" class="peer sr-only" required>
                                            <div class="glass-dark border-2 border-sport-primary/30 peer-checked:border-sport-primary peer-checked:bg-sport-primary/10 rounded-xl p-4 transition-all duration-300 hover:border-sport-primary/50">
                                                <div class="flex items-center space-x-3">
                                                    <div class="ml-2 w-10 h-10 bg-sport-primary/20 rounded-lg flex items-center justify-center">
                                                        <i class="fas fa-university text-sport-primary"></i>
                                                    </div>
                                                    <div>
                                                        <div class="font-medium text-sport-text">Transfer Bank</div>
                                                        <div class="text-xs text-sport-text-muted">Via Midtrans Gateway</div>
                                                    </div>
                                                </div>
                                                <div class="mt-3 text-xs text-sport-text-muted">
                                                    <i class="fas fa-shield-alt text-sport-accent mr-1"></i>
                                                    Secure & instant confirmation
                                                </div>
                                            </div>
                                        </label>
                                        
                                        <label class="relative cursor-pointer group">
                                            <input type="radio" name="payment_method" value="cash" class="peer sr-only" required>
                                            <div class="glass-dark border-2 border-sport-primary/30 peer-checked:border-sport-accent peer-checked:bg-sport-accent/10 rounded-xl p-4 transition-all duration-300 hover:border-sport-accent/50">
                                                <div class="flex items-center space-x-3">
                                                    <div class="ml-2 w-10 h-10 bg-sport-accent/20 rounded-lg flex items-center justify-center">
                                                        <i class="fas fa-money-bill-wave text-sport-accent"></i>
                                                    </div>
                                                    <div>
                                                        <div class="font-medium text-sport-text">Cash Payment</div>
                                                        <div class="text-xs text-sport-text-muted">Pay at venue</div>
                                                    </div>
                                                </div>
                                                <div class="mt-3 text-xs text-sport-text-muted">
                                                    <i class="fas fa-map-marker-alt text-sport-accent mr-1"></i>
                                                    Pay when you arrive
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <!-- Notes -->
                                <div class="group">
                                    <label for="notes" class="block text-sm font-medium text-sport-text mb-2">
                                        <i class="fas fa-sticky-note text-sport-primary mr-2"></i>
                                        Catatan (Opsional)
                                    </label>
                                    <div class="relative">
                                        <textarea name="notes" 
                                                  id="notes" 
                                                  rows="4" 
                                                  class="sport-input w-full pl-12 pr-4 py-4 bg-sport-gray/30 border-2 border-sport-primary/30 rounded-xl text-sport-text placeholder-sport-text-muted/70 focus:border-sport-primary focus:bg-sport-gray/50 transition-all duration-300 resize-none"
                                                  placeholder="Add any special requests or notes here..."></textarea>
                                        <div class="absolute top-4 left-0 pl-4 flex items-start pointer-events-none">
                                            <i class="fas fa-comment text-sport-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-col sm:flex-row gap-4 justify-between pt-8 border-t border-sport-primary/10">
                                <a href="{{ route('booking.index') }}" 
                                   class="flex items-center justify-center space-x-2 px-6 py-3 bg-sport-gray/50 hover:bg-sport-gray/70 border-2 border-sport-primary/20 text-sport-text rounded-xl font-medium transition-all duration-300 group">
                                    <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform duration-300"></i>
                                    <span>Kembali</span>
                                </a>
                                <button type="submit" 
                                        class="btn-sport flex items-center justify-center space-x-2 px-8 py-3 text-lg font-semibold group">
                                    <i class="fas fa-calendar-check group-hover:scale-110 transition-transform duration-300"></i>
                                    <span>Booking Sekarang</span>
                                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform duration-300"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Booking Summary Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Field Information -->
                    <div class="glass-morphism border border-sport-primary/20 rounded-2xl overflow-hidden mb-6 animate-fade-in-up" style="animation-delay: 0.2s;">
                        <div class="relative h-48">
                            @if($field->image)
                                <img src="{{ Storage::url($field->image) }}" 
                                     alt="{{ $field->name }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-sport-primary/20 to-sport-accent/20 flex items-center justify-center">
                                    <i class="fas fa-dumbbell text-4xl text-sport-primary"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-sport-dark/80 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <h3 class="text-xl font-bold text-white mb-1">{{ $field->name }}</h3>
                                <div class="flex items-center text-sport-accent text-sm">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    <span>Jakarta Sports Center</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-star text-yellow-500 mr-1"></i>
                                    <span class="text-sport-text font-medium">4.9</span>
                                    <span class="text-sport-text-muted ml-1">(250+ reviews)</span>
                                </div>
                                <div class="flex items-center text-sport-accent text-sm">
                                    <i class="fas fa-shield-alt mr-1"></i>
                                    <span>Verified</span>
                                </div>
                            </div>
                            
                            @if($field->description)
                                <p class="text-sport-text-muted text-sm mb-4">{{ $field->description }}</p>
                            @endif
                            
                            <div class="space-y-2">
                                <div class="flex items-center text-sm text-sport-text">
                                    <i class="fas fa-wifi text-sport-primary w-4"></i>
                                    <span class="ml-2">Free WiFi</span>
                                </div>
                                <div class="flex items-center text-sm text-sport-text">
                                    <i class="fas fa-parking text-sport-primary w-4"></i>
                                    <span class="ml-2">Free Parking</span>
                                </div>
                                <div class="flex items-center text-sm text-sport-text">
                                    <i class="fas fa-shower text-sport-primary w-4"></i>
                                    <span class="ml-2">Shower Facilities</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Summary -->
                    <div id="booking-summary" class="glass-morphism border border-sport-primary/20 rounded-2xl overflow-hidden animate-fade-in-up" style="animation-delay: 0.4s;">
                        <div class="bg-gradient-to-r from-sport-accent/10 to-sport-primary/10 p-4 border-b border-sport-primary/10">
                            <h4 class="font-semibold text-sport-text flex items-center">
                                <i class="fas fa-receipt text-sport-accent mr-2"></i>
                                Booking Summary
                            </h4>
                        </div>
                        
                        <div class="p-6">
                            <div id="summary-empty" class="text-center py-8">
                                <i class="fas fa-calendar-times text-4xl text-sport-text-muted mb-3"></i>
                                <p class="text-sport-text-muted text-sm">Select date and time slots to see your booking summary</p>
                            </div>
                            
                            <div id="summary-content-sidebar" class="hidden">
                                <div class="space-y-4">
                                    <div class="border-b border-sport-primary/10 pb-4">
                                        <div class="flex justify-between text-sm mb-2">
                                            <span class="text-sport-text-muted">Date:</span>
                                            <span class="text-sport-text font-medium" id="summary-date">-</span>
                                        </div>
                                        <div class="flex justify-between text-sm">
                                            <span class="text-sport-text-muted">Duration:</span>
                                            <span class="text-sport-text font-medium" id="summary-duration">-</span>
                                        </div>
                                    </div>
                                    
                                    <div id="summary-slots" class="space-y-2">
                                        <!-- Selected slots will be shown here -->
                                    </div>
                                    
                                    <div class="border-t border-sport-primary/10 pt-4 space-y-2">
                                        <div class="flex justify-between text-sm">
                                            <span class="text-sport-text-muted">Subtotal:</span>
                                            <span class="text-sport-text" id="summary-subtotal">Rp 0</span>
                                        </div>
                                        <div class="flex justify-between text-sm">
                                            <span class="text-sport-text-muted">DP Required (20%):</span>
                                            <span class="text-sport-accent font-medium" id="summary-dp">Rp 0</span>
                                        </div>
                                        <div class="flex justify-between text-lg font-bold border-t border-sport-primary/10 pt-2">
                                            <span class="text-sport-text">Total:</span>
                                            <span class="text-sport-primary" id="summary-total">Rp 0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Booking Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let selectedSlots = [];
            let fieldSchedules = [];
            
            const bookingDateInput = document.getElementById('booking_date');
            const scheduleContainer = document.getElementById('schedule-container');
            const schedulesList = document.getElementById('schedules-list');
            const progressBar = document.getElementById('progress-bar');
            
            // Date selection handler
            bookingDateInput.addEventListener('change', function() {
                const date = this.value;
                const fieldId = {{ $field->id }};
                
                if (date) {
                    updateProgress(66);
                    loadSchedules(fieldId, date);
                } else {
                    updateProgress(33);
                    hideSchedules();
                }
            });
            
            function loadSchedules(fieldId, date) {
                console.log('Loading schedules for field:', fieldId, 'date:', date);
                
                // Show loading state
                schedulesList.innerHTML = '<div class="col-span-full text-center py-8"><div class="sport-spinner mx-auto mb-2"></div><p class="text-sport-text-muted text-sm">Loading available slots...</p></div>';
                scheduleContainer.style.display = 'block';
                
                const url = `/booking/${fieldId}/schedules?date=${date}`;
                console.log('Fetching URL:', url);
                
                fetch(url)
                    .then(response => {
                        console.log('Response status:', response.status);
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(schedules => {
                        console.log('Received schedules:', schedules);
                        fieldSchedules = schedules;
                        renderSchedules(schedules);
                        
                        if (schedules.length > 0) {
                            scheduleContainer.style.display = 'block';
                        } else {
                            hideSchedules();
                            console.log('No schedules found for this date');
                            if (window.showNotification) {
                                window.showNotification('No schedules available for this date', 'warning');
                            } else {
                                alert('Tidak ada jadwal tersedia untuk tanggal ini.');
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error loading schedules:', error);
                        hideSchedules();
                        if (window.showNotification) {
                            window.showNotification('Error loading schedules. Please try again.', 'error');
                        } else {
                            alert('Terjadi kesalahan saat memuat jadwal: ' + error.message);
                        }
                    });
            }
            
            function renderSchedules(schedules) {
                console.log('Rendering schedules:', schedules);
                schedulesList.innerHTML = '';
                
                if (!schedules || schedules.length === 0) {
                    schedulesList.innerHTML = '<div class="col-span-full text-center py-8"><p class="text-sport-text-muted">Tidak ada jadwal tersedia</p></div>';
                    return;
                }
                
                schedules.forEach((schedule, index) => {
                    console.log(`Rendering schedule ${index}:`, schedule);
                    
                    const scheduleDiv = document.createElement('div');
                    scheduleDiv.className = `schedule-slot border-2 rounded-xl p-4 transition-all duration-300 cursor-pointer ${
                        schedule.is_booked 
                            ? 'bg-red-500/10 border-red-500/30 cursor-not-allowed' 
                            : 'bg-sport-gray/20 border-sport-primary/20 hover:border-sport-accent/50 hover:bg-sport-accent/5'
                    }`;
                    
                    // Format price properly
                    const price = parseFloat(schedule.price);
                    const formattedPrice = new Intl.NumberFormat('id-ID').format(price);
                    const dpPrice = new Intl.NumberFormat('id-ID').format(price * 0.2);
                    
                    scheduleDiv.innerHTML = `
                        <label class="flex items-center ${schedule.is_booked ? 'cursor-not-allowed' : 'cursor-pointer'}">
                            <input type="checkbox" 
                                   name="field_schedule_ids[]" 
                                   value="${schedule.id}" 
                                   ${schedule.is_booked ? 'disabled' : ''}
                                   class="sr-only schedule-checkbox"
                                   data-schedule='${JSON.stringify(schedule)}'>
                            <div class="flex-1">
                                <div class="flex justify-between items-center mb-2">
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 border-2 border-sport-primary rounded mr-3 checkbox-visual ${schedule.is_booked ? 'border-red-500' : ''}">
                                            <i class="fas fa-check text-xs text-white opacity-0 checkbox-icon"></i>
                                        </div>
                                        <span class="font-semibold text-sport-text">${schedule.start_time.substring(0,5)} - ${schedule.end_time.substring(0,5)}</span>
                                    </div>
                                    <span class="text-lg font-bold ${schedule.is_booked ? 'text-red-400' : 'text-sport-accent'}">
                                        Rp ${formattedPrice}
                                    </span>
                                </div>
                                
                                <div class="flex items-center justify-between text-sm">
                                    <span class="${schedule.is_booked ? 'text-red-400' : 'text-sport-accent'}">
                                        <i class="fas fa-${schedule.is_booked ? 'times' : 'check'}-circle mr-1"></i>
                                        ${schedule.is_booked ? 'Sudah dibooking' : 'Tersedia'}
                                    </span>
                                    ${!schedule.is_booked ? `<span class="text-sport-text-muted">DP: Rp ${dpPrice}</span>` : ''}
                                </div>
                            </div>
                        </label>
                    `;
                    
                    schedulesList.appendChild(scheduleDiv);
                    
                    // Add click handler for non-disabled slots
                    if (!schedule.is_booked) {
                        const checkbox = scheduleDiv.querySelector('.schedule-checkbox');
                        scheduleDiv.addEventListener('click', function(e) {
                            if (e.target.type !== 'checkbox') {
                                checkbox.click();
                            }
                        });
                        
                        checkbox.addEventListener('change', function() {
                            updateSlotSelection(this);
                        });
                    }
                });
                
                console.log('Finished rendering', schedules.length, 'schedules');
            }
            
            function updateSlotSelection(checkbox) {
                const scheduleData = JSON.parse(checkbox.dataset.schedule);
                const slotDiv = checkbox.closest('.schedule-slot');
                const checkboxVisual = slotDiv.querySelector('.checkbox-visual');
                const checkboxIcon = slotDiv.querySelector('.checkbox-icon');
                
                if (checkbox.checked) {
                    selectedSlots.push(scheduleData);
                    slotDiv.classList.add('border-sport-accent', 'bg-sport-accent/10');
                    slotDiv.classList.remove('border-sport-primary/20', 'bg-sport-gray/20');
                    checkboxVisual.classList.add('bg-sport-accent', 'border-sport-accent');
                    checkboxIcon.classList.remove('opacity-0');
                    checkboxIcon.classList.add('opacity-100');
                } else {
                    selectedSlots = selectedSlots.filter(slot => slot.id !== scheduleData.id);
                    slotDiv.classList.remove('border-sport-accent', 'bg-sport-accent/10');
                    slotDiv.classList.add('border-sport-primary/20', 'bg-sport-gray/20');
                    checkboxVisual.classList.remove('bg-sport-accent', 'border-sport-accent');
                    checkboxIcon.classList.add('opacity-0');
                    checkboxIcon.classList.remove('opacity-100');
                }
                
                updateBookingSummary();
                updateProgress(selectedSlots.length > 0 ? 100 : 66);
            }
            
            function updateBookingSummary() {
                const summaryEmpty = document.getElementById('summary-empty');
                const summaryContent = document.getElementById('summary-content-sidebar');
                const summarySlots = document.getElementById('summary-slots');
                
                if (selectedSlots.length === 0) {
                    summaryEmpty.style.display = 'block';
                    summaryContent.classList.add('hidden');
                    return;
                }
                
                summaryEmpty.style.display = 'none';
                summaryContent.classList.remove('hidden');
                
                // Update date
                document.getElementById('summary-date').textContent = new Date(bookingDateInput.value).toLocaleDateString('id-ID');
                
                // Update slots
                summarySlots.innerHTML = '';
                let totalPrice = 0;
                
                selectedSlots.forEach(slot => {
                    totalPrice += slot.price;
                    const slotDiv = document.createElement('div');
                    slotDiv.className = 'flex justify-between text-sm py-2 border-b border-sport-primary/5';
                    slotDiv.innerHTML = `
                        <span class="text-sport-text">${slot.start_time} - ${slot.end_time}</span>
                        <span class="text-sport-accent font-medium">Rp ${new Intl.NumberFormat('id-ID').format(slot.price)}</span>
                    `;
                    summarySlots.appendChild(slotDiv);
                });
                
                // Update totals
                const dpAmount = totalPrice * 0.2;
                document.getElementById('summary-duration').textContent = `${selectedSlots.length} slot(s)`;
                document.getElementById('summary-subtotal').textContent = `Rp ${new Intl.NumberFormat('id-ID').format(totalPrice)}`;
                document.getElementById('summary-dp').textContent = `Rp ${new Intl.NumberFormat('id-ID').format(dpAmount)}`;
                document.getElementById('summary-total').textContent = `Rp ${new Intl.NumberFormat('id-ID').format(totalPrice)}`;
            }
            
            function updateProgress(percentage) {
                progressBar.style.width = percentage + '%';
            }
            
            function hideSchedules() {
                scheduleContainer.style.display = 'none';
                selectedSlots = [];
                updateBookingSummary();
            }
            
            // Payment method selection handler
            const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
            paymentMethods.forEach(method => {
                method.addEventListener('change', function() {
                    // Add visual feedback for payment method selection
                    paymentMethods.forEach(m => {
                        const label = m.closest('label');
                        if (m.checked) {
                            label.querySelector('div').classList.add('ring-2', 'ring-sport-primary');
                        } else {
                            label.querySelector('div').classList.remove('ring-2', 'ring-sport-primary');
                        }
                    });
                });
            });
            
            // Form submission validation
            const form = document.querySelector('form');
            const submitBtn = document.getElementById('submit-booking-btn');
            
            form.addEventListener('submit', function(e) {
                console.log('Form submission attempt');
                
                // Validate required fields
                const bookingDate = document.getElementById('booking_date').value;
                const selectedSchedules = document.querySelectorAll('input[name="field_schedule_ids[]"]:checked');
                const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
                
                console.log('Booking date:', bookingDate);
                console.log('Selected schedules:', selectedSchedules.length);
                console.log('Payment method:', paymentMethod?.value);
                
                // Check if date is selected
                if (!bookingDate) {
                    e.preventDefault();
                    alert('Silahkan pilih tanggal booking terlebih dahulu.');
                    return false;
                }
                
                // Check if schedules are selected
                if (selectedSchedules.length === 0) {
                    e.preventDefault();
                    alert('Silahkan pilih minimal satu jadwal waktu.');
                    return false;
                }
                
                // Check if payment method is selected
                if (!paymentMethod) {
                    e.preventDefault();
                    alert('Silahkan pilih metode pembayaran.');
                    return false;
                }
                
                // Add loading state to button
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <div class="flex items-center justify-center space-x-3">
                        <div class="sport-spinner w-5 h-5"></div>
                        <span>Processing...</span>
                    </div>
                `;
                
                console.log('Form validation passed, submitting...');
                return true;
            });
        });
    </script>

    <style>
        .schedule-slot {
            position: relative;
        }
        
        .checkbox-visual {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .checkbox-icon {
            transition: opacity 0.3s ease;
        }
        
        .schedule-checkbox:checked + div .checkbox-visual {
            background: var(--sport-accent);
            border-color: var(--sport-accent);
        }
        
        .schedule-slot:hover:not(.cursor-not-allowed) {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 212, 255, 0.15);
        }
        
        /* Loading animation for schedule slots */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .schedule-slot {
            animation: slideIn 0.3s ease-out;
        }
        
        /* Custom radio button styling */
        input[type="radio"]:checked + div {
            animation: pulse-sport 0.3s ease-out;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .schedule-slot {
                margin-bottom: 0.5rem;
            }
            
            .btn-sport {
                width: 100%;
                justify-content: center;
            }
        }
        
        /* Progress bar animation */
        #progress-bar {
            animation: progressFill 0.5s ease-out;
        }
        
        @keyframes progressFill {
            from {
                transform: scaleX(0);
                transform-origin: left;
            }
            to {
                transform: scaleX(1);
                transform-origin: left;
            }
        }
    </style>