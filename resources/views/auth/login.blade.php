<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6 text-sm text-sport-accent font-medium animate-fade-in-up" :status="session('status')" />

    <!-- Login Form Container -->
    <div class="text-center mb-8 animate-bounce-in">
        <div class="w-20 h-20 bg-gradient-to-br from-sport-primary to-sport-secondary rounded-2xl flex items-center justify-center mx-auto mb-4 animate-glow">
            <i class="fas fa-user-circle text-3xl text-white"></i>
        </div>
        <h2 class="text-3xl font-sport font-bold bg-gradient-to-r from-sport-primary via-sport-accent to-sport-secondary bg-clip-text text-transparent mb-2">
            Welcome Back
        </h2>
        <p class="text-sport-text-muted text-sm">Sign in to access your sports facility bookings</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6 animate-fade-in-up" style="animation-delay: 0.3s;">
        @csrf

        <!-- Email Address -->
        <div class="group">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-sport-primary group-focus-within:text-sport-accent transition-colors duration-300"></i>
                </div>
                <x-text-input 
                    id="email" 
                    class="sport-input w-full pl-12 pr-4 py-4 bg-white/10 border-2 border-sport-primary/30 rounded-xl text-sport-text placeholder-sport-text-muted/70 focus:border-sport-primary focus:bg-white/20 transition-all duration-300 animate-on-scroll" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    autocomplete="username" 
                    placeholder="Enter your email address"
                    aria-label="Email address" 
                />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-400 animate-slide-in-right" />
        </div>

        <!-- Password -->
        <div class="group">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-sport-primary group-focus-within:text-sport-accent transition-colors duration-300"></i>
                </div>
                <x-text-input 
                    id="password" 
                    class="sport-input w-full pl-12 pr-12 py-4 bg-white/10 border-2 border-sport-primary/30 rounded-xl text-sport-text placeholder-sport-text-muted/70 focus:border-sport-primary focus:bg-white/20 transition-all duration-300"
                    type="password"
                    name="password"
                    required 
                    autocomplete="current-password" 
                    placeholder="Enter your password"
                    aria-label="Password" 
                />
                <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                    <button type="button" class="text-sport-text-muted hover:text-sport-primary transition-colors duration-300" onclick="togglePassword('password')">
                        <i class="fas fa-eye" id="password-eye"></i>
                    </button>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-400 animate-slide-in-right" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between text-sm animate-fade-in-up" style="animation-delay: 0.4s;">
            <label for="remember_me" class="flex items-center text-sport-text hover:text-sport-primary transition-colors duration-300 cursor-pointer group">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    class="w-4 h-4 rounded border-2 border-sport-primary/50 text-sport-primary bg-transparent focus:ring-sport-primary/30 focus:ring-2 transition-all duration-300" 
                    name="remember" 
                    aria-label="Remember me"
                >
                <span class="ml-2 group-hover:text-sport-primary transition-colors duration-300">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-sport-primary hover:text-sport-accent underline transition-colors duration-300 font-medium">
                {{ __('Forgot Password?') }}
            </a>
            @endif
        </div>

        <!-- Register Link -->
        <div class="text-center animate-fade-in-up" style="animation-delay: 0.5s;">
            <span class="text-sport-text-muted">Don't have an account? </span>
            <a href="{{ route('register') }}" class="text-sport-accent hover:text-sport-primary underline font-semibold transition-colors duration-300">
                {{ __('Register Now') }}
            </a>
        </div>

        <!-- Login Button -->
        <div class="pt-2 animate-fade-in-up" style="animation-delay: 0.6s;">
            <x-primary-button class="btn-sport w-full py-4 text-lg font-semibold rounded-xl bg-gradient-to-r from-sport-primary to-sport-secondary hover:from-sport-primary-dark hover:to-sport-secondary border-none shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 group">
                <i class="fas fa-sign-in-alt mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                {{ __('Sign In') }}
            </x-primary-button>
        </div>

        <!-- Social Login Options (Optional) -->
        <!-- <div class="pt-4 animate-fade-in-up" style="animation-delay: 0.7s;">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-sport-primary/20"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-sport-gray text-sport-text-muted">Or continue with</span>
                </div>
            </div>
            
            <div class="mt-4 grid grid-cols-2 gap-3">
                <button type="button" class="glass-dark border border-sport-primary/20 rounded-xl py-3 px-4 flex items-center justify-center text-sport-text hover:border-sport-primary/50 hover:text-sport-primary transition-all duration-300 group">
                    <i class="fab fa-google mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                    Google
                </button>
                <button type="button" class="glass-dark border border-sport-primary/20 rounded-xl py-3 px-4 flex items-center justify-center text-sport-text hover:border-sport-primary/50 hover:text-sport-primary transition-all duration-300 group">
                    <i class="fab fa-facebook mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                    Facebook
                </button>
            </div>
        </div> -->
    </form>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const eye = document.getElementById(fieldId + '-eye');
            
            if (field.type === 'password') {
                field.type = 'text';
                eye.className = 'fas fa-eye-slash';
            } else {
                field.type = 'password';
                eye.className = 'fas fa-eye';
            }
        }

        // Form validation feedback
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const inputs = form.querySelectorAll('input[required]');
            
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.validity.valid) {
                        this.classList.add('border-sport-accent');
                        this.classList.remove('border-red-400');
                    } else {
                        this.classList.add('border-red-400');
                        this.classList.remove('border-sport-accent');
                    }
                });
            });
        });
    </script>
</x-guest-layout>