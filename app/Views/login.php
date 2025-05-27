
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->
     <style>/* CSS Custom Properties - Light Theme */
:root {
    --primary-color: #007bff;
    --primary-hover: #0056b3;
    --google-color: #4285f4;
    --google-hover: #3367d6;
    --background: #f8f9fa;
    --surface: #ffffff;
    --text-primary: #212529;
    --text-secondary: #6c757d;
    --border-color: #dee2e6;
    --error-color: #dc3545;
    --shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    --shadow-lg: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    --radius: 0.375rem;
}

/* Reset and Base Styles */
* {
    box-sizing: border-box;
}

body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    background-color: var(--background);
    min-height: 100vh;
    margin: 0;
    color: var(--text-primary);
    line-height: 1.5;
}

/* Login Container */
.login-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    padding: 1rem 0;
}

/* Login Form Wrapper */
.login-form-wrapper {
    max-width: 400px;
    padding: 2rem;
    background: var(--surface);
    border-radius: var(--radius);
    box-shadow: var(--shadow-lg);
    border: 1px solid var(--border-color);
    margin: 0 auto;
}

/* Header */
.login-title {
    font-size: 1.875rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.login-subtitle {
    font-size: 0.875rem;
    color: var(--text-secondary);
    margin-bottom: 0;
}

/* Form Styles */
.form-label {
    font-weight: 500;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
}

.form-control {
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    padding: 0.75rem;
    font-size: 1rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    background: var(--surface);
}

.form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    outline: 0;
}

.form-control.is-invalid {
    border-color: var(--error-color);
}

/* Button Styles */
.btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    border-radius: var(--radius);
    padding: 0.75rem;
    font-weight: 500;
    transition: all 0.15s ease-in-out;
}

.btn-primary:hover {
    background-color: var(--primary-hover);
    border-color: var(--primary-hover);
}

/* Google Button */
.btn-google {
    background-color: var(--surface);
    border: 1px solid var(--border-color);
    color: var(--text-primary);
    border-radius: var(--radius);
    padding: 0.75rem;
    font-weight: 500;
    transition: all 0.15s ease-in-out;
}

.btn-google:hover {
    background-color: var(--google-color);
    border-color: var(--google-color);
    color: white;
}

.btn-google .fab {
    color: var(--google-color);
}

.btn-google:hover .fab {
    color: white;
}

/* Links */
.forgot-link,
.signup-link {
    color: var(--primary-color);
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 500;
}

.forgot-link:hover,
.signup-link:hover {
    color: var(--primary-hover);
    text-decoration: underline;
}

/* Form Check */
.form-check-input:checked {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
}

.form-check-label {
    font-size: 0.875rem;
    color: var(--text-secondary);
}

/* Divider */
.divider-container {
    position: relative;
    text-align: center;
}

.divider {
    position: relative;
}

.divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: var(--border-color);
}

.divider-text {
    background: var(--surface);
    padding: 0 1rem;
    color: var(--text-secondary);
    font-size: 0.875rem;
    position: relative;
    z-index: 1;
}

/* Sign up text */
.signup-text {
    font-size: 0.875rem;
    color: var(--text-secondary);
    margin: 0;
}

/* Invalid feedback */
.invalid-feedback {
    font-size: 0.875rem;
    color: var(--error-color);
}

/* Responsive Design */
@media (max-width: 768px) {
    .login-form-wrapper {
        padding: 1.5rem;
        margin: 1rem;
    }
    
    .login-title {
        font-size: 1.5rem;
    }
}

@media (max-width: 576px) {
    .login-form-wrapper {
        padding: 1rem;
        margin: 0.5rem;
    }
    
    .login-title {
        font-size: 1.25rem;
    }
}</style>
</head>
<body>
    <div class="login-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-form-wrapper">
                        <!-- Header -->
                        <div class="text-center mb-4">
                            <h2 class="login-title">Sign In</h2>
                            <p class="login-subtitle">Welcome back! Please enter your details.</p>
                        </div>

                        <!-- Google Login Button -->
                        <button type="button" class="btn btn-google w-100 mb-4" id="googleLoginBtn">
                            <i class="fab fa-google me-2"></i>
                            Continue with Google
                        </button>

                        <!-- Divider -->
                        <div class="divider-container mb-4">
                            <div class="divider">
                                <span class="divider-text">or</span>
                            </div>
                        </div>

                        <!-- Login Form -->
                        <form id="loginForm" novalidate>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input 
                                    type="email" 
                                    class="form-control" 
                                    id="email" 
                                    name="email"
                                    placeholder="Enter your email"
                                    required
                                >
                                <div class="invalid-feedback" id="emailError"></div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input 
                                    type="password" 
                                    class="form-control" 
                                    id="password" 
                                    name="password"
                                    placeholder="Enter your password"
                                    required
                                >
                                <div class="invalid-feedback" id="passwordError"></div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#" class="forgot-link">Forgot password?</a>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-4" id="loginButton">
                                <span class="button-text">Sign In</span>
                                <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
                            </button>
                        </form>

                        <!-- Sign up link -->
                        <div class="text-center">
                            <p class="signup-text">
                                Don't have an account? 
                                <a href="#" class="signup-link">Sign up for free</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <!-- <script src="js/login.js"></script> -->
     <script>
      /**
 * Simple Login Form Handler
 */
