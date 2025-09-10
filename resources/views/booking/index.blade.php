<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="sport-font text-3xl font-bold bg-gradient-to-r from-sport-primary via-sport-accent to-sport-secondary bg-clip-text text-transparent">
                    {{ __('Pilih Lapangan') }}
                </h2>
                <p class="text-sport-text-muted text-sm mt-1">Discover premium sports facilities tailored for your needs</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="hidden md:flex items-center space-x-2 text-sm text-sport-text">
                    <i class="fas fa-map-marker-alt text-sport-primary"></i>
                    <span>{{ $fields->count() }} facilities available</span>
                </div>
                <div class="flex items-center space-x-2">
                    <button class="p-2 bg-sport-primary/10 hover:bg-sport-primary/20 rounded-lg text-sport-primary transition-colors duration-300" title="Filter">
                        <i class="fas fa-filter"></i>
                    </button>
                    <button class="p-2 bg-sport-primary/10 hover:bg-sport-primary/20 rounded-lg text-sport-primary transition-colors duration-300" title="Map View">
                        <i class="fas fa-map"></i>
                    </button>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-6 lg:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Search and Filter Section -->
            <div class="mb-8 animate-fade-in-up">
                <div class="glass-morphism border border-sport-primary/20 rounded-2xl p-6">
                    <div class="flex flex-col lg:flex-row gap-4">
                        <!-- Search Bar -->
                        <div class="flex-1">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-sport-primary"></i>
                                </div>
                                <input type="text"
                                    placeholder="Search facilities..."
                                    class="sport-input w-full pl-12 pr-4 py-3 bg-sport-gray/30 border-2 border-sport-primary/20 rounded-xl text-sport-text placeholder-sport-text-muted/70 focus:border-sport-primary focus:bg-sport-gray/50">
                            </div>
                        </div>

                        <!-- Filter Options -->
                        <!-- <div class="flex flex-wrap gap-3">
                            <select class="px-4 py-3 bg-sport-gray/30 border-2 border-sport-primary/20 rounded-xl text-sport-text focus:border-sport-primary focus:outline-none">
                                <option>All Sports</option>
                                <option>Football</option>
                                <option>Basketball</option>
                                <option>Tennis</option>
                                <option>Volleyball</option>
                            </select>
                            <select class="px-4 py-3 bg-sport-gray/30 border-2 border-sport-primary/20 rounded-xl text-sport-text focus:border-sport-primary focus:outline-none">
                                <option>Any Price</option>
                                <option>Under 100K</option>
                                <option>100K - 200K</option>
                                <option>200K+</option>
                            </select>
                            <button class="px-6 py-3 bg-sport-primary/10 hover:bg-sport-primary/20 border-2 border-sport-primary/20 rounded-xl text-sport-primary font-medium transition-all duration-300">
                                <i class="fas fa-sliders-h mr-2"></i>
                                More Filters
                            </button>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- Fields Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @foreach($fields as $index => $field)
                <div class="sport-card group bg-sport-gray/50 border border-sport-primary/20 hover:border-sport-primary/40 animate-fade-in-up"
                    style="animation-delay: {{ $index * 0.1 }}s;">
                    <!-- Image Section -->
                    <div class="relative overflow-hidden">
                        @if($field->image)
                        <img src="{{ Storage::url($field->image) }}"
                            alt="{{ $field->name }}"
                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                        <div class="w-full h-48 bg-gradient-to-br from-sport-primary/20 to-sport-accent/20 flex flex-col items-center justify-center group-hover:from-sport-primary/30 group-hover:to-sport-accent/30 transition-all duration-500">
                            <i class="fas fa-dumbbell text-4xl text-sport-primary mb-2"></i>
                            <span class="text-sport-text-muted text-sm">Premium Facility</span>
                        </div>
                        @endif

                        <!-- Overlay Badges -->
                        <!-- <div class="absolute top-4 left-4 right-4 flex justify-between ">
                            <span class="glass-dark border border-sport-accent/30 px-3 py-1 rounded-full text-xs font-medium text-sport-accent">
                                <i class="fas fa-star mr-1"></i>
                                Premium
                            </span>
                            <span class="glass-dark border border-sport-primary/30 px-3 py-1 rounded-full text-xs font-medium text-sport-primary">
                                Available Now
                            </span>
                        </div> -->

                        <!-- Quick Action Overlay -->
                        <!-- <div class="absolute inset-0 bg-sport-dark/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                <button class="btn-sport text-sm px-6 py-2 mb-2 w-full">
                                    <i class="fas fa-eye mr-2"></i>
                                    Quick View
                                </button>
                                <button class="bg-sport-accent/20 hover:bg-sport-accent/30 border border-sport-accent/30 text-sport-accent px-6 py-2 rounded-xl text-sm font-medium transition-all duration-300 w-full">
                                    <i class="fas fa-heart mr-2"></i>
                                    Add to Favorites
                                </button>
                            </div>
                        </div> -->
                    </div>

                    <!-- Content Section -->
                    <div class="p-6">
                        <!-- Header -->
                        <div class="flex items-start justify-between mb-3">
                            <div>
                                <h3 class="text-xl font-bold text-sport-text mb-1 group-hover:text-sport-primary transition-colors duration-300">
                                    {{ $field->name }}
                                </h3>
                                <div class="flex items-center text-sm text-sport-text-muted">
                                    <i class="fas fa-map-marker-alt mr-2 text-sport-primary"></i>
                                    <span>Sriwijaya Sports Center</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm text-sport-text-muted">Starting from</div>
                                <div class="text-lg font-bold text-sport-accent">Rp 150K</div>
                            </div>
                        </div>

                        <!-- Description -->
                        @if($field->description)
                        <p class="text-sport-text-muted text-sm mb-4 line-clamp-2">{{ $field->description }}</p>
                        @else
                        <p class="text-sport-text-muted text-sm mb-4">Premium sports facility with modern equipment and professional-grade surfaces.</p>
                        @endif

                        <!-- Features -->
                        <div class="mb-4">
                            <div class="flex flex-wrap gap-2">
                                <span class="bg-sport-primary/10 text-sport-primary px-2 py-1 rounded-lg text-xs font-medium">
                                    <i class="fas fa-wifi mr-1"></i>WiFi
                                </span>
                                <span class="bg-sport-accent/10 text-sport-accent px-2 py-1 rounded-lg text-xs font-medium">
                                    <i class="fas fa-parking mr-1"></i>Parking
                                </span>
                                <span class="bg-sport-secondary/10 text-sport-secondary px-2 py-1 rounded-lg text-xs font-medium">
                                    <i class="fas fa-shower mr-1"></i>Shower
                                </span>
                                <span class="bg-sport-primary/10 text-sport-primary px-2 py-1 rounded-lg text-xs font-medium">
                                    <i class="fas fa-shield-alt mr-1"></i>Insurance
                                </span>
                            </div>
                        </div>

                        <!-- Stats Row -->
                        <div class="grid grid-cols-3 gap-4 mb-6 p-3 bg-sport-gray/30 rounded-xl">
                            <div class="text-center">
                                <div class="text-lg font-bold text-sport-primary">4.9</div>
                                <div class="text-xs text-sport-text-muted">Rating</div>
                            </div>
                            <div class="text-center">
                                <div class="text-lg font-bold text-sport-accent">250+</div>
                                <div class="text-xs text-sport-text-muted">Reviews</div>
                            </div>
                            <div class="text-center">
                                <div class="text-lg font-bold text-sport-secondary">85%</div>
                                <div class="text-xs text-sport-text-muted">Booked</div>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <a href="{{ route('booking.show', $field) }}"
                            class="btn-sport w-full py-3 bg-gradient-to-br from-sport-primary to-sport-accent rounded-2xl text-center font-semibold group flex items-center justify-center space-x-2">
                            <i class="fas fa-calendar-check group-hover:scale-110 transition-transform duration-300"></i>
                            <span>Pilih Lapangan</span>
                            <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform duration-300"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Empty State -->
            @if($fields->isEmpty())
            <div class="text-center py-16 animate-fade-in-up">
                <div class="w-24 h-24 bg-sport-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-search text-4xl text-sport-primary"></i>
                </div>
                <h3 class="text-2xl font-bold text-sport-text mb-4">No Facilities Found</h3>
                <p class="text-sport-text-muted mb-8 max-w-md mx-auto">
                    We couldn't find any sports facilities matching your criteria.
                    Try adjusting your filters or search terms.
                </p>
                <button class="btn-sport inline-flex items-center space-x-2">
                    <i class="fas fa-redo"></i>
                    <span>Reset Filters</span>
                </button>
            </div>
            @endif

            <!-- Call to Action Section -->
            @if($fields->count() > 0)
            <div class="mt-12 animate-fade-in-up" style="animation-delay: 0.6s;">
                <div class="glass-morphism border border-sport-primary/20 rounded-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-sport-primary/10 via-sport-accent/5 to-sport-secondary/10 p-8">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-br from-sport-primary to-sport-accent rounded-2xl flex items-center justify-center mx-auto mb-4 animate-pulse-sport">
                                <i class="fas fa-trophy text-2xl text-white"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-sport-text mb-2">Can't Find What You're Looking For?</h3>
                            <p class="text-sport-text-muted mb-6 max-w-2xl mx-auto">
                                Our team can help you find the perfect sports facility for your needs.
                                Get personalized recommendations based on your preferences.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <button class="btn-sport inline-flex items-center space-x-2 bg-gradient-to-br from-sport-primary to-sport-accent rounded-2xl px-6 py-3 font-medium">
                                    <i class="fas fa-phone"></i>
                                    <span>Contact Support</span>
                                </button>
                                <button class="bg-sport-primary/10 hover:bg-sport-primary/20 border-2 border-sport-primary/20 text-sport-primary px-6 py-3 rounded-xl font-medium transition-all duration-300 inline-flex items-center space-x-2">
                                    <i class="fas fa-comments"></i>
                                    <span>Live Chat</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Custom Field Selection Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize search functionality
            initializeSearch();

            // Initialize favorite functionality
            initializeFavorites();

            function initializeSearch() {
                const searchInput = document.querySelector('input[placeholder="Search facilities..."]');
                if (searchInput) {
                    let searchTimeout;
                    searchInput.addEventListener('input', function(e) {
                        clearTimeout(searchTimeout);
                        searchTimeout = setTimeout(() => {
                            filterFields(e.target.value);
                        }, 300);
                    });
                }
            }

            function filterFields(searchTerm) {
                const fieldCards = document.querySelectorAll('.sport-card');
                const searchLower = searchTerm.toLowerCase();

                fieldCards.forEach(card => {
                    const title = card.querySelector('h3').textContent.toLowerCase();
                    const description = card.querySelector('p').textContent.toLowerCase();

                    if (title.includes(searchLower) || description.includes(searchLower) || searchTerm === '') {
                        card.style.display = 'block';
                        card.classList.add('animate-fade-in-up');
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            function initializeFavorites() {
                const favoriteButtons = document.querySelectorAll('button:has(i.fa-heart)');
                favoriteButtons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        const heartIcon = this.querySelector('i');

                        if (heartIcon.classList.contains('far')) {
                            heartIcon.classList.remove('far');
                            heartIcon.classList.add('fas', 'text-red-500');
                            this.classList.add('bg-red-500/20', 'border-red-500/30', 'text-red-500');
                            this.classList.remove('bg-sport-accent/20', 'border-sport-accent/30', 'text-sport-accent');

                            // Show notification
                            if (window.showNotification) {
                                window.showNotification('Added to favorites!', 'success');
                            }
                        } else {
                            heartIcon.classList.remove('fas', 'text-red-500');
                            heartIcon.classList.add('far');
                            this.classList.remove('bg-red-500/20', 'border-red-500/30', 'text-red-500');
                            this.classList.add('bg-sport-accent/20', 'border-sport-accent/30', 'text-sport-accent');

                            // Show notification
                            if (window.showNotification) {
                                window.showNotification('Removed from favorites', 'info');
                            }
                        }
                    });
                });
            }
        });
    </script>

    <!-- Custom Styles for Line Clamp -->
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</x-app-layout>