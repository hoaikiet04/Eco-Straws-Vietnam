<!DOCTYPE html>
<html lang="vi" data-bs-theme="light">
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

      <section class="py-5" id="about">
        <div class="container">
          <h2
            class="h2 fw-bold text-success text-center mb-4"
            style="font-family: 'Segoe Script', cursive"
          >
            Who are we
          </h2>

          <!-- Card with concave circle + image -->
          <div class="about-card p-4 p-md-5 mb-4">
            <div class="row align-items-center">
              <div class="col-lg-7">
                <h3 class="h4 fw-bold mb-3">About Us</h3>
                <p class="text-secondary mb-3">
                  Eco Straws Vietnam Export Joint Stock Company was established
                  in 2018 with the aim of producing and distributing products
                  that are environmentally friendly and safe to consume.
                </p>
                <p class="text-secondary mb-3">
                  Eco Straws’ product ecosystem is made from 100% native natural
                  ingredients that are grown and controlled to meet
                  international standards.
                </p>
                <p class="text-secondary mb-0">
                  With gratitude for nature and love for people, marine life,
                  and the environment, we are continuously expanding our
                  production lines: From ecological straws, and coffee stirrers
                  to healthy noodles, and there will soon be more.
                </p>
              </div>

              <!-- The image sits in the cut-out circle -->
              <div class="col-lg-5 position-relative">
                <div class="about-photo">
                  <img
                    src="assets/images/banner_4.jpg"
                    class="img-fluid"
                    alt="Factory"
                  />
                </div>
              </div>
            </div>
          </div>

          <!-- Two green info badges -->
          <div class="row g-3 g-md-4">
            <div class="col-md-6">
              <div class="about-badge text-center">
                <div class="fw-bold text-white">ECO STRAWS VIETNAM</div>
                <small class="text-white-50"
                  >a brand for the Vietnamese and Asian markets</small
                >
              </div>
            </div>
            <div class="col-md-6">
              <div class="about-badge text-center">
                <div class="fw-bold text-white">ECO-CEREAL BRAND</div>
                <small class="text-white-50"
                  >a brand registered for intellectual property rights in the US
                  and EU</small
                >
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- HISTORY / TIMELINE -->
      <section id="history" class="py-5">
        <div class="container">
          <h2
            class="h2 text-success text-center fw-bold mb-5"
            style="font-family: 'Segoe Script', cursive"
          >
            History of Eco Straws
          </h2>

          <div class="timeline position-relative">
            <!-- 2018 (trái) -->
            <div class="timeline-item row align-items-center g-4">
              <div class="col-md-6 order-md-1">
                <div class="d-flex align-items-start gap-3">
                  <span class="year-badge">2018</span>
                  <p class="text-secondary mb-0">
                    Initial research into production processes, machinery design
                    and the construction of a factory to meet international
                    standards.
                  </p>
                </div>
              </div>
              <div class="col-md-6 order-md-2">
                <figure class="timeline-figure tr-bl">
                  <img
                    src="assets/images/banner_4.jpg"
                    class="img-fluid"
                    alt="2018"
                  />
                </figure>
              </div>
            </div>

            <!-- 2019 (phải) -->
            <div class="timeline-item row align-items-center g-4">
              <div class="col-md-6 order-md-2">
                <div class="d-flex justify-content-md-end">
                  <div class="d-flex align-items-start gap-3 text-md-end">
                    <p class="text-secondary mb-0">
                      • Completing research and getting the high-tech factory up
                      and running.
                    </p>
                    <span class="year-badge">2019</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 order-md-1">
                <figure class="timeline-figure tl-br">
                  <img
                    src="assets/images/banner_2.jpg"
                    class="img-fluid"
                    alt="2019"
                  />
                </figure>
              </div>
            </div>

            <!-- 2020 (trái) -->
            <div class="timeline-item row align-items-center g-4">
              <div class="col-md-6 order-md-1">
                <div class="d-flex align-items-start gap-3">
                  <span class="year-badge">2020</span>
                  <p class="text-secondary mb-0">
                    Expanding the factory (>3,000 m²) for domestic and export
                    goods.<br />
                    Applying heat-pump drying technology & a large solar power
                    system.
                  </p>
                </div>
              </div>
              <div class="col-md-6 order-md-2">
                <figure class="timeline-figure tr-bl">
                  <img
                    src="assets/images/banner_1.jpg"
                    class="img-fluid"
                    alt="2020"
                  />
                </figure>
              </div>
            </div>

            <!-- arrow cuối trục -->
            <div class="timeline-arrow" aria-hidden="true"></div>
          </div>
        </div>
      </section>

      <!-- VISION / MISSION / CORE VALUES -->
      <section class="py-5" id="vmv">
        <div class="container">
          <!-- Vision -->
          <div class="text-center mb-5">
            <div class="vmv-icon mb-2"><i class="bi bi-eye"></i></div>
            <h2 class="vmv-script text-success mb-2">Vision</h2>
            <p class="text-secondary mx-auto vmv-max">
              To become a leading company in Southeast Asia in the production
              and development of environmentally friendly products.
            </p>
          </div>

          <!-- Mission -->
          <div class="text-center mb-5">
            <div class="vmv-icon mb-2"><i class="bi bi-bullseye"></i></div>
            <h2 class="vmv-script text-success mb-2">Mission</h2>
            <p class="text-secondary mx-auto vmv-max">
              Our goal is the development of environmentally friendly products
              that enhance the value of Vietnamese agricultural products in the
              international market, creating employment opportunities for
              farmers and increasing Vietnam’s foreign exchange earnings.
            </p>
          </div>

          <!-- Core Values -->
          <div class="text-center mb-4">
            <div class="vmv-icon mb-2"><i class="bi bi-stars"></i></div>
            <h2 class="vmv-script text-success mb-0">Core Values</h2>
          </div>

          <div class="row g-4 g-lg-5 mt-1">
            <!-- 1 -->
            <div class="col-12 col-md-4">
              <div class="value-card text-center h-100">
                <div class="value-ico"><i class="bi bi-leaf"></i></div>
                <h5 class="fw-bold text-uppercase mb-1">Green Ingredients</h5>
                <p class="mb-0">
                  100% natural ingredients from Vietnam’s fertile lands.
                </p>
              </div>
            </div>
            <!-- 2 -->
            <div class="col-12 col-md-4">
              <div class="value-card text-center h-100">
                <div class="value-ico">
                  <i class="bi bi-gear-wide-connected"></i>
                </div>
                <h5 class="fw-bold text-uppercase mb-1">Green Manufacturing</h5>
                <p class="text-secondary mb-0">
                  Processes designed to meet international standards; solar
                  energy to reduce carbon emissions.
                </p>
              </div>
            </div>
            <!-- 3 -->
            <div class="col-12 col-md-4">
              <div class="value-card text-center h-100">
                <div class="value-ico"><i class="bi bi-people"></i></div>
                <h5 class="fw-bold text-uppercase mb-1">Green Distribution</h5>
                <p class="text-secondary mb-0">
                  Partnerships with environmentally responsible businesses.
                </p>
              </div>
            </div>

            <!-- 4 -->
            <div class="col-12 col-md-4">
              <div class="value-card text-center h-100">
                <div class="value-ico"><i class="bi bi-bag-check"></i></div>
                <h5 class="fw-bold text-uppercase mb-1">Green Consumption</h5>
                <p class="text-secondary mb-0">
                  Safe, natural products for everyday use.
                </p>
              </div>
            </div>
            <!-- 5 -->
            <div class="col-12 col-md-4">
              <div class="value-card text-center h-100">
                <div class="value-ico"><i class="bi bi-heart"></i></div>
                <h5 class="fw-bold text-uppercase mb-1">Green Living</h5>
                <p class="text-secondary mb-0">
                  Promote sustainable lifestyles with eco-friendly products.
                </p>
              </div>
            </div>
            <!-- 6 -->
            <div class="col-12 col-md-4">
              <div class="value-card text-center h-100">
                <div class="value-ico"><i class="bi bi-globe2"></i></div>
                <h5 class="fw-bold text-uppercase mb-1">Green Community</h5>
                <p class="text-secondary mb-0">
                  Contribute to a cleaner planet and better communities.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- ===== FOOTER ===== -->
    <?php include "includes/footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" defer></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      defer
    ></script>
    <script src="assets/js/main.js?v=<?= time(); ?>"></script>
  </body>
</html>