class LoginFormHandler {
    constructor() {
        this.form = document.getElementById('loginForm');
        this.emailInput = document.getElementById('email');
        this.passwordInput = document.getElementById('password');
        this.loginButton = document.getElementById('loginButton');
        this.rememberMeCheckbox = document.getElementById('rememberMe');
        this.googleLoginBtn = document.getElementById('googleLoginBtn');
        
        this.isSubmitting = false;
        
        this.init();
    }
    
    /**
     * Initialize event listeners and setup
     */
    init() {
        this.setupEventListeners();
        this.loadRememberedEmail();
    }
    
    /**
     * Set up all event listeners
     */
    setupEventListeners() {
        // Form submission
        this.form.addEventListener('submit', (e) => this.handleFormSubmit(e));
        
        // Google login button
        this.googleLoginBtn.addEventListener('click', () => this.handleGoogleLogin());
        
        // Real-time validation
        this.emailInput.addEventListener('blur', () => this.validateEmail());
        this.emailInput.addEventListener('input', () => this.clearFieldError('email'));
        this.passwordInput.addEventListener('blur', () => this.validatePassword());
        this.passwordInput.addEventListener('input', () => this.clearFieldError('password'));
    }
    
    /**
     * Handle form submission
     */
    async handleFormSubmit(event) {
        event.preventDefault();
        event.stopPropagation();
        
        if (this.isSubmitting) return;
        
        // Validate form
        const isValid = this.validateForm();
        
        if (!isValid) {
            return;
        }
        
        this.isSubmitting = true;
        this.setLoadingState(true);
        
        try {
            // Simulate API call
            await this.submitLogin();
            
            // Handle successful login
            this.handleLoginSuccess();
            
        } catch (error) {
            // Handle login error
            this.handleLoginError(error);
        } finally {
            this.isSubmitting = false;
            this.setLoadingState(false);
        }
    }
    
    /**
     * Handle Google login
     */
    handleGoogleLogin() {
        // In a real application, you would redirect to Google OAuth
        alert('Google login would redirect to Google OAuth in a real application');
    }
    
    /**
     * Validate the entire form
     */
    validateForm() {
        const emailValid = this.validateEmail();
        const passwordValid = this.validatePassword();
        
        return emailValid && passwordValid;
    }
    
    /**
     * Validate email field
     */
    validateEmail() {
        const email = this.emailInput.value.trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (!email) {
            this.setFieldError('email', 'Email address is required');
            return false;
        }
        
        if (!emailPattern.test(email)) {
            this.setFieldError('email', 'Please enter a valid email address');
            return false;
        }
        
        this.setFieldValid('email');
        return true;
    }
    
    /**
     * Validate password field
     */
    validatePassword() {
        const password = this.passwordInput.value;
        
        if (!password) {
            this.setFieldError('password', 'Password is required');
            return false;
        }
        
        if (password.length < 8) {
            this.setFieldError('password', 'Password must be at least 8 characters long');
            return false;
        }
        
        this.setFieldValid('password');
        return true;
    }
    
    /**
     * Set field error state
     */
    setFieldError(fieldName, message) {
        const field = document.getElementById(fieldName);
        const errorElement = document.getElementById(`${fieldName}Error`);
        
        field.classList.remove('is-valid');
        field.classList.add('is-invalid');
        
        if (errorElement) {
            errorElement.textContent = message;
        }
    }
    
    /**
     * Set field valid state
     */
    setFieldValid(fieldName) {
        const field = document.getElementById(fieldName);
        const errorElement = document.getElementById(`${fieldName}Error`);
        
        field.classList.remove('is-invalid');
        field.classList.add('is-valid');
        
        if (errorElement) {
            errorElement.textContent = '';
        }
    }
    
    /**
     * Clear field error state
     */
    clearFieldError(fieldName) {
        const field = document.getElementById(fieldName);
        const errorElement = document.getElementById(`${fieldName}Error`);
        
        field.classList.remove('is-invalid', 'is-valid');
        
        if (errorElement) {
            errorElement.textContent = '';
        }
    }
    
    /**
     * Toggle password visibility
     */
    togglePasswordVisibility() {
        this.passwordVisible = !this.passwordVisible;
        
        if (this.passwordVisible) {
            this.passwordInput.type = 'text';
            this.togglePasswordIcon.className = 'fas fa-eye-slash';
            this.togglePasswordButton.setAttribute('aria-label', 'Hide password');
        } else {
            this.passwordInput.type = 'password';
            this.togglePasswordIcon.className = 'fas fa-eye';
            this.togglePasswordButton.setAttribute('aria-label', 'Show password');
        }
    }
    
