<main id="main" class="main">
    <section id="contact-us">
        <div class="container">
            <div class="row">
            
                <!-- Contact Form -->
                <div class="col-lg-8 mb-4">
                    <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title mb-4 text-center">Get in Touch</h2>
                        <form action="[YOUR_FORM_HANDLER_URL]" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="6" required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>

                <!-- Contact Info -->
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