<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

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
        body {
            font-family: 'Segoe UI', Roboto, sans-serif;
            background-color: #f8f9fa;
        }
        .forgot-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        .forgot-box {
            background: #fff;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
            padding: 2rem;
            max-width: 400px;
            width: 100%;
        }
        .forgot-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: #212529;
            margin-bottom: 0.5rem;
        }
        .forgot-subtitle {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 0.375rem;
            padding: 0.75rem;
            font-weight: 500;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .back-link {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .alert {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
            transition: opacity 0.5s ease;
        }
        .alert.fade-out {
            opacity: 0;
            transition: opacity 0.8s ease;
        }
    </style>
</head>
<body>
    <div class="forgot-container">
        <div class="forgot-box">
            <div class="text-center mb-3">
                <h2 class="forgot-title">Forgot Password</h2>
                <p class="forgot-subtitle">Enter your email address and we’ll send you a link to reset your password.</p>
            </div>

            <form id="forgotForm" novalidate>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                    <div class="invalid-feedback" id="emailError"></div>
                </div>
                <div id="postAlert" class="mt-2"></div>
                <button type="submit" class="btn btn-primary w-100 mb-3" id="forgotButton">
                    <span class="button-text">Send Reset Link</span>
                    <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
                </button>
                <div class="text-center">
                    <a href="<?= base_url('login'); ?>" class="back-link"><i class="bi bi-arrow-left"></i> Back to Login</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#forgotForm").on("submit", function (e) {
                e.preventDefault();

                $("#emailError").text("");
                $("#email").removeClass("is-invalid");
                const email = $("#email").val().trim();
                let isValid = true;

                // Email validation
                if (email === "") {
                    $("#emailError").text("Email is required.");
                    $("#email").addClass("is-invalid");
                    isValid = false;
                } else if (!/^[\w\.-]+@([\w-]+\.)+[\w-]{2,4}$/.test(email)) {
                    $("#emailError").text("Please enter a valid email address.");
                    $("#email").addClass("is-invalid");
                    isValid = false;
                }

                if (!isValid) return;

                const $btn = $("#forgotButton");
                const $alert = $("#postAlert");
                $btn.prop("disabled", true);
                $btn.find(".button-text").text("Sending...");
                $btn.find(".spinner-border").removeClass("d-none");

                $.ajax({
                    url: "<?= base_url(''); ?>forgotpassword",
                    type: "POST",
                    data: { email: email },
                    dataType: "json",
                    success: function (response) {
                        let alertClass = response.status ? "success" : "danger";
                        $alert.html(`
                            <div class="alert alert-${alertClass} alert-dismissible fade show small" role="alert">
                                <i class="bi ${response.status ? 'bi-check-circle' : 'bi-exclamation-triangle'} me-1"></i> 
                                ${response.message}
                            </div>
                        `);

                        // Smooth fade-out after 3s
                        setTimeout(() => {
                            $(".alert").addClass("fade-out");
                            setTimeout(() => $(".alert").slideUp(300, () => $(this).remove()), 500);
                        }, 3000);
                    },
                    error: function () {
                        alert("Something went wrong. Please try again later.");
                    },
                    complete: function () {
                        $btn.prop("disabled", false);
                        $btn.find(".button-text").text("Send Reset Link");
                        $btn.find(".spinner-border").addClass("d-none");
                    }
                });
            });
        });
    </script>

</body>
</html>
