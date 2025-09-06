// AsitCom Sport - Modern Interactive Features
document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize all features
    initializeAnimations();
    initializeFormEffects();
    initializeNavigation();
    initializeParticles();
    initializeScrollEffects();
    
    // Animation on scroll observer
    function initializeAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                }
            });
        }, observerOptions);
        
        // Observe all elements with animation classes
        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });
    }
    
    // Enhanced form effects
    function initializeFormEffects() {
        // Floating labels effect
        const inputs = document.querySelectorAll('.sport-input');
        
        inputs.forEach(input => {
            // Add focus/blur effects
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
                createRipple(this, event);
            });
            
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.classList.remove('focused');
                }
            });
            
            // Password strength indicator
            if (input.type === 'password') {
                input.addEventListener('input', function() {
                    checkPasswordStrength(this);
                });
            }
            
            // Real-time validation
            input.addEventListener('input', function() {
                validateInput(this);
            });
        });
        
        // Form submission with loading state
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    showLoadingButton(submitBtn);
                }
            });
        });
    }
    
    // Navigation effects
    function initializeNavigation() {
        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Mobile menu toggle animation
        const mobileMenuBtn = document.querySelector('[x-data] button');
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', function() {
                this.classList.add('animate-pulse');
                setTimeout(() => {
                    this.classList.remove('animate-pulse');
                }, 300);
            });
        }
    }
    
    // Particle background effect
    function initializeParticles() {
        if (!document.querySelector('.particles-container')) return;
        
        const particlesContainer = document.createElement('div');
        particlesContainer.className = 'particles-container fixed inset-0 pointer-events-none z-0';
        document.body.appendChild(particlesContainer);
        
        // Create floating particles
        for (let i = 0; i < 20; i++) {
            createParticle(particlesContainer);
        }
    }
    
    // Scroll effects
    function initializeScrollEffects() {
        let lastScrollTop = 0;
        const navbar = document.querySelector('nav');
        
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            // Navbar hide/show on scroll
            if (navbar) {
                if (scrollTop > lastScrollTop && scrollTop > 100) {
                    navbar.style.transform = 'translateY(-100%)';
                } else {
                    navbar.style.transform = 'translateY(0)';
                }
            }
            
            lastScrollTop = scrollTop;
        });
    }
    
    // Helper functions
    function createRipple(element, event) {
        const ripple = document.createElement('span');
        const rect = element.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = event.clientX - rect.left - size / 2;
        const y = event.clientY - rect.top - size / 2;
        
        ripple.style.cssText = `
            position: absolute;
            width: ${size}px;
            height: ${size}px;
            left: ${x}px;
            top: ${y}px;
            background: rgba(0, 212, 255, 0.3);
            border-radius: 50%;
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
        `;
        
        element.style.position = 'relative';
        element.appendChild(ripple);
        
        setTimeout(() => {
            ripple.remove();
        }, 600);
    }
    
    function checkPasswordStrength(input) {
        const password = input.value;
        const strength = calculatePasswordStrength(password);
        
        let strengthIndicator = input.parentElement.querySelector('.password-strength');
        if (!strengthIndicator) {
            strengthIndicator = document.createElement('div');
            strengthIndicator.className = 'password-strength mt-2 h-1 rounded-full overflow-hidden';
            input.parentElement.appendChild(strengthIndicator);
        }
        
        const colors = ['bg-red-500', 'bg-yellow-500', 'bg-green-500'];
        strengthIndicator.className = `password-strength mt-2 h-1 rounded-full ${colors[strength]} transition-all duration-300`;
        strengthIndicator.style.width = `${(strength + 1) * 33.33}%`;
    }
    
    function calculatePasswordStrength(password) {
        let strength = 0;
        if (password.length >= 8) strength++;
        if (/[A-Z]/.test(password) && /[a-z]/.test(password)) strength++;
        if (/\d/.test(password) && /[^A-Za-z0-9]/.test(password)) strength++;
        return Math.min(strength, 2);
    }
    
    function validateInput(input) {
        const value = input.value.trim();
        let isValid = true;
        
        // Email validation
        if (input.type === 'email') {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            isValid = emailRegex.test(value);
        }
        
        // Phone validation
        if (input.name === 'phone') {
            const phoneRegex = /^[\+]?[0-9]{10,15}$/;
            isValid = phoneRegex.test(value.replace(/\s/g, ''));
        }
        
        // Required validation
        if (input.required && !value) {
            isValid = false;
        }
        
        // Visual feedback
        if (isValid) {
            input.classList.remove('border-red-500');
            input.classList.add('border-green-500');
        } else {
            input.classList.remove('border-green-500');
            input.classList.add('border-red-500');
        }
    }
    
    function showLoadingButton(button) {
        const originalText = button.textContent;
        const spinner = '<div class="sport-spinner inline-block mr-2"></div>';
        
        button.innerHTML = spinner + 'Processing...';
        button.disabled = true;
        
        // Reset after 3 seconds (fallback)
        setTimeout(() => {
            button.innerHTML = originalText;
            button.disabled = false;
        }, 3000);
    }
    
    function createParticle(container) {
        const particle = document.createElement('div');
        const size = Math.random() * 4 + 2;
        
        particle.style.cssText = `
            position: absolute;
            width: ${size}px;
            height: ${size}px;
            background: rgba(0, 212, 255, ${Math.random() * 0.5 + 0.1});
            border-radius: 50%;
            left: ${Math.random() * 100}%;
            top: ${Math.random() * 100}%;
            animation: float ${Math.random() * 3 + 2}s infinite linear;
        `;
        
        container.appendChild(particle);
        
        // Remove and recreate particle after animation
        setTimeout(() => {
            particle.remove();
            createParticle(container);
        }, (Math.random() * 3 + 2) * 1000);
    }
    
    // Utility functions for external use
    window.SportUtils = {
        showNotification: function(message, type = 'success') {
            const notification = document.createElement('div');
            const colors = {
                success: 'bg-green-500',
                error: 'bg-red-500',
                info: 'bg-blue-500',
                warning: 'bg-yellow-500'
            };
            
            notification.className = `fixed top-4 right-4 ${colors[type]} text-white px-6 py-4 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300`;
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            // Slide in
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            // Auto remove
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 3000);
        },
        
        createLoader: function(target) {
            const loader = document.createElement('div');
            loader.className = 'flex items-center justify-center p-8';
            loader.innerHTML = '<div class="sport-spinner"></div>';
            
            if (typeof target === 'string') {
                document.querySelector(target).appendChild(loader);
            } else {
                target.appendChild(loader);
            }
            
            return loader;
        },
        
        animateCounter: function(element, start = 0, end, duration = 2000) {
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
    };
});

// CSS for ripple effect and particles
const additionalStyles = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
        }
        33% {
            transform: translateY(-30px) rotate(120deg);
        }
        66% {
            transform: translateY(-15px) rotate(240deg);
        }
    }
    
    nav {
        transition: transform 0.3s ease;
    }
    
    .focused .sport-input {
        border-color: var(--sport-primary);
        box-shadow: 0 0 0 3px rgba(0, 212, 255, 0.1);
    }
`;

// Inject additional styles
const styleSheet = document.createElement('style');
styleSheet.textContent = additionalStyles;
document.head.appendChild(styleSheet);

