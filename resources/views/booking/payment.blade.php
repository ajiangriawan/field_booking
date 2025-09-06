<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="sport-font text-3xl font-bold bg-gradient-to-r from-sport-primary via-sport-accent to-sport-secondary bg-clip-text text-transparent">
                    Pembayaran
                </h2>
                <p class="text-sport-text-muted text-sm mt-1">Secure payment processing for your booking</p>
            </div>
            <div class="flex items-center space-x-3">
                <div class="glass-dark border border-sport-accent/20 px-4 py-2 rounded-lg">
                    <div class="flex items-center space-x-2 text-sm">
                        <i class="fas fa-lock text-sport-accent"></i>
                        <span class="text-sport-text">SSL Secured</span>
                    </div>
                </div>
                <div class="flex items-center space-x-1">
                    <div class="w-2 h-2 bg-sport-accent rounded-full animate-pulse"></div>
                    <div class="w-2 h-2 bg-sport-primary rounded-full animate-pulse" style="animation-delay: 0.2s;"></div>
                    <div class="w-2 h-2 bg-sport-secondary rounded-full animate-pulse" style="animation-delay: 0.4s;"></div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-6 lg:py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Payment Details Card -->
                <div class="lg:col-span-2">
                    <div class="glass-morphism border border-sport-primary/20 rounded-2xl overflow-hidden animate-fade-in-up">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-sport-primary/10 via-sport-accent/5 to-sport-secondary/10 p-6 border-b border-sport-primary/10">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-sport-primary to-sport-accent rounded-xl flex items-center justify-center animate-pulse-sport">
                                        <i class="fas fa-credit-card text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-sport-text">Payment Details</h3>
                                        <p class="text-sport-text-muted text-sm">Review and complete your payment</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-sm text-sport-text-muted">Payment Type</div>
                                    <div class="flex items-center space-x-2">
                                        @if($payment->payment_type === 'dp')
                                            <span class="bg-sport-primary/20 text-sport-primary px-3 py-1 rounded-full text-sm font-medium">
                                                <i class="fas fa-percentage mr-1"></i>
                                                Down Payment
                                            </span>
                                        @else
                                            <span class="bg-sport-accent/20 text-sport-accent px-3 py-1 rounded-full text-sm font-medium">
                                                <i class="fas fa-check-circle mr-1"></i>
                                                Full Payment
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Booking Information Grid -->
                        <div class="p-6 lg:p-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                <!-- Booking Code -->
                                <div class="glass-dark border border-sport-primary/20 rounded-xl p-4 hover:border-sport-primary/40 transition-colors duration-300">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-sport-primary/20 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-barcode text-sport-primary"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-xs text-sport-text-muted uppercase tracking-wide">Booking Code</div>
                                            <div class="text-sport-text font-semibold">{{ $booking->booking_code }}</div>
                                        </div>
                                        <button class="p-2 text-sport-text-muted hover:text-sport-primary transition-colors duration-300" title="Copy Code">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Field Information -->
                                <div class="glass-dark border border-sport-primary/20 rounded-xl p-4 hover:border-sport-accent/40 transition-colors duration-300">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-sport-accent/20 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-dumbbell text-sport-accent"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-xs text-sport-text-muted uppercase tracking-wide">Sports Facility</div>
                                            <div class="text-sport-text font-semibold">{{ $booking->field->name }}</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Date Information -->
                                <div class="glass-dark border border-sport-primary/20 rounded-xl p-4 hover:border-sport-secondary/40 transition-colors duration-300">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-sport-secondary/20 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-calendar text-sport-secondary"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-xs text-sport-text-muted uppercase tracking-wide">Booking Date</div>
                                            <div class="text-sport-text font-semibold">{{ $booking->booking_date->format('l, F j, Y') }}</div>
                                            <div class="text-xs text-sport-text-muted">{{ $booking->booking_date->diffForHumans() }}</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Schedule Information -->
                                <div class="glass-dark border border-sport-primary/20 rounded-xl p-4">
                                    <div class="flex items-start space-x-3">
                                        <div class="w-10 h-10 bg-sport-primary/20 rounded-lg flex items-center justify-center mt-1">
                                            <i class="fas fa-clock text-sport-primary"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-xs text-sport-text-muted uppercase tracking-wide mb-2">Time Slots</div>
                                            <div class="space-y-1">
                                                @foreach($booking->fieldSchedules as $schedule)
                                                <div class="flex items-center justify-between bg-sport-gray/20 rounded-lg px-3 py-2">
                                                    <span class="text-sport-text text-sm font-medium">
                                                        {{ $schedule->start_time }} - {{ $schedule->end_time }}
                                                    </span>
                                                    <span class="text-sport-accent text-xs">{{ ucfirst($schedule->day_of_week) }}</span>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Summary -->
                            <div class="bg-gradient-to-r from-sport-primary/5 via-sport-accent/5 to-sport-secondary/5 border border-sport-primary/20 rounded-2xl p-6">
                                <h4 class="text-lg font-bold text-sport-text mb-4 flex items-center">
                                    <i class="fas fa-calculator text-sport-primary mr-3"></i>
                                    Payment Breakdown
                                </h4>
                                
                                <div class="space-y-4">
                                    <!-- Base Price -->
                                    <div class="flex justify-between items-center py-2 border-b border-sport-primary/10">
                                        <span class="text-sport-text-muted">Session Fee</span>
                                        <span class="text-sport-text font-medium">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
                                    </div>
                                    
                                    @if($booking->total_price > $payment->amount)
                                        <div class="flex justify-between items-center py-2 border-b border-sport-primary/10">
                                            <span class="text-sport-text-muted">Previous Payment</span>
                                            <span class="text-sport-text">-Rp {{ number_format($booking->total_price - $payment->amount, 0, ',', '.') }}</span>
                                        </div>
                                    @endif
                                    
                                    <!-- Service Fee -->
                                    <div class="flex justify-between items-center py-2 border-b border-sport-primary/10">
                                        <span class="text-sport-text-muted">Platform Fee</span>
                                        <span class="text-sport-accent">Free</span>
                                    </div>
                                    
                                    <!-- Total Amount -->
                                    <div class="flex justify-between items-center py-4 border-t-2 border-sport-primary/20">
                                        <div>
                                            <span class="text-lg font-bold text-sport-text">Amount to Pay</span>
                                            <div class="text-xs text-sport-text-muted">
                                                {{ $payment->payment_type === 'dp' ? '(Down Payment 20%)' : '(Final Settlement)' }}
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-2xl font-bold bg-gradient-to-r from-sport-accent to-sport-primary bg-clip-text text-transparent">
                                                Rp {{ number_format($payment->amount, 0, ',', '.') }}
                                            </div>
                                            @if($payment->payment_type === 'remaining')
                                                <div class="text-xs text-sport-text-muted">Remaining Balance</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Button -->
                            <div class="text-center mt-8">
                                <button id="pay-button" 
                                        class="btn-sport text-xl px-12 py-4 font-bold group relative overflow-hidden">
                                    <div class="flex items-center justify-center space-x-3">
                                        <i class="fas fa-credit-card group-hover:scale-110 transition-transform duration-300"></i>
                                        <span>Bayar Sekarang</span>
                                        <div class="flex items-center space-x-1">
                                            <div class="w-2 h-2 bg-white rounded-full opacity-0 group-hover:opacity-100 animate-bounce" style="animation-delay: 0.1s;"></div>
                                            <div class="w-2 h-2 bg-white rounded-full opacity-0 group-hover:opacity-100 animate-bounce" style="animation-delay: 0.2s;"></div>
                                            <div class="w-2 h-2 bg-white rounded-full opacity-0 group-hover:opacity-100 animate-bounce" style="animation-delay: 0.3s;"></div>
                                        </div>
                                    </div>
                                </button>
                                
                                <div class="mt-4 text-sm text-sport-text-muted">
                                    <i class="fas fa-shield-alt text-sport-accent mr-2"></i>
                                    Your payment is secured by 256-bit SSL encryption
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Security & Support Sidebar -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Security Features -->
                    <div class="glass-morphism border border-sport-primary/20 rounded-2xl overflow-hidden animate-fade-in-up" style="animation-delay: 0.2s;">
                        <div class="bg-gradient-to-r from-sport-accent/10 to-sport-primary/10 p-4 border-b border-sport-primary/10">
                            <h4 class="font-semibold text-sport-text flex items-center">
                                <i class="fas fa-shield-alt text-sport-accent mr-2"></i>
                                Security Features
                            </h4>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-sport-accent/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-lock text-sport-accent text-sm"></i>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-sport-text">SSL Encryption</div>
                                    <div class="text-xs text-sport-text-muted">Bank-level security</div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-sport-primary/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-university text-sport-primary text-sm"></i>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-sport-text">Midtrans Gateway</div>
                                    <div class="text-xs text-sport-text-muted">Certified payment processor</div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-sport-secondary/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-history text-sport-secondary text-sm"></i>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-sport-text">Transaction History</div>
                                    <div class="text-xs text-sport-text-muted">Full audit trail</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Methods -->
                    <div class="glass-morphism border border-sport-primary/20 rounded-2xl overflow-hidden animate-fade-in-up" style="animation-delay: 0.4s;">
                        <div class="bg-gradient-to-r from-sport-primary/10 to-sport-accent/10 p-4 border-b border-sport-primary/10">
                            <h4 class="font-semibold text-sport-text flex items-center">
                                <i class="fas fa-credit-card text-sport-primary mr-2"></i>
                                Accepted Methods
                            </h4>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-2 gap-3">
                                <div class="bg-sport-gray/20 rounded-lg p-3 text-center">
                                    <i class="fas fa-university text-sport-primary text-xl mb-2"></i>
                                    <div class="text-xs text-sport-text">Bank Transfer</div>
                                </div>
                                <div class="bg-sport-gray/20 rounded-lg p-3 text-center">
                                    <i class="fas fa-credit-card text-sport-accent text-xl mb-2"></i>
                                    <div class="text-xs text-sport-text">Credit Card</div>
                                </div>
                                <div class="bg-sport-gray/20 rounded-lg p-3 text-center">
                                    <i class="fas fa-mobile-alt text-sport-secondary text-xl mb-2"></i>
                                    <div class="text-xs text-sport-text">E-Wallet</div>
                                </div>
                                <div class="bg-sport-gray/20 rounded-lg p-3 text-center">
                                    <i class="fas fa-store text-sport-primary text-xl mb-2"></i>
                                    <div class="text-xs text-sport-text">Retail Store</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Support Contact -->
                    <div class="glass-morphism border border-sport-primary/20 rounded-2xl overflow-hidden animate-fade-in-up" style="animation-delay: 0.6s;">
                        <div class="bg-gradient-to-r from-sport-secondary/10 to-sport-accent/10 p-4 border-b border-sport-primary/10">
                            <h4 class="font-semibold text-sport-text flex items-center">
                                <i class="fas fa-headset text-sport-secondary mr-2"></i>
                                Need Help?
                            </h4>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="text-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-sport-accent to-sport-primary rounded-full flex items-center justify-center mx-auto mb-3">
                                    <i class="fas fa-comments text-white"></i>
                                </div>
                                <div class="text-sm text-sport-text-muted mb-4">
                                    Having payment issues? Our support team is ready to help.
                                </div>
                                <div class="space-y-2">
                                    <button class="w-full bg-sport-primary/10 hover:bg-sport-primary/20 border border-sport-primary/20 text-sport-primary px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300">
                                        <i class="fas fa-comments mr-2"></i>
                                        Live Chat
                                    </button>
                                    <button class="w-full bg-sport-accent/10 hover:bg-sport-accent/20 border border-sport-accent/20 text-sport-accent px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300">
                                        <i class="fas fa-phone mr-2"></i>
                                        Call Support
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Payment Script -->
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const payButton = document.getElementById('pay-button');
            let isProcessing = false;
            
            // Add loading state to button
            function setButtonLoading(loading) {
                isProcessing = loading;
                if (loading) {
                    payButton.disabled = true;
                    payButton.innerHTML = `
                        <div class="flex items-center justify-center space-x-3">
                            <div class="sport-spinner w-5 h-5"></div>
                            <span>Processing Payment...</span>
                        </div>
                    `;
                    payButton.classList.add('opacity-75', 'cursor-not-allowed');
                } else {
                    payButton.disabled = false;
                    payButton.innerHTML = `
                        <div class="flex items-center justify-center space-x-3">
                            <i class="fas fa-credit-card group-hover:scale-110 transition-transform duration-300"></i>
                            <span>Bayar Sekarang</span>
                            <div class="flex items-center space-x-1">
                                <div class="w-2 h-2 bg-white rounded-full opacity-0 group-hover:opacity-100 animate-bounce" style="animation-delay: 0.1s;"></div>
                                <div class="w-2 h-2 bg-white rounded-full opacity-0 group-hover:opacity-100 animate-bounce" style="animation-delay: 0.2s;"></div>
                                <div class="w-2 h-2 bg-white rounded-full opacity-0 group-hover:opacity-100 animate-bounce" style="animation-delay: 0.3s;"></div>
                            </div>
                        </div>
                    `;
                    payButton.classList.remove('opacity-75', 'cursor-not-allowed');
                }
            }
            
            // Copy booking code functionality
            const copyButton = document.querySelector('button[title="Copy Code"]');
            if (copyButton) {
                copyButton.addEventListener('click', function() {
                    const bookingCode = '{{ $booking->booking_code }}';
                    navigator.clipboard.writeText(bookingCode).then(() => {
                        if (window.showNotification) {
                            window.showNotification('Booking code copied to clipboard!', 'success');
                        }
                        this.innerHTML = '<i class="fas fa-check text-sport-accent"></i>';
                        setTimeout(() => {
                            this.innerHTML = '<i class="fas fa-copy"></i>';
                        }, 2000);
                    });
                });
            }
            
            // Payment processing
            payButton.addEventListener('click', function() {
                if (isProcessing) return;
                
                setButtonLoading(true);
                
                // Show notification
                if (window.showNotification) {
                    window.showNotification('Redirecting to payment gateway...', 'info');
                }
                
                // Simulate loading time before opening Midtrans
                setTimeout(() => {
                    window.snap.pay('{{ $snap_token }}', {
                        onSuccess: function(result) {
                            setButtonLoading(false);
                            if (window.showNotification) {
                                window.showNotification('Payment successful! Redirecting...', 'success');
                            }
                            setTimeout(() => {
                                window.location.href = '{{ route("payment.success") }}';
                            }, 1500);
                        },
                        onPending: function(result) {
                            setButtonLoading(false);
                            if (window.showNotification) {
                                window.showNotification('Payment pending. Please complete your transaction.', 'warning');
                            }
                            setTimeout(() => {
                                window.location.href = '{{ route("payment.pending") }}';
                            }, 1500);
                        },
                        onError: function(result) {
                            setButtonLoading(false);
                            if (window.showNotification) {
                                window.showNotification('Payment failed. Please try again.', 'error');
                            }
                            setTimeout(() => {
                                window.location.href = '{{ route("payment.error") }}';
                            }, 1500);
                        },
                        onClose: function() {
                            setButtonLoading(false);
                            if (window.showNotification) {
                                window.showNotification('Payment cancelled. You can try again anytime.', 'info');
                            }
                        }
                    });
                }, 1000);
            });
        });
    </script>
</x-app-layout>