<nav x-data="{ open: false }" class="bg-sport-dark/95 backdrop-blur-lg border-b border-sport-primary/20 sticky top-0 z-50 transition-all duration-300"
    :class="{ 'shadow-lg shadow-sport-primary/10': !open, 'shadow-2xl shadow-sport-primary/20': open }">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center animate-pulse-sport">
                    <a href="{{ url('/') }}" class="inline-flex items-center space-x-4 group hover:scale-105 transition-transform duration-300">
                        <div class="w-14 h-14 bg-gradient-to-br from-sport-primary to-sport-secondary rounded-2xl flex items-center justify-center shadow-2xl group-hover:shadow-sport-primary/50 transition-all duration-300 animate-glow">
                            <x-application-logo class="block h-8 w-auto fill-current text-white" />
                        </div>
                        <div class="text-left">
                            <h1 class="text-2xl font-sport font-bold bg-gradient-to-r from-sport-primary to-sport-secondary bg-clip-text text-transparent">
                                AsitCom Sport
                            </h1>
                            <p class="text-sm text-sport-text-muted font-medium">Sports Facility Booking</p>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                        class="group relative px-4 py-2 rounded-lg text-sport-text hover:text-sport-primary transition-all duration-300 font-medium {{ request()->routeIs('dashboard') ? 'bg-sport-primary/20 text-sport-primary' : 'hover:bg-sport-primary/10' }}">
                        <i class="fas fa-tachometer-alt mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                        {{ __('Dashboard') }}
                        @if(request()->routeIs('dashboard'))
                        <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-sport-primary to-sport-accent"></div>
                        @endif
                    </x-nav-link>

                    <x-nav-link :href="route('booking.index')"
                        :active="request()->routeIs('booking.*')"
                        class="group relative px-4 py-2 rounded-lg text-sport-text hover:text-sport-primary transition-all duration-300 font-medium {{ request()->routeIs('booking.*') ? 'bg-sport-primary/20 text-sport-primary' : 'hover:bg-sport-primary/10' }}">
                        <i class="fas fa-calendar-alt mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                        {{ __('Booking') }}
                        @if(request()->routeIs('booking.*'))
                        <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-sport-primary to-sport-accent"></div>
                        @endif
                    </x-nav-link>

                    <!-- Quick Actions -->
                    <!-- <div class="flex items-center space-x-2 ml-4 pl-4 border-l border-sport-primary/20">
                        <button class="p-2 rounded-lg text-sport-text-muted hover:text-sport-primary hover:bg-sport-primary/10 transition-all duration-300 group" title="Notifications">
                            <i class="fas fa-bell group-hover:scale-110 transition-transform duration-300"></i>
                            <span class="absolute -top-1 -right-1 w-2 h-2 bg-sport-accent rounded-full animate-pulse"></span>
                        </button>
                        <button class="p-2 rounded-lg text-sport-text-muted hover:text-sport-primary hover:bg-sport-primary/10 transition-all duration-300 group" title="Messages">
                            <i class="fas fa-envelope group-hover:scale-110 transition-transform duration-300"></i>
                        </button>
                    </div> -->
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                <!-- User Stats Mini Card -->
                <div class="hidden lg:flex items-center space-x-3 bg-sport-gray/50 rounded-lg px-3 py-2 border border-sport-primary/10">
                    <!-- <div class="text-center">
                        <div class="text-xs text-sport-text-muted">Active Bookings</div>
                        <div class="text-sm font-bold text-sport-primary">3</div>
                    </div> -->
                    <div class="w-px h-6 bg-sport-primary/20"></div>
                    <!-- Credit -->
                    <!-- <div class="text-center">
                        <div class="text-xs text-sport-text-muted">Credits</div>
                        <div class="text-sm font-bold text-sport-accent">250</div>
                    </div> -->
                </div>

                <x-dropdown align="right" width="64">
                    <x-slot name="trigger">
                        <button class="group inline-flex items-center px-4 py-2 border border-sport-primary/30 text-sm leading-4 font-medium rounded-xl text-sport-text bg-sport-gray/50 hover:bg-sport-primary/10 hover:border-sport-primary/50 focus:outline-none focus:ring-2 focus:ring-sport-primary/30 transition-all duration-300">
                            <div class="w-8 h-8 bg-gradient-to-br from-sport-primary to-sport-accent rounded-full flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-300">
                                <span class="text-white font-semibold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <div class="text-left">
                                <div class="text-sport-text font-medium">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-sport-text-muted">Premium Member</div>
                            </div>
                            <div class="ml-3">
                                <svg class="fill-current h-4 w-4 text-sport-primary group-hover:rotate-180 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-sport-gray border border-sport-primary/20 rounded-xl shadow-xl shadow-sport-primary/10 overflow-hidden">
                            <!-- User Info Header -->
                            <div class="px-4 py-3 bg-gradient-to-r from-sport-primary/10 to-sport-accent/10 border-b border-sport-primary/20">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-sport-primary to-sport-accent rounded-full flex items-center justify-center">
                                        <span class="text-white font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-sport-text">{{ Auth::user()->name }}</div>
                                        <div class="text-sm text-sport-text-muted">{{ Auth::user()->email }}</div>
                                        <div class="flex items-center mt-1">
                                            <div class="w-2 h-2 bg-sport-accent rounded-full mr-2 animate-pulse"></div>
                                            <span class="text-xs text-sport-accent">Online</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Items -->
                            <div class="py-2">
                                <x-dropdown-link :href="route('profile.edit')"
                                    class="flex items-center px-4 py-3 text-sport-text hover:bg-sport-primary/10 hover:text-sport-primary transition-all duration-300 group">
                                    <i class="fas fa-user-cog mr-3 group-hover:scale-110 transition-transform duration-300"></i>
                                    <div>
                                        <div class="font-medium">{{ __('Profile Settings') }}</div>
                                        <div class="text-xs text-sport-text-muted">Manage your account</div>
                                    </div>
                                </x-dropdown-link>

                                <x-dropdown-link href="#"
                                    class="flex items-center px-4 py-3 text-sport-text hover:bg-sport-primary/10 hover:text-sport-primary transition-all duration-300 group">
                                    <i class="fas fa-chart-line mr-3 group-hover:scale-110 transition-transform duration-300"></i>
                                    <div>
                                        <div class="font-medium">{{ __('My Statistics') }}</div>
                                        <div class="text-xs text-sport-text-muted">View your activity</div>
                                    </div>
                                </x-dropdown-link>

                                <x-dropdown-link href="#"
                                    class="flex items-center px-4 py-3 text-sport-text hover:bg-sport-primary/10 hover:text-sport-primary transition-all duration-300 group">
                                    <i class="fas fa-cog mr-3 group-hover:scale-110 transition-transform duration-300"></i>
                                    <div>
                                        <div class="font-medium">{{ __('Preferences') }}</div>
                                        <div class="text-xs text-sport-text-muted">Customize experience</div>
                                    </div>
                                </x-dropdown-link>

                                <div class="border-t border-sport-primary/20 mt-2 pt-2">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="flex items-center px-4 py-3 text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-all duration-300 group">
                                            <i class="fas fa-sign-out-alt mr-3 group-hover:scale-110 transition-transform duration-300"></i>
                                            <div>
                                                <div class="font-medium">{{ __('Sign Out') }}</div>
                                                <div class="text-xs opacity-70">See you next time!</div>
                                            </div>
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-xl text-sport-text hover:text-sport-primary hover:bg-sport-primary/10 focus:outline-none focus:ring-2 focus:ring-sport-primary/30 transition-all duration-300 group">
                    <svg class="h-6 w-6 group-hover:scale-110 transition-transform duration-300" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                            class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                            class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden bg-sport-gray/95 backdrop-blur-lg border-t border-sport-primary/20"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-4">

        <!-- User Info Mobile -->
        <div class="px-4 py-4 bg-gradient-to-r from-sport-primary/10 to-sport-accent/10 border-b border-sport-primary/20">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-sport-primary to-sport-accent rounded-full flex items-center justify-center">
                    <span class="text-white font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
                <div>
                    <div class="font-semibold text-sport-text">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-sport-text-muted">{{ Auth::user()->email }}</div>
                    <div class="flex items-center space-x-4 mt-2">
                        <div class="flex items-center">
                            <i class="fas fa-calendar-check text-sport-primary text-xs mr-1"></i>
                            <span class="text-xs text-sport-text">3 Active</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-coins text-sport-accent text-xs mr-1"></i>
                            <span class="text-xs text-sport-text">250 Credits</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Links Mobile -->
        <div class="py-2 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')"
                :active="request()->routeIs('dashboard')"
                class="flex items-center px-4 py-3 text-sport-text hover:bg-sport-primary/10 hover:text-sport-primary transition-all duration-300 group {{ request()->routeIs('dashboard') ? 'bg-sport-primary/20 text-sport-primary border-r-4 border-sport-primary' : '' }}">
                <i class="fas fa-tachometer-alt mr-3 group-hover:scale-110 transition-transform duration-300"></i>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('booking.index')"
                :active="request()->routeIs('booking.*')"
                class="flex items-center px-4 py-3 text-sport-text hover:bg-sport-primary/10 hover:text-sport-primary transition-all duration-300 group {{ request()->routeIs('booking.*') ? 'bg-sport-primary/20 text-sport-primary border-r-4 border-sport-primary' : '' }}">
                <i class="fas fa-calendar-alt mr-3 group-hover:scale-110 transition-transform duration-300"></i>
                {{ __('Booking') }}
            </x-responsive-nav-link>
        </div>

        <!-- Mobile Settings Options -->
        <div class="py-2 border-t border-sport-primary/20 space-y-1">
            <x-responsive-nav-link :href="route('profile.edit')"
                class="flex items-center px-4 py-3 text-sport-text hover:bg-sport-primary/10 hover:text-sport-primary transition-all duration-300 group">
                <i class="fas fa-user-cog mr-3 group-hover:scale-110 transition-transform duration-300"></i>
                {{ __('Profile Settings') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="#"
                class="flex items-center px-4 py-3 text-sport-text hover:bg-sport-primary/10 hover:text-sport-primary transition-all duration-300 group">
                <i class="fas fa-chart-line mr-3 group-hover:scale-110 transition-transform duration-300"></i>
                {{ __('My Statistics') }}
            </x-responsive-nav-link>

            <!-- Mobile Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                    class="flex items-center px-4 py-3 text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-all duration-300 group">
                    <i class="fas fa-sign-out-alt mr-3 group-hover:scale-110 transition-transform duration-300"></i>
                    {{ __('Sign Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>