<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - Logis Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="noindex, nofollow">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/aos.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/main.css" rel="stylesheet">
</head>
<body>

<section id="get-a-quote" class="get-a-quote section p-0">
    <div class="full-container">
        <div class="row g-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

          <div class="d-none d-sm-block col-lg-8 quote-bg" style="background-image: url(assets/img/quote-bg.jpg);"></div>

          <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <form action="forms/get-a-quote.php" method="post" class="php-email-form">
              <h3>Get a quote</h3>
              <p>Vel nobis odio laboriosam et hic voluptatem. Inventore vitae totam. Rerum repellendus enim linead sero park flows.</p>

              <div class="row gy-4">


                <div class="col-lg-12">
                  <h4>Your Personal Details</h4>
                </div>

                <div class="col-12">
                  <input type="text" name="name" class="form-control" placeholder="Name" required="">
                </div>

                <div class="col-12 ">
                  <input type="email" class="form-control" name="email" placeholder="Email" required="">
                </div>

                <div class="col-12">
                  <input type="text" class="form-control" name="phone" placeholder="Phone" required="">
                </div>

                <div class="col-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your quote request has been sent successfully. Thank you!</div>

                  <button type="submit">Get a quote</button>
                </div>

              </div>
            </form>
          </div><!-- End Quote Form -->

        </div>

      </div>

    </section>




    <!-- Vendor JS Files -->
    <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/validate.js"></script>
    <script src="<?= base_url(); ?>assets/js/aos.js"></script>
    <script src="<?= base_url(); ?>assets/js/purecounter_vanilla.js"></script>
    <script src="<?= base_url(); ?>assets/js/glightbox.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
</body>
</html>