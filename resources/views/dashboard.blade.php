<x-app-layout>
    <div class="flex items-center justify-between">
        <div>
            <h2 class="sport-font text-3xl font-bold bg-gradient-to-r from-sport-primary via-sport-accent to-sport-secondary bg-clip-text text-transparent">
                {{ __('Dashboard') }}
            </h2>
            <p class="text-sport-text-muted text-sm mt-1">Welcome back to your sports command center</p>
        </div>
        <div class="flex items-center space-x-3">
            <div class="hidden sm:flex items-center space-x-2 text-sm text-sport-text-muted">
                <i class="fas fa-calendar-day text-sport-primary"></i>
                <span>{{ now()->format('l, F j, Y') }}</span>
            </div>
            <div class="w-2 h-2 bg-sport-accent rounded-full animate-pulse"></div>
        </div>
    </div>

    <div class="py-6 lg:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Hero Section -->
            <div class="glass-morphism border border-sport-primary/20 rounded-2xl overflow-hidden mb-8 animate-fade-in-up">
                <div class="bg-gradient-to-r from-sport-primary/10 via-sport-accent/5 to-sport-secondary/10 p-6 lg:p-8">
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-sport-primary to-sport-accent rounded-2xl flex items-center justify-center animate-pulse-sport">
                                <i class="fas fa-user-circle text-2xl text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-sport-text mb-1">
                                    Selamat Datang, <span class="text-sport-accent">{{ Auth::user()->name }}</span>!
                                </h3>
                                <p class="text-sport-text-muted">Ready to book your next sports session?</p>
                                <div class="flex items-center mt-2 space-x-4 text-sm">
                                    <div class="flex items-center text-sport-primary">
                                        <i class="fas fa-trophy mr-1"></i>
                                        <span>Premium Member</span>
                                    </div>
                                    <div class="flex items-center text-sport-accent">
                                        <i class="fas fa-star mr-1"></i>
                                        <span>4.9 Rating</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('booking.index') }}"
                            class="btn-sport flex items-center bg-gradient-to-br from-sport-primary to-sport-accent rounded-2xl space-x-2 px-6 py-3 font-semibold text-lg group animate-glow text-sport-text">
                            <i class="fas fa-plus-circle group-hover:rotate-90 transition-transform duration-300"></i>
                            <span>Booking Lapangan</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 animate-fade-in-up" style="animation-delay: 0.2s;">
                <!-- Total Bookings -->
                <div class="sport-card bg-gradient-to-br from-sport-gray to-sport-gray/80 border border-sport-primary/20">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sport-text-muted text-sm font-medium">Total Bookings</p>
                                <p class="text-3xl font-bold text-sport-text mt-1" id="total-bookings">{{ $bookings->count() }}</p>
                                <div class="flex items-center mt-2 text-xs">
                                    <i class="fas fa-arrow-up text-sport-accent mr-1"></i>
                                    <span class="text-sport-accent">12% increase</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-sport-primary/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-calendar-check text-sport-primary text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Bookings -->
                <div class="sport-card bg-gradient-to-br from-sport-gray to-sport-gray/80 border border-sport-accent/20">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sport-text-muted text-sm font-medium">Active Bookings</p>
                                <p class="text-3xl font-bold text-sport-text mt-1">{{ $bookings->whereIn('status', ['dp_paid', 'fully_paid'])->count() }}</p>
                                <div class="flex items-center mt-2 text-xs">
                                    <i class="fas fa-clock text-sport-accent mr-1"></i>
                                    <span class="text-sport-accent">Current month</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-sport-accent/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-play-circle text-sport-accent text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Spent -->
                <div class="sport-card bg-gradient-to-br from-sport-gray to-sport-gray/80 border border-sport-secondary/20">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sport-text-muted text-sm font-medium">Total Spent</p>
                                <p class="text-3xl font-bold text-sport-text mt-1">
                                    Rp {{ number_format($bookings->where('status', 'fully_paid')->sum('total_price'), 0, ',', '.') }}
                                </p>
                                <div class="flex items-center mt-2 text-xs">
                                    <i class="fas fa-coins text-sport-secondary mr-1"></i>
                                    <span class="text-sport-secondary">All time</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-sport-secondary/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-wallet text-sport-secondary text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Payments -->
                <div class="sport-card bg-gradient-to-br from-sport-gray to-sport-gray/80 border border-yellow-500/20">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sport-text-muted text-sm font-medium">Pending Payments</p>
                                <p class="text-3xl font-bold text-sport-text mt-1">{{ $bookings->where('status', 'dp_paid')->count() }}</p>
                                <div class="flex items-center mt-2 text-xs">
                                    <i class="fas fa-exclamation-triangle text-yellow-500 mr-1"></i>
                                    <span class="text-yellow-500">Requires attention</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-yellow-500/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-credit-card text-yellow-500 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8 animate-fade-in-up" style="animation-delay: 0.4s;">
                <!-- Recent Activity -->
                <div class="lg:col-span-2 glass-morphism border border-sport-primary/20 rounded-2xl overflow-hidden">
                    <div class="p-6 border-b border-sport-primary/10">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-sport-text flex items-center">
                                <i class="fas fa-clock text-sport-primary mr-3"></i>
                                Recent Activity
                            </h3>
                            <div class="w-2 h-2 bg-sport-accent rounded-full animate-pulse"></div>
                        </div>
                    </div>
                    <div class="p-6">
                        @if($bookings->take(3)->count() > 0)
                        <div class="space-y-4">
                            @foreach($bookings->take(3) as $booking)
                            <div class="flex items-center space-x-4 p-4 bg-sport-gray/30 rounded-xl hover:bg-sport-primary/5 transition-colors duration-300">
                                <div class="w-10 h-10 bg-gradient-to-br from-sport-primary to-sport-accent rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-dumbbell text-white text-sm"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sport-text font-medium truncate">{{ $booking->field->name }}</p>
                                    <p class="text-sport-text-muted text-sm">{{ $booking->booking_date->format('M j, Y') }}</p>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    <p class="text-sport-primary font-semibold">{{ $booking->booking_code }}</p>
                                    <p class="text-sport-text-muted text-xs">{{ ucfirst($booking->status) }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="text-center py-8">
                            <i class="fas fa-calendar-times text-4xl text-sport-text-muted mb-4"></i>
                            <p class="text-sport-text-muted">No recent activity</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="glass-morphism border border-sport-primary/20 rounded-2xl overflow-hidden">
                    <div class="p-6 border-b border-sport-primary/10">
                        <h3 class="text-xl font-semibold text-sport-text flex items-center">
                            <i class="fas fa-chart-pie text-sport-accent mr-3"></i>
                            Quick Stats
                        </h3>
                    </div>
                    <div class="p-6 space-y-6">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-gradient-to-br from-sport-primary to-sport-accent rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-white text-2xl font-bold">{{ $bookings->where('status', 'fully_paid')->count() }}</span>
                            </div>
                            <p class="text-sport-text font-medium">Completed Sessions</p>
                            <p class="text-sport-text-muted text-sm">This month</p>
                        </div>

                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-sport-text-muted text-sm">Success Rate</span>
                                <span class="text-sport-accent font-semibold">98%</span>
                            </div>
                            <div class="w-full bg-sport-gray rounded-full h-2">
                                <div class="bg-gradient-to-r from-sport-primary to-sport-accent h-2 rounded-full" style="width: 98%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking History Table -->
            <div class="glass-morphism border border-sport-primary/20 rounded-2xl overflow-hidden animate-fade-in-up" style="animation-delay: 0.6s;">
                <div class="p-6 border-b border-sport-primary/10">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <h3 class="text-xl font-semibold text-sport-text flex items-center">
                            <i class="fas fa-history text-sport-primary mr-3"></i>
                            Riwayat Booking
                        </h3>
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center space-x-2 text-sm text-sport-text-muted">
                                <i class="fas fa-filter"></i>
                                <select class="bg-sport-gray/50 border border-sport-primary/20 rounded-lg px-3 py-1 text-sport-text focus:border-sport-primary focus:outline-none">
                                    <option>All Status</option>
                                    <option>Pending</option>
                                    <option>DP Paid</option>
                                    <option>Fully Paid</option>
                                    <option>Cancelled</option>
                                </select>
                            </div>
                            <button class="p-2 bg-sport-primary/10 hover:bg-sport-primary/20 rounded-lg text-sport-primary transition-colors duration-300">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden">
                    @if($bookings->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-sport-primary/10">
                            <thead class="bg-sport-gray/30">
                                <tr>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-sport-text-muted uppercase tracking-wider">
                                        Booking Details
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-sport-text-muted uppercase tracking-wider">
                                        Field & Schedule
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-sport-text-muted uppercase tracking-wider">
                                        Payment Info
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-sport-text-muted uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-sport-text-muted uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-sport-primary/5">
                                @foreach($bookings as $booking)
                                <tr class="hover:bg-sport-primary/5 transition-colors duration-200 group">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gradient-to-br from-sport-primary to-sport-accent rounded-lg flex items-center justify-center mr-4">
                                                <i class="fas fa-receipt text-white text-sm"></i>
                                            </div>
                                            <div>
                                                <div class="text-sm font-semibold text-sport-text">{{ $booking->booking_code }}</div>
                                                <div class="text-xs text-sport-text-muted">{{ $booking->created_at->format('M j, Y') }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-sport-text font-medium">{{ $booking->field->name }}</div>
                                        <div class="text-xs text-sport-text-muted">{{ $booking->booking_date->format('d/m/Y') }}</div>
                                        @foreach($booking->fieldSchedules as $schedule)
                                        <div class="text-xs text-sport-primary mt-1">
                                            {{ ucfirst($schedule->day_of_week) }}: {{ $schedule->start_time }} - {{ $schedule->end_time }}
                                        </div>
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="space-y-1">
                                            <div class="text-sm font-semibold text-sport-text">
                                                Total: Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                                            </div>
                                            <div class="text-xs text-sport-text-muted">
                                                DP: Rp {{ number_format($booking->dp_amount, 0, ',', '.') }}
                                            </div>
                                            <div class="text-xs text-sport-text-muted">
                                                Remaining: Rp {{ number_format($booking->remaining_amount, 0, ',', '.') }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @switch($booking->status)
                                        @case('pending')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-500/20 text-yellow-300 border border-yellow-500/30">
                                            <i class="fas fa-clock mr-2"></i>
                                            Pending
                                        </span>
                                        @break
                                        @case('dp_paid')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-sport-primary/20 text-sport-primary border border-sport-primary/30">
                                            <i class="fas fa-credit-card mr-2"></i>
                                            DP Dibayar
                                        </span>
                                        @break
                                        @case('fully_paid')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-sport-accent/20 text-sport-accent border border-sport-accent/30">
                                            <i class="fas fa-check-circle mr-2"></i>
                                            Lunas
                                        </span>
                                        @break
                                        @case('cancelled')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-500/20 text-red-400 border border-red-500/30">
                                            <i class="fas fa-times-circle mr-2"></i>
                                            Dibatalkan
                                        </span>
                                        @break
                                        @endswitch
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        @if($booking->status === 'dp_paid')
                                        <form action="{{ route('booking.pay-remaining', $booking) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="btn-sport text-sm px-4 py-2 bg-gradient-to-r from-sport-accent to-sport-primary hover:from-sport-accent hover:to-sport-primary-dark group rounded-2xl">
                                                <i class="fas fa-credit-card mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                                                Bayar Pelunasan
                                            </button>
                                        </form>
                                        @else
                                        <button class="p-2 text-sport-text-muted hover:text-sport-primary transition-colors duration-300" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-16">
                        <div class="w-24 h-24 bg-sport-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-calendar-times text-4xl text-sport-primary"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-sport-text mb-2">No Booking History</h3>
                        <p class="text-sport-text-muted mb-6">You haven't made any bookings yet. Start by booking your first session!</p>
                        <a href="{{ route('booking.index') }}" class="btn-sport inline-flex items-center space-x-2">
                            <i class="fas fa-plus-circle"></i>
                            <span>Make Your First Booking</span>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Dashboard Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animate counter numbers
            const totalBookingsElement = document.getElementById('total-bookings');
            if (totalBookingsElement) {
                const finalValue = parseInt(totalBookingsElement.textContent);
                animateCounter(totalBookingsElement, 0, finalValue, 1500);
            }

            function animateCounter(element, start, end, duration) {
                const startTime = performance.now();
                const animate = (currentTime) => {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const current = Math.floor(start + (end - start) * progress);

                    element.textContent = current.toLocaleString();

                    if (progress < 1) {
                        requestAnimationFrame(animate);
                    }
                };
                requestAnimationFrame(animate);
            }
        });
    </script>
</x-app-layout>