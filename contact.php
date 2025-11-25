<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Eco Straws Vietnam</title>
    <meta
      name="description"
      content="Giao diện mẫu tái dựng cấu trúc trang Eco Straws Vietnam bằng Bootstrap 5 và jQuery. Không chứa nội dung/hình ảnh sở hữu trí tuệ, chỉ dùng văn bản & ảnh mẫu."
    />
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="assets/css/styles.css?v=<?= time(); ?>" />
  </head>
  <body>
    <?php include "includes/connect.php" ?>
    <?php include "includes/header.php" ?>
    <main id="main" class="pt-5">
      <!-- HERO -->
      <section
        class="hero position-relative overflow-hidden"
        style="min-height: 85vh"
      >
        <div class="container position-relative py-5">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <h1 class="display-5 fw-bold mb-3">
                <span class="text-gradient outline-boost"
                  >Eco-friendly Straws </span
                ><span class="text-white">Sustainable Products</span>
              </h1>
              <p class="lead text-white">
                Providing sustainable solutions for eco-conscious brands: <br />
                rice straws, paper straws, and biodegradable tableware.
              </p>
              <div class="d-flex gap-3 mt-3">
                <a href="products.php" class="btn btn-success btn-lg"
                  ><i class="bi bi-bag pe-1"></i> Explore Products</a
                >
                <a href="contact.php" class="btn btn-secondary btn-lg"
                  ><i class="bi bi-envelope pe-1"></i> Request a Quote</a
                >
              </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
              <div class="hero-card shadow-lg rounded-4 p-4 bg-white">
                <div class="d-flex align-items-center mb-3">
                  <i class="bi bi-leaf display-6 me-2"></i>
                  <h2 class="h4 mb-0">Our Green Commitment</h2>
                </div>
                <ul class="list-unstyled mb-0">
                  <li class="d-flex align-items-start mb-2">
                    <i class="bi bi-check2-circle me-2 text-success"></i
                    ><span
                      >A natural, eco-friendly alternative replacing single-use
                      plastics worldwide.
                    </span>
                  </li>
                  <li class="d-flex align-items-start mb-2">
                    <i class="bi bi-check2-circle me-2 text-success"></i
                    ><span
                      >Thoughtfully crafted to deliver perfect balance of
                      function and feel.</span
                    >
                  </li>
                  <li class="d-flex align-items-start">
                    <i class="bi bi-check2-circle me-2 text-success"></i
                    ><span
                      >Simple, seamless integration across all websites and
                      digital platforms.</span
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <svg
          class="hero-wave"
          viewBox="0 0 1440 320"
          preserveAspectRatio="none"
          aria-hidden="true"
        >
          <path
            d="M0,224L60,224C120,224,240,224,360,197.3C480,171,600,117,720,133.3C840,149,960,235,1080,240C1200,245,1320,171,1380,133.3L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"
          ></path>
        </svg>
      </section>

      <section class="contact-section py-5">
        <div class="container">
          <div class="row g-4">
            <!-- FORM -->
            <div class="col-lg-6">
              <div class="contact-card p-4 p-md-5 h-100">
                <h2 class="h4 mb-4">REGISTRATION FORM</h2>
                <form class="row g-3" id="contactForm" method="post"
                      action="/ecostraws_bootstrap/lead-submit.php" novalidate>

                  <!-- HONEYPOT: chống bot, để trống/ẩn -->
                  <input type="text" name="website" tabindex="-1" autocomplete="off" style="display:none">

                  <div class="col-12">
                    <label for="cname" class="form-label">Full name *</label>
                    <input id="cname" name="full_name" type="text" class="form-control" required />
                    <div class="invalid-feedback">Please enter your name.</div>
                  </div>

                  <div class="col-12">
                    <label for="cbusiness" class="form-label">Business</label>
                    <input id="cbusiness" name="business" type="text" class="form-control" />
                  </div>

                  <div class="col-12">
                    <label for="cphone" class="form-label">Phone number *</label>
                    <input id="cphone" name="phone" type="tel" class="form-control"
                          placeholder="+84 912 345 678" pattern="^\+?[0-9 ()\-]{7,}$" required />
                    <div class="invalid-feedback">Please enter a valid phone.</div>
                  </div>

                  <div class="col-12">
                    <label for="cemail" class="form-label">Email *</label>
                    <input id="cemail" name="email" type="email" class="form-control" required />
                    <div class="invalid-feedback">Invalid email.</div>
                  </div>

                  <div class="col-12">
                    <label for="cmsg" class="form-label">Message *</label>
                    <textarea id="cmsg" name="message" class="form-control" rows="4" required></textarea>
                    <div class="invalid-feedback">Please describe your need.</div>
                  </div>

                  <div class="col-12 d-grid">
                    <button class="btn btn-success-form btn-submit" type="submit">
                      CONTACT NOW TO RECEIVE A SAMPLE
                    </button>
                  </div>
                </form>
              </div>
            </div>

            <!-- INFO + MAP -->
            <div class="col-lg-6">
              <div class="h-100 d-flex flex-column">
                <h2 class="h4 mb-3">INFORMATION</h2>
                <ul class="list-unstyled info-list mb-3">
                  <li class="mb-2 d-flex">
                    <span class="ico"><i class="bi bi-geo-alt"></i></span>
                    <span
                      >Office: DBS Building, 4th floor, Lot 31, Ha Tri Service
                      and Trade Area, Ha Cau Ward, Ha Dong, Hanoi,
                      Vietnam.</span
                    >
                  </li>
                  <li class="mb-2 d-flex">
                    <span class="ico"><i class="bi bi-telephone"></i></span>
                    <span
                      >Tel: <a href="tel:+84913924933">+84913924933</a></span
                    >
                  </li>
                  <li class="mb-2 d-flex">
                    <span class="ico"><i class="bi bi-envelope"></i></span>
                    <span
                      >Email:
                      <a href="mailto:info@example.com"
                        >info@ecostrawsvietnam.vn</a
                      ></span
                    >
                  </li>
                </ul>

                <div
                  class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-sm mt-2"
                >
                  <iframe
                    src="https://www.google.com/maps?q=20.963868,105.781912&z=19&hl=vi&output=embed"
                    style="border: 0"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Google Map"
                  ></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- ===== FOOTER ===== -->
    <?php include "includes/flash.php" ?>
    <?php include "includes/footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" defer></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      defer
    ></script>
    <script src="assets/js/main.js?v=<?= time(); ?>" ></script>
  </body>
</html>
