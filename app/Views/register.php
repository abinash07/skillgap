<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="manifest" href="assets/img/site.webmanifest">
    <meta name="theme-color" content="#ffffff">


    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #007bff;
            --primary-hover: #0056b3;
            --border-color: #dee2e6;
            --surface: #ffffff;
            --error-color: #dc3545;
            --background: #f8f9fa;
            --radius: 0.375rem;
            --shadow-lg: 0 0.5rem 1rem rgba(0,0,0,0.15);

 
            --google-color: #4285f4;
            --google-hover: #3367d6;

            --text-primary: #212529;
            --text-secondary: #6c757d;
            --border-color: #dee2e6;

            --shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);

        }
        body {
            background: var(--background);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
        }
        .register-form-wrapper {
            background: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            box-shadow: var(--shadow-lg);
            padding: 2rem;
            width: 100%;
            max-width: 420px;
        }
        .register-title {
            font-size: 1.875rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 0.5rem;
        }
        .register-subtitle {
            font-size: 0.9rem;
            color: #6c757d;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .form-control {
            border-radius: var(--radius);
            padding: 0.75rem;
            font-size: 1rem;
        }
        .btn-primary {
            background: var(--primary-color);
            border: none;
            border-radius: var(--radius);
            padding: 0.75rem;
            font-weight: 500;
        }
        .btn-primary:hover {
            background: var(--primary-hover);
        }
        .form-check-label {
            font-size: 0.875rem;
            color: #6c757d;
        }
        .signup-link {
            color: var(--primary-color);
            font-weight: 500;
            text-decoration: none;
        }
        .signup-link:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }
        .small-alert {
            /* padding: 0.4rem 0.75rem;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
            line-height: 1.2;
            transition: all 0.3s ease; */
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


        @media (max-width: 576px) {
            .register-form-wrapper { padding: 1.25rem; margin: 0.75rem; }
        }
    </style>
</head>
<body>
    <div class="register-form-wrapper">
        <h2 class="register-title">Sign Up</h2>
        <p class="register-subtitle">Create your account to get started</p>
        
        <a href="<?= base_url('/glogin'); ?>" class="btn btn-google w-100 mb-3" id="googleLoginBtn">
            <img src="assets/img/google-logo.svg" style="margin-bottom: 2px;"> Continue with Google
        </a>

        <div class="divider-container mb-3">
            <div class="divider">
                <span class="divider-text">or</span>
            </div>
        </div>

        <form id="registerForm" novalidate>
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your full name" required>
                <div class="invalid-feedback" id="fullnameError"></div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                <div class="invalid-feedback" id="emailError"></div>
            </div>

            <div class="mb-3 position-relative">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                    <span class="input-group-text" id="togglePassword" style="cursor:pointer;">
                        <i class="bi bi-eye"></i>
                    </span>
                </div>
                <div class="invalid-feedback" id="passwordError"></div>
            </div>


            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="terms">
                <label class="form-check-label" for="terms">I agree to the <a href="#" class="signup-link">terms & conditions</a></label>
            </div>

            <div id="postAlert"></div>
            <button type="submit" class="btn btn-primary w-100" id="registerButton">
                <span class="button-text">Sign Up</span>
                <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
            </button>

            <div class="text-center mt-3">
                <p class="mb-0">Already have an account? <a href="<?= base_url('login'); ?>" class="signup-link">Sign in</a></p>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#togglePassword").on("click", function () {
                const input = $(this).siblings("input");
                const icon = $(this).find("i");
                const isPassword = input.attr("type") === "password";
                input.attr("type", isPassword ? "text" : "password");
                icon.toggleClass("bi-eye bi-eye-slash");
            });

            $("#registerForm").on("submit", function (e) {
                e.preventDefault();

                $("#fullnameError, #emailError, #passwordError, #confirmPasswordError").text("");
                $("#fullname, #email, #password, #confirmPassword").removeClass("is-invalid");

                const name = $("#fullname").val().trim();
                const email = $("#email").val().trim();
                const password = $("#password").val().trim();
                const termsChecked = $("#terms").is(":checked");
                let isValid = true;

                if (fullname === "") { 
                    $("#fullnameError").text("Full name is required."); 
                    $("#fullname").addClass("is-invalid"); 
                    isValid = false; 
                }
                if (email === "") { 
                    $("#emailError").text("Email is required."); 
                    $("#email").addClass("is-invalid"); 
                    isValid = false; 
                } else if (!/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/.test(email)) { 
                    $("#emailError").text("Invalid email format."); 
                    $("#email").addClass("is-invalid"); 
                    isValid = false; 
                }
                if (password === "") { 
                    $("#passwordError").text("Password is required."); $("#password").addClass("is-invalid"); 
                    isValid = false; 
                }
                if (!termsChecked) {
                    $("#postAlert").html(`
                        <div class="alert alert-warning alert-dismissible fade show small-alert" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i> Please accept the terms and conditions.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `);
                    setTimeout(() => { $(".alert").fadeTo(500,0).slideUp(400,function(){ $(this).alert('close'); }); }, 3000);
                    return;
                }
                if (!isValid) return;

                const $btn = $("#registerButton");
                const $alert = $("#postAlert");
                $btn.prop("disabled", true);
                $btn.find(".button-text").text("Creating account...");
                $btn.find(".spinner-border").removeClass("d-none");

                $.ajax({
                    url: "<?= base_url('registerme'); ?>",
                    type: "POST",
                    data: { name, email, password },
                    dataType: "json",
                    success: function (response) {
                        if (response.status) {
                            $("#registerForm")[0].reset();
                            window.location.href = "<?= base_url(''); ?>";
                        } else {
                            $alert.html(`
                                <div class="alert alert-danger alert-dismissible fade show small-alert" role="alert">
                                    <i class="bi bi-exclamation-triangle me-1"></i> ${response.message || "Registration failed!"}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            `);
                            setTimeout(() => { $(".alert").fadeTo(500,0).slideUp(400,function(){ $(this).alert('close'); }); }, 3000);
                        }
                    },
                    error: function () {
                        alert("Something went wrong. Please try again later.");
                    },
                    complete: function () {
                        $btn.prop("disabled", false);
                        $btn.find(".button-text").text("Sign Up");
                        $btn.find(".spinner-border").addClass("d-none");
                    }
                });
            });
        });
    </script>
</body>
</html>