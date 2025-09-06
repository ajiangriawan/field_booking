<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6 text-sm text-sport-accent font-medium animate-fade-in-up" :status="session('status')" />

    <!-- Register Form Container -->
    <div class="text-center mb-6 animate-bounce-in">
        <div class="w-20 h-20 bg-gradient-to-br from-sport-accent to-sport-secondary rounded-2xl flex items-center justify-center mx-auto mb-4 animate-glow">
            <i class="fas fa-user-plus text-3xl text-white"></i>
        </div>
        <h2 class="text-3xl font-sport font-bold bg-gradient-to-r from-sport-accent via-sport-primary to-sport-secondary bg-clip-text text-transparent mb-2">
            Join AsitCom Sport
        </h2>
        <p class="text-sport-text-muted text-sm">Create your account to start booking sports facilities</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5 animate-fade-in-up" style="animation-delay: 0.3s;">
        @csrf

        <!-- Name -->
        <div class="group">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-user text-sport-primary group-focus-within:text-sport-accent transition-colors duration-300"></i>
                </div>
                <x-text-input 
                    id="name" 
                    class="sport-input w-full pl-12 pr-4 py-4 bg-white/10 border-2 border-sport-primary/30 rounded-xl text-sport-text placeholder-sport-text-muted/70 focus:border-sport-primary focus:bg-white/20 transition-all duration-300" 
                    type="text" 
                    name="name" 
                    :value="old('name')" 
                    required 
                    autofocus 
                    autocomplete="name" 
                    placeholder="Enter your full name"
                    aria-label="Full name" 
                />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-400 animate-slide-in-right" />
        </div>

        <!-- Email Address -->
        <div class="group">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-sport-primary group-focus-within:text-sport-accent transition-colors duration-300"></i>
                </div>
                <x-text-input 
                    id="email" 
                    class="sport-input w-full pl-12 pr-4 py-4 bg-white/10 border-2 border-sport-primary/30 rounded-xl text-sport-text placeholder-sport-text-muted/70 focus:border-sport-primary focus:bg-white/20 transition-all duration-300" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autocomplete="username" 
                    placeholder="Enter your email address"
                    aria-label="Email address" 
                />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-400 animate-slide-in-right" />
        </div>

        <!-- Phone Number -->
        <div class="group">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-phone text-sport-primary group-focus-within:text-sport-accent transition-colors duration-300"></i>
                </div>
                <x-text-input 
                    id="phone" 
                    class="sport-input w-full pl-12 pr-4 py-4 bg-white/10 border-2 border-sport-primary/30 rounded-xl text-sport-text placeholder-sport-text-muted/70 focus:border-sport-primary focus:bg-white/20 transition-all duration-300" 
                    type="text" 
                    name="phone" 
                    :value="old('phone')" 
                    required 
                    autocomplete="phone" 
                    placeholder="Enter your phone number"
                    aria-label="Phone number" 
                />
            </div>
            <x-input-error :messages="$errors->get('phone')" class="mt-2 text-sm text-red-400 animate-slide-in-right" />
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
                    autocomplete="new-password" 
                    placeholder="Create a strong password"
                    aria-label="Password" 
                />
                <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                    <button type="button" class="text-sport-text-muted hover:text-sport-primary transition-colors duration-300" onclick="togglePassword('password')">
                        <i class="fas fa-eye" id="password-eye"></i>
                    </button>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-400 animate-slide-in-right" />
            <!-- Password Strength Indicator -->
            <div class="mt-2 space-y-1">
                <div class="flex space-x-1">
                    <div class="h-1 flex-1 bg-sport-primary/20 rounded-full overflow-hidden">
                        <div class="password-strength-bar h-full bg-sport-primary transition-all duration-300" style="width: 0%"></div>
                    </div>
                </div>
                <p class="text-xs text-sport-text-muted password-strength-text">Use 8+ characters with letters, numbers & symbols</p>
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="group">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-shield-alt text-sport-primary group-focus-within:text-sport-accent transition-colors duration-300"></i>
                </div>
                <x-text-input 
                    id="password_confirmation" 
                    class="sport-input w-full pl-12 pr-12 py-4 bg-white/10 border-2 border-sport-primary/30 rounded-xl text-sport-text placeholder-sport-text-muted/70 focus:border-sport-primary focus:bg-white/20 transition-all duration-300"
                    type="password"
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password" 
                    placeholder="Confirm your password"
                    aria-label="Confirm password" 
                />
                <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                    <button type="button" class="text-sport-text-muted hover:text-sport-primary transition-colors duration-300" onclick="togglePassword('password_confirmation')">
                        <i class="fas fa-eye" id="password_confirmation-eye"></i>
                    </button>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-400 animate-slide-in-right" />
        </div>

        <!-- Terms and Conditions -->
        <div class="animate-fade-in-up" style="animation-delay: 0.4s;">
            <label for="terms" class="flex items-start text-sm text-sport-text cursor-pointer group">
                <input 
                    id="terms" 
                    type="checkbox" 
                    class="w-4 h-4 mt-1 mr-3 rounded border-2 border-sport-primary/50 text-sport-primary bg-transparent focus:ring-sport-primary/30 focus:ring-2 transition-all duration-300" 
                    name="terms" 
                    required
                >
                <span class="group-hover:text-sport-primary transition-colors duration-300">
                    I agree to the 
                    <a href="#" class="text-sport-primary hover:text-sport-accent underline font-medium">Terms of Service</a> 
                    and 
                    <a href="#" class="text-sport-primary hover:text-sport-accent underline font-medium">Privacy Policy</a>
                </span>
            </label>
        </div>

        <!-- Login Link -->
        <div class="text-center animate-fade-in-up" style="animation-delay: 0.5s;">
            <span class="text-sport-text-muted">Already have an account? </span>
            <a href="{{ route('login') }}" class="text-sport-primary hover:text-sport-accent underline font-semibold transition-colors duration-300">
                {{ __('Sign In') }}
            </a>
        </div>

        <!-- Register Button -->
        <div class="pt-2 animate-fade-in-up" style="animation-delay: 0.6s;">
            <x-primary-button class="btn-sport w-full py-4 text-lg font-semibold rounded-xl bg-gradient-to-r from-sport-accent to-sport-primary hover:from-sport-accent hover:to-sport-primary-dark border-none shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 group">
                <i class="fas fa-user-plus mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                {{ __('Create Account') }}
            </x-primary-button>
        </div>

        <!-- Benefits Section -->
        <div class="pt-6 space-y-3 animate-fade-in-up" style="animation-delay: 0.7s;">
            <h4 class="text-sm font-semibold text-sport-text text-center mb-4">Why Join AsitCom Sport?</h4>
            <div class="grid grid-cols-2 gap-3 text-xs">
                <div class="flex items-center text-sport-text-muted">
                    <i class="fas fa-check-circle text-sport-accent mr-2"></i>
                    Easy booking system
                </div>
                <div class="flex items-center text-sport-text-muted">
                    <i class="fas fa-check-circle text-sport-accent mr-2"></i>
                    Real-time availability
                </div>
                <div class="flex items-center text-sport-text-muted">
                    <i class="fas fa-check-circle text-sport-accent mr-2"></i>
                    Secure payments
                </div>
                <div class="flex items-center text-sport-text-muted">
                    <i class="fas fa-check-circle text-sport-accent mr-2"></i>
                    24/7 support
                </div>
            </div>
        </div>
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

        // Enhanced form validation and UX
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const passwordField = document.getElementById('password');
            const confirmPasswordField = document.getElementById('password_confirmation');
            const strengthBar = document.querySelector('.password-strength-bar');
            const strengthText = document.querySelector('.password-strength-text');
            
            // Password strength checker
            passwordField.addEventListener('input', function() {
                const password = this.value;
                const strength = calculatePasswordStrength(password);
                updatePasswordStrength(strength, password.length);
            });
            
            // Password confirmation checker
            confirmPasswordField.addEventListener('input', function() {
                const password = passwordField.value;
                const confirmPassword = this.value;
                
                if (confirmPassword && password !== confirmPassword) {
                    this.classList.add('border-red-400');
                    this.classList.remove('border-sport-accent');
                } else if (confirmPassword) {
                    this.classList.add('border-sport-accent');
                    this.classList.remove('border-red-400');
                }
            });
            
            function calculatePasswordStrength(password) {
                let score = 0;
                if (password.length >= 8) score++;
                if (/[a-z]/.test(password)) score++;
                if (/[A-Z]/.test(password)) score++;
                if (/[0-9]/.test(password)) score++;
                if (/[^A-Za-z0-9]/.test(password)) score++;
                return score;
            }
            
            function updatePasswordStrength(strength, length) {
                const percentage = Math.min((strength / 5) * 100, 100);
                strengthBar.style.width = percentage + '%';
                
                if (length === 0) {
                    strengthBar.style.width = '0%';
                    strengthText.textContent = 'Use 8+ characters with letters, numbers & symbols';
                    strengthBar.className = 'password-strength-bar h-full bg-sport-primary transition-all duration-300';
                } else if (strength < 2) {
                    strengthText.textContent = 'Weak password';
                    strengthBar.className = 'password-strength-bar h-full bg-red-500 transition-all duration-300';
                } else if (strength < 4) {
                    strengthText.textContent = 'Medium strength password';
                    strengthBar.className = 'password-strength-bar h-full bg-yellow-500 transition-all duration-300';
                } else {
                    strengthText.textContent = 'Strong password';
                    strengthBar.className = 'password-strength-bar h-full bg-sport-accent transition-all duration-300';
                }
            }
            
            // Real-time validation for all inputs
            const inputs = form.querySelectorAll('input[required]');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.validity.valid && this.value.trim() !== '') {
                        this.classList.add('border-sport-accent');
                        this.classList.remove('border-red-400');
                    } else if (this.value.trim() !== '') {
                        this.classList.add('border-red-400');
                        this.classList.remove('border-sport-accent');
                    }
                });
            });
        });
    </script>
</x-guest-layout>