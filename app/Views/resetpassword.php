<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password</title>
    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="manifest" href="assets/img/site.webmanifest">
    <meta name="theme-color" content="#ffffff">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #007bff;
            --primary-hover: #0056b3;
            --background: #f8f9fa;
            --surface: #ffffff;
            --text-primary: #212529;
            --text-secondary: #6c757d;
            --border-color: #dee2e6;
            --radius: 0.375rem;
        }

        body {
            background-color: var(--background);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        .reset-wrapper {
            background: var(--surface);
            padding: 2rem;
            border-radius: var(--radius);
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
            max-width: 420px;
            width: 100%;
        }

        .reset-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .reset-subtitle {
            color: var(--text-secondary);
            text-align: center;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 500;
            color: var(--text-primary);
            font-size: 0.875rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            font-weight: 500;
            padding: 0.75rem;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }

        .alert {
            font-size: 0.9rem;
            padding: 0.5rem 0.75rem;
            margin-bottom: 1rem;
        }

        .password-toggle {
            position: relative;
        }

        .password-toggle i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
        }

        .fade-out {
            animation: fadeOut 0.8s ease forwards;
        }

        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; height: 0; padding: 0; margin: 0; }
        }
    </style>
</head>
<body>
    <div class="reset-wrapper">
        <h2 class="reset-title">Reset Password</h2>
        <p class="reset-subtitle">Enter your new password below to reset your account.</p>

        <div id="alertMessage"></div>

        <form id="resetForm" novalidate>
            <input type="hidden" id="token" value="<?= $token ?? '' ?>">

 

            <div class="mb-3 position-relative">
                <label for="password" class="form-label">New Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" required>
                    <span class="input-group-text" id="togglePassword" style="cursor:pointer;">
                        <i class="bi bi-eye"></i>
                    </span>
                </div>
                <div class="invalid-feedback" id="passwordError"></div>
            </div>

            <div class="mb-3 position-relative">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm new password" required>
                    <span class="input-group-text" id="toggleConfirmPassword" style="cursor:pointer;">
                        <i class="bi bi-eye"></i>
                    </span>
                </div>
                <div class="invalid-feedback" id="confirmPasswordError"></div>
            </div>

            <button type="submit" id="resetButton" class="btn btn-primary w-100">
                <span class="button-text">Reset Password</span>
                <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
            </button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $("#togglePassword").on("click", function () {
            const input = $(this).siblings("input");
            const icon = $(this).find("i");
            const isPassword = input.attr("type") === "password";
            input.attr("type", isPassword ? "text" : "password");
            icon.toggleClass("bi-eye bi-eye-slash");
        });

        $("#toggleConfirmPassword").on("click", function () {
            const input = $(this).siblings("input");
            const icon = $(this).find("i");
            const isPassword = input.attr("type") === "password";
            input.attr("type", isPassword ? "text" : "password");
            icon.toggleClass("bi-eye bi-eye-slash");
        });

        // Form submission
        $("#resetForm").on("submit", function(e) {
        e.preventDefault();
            $("#passwordError, #confirmPasswordError").text("");
            $("#password, #confirm_password").removeClass("is-invalid");

            const password = $("#password").val().trim();
            const confirm_password = $("#confirm_password").val().trim();
            const token = $("#token").val();
            let isValid = true;

            if (password === "") {
                $("#passwordError").text("Password is required.");
                $("#password").addClass("is-invalid");
                isValid = false;
            } else if (password.length < 6) {
                $("#passwordError").text("Password must be at least 6 characters.");
                $("#password").addClass("is-invalid");
                isValid = false;
            }

            if (confirm_password !== password) {
                $("#confirmPasswordError").text("Passwords do not match.");
                $("#confirm_password").addClass("is-invalid");
                isValid = false;
            }

            if (!isValid) return;

            const $btn = $("#resetButton");
            $btn.prop("disabled", true);
            $btn.find(".button-text").text("Resetting...");
            $btn.find(".spinner-border").removeClass("d-none");

            $.ajax({
                url: "<?= base_url('resetpassword'); ?>",
                type: "POST",
                data: { token: token, password: password },
                dataType: "json",
                success: function(res) {
                    const $alert = $("#alertMessage");
                    const type = res.status ? "success" : "danger";
                    const msg = res.message || "Something went wrong.";

                    $alert.html(`
                        <div class="alert alert-${type} fade show" role="alert">
                        ${msg}
                        </div>
                    `);

                    if (res.status) {
                        setTimeout(() => {
                            $(".alert").addClass("fade-out");
                            setTimeout(() => {
                                window.location.href = "<?= base_url('login'); ?>";
                            }, 1000);
                        }, 3000);
                    } else {
                        setTimeout(() => $(".alert").addClass("fade-out"), 3000);
                    }
                },
                error: function(xhr) {
                    alert("Server error. Please try again.");
                },
                complete: function() {
                    $btn.prop("disabled", false);
                    $btn.find(".button-text").text("Reset Password");
                    $btn.find(".spinner-border").addClass("d-none");
                }
            });
        });
    </script>
</body>
</html>