    /**
     * Set loading state for form
     */
    setLoadingState(loading) {
        const buttonText = this.loginButton.querySelector('.button-text');
        const spinner = this.loginButton.querySelector('.spinner-border');
        
        if (loading) {
            this.loginButton.disabled = true;
            buttonText.textContent = 'Signing In...';
            spinner.classList.remove('d-none');
        } else {
            this.loginButton.disabled = false;
            buttonText.textContent = 'Sign In';
            spinner.classList.add('d-none');
        }
    }
    
    /**
     * Simulate login API call
     */
    async submitLogin() {
        const formData = {
            email: this.emailInput.value.trim(),
            password: this.passwordInput.value,
            rememberMe: this.rememberMeCheckbox.checked
        };
        
        // Simulate network delay
        await new Promise(resolve => setTimeout(resolve, 1500));
        
        // Simulate different scenarios based on email
        const email = formData.email.toLowerCase();
        
        if (email === 'error@example.com') {
            throw new Error('Invalid credentials. Please check your email and password.');
        }
        
        if (email === 'locked@example.com') {
            throw new Error('Account temporarily locked due to multiple failed login attempts. Please try again in 15 minutes.');
        }
        
        if (email === 'network@example.com') {
            throw new Error('Network connection error. Please check your internet connection and try again.');
        }
        
        // Simulate successful login for any other email
        return {
            success: true,
            token: 'mock-jwt-token',
            user: {
                email: formData.email,
                name: 'User Name'
            }
        };
    }
    
    /**
     * Handle successful login
     */
    handleLoginSuccess() {
        // Save remember me preference
        if (this.rememberMeCheckbox.checked) {
            localStorage.setItem('rememberedEmail', this.emailInput.value.trim());
        } else {
            localStorage.removeItem('rememberedEmail');
        }
        
        // Show success message
        alert('Login successful! Redirecting...');
        
        // Simulate redirect
        setTimeout(() => {
            console.log('Redirecting to dashboard...');
        }, 1000);
    }
    
    /**
     * Handle login error
     */
    handleLoginError(error) {
        let message = 'Invalid email or password. Please try again.';
        
        if (error.message) {
            message = error.message;
        }
        
        alert(message);
        
        // Focus back to password field for retry
        this.passwordInput.focus();
        this.passwordInput.select();
    }
    
    /**
     * Load remembered email if exists
     */
    loadRememberedEmail() {
        const rememberedEmail = localStorage.getItem('rememberedEmail');
        if (rememberedEmail) {
            this.emailInput.value = rememberedEmail;
            this.rememberMeCheckbox.checked = true;
            this.passwordInput.focus();
        } else {
            this.emailInput.focus();
        }
    }
}

/**
 * Utility functions
 */
const Utils = {
    /**
     * Debounce function to limit API calls
     */
    debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    },
    
    /**
     * Check if device is mobile
     */
    isMobile() {
        return window.innerWidth <= 768;
    },
    
    /**
     * Get browser info
     */
    getBrowserInfo() {
        const userAgent = navigator.userAgent;
        let browserName = 'Unknown';
        
        if (userAgent.indexOf('Chrome') > -1) {
            browserName = 'Chrome';
        } else if (userAgent.indexOf('Firefox') > -1) {
            browserName = 'Firefox';
        } else if (userAgent.indexOf('Safari') > -1) {
            browserName = 'Safari';
        } else if (userAgent.indexOf('Edge') > -1) {
            browserName = 'Edge';
        }
        
        return {
            name: browserName,
            userAgent: userAgent,
            isMobile: this.isMobile()
        };
    }
};

/**
 * Initialize the application when DOM is loaded
 */
document.addEventListener('DOMContentLoaded', () => {
    // Initialize login form handler
    const loginHandler = new LoginFormHandler();
    
    // Log browser info for debugging
    console.log('Browser Info:', Utils.getBrowserInfo());
    
    // Add keyboard navigation enhancements
    document.addEventListener('keydown', (e) => {
        // Alt + L to focus on login form
        if (e.altKey && e.key === 'l') {
            e.preventDefault();
            document.getElementById('email').focus();
        }
        
        // Escape to close modals
        if (e.key === 'Escape') {
            const openModal = document.querySelector('.modal.show');
            if (openModal) {
                const modal = bootstrap.Modal.getInstance(openModal);
                if (modal) {
                    modal.hide();
                }
            }
        }
    });
    
    // Add focus management for better accessibility
    document.querySelectorAll('a, button, input, select, textarea').forEach(element => {
        element.addEventListener('focus', () => {
            element.classList.add('focus-visible');
        });
        
        element.addEventListener('blur', () => {
            element.classList.remove('focus-visible');
        });
    });
    
    // Performance monitoring
    if ('performance' in window) {
        window.addEventListener('load', () => {
            const perfData = performance.getEntriesByType('navigation')[0];
            console.log('Page Load Time:', Math.round(perfData.loadEventEnd - perfData.fetchStart), 'ms');
        });
    }
});

/**
 * Service Worker registration for offline capability
 */
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        // In a real application, you would register a service worker here
        console.log('Service Worker support detected');
    });
}

/**
 * Export for testing purposes
 */
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { LoginFormHandler, Utils };
}
</script>
</body>
</html>
