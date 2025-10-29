
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    
    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="manifest" href="assets/img/site.webmanifest">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="<?= base_url(); ?>assets/css/bootstrap-icons.css" rel="stylesheet">
    
    <style>
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



    /* .small-alert {
        padding: 0.4rem 0.75rem;
        font-size: 0.875rem;
        margin-bottom: 0.5rem;
        line-height: 1.2;
        transition: all 0.3s ease;
    } */

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
    }
</style>
</head>
<body>
    <div class="login-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-form-wrapper">
                        <!-- Header -->
                        <div class="text-center mb-3">
                            <h2 class="login-title">Sign In</h2>
                            <p class="login-subtitle">Welcome back! Please enter your details.</p>
                        </div>

                        <a href="<?= base_url('/glogin'); ?>" class="btn btn-google w-100 mb-3" id="googleLoginBtn">
                            <img src="assets/img/google-logo.svg" style="margin-bottom: 2px;"> Continue with Google
                        </a>

                        <div class="divider-container mb-3">
                            <div class="divider">
                                <span class="divider-text">or</span>
                            </div>
                        </div> -->

                        <!-- Login Form -->
                        <form id="loginForm" novalidate>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                                <div class="invalid-feedback" id="emailError"></div>
                            </div>

                            <div class="mb-4 position-relative">
                                <label for="password" class="form-label w-100">Password 
                                    <span class="float-end"><a href="<?= base_url(); ?>forgot" class="forgot-link">Forgot password?</a></span>
                                </label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                                    <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                        <i class="bi bi-eye"></i>
                                    </span>
                                </div>
                                <div class="invalid-feedback" id="passwordError"></div>
                            </div>
                            


                            <div id="postAlert" class="mt-2"></div>

                            <button type="submit" class="btn btn-primary w-100 mb-4" id="loginButton">
                                <span class="button-text">Sign In</span>
                                <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
                            </button>
                        </form>

                        <!-- Sign up link -->
                        <div class="text-center">
                            <p class="signup-text">Don't have an account? <a href="<?= base_url(); ?>register" class="signup-link">Sign up for free</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>


$(document).ready(function () {
    $("#togglePassword").on("click", function () {
        const passwordField = $("#password");
        const icon = $(this).find("i");
        const isPassword = passwordField.attr("type") === "password";
        passwordField.attr("type", isPassword ? "text" : "password");
        icon.toggleClass("bi-eye bi-eye-slash");
    });

    // Handle login form submission
    $("#loginForm").on("submit", function (e) {
        e.preventDefault();

        // Clear previous errors
        $("#emailError, #passwordError").text("");
        $("#email, #password").removeClass("is-invalid");

        // Get field values
        const email = $("#email").val().trim();
        const password = $("#password").val().trim();

        let isValid = true;

        // Client-side validation
        if (email === "") {
            $("#emailError").text("Email is required.");
            $("#email").addClass("is-invalid");
            isValid = false;
        } else if (!/^[\w-.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email)) {
            $("#emailError").text("Please enter a valid email address.");
            $("#email").addClass("is-invalid");
            isValid = false;
        }

        if (password === "") {
            $("#passwordError").text("Password is required.");
            $("#password").addClass("is-invalid");
            isValid = false;
        }

        if (!isValid) return;

        // Disable button & show loader
        const $btn = $("#loginButton");
        const $alert = $("#postAlert");
        $btn.prop("disabled", true);
        $btn.find(".button-text").text("Signing in...");
        $btn.find(".spinner-border").removeClass("d-none");

        // Prepare payload
        const payload = {
            username: email,
            password: password
        };

        // AJAX call
        $.ajax({
            url: "<?= base_url('loginme'); ?>",
            type: "POST",
            data: {username: email, password: password},
            dataType: "json",
            success: function (response) {
                if (response.status === true) {
                    // ✅ Login success
                    //alert("Login successful!");
                    window.location.href = "<?= base_url(''); ?>";
                } else {
                    // ❌ API returned error
                    //alert(response.message || "Invalid credentials");

                    $alert.html(`
                        <div class="alert alert-danger alert-dismissible fade show small-alert" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i> ${response.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `);
                    setTimeout(() => {
                        $(".alert").fadeTo(500, 0).slideUp(400, function() {
                            $(this).alert('close');
                        });
                    }, 3000);
                }
            },
            error: function (xhr) {
                console.error(xhr);
                alert("Something went wrong. Please try again later.");
            },
            complete: function () {
                // Re-enable button & hide loader
                $btn.prop("disabled", false);
                $btn.find(".button-text").text("Sign In");
                $btn.find(".spinner-border").addClass("d-none");
            }
        });
    });
});
</script>

</body>
</html>