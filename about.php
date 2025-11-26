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

      <!-- ABOUT -->
      <section class="py-5 reveal-on-scroll" id="about">
        <div class="container">
          <h2
            class="h2 fw-bold text-success text-center mb-4"
            
          >
            Who we are
          </h2>

          <!-- Card with concave circle + image -->
          <div class="about-card p-4 p-md-5 mb-4">
            <div class="row align-items-center">
              <div class="col-lg-7">
                <h3 class="h4 fw-bold mb-3">Our Story</h3>
                <p class="text-secondary mb-3">
                  Eco Straws Vietnam Export JSC was born in 2018 from a simple
                  question: <strong>“Can we enjoy convenience without harming the planet?”</strong>
                </p>
                <p class="text-secondary mb-3">
                  From that question, we built a product ecosystem made from
                  100% locally sourced natural ingredients. Every crop is grown and
                  controlled to meet international standards, turning Vietnamese
                  agricultural strengths into sustainable, high–value products.
                </p>
                <p class="text-secondary mb-0">
                  With gratitude for nature and care for people, marine life and the
                  environment, we keep expanding our lines &mdash; from eco straws and
                  coffee stirrers to healthy noodles, and new green products that are
                  already on the way.
                </p>
              </div>

              <!-- The image sits in the cut-out circle -->
              <div class="col-lg-5 position-relative">
                <div class="about-photo">
                  <img
                    src="assets/images/banner_4.jpg"
                    class="img-fluid"
                    alt="Eco Straws Vietnam factory"
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
                <small class="text-white-50">
                  A brand created for the Vietnamese and Asian markets
                </small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="about-badge text-center">
                <div class="fw-bold text-white">ECO-CEREAL BRAND</div>
                <small class="text-white-50">
                  Registered for intellectual property protection in the US and EU
                </small>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- HISTORY / TIMELINE -->
      <section id="history" class="py-5 reveal-on-scroll">
        <div class="container">
          <h2
            class="h2 text-success text-center fw-bold mb-3"

          >
            HOW OUR JOURNEY BEGAN
          </h2>
          <p class="text-secondary text-center mx-auto mb-5" style="max-width: 640px;">
            From a small team and a single production line to an international
            export factory, Eco Straws Vietnam has always followed one direction:
            <strong>greener materials, cleaner processes, better lives.</strong>
          </p>

          <div class="timeline position-relative">
            <!-- 2018 -->
            <div class="timeline-item row align-items-center g-4">
              <div class="col-md-6 order-md-1">
                <div class="d-flex align-items-start gap-3">
                  <span class="year-badge">2018</span>
                  <div>
                    <h5 class="fw-semibold mb-1">Where the idea took root</h5>
                    <p class="text-secondary mb-0">
                      We began researching eco–friendly materials, designing
                      production lines and planning a factory that could meet
                      strict international standards from day one.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 order-md-2">
                <figure class="tr-bl">
                  <img
                    src="assets/images/grid/Rectangle-43.png"
                    class="img-fluid"
                    alt="Early factory planning in 2018"
                  />
                </figure>
              </div>
            </div>

            <!-- 2019 -->
            <div class="timeline-item row align-items-center g-4">
              <div class="col-md-6 order-md-2">
                <div class="d-flex justify-content-md-end">
                  <div class="d-flex align-items-start gap-3 text-md-end">
                    <div>
                      <h5 class="fw-semibold mb-1">From blueprint to factory</h5>
                      <p class="text-secondary mb-0">
                        Our high-tech factory went into operation. We completed pilot
                        batches, refined our formulas and officially launched Eco
                        Straws products to the market.
                      </p>
                    </div>
                    <span class="year-badge">2019</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 order-md-1">
                <figure class="tl-br">
                  <img
                    src="assets/images/grid/Rectangle-44.png"
                    class="img-fluid"
                    alt="High-tech factory 2019"
                  />
                </figure>
              </div>
            </div>

            <!-- 2020 -->
            <div class="timeline-item row align-items-center g-4">
              <div class="col-md-6 order-md-1">
                <div class="d-flex align-items-start gap-3">
                  <span class="year-badge">2020</span>
                  <div>
                    <h5 class="fw-semibold mb-1">Scaling for impact</h5>
                    <p class="text-secondary mb-0">
                      We expanded our factory area to over 3,000 m² and invested in
                      heat-pump drying technology and a large solar power system,
                      allowing us to serve both domestic and export markets more
                      sustainably.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 order-md-2">
                <figure class="tr-bl">
                  <img
                    src="assets/images/grid/Rectangle-45.png"
                    class="img-fluid"
                    alt="Factory expansion in 2020"
                  />
                </figure>
              </div>
            </div>

            <!-- arrow cuối trục -->
            <div class="timeline-arrow" aria-hidden="true"></div>
          </div>
        </div>
      </section>

      <!-- MARKETS -->
      <section id="markets" class="py-5 reveal-on-scroll">
        <div class="container">

          <!-- Domestic market -->
          <div class="text-center mb-4">
            <span class="market-pill">DOMESTIC MARKET</span>
          </div>

          <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
              <!-- Bản đồ Việt Nam -->
              <img
                src="assets/images/map_vietnam.png"
                alt="Domestic market in Vietnam"
                class="img-fluid mb-3 market-map"
              />
            </div>
          </div>

          <!-- Logo khách hàng trong nước -->
                <!-- CERTIFICATIONS -->
      <section class="py-5 my-5 bg-light reveal-on-scroll">
        <div class="container">
          <div class="marquee marquee--3 mx-auto">
            <div class="marquee__track">
              <img src="assets/images/certs/jw-marriott.png" alt="ISO 22000:2018" />
              <img src="assets/images/certs/brand-center.png" alt="FSPCA" />
              <img src="assets/images/certs/hilton.png" alt="Eurofins" />

              <img
                src="assets/images/certs/jw-marriott.png"
                alt=""
                aria-hidden="true"
              />
              <img
                src="assets/images/certs/brand_center.png"
                alt=""
                aria-hidden="true"
              />
              <img
                src="assets/images/certs/hilton.png"
                alt=""
                aria-hidden="true"
              />
            </div>
          </div>
        </div>
      </section>

          <!-- Foreign markets + globe -->
          <div class="row align-items-center justify-content-center g-4 mb-4">
            <!-- LEFT -->
            <div class="col-6 col-md-3">
              <div class="market-country-card text-center mb-3">
                <img src="assets/images/certs/icon7.png" alt="Switzerland" class="img-fluid">
                <span class="market-country-name d-block mt-2">SWITZERLAND</span>
              </div>
              <div class="market-country-card text-center mb-3">
                <img src="assets/images/certs/icon8.png" alt="USA" class="img-fluid">
                <span class="market-country-name d-block mt-2">USA</span>
              </div>
            </div>

            <!-- Globe center -->
            <div class="col-10 col-md-4 text-center">
              <div class="market-globe-wrapper">
                <img
                  src="assets/images/markets_globe.png"
                  alt="Global markets"
                  class="img-fluid market-globe"
                />
              </div>
            </div>

            <!-- RIGHT -->
            <div class="col-6 col-md-3">
              <div class="market-country-card text-center mb-3">
                <img src="assets/images/certs/icon9.png" alt="Japan" class="img-fluid">
                <span class="market-country-name d-block mt-2">JAPAN</span>
              </div>
              <div class="market-country-card text-center mb-3">
                <img src="assets/images/certs/icon10.png" alt="france" class="img-fluid">
                <span class="market-country-name d-block mt-2">FRANCE</span>
              </div>
            </div>
          </div>

          <!-- Foreign markets label -->
          <div class="text-center market-pill-secondary">
            <span class="market-pill">FOREIGN MARKETS</span>
          </div>

        </div>
      </section>

      <!-- VISION / MISSION / CORE VALUES -->
      <section class="py-5 reveal-on-scroll" id="vmv">
        <div class="container">
          <!-- Vision -->
          <div class="text-center mb-5">
            <div class="vmv-icon mb-2"><i class="bi bi-eye"></i></div>
            <h2 class="vmv-script text-success mb-2">VISION</h2>
            <p class="text-secondary mx-auto vmv-max">
              To become a leading company in Southeast Asia for
              <strong>eco-friendly, plant-based products</strong>, where every straw,
              noodle or stirrer carries a story of care for people and the planet.
            </p>
          </div>

          <!-- Mission -->
          <div class="text-center mb-5">
            <div class="vmv-icon mb-2"><i class="bi bi-bullseye"></i></div>
            <h2 class="vmv-script text-success mb-2">MISSION</h2>
            <p class="text-secondary mx-auto vmv-max">
              We transform Vietnamese agricultural resources into sustainable
              products that create fair jobs for farmers, bring healthy choices to
              consumers and generate more green value for the global market.
            </p>
          </div>

          <!-- Core Values -->
          <div class="text-center mb-4">
            <div class="vmv-icon mb-2"><i class="bi bi-stars"></i></div>
            <h2 class="vmv-script text-success mb-0">CORE VALUES</h2>
            <p class="text-secondary mx-auto vmv-max mt-2">
              Six “green pillars” that guide every decision we make.
            </p>
          </div>

          <div class="row g-4 g-lg-5 mt-1">
            <!-- 1 -->
            <div class="col-12 col-md-4">
              <div class="value-card text-center h-100">
                <div class="value-ico">
                  <i class="bi bi-flower3"></i>
                </div>
                <h5 class="fw-bold text-uppercase mb-1">Green Ingredients</h5>
                <p class="mb-0">
                  100% natural, plant-based ingredients grown on Vietnam’s fertile lands.
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
                  International-standard processes, modern technology and solar energy
                  to keep our footprint light.
                </p>
              </div>
            </div>
            <!-- 3 -->
            <div class="col-12 col-md-4">
              <div class="value-card text-center h-100">
                <div class="value-ico"><i class="bi bi-people"></i></div>
                <h5 class="fw-bold text-uppercase mb-1">Green Distribution</h5>
                <p class="text-secondary mb-0">
                  Partnerships with businesses that share the same commitment to
                  sustainability.
                </p>
              </div>
            </div>

            <!-- 4 -->
            <div class="col-12 col-md-4">
              <div class="value-card text-center h-100">
                <div class="value-ico"><i class="bi bi-bag-check"></i></div>
                <h5 class="fw-bold text-uppercase mb-1">Green Consumption</h5>
                <p class="text-secondary mb-0">
                  Products that are safe, natural and easy to integrate into daily life.
                </p>
              </div>
            </div>
            <!-- 5 -->
            <div class="col-12 col-md-4">
              <div class="value-card text-center h-100">
                <div class="value-ico"><i class="bi bi-heart"></i></div>
                <h5 class="fw-bold text-uppercase mb-1">Green Living</h5>
                <p class="text-secondary mb-0">
                  Encourage everyday choices that protect health and reduce waste.
                </p>
              </div>
            </div>
            <!-- 6 -->
            <div class="col-12 col-md-4">
              <div class="value-card text-center h-100">
                <div class="value-ico"><i class="bi bi-globe2"></i></div>
                <h5 class="fw-bold text-uppercase mb-1">Green Community</h5>
                <p class="text-secondary mb-0">
                  Join hands with partners and consumers to build a cleaner planet
                  and better communities.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>
    <!-- ===== FOOTER ===== -->
    <?php include "includes/footer.php" ?>
    <script>
      (function () {
        const els = document.querySelectorAll('.reveal-on-scroll');
        if (!('IntersectionObserver' in window) || !els.length) return;

        const obs = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              entry.target.classList.add('is-visible');
              obs.unobserve(entry.target);
            }
          });
        }, {
          threshold: 0.2
        });

        els.forEach(el => obs.observe(el));
      })();
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" defer></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      defer
    ></script>
    <script src="assets/js/main.js?v=<?= time(); ?>"></script>
  </body>
</html>
