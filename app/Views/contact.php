<main id="main" class="main">
    <section id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title mb-4 text-center">Get in Touch</h2>
                            <form id="contactForm" novalidate>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                    <div class="invalid-feedback">Please enter a skill name.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Your Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <div class="invalid-feedback">Please enter a skill name.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject" required>
                                    <div class="invalid-feedback">Please enter a skill name.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="6" required></textarea>
                                    <div class="invalid-feedback">Please enter a skill name.</div>
                                </div>
                                <div id="alertContainer"></div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary px-4" id="submitBtn">
                                        <span class="button-text"><i class="bi bi-plus-circle me-1"></i> Send Message</span>
                                        <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title mb-4 text-center">Contact Info</h3>
                            <p><strong>Email:</strong> contact@yourapp.com</p>
                            <p><strong>Phone:</strong> +91 123 456 7890</p>
                            <p><strong>Address:</strong> 123 Skill Street, Knowledge City, India</p>
                            <hr>
                            <h5 class="text-center">Follow Us</h5>
                            <div class="d-flex justify-content-center gap-3 mt-2">
                                <a href="#" class="text-decoration-none text-primary fs-4"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="text-decoration-none text-info fs-4"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="text-decoration-none text-danger fs-4"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    $(document).ready(function () {
        $("#contactForm").on("submit", function (e) {
            e.preventDefault();

            var formdata = new FormData(this);

            const form = this;
            form.classList.add('was-validated');

            if (!form.checkValidity()) return;


            const $btn = $("#submitBtn");
            const $spinner = $btn.find(".spinner-border");
            const $text = $btn.find(".button-text");
            const $alert = $("#alertContainer");

            // Disable button & show loader
            $btn.prop("disabled", true);
            $spinner.removeClass("d-none");
            $text.text("Adding...");

            $.ajax({
                url: "<?= base_url('/insertcontactmessage'); ?>",
                method: "POST",
                enctype: "multipart/form-data",
                data: formdata,
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function (res) {
                    if (res.status) {
                        $alert.html(`
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i> ${res.message || 'Skill added successfully!'}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);
                        $("#contactForm")[0].reset();
                        form.classList.remove('was-validated');
                    } else {
                        $alert.html(`
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i> ${res.message || 'Something went wrong!'}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);
                    }
                },
                error: function () {
                    $alert.html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i> Server error! Please try again later.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                },
                complete: function () {
                    $btn.prop("disabled", false);
                    $spinner.addClass("d-none");
                    $text.html('<i class="bi bi-plus-circle me-1"></i> Add Skill');
                }
            });
        });
    });
</script>