<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="vi" data-bs-theme="light">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Eco Straws Vietnam</title>
    <meta
      name="description"
      content="Eco Straws Vietnam"
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
      <section class="hero position-relative overflow-hidden">
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

      <!-- FEATURES -->
      <section class="features py-5 bg-light my-5">
        <div class="container">
          <div class="row text-center g-4">
            <div class="col-6 col-lg-3">
              <div class="feature">
                <span class="icon-badge">
                  <i class="bi bi-globe-americas"></i>
                </span>
                <h3 class="h5">100% Natural</h3>
                <p class="small-text">Made from natural ingredients</p>
              </div>
            </div>
            <div class="col-6 col-lg-3">
              <div class="feature">
                <span class="icon-badge">
                  <i class="bi bi-shield-check"></i>
                </span>
                <h3 class="h5">Eco-friendly</h3>
                <p class="small-text">Safe for you, kind to the planet</p>
              </div>
            </div>
            <div class="col-6 col-lg-3">
              <div class="feature">
                <span class="icon-badge">
                  <i class="bi bi-recycle"></i>
                </span>
                <h3 class="h5">Renewable Energy</h3>
                <p class="small-text">Powered by green energy</p>
              </div>
            </div>
            <div class="col-6 col-lg-3">
              <div class="feature">
                <span class="icon-badge">
                  <i class="bi bi-brightness-alt-high-fill"></i>
                </span>
                <h3 class="h5">Plastic-free Future</h3>
                <p class="small-text">Reducing waste, protecting nature</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- VIEW PRODUCTS -->
      <?php
      // Lấy danh mục
      $cats = [];
      $res = $conn->query("SELECT slug, name FROM categories ORDER BY id");
      while ($row = $res->fetch_assoc()) { $cats[] = $row; }

      // Lấy toàn bộ sản phẩm + slug
      $sql = "SELECT p.id, p.name, p.price, p.old_price, p.image, p.shopee_url, c.slug
              FROM products p
              JOIN categories c ON c.id = p.category_id
              WHERE p.status = 1
              ORDER BY p.created_at DESC";
      $products = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);

      // Filter ban đầu: ?cat=... ; nếu không có thì lấy slug của danh mục đầu tiên
      $initialCat = isset($_GET['cat']) ? trim($_GET['cat']) : '';
      if ($initialCat === '' && !empty($cats)) {
        $initialCat = $cats[0]['slug'];
      }
      function vnd($n){ return number_format((float)$n, 0, '.', '.') . ' đ'; }
      ?>

      <section class="py-5 mt-5" id="products">
        <div class="container">
          <!-- Header + Filter -->
          <div class="section-head d-flex flex-wrap align-items-end justify-content-between gap-3 mb-4">
            <div class="head-left">
              <span class="eyebrow">Explore</span>
              <h2 class="title mb-1">OUR PRODUCTS</h2>
            </div>

            <!-- Pills chỉ theo danh mục (không có All) -->
            <div class="filter-pills" role="group" aria-label="Filter products">
              <?php foreach ($cats as $c): ?>
                <button type="button"
                        class="pill<?= ($initialCat===$c['slug'] ? ' active' : '') ?>"
                        data-filter="<?= htmlspecialchars($c['slug']) ?>">
                  <?= htmlspecialchars($c['name']) ?>
                </button>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Grid -->
          <div class="row g-4 product-grid mt-5">
            <div class="row products-row mt-5">
              <?php if (empty($products)): ?>
                <div class="col-12"><div class="alert alert-light border text-center mb-0">No products found.</div></div>
              <?php else: ?>
                <?php foreach ($products as $p): ?>
                  <div class="col-12 col-md-6 col-lg-4" data-cat="<?= htmlspecialchars($p['slug']) ?>">
                    <div class="product-card">
                      <figure class="product-figure">
                        <img class="product-img" src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
                      </figure>
                      <div class="card-body">
                        <h5 class="product-title pt-2"><?= htmlspecialchars($p['name']) ?></h5>

                        <?php if (!is_null($p['old_price']) && $p['old_price'] > 0): ?>
                          <div class="price-old"><?= vnd($p['old_price']) ?></div>
                        <?php else: ?>
                          <div class="price-old" style="visibility:hidden">.</div>
                        <?php endif; ?>

                        <div class="price-new mb-2"><?= vnd($p['price']) ?></div>

                        <?php if (!empty($p['shopee_url'])): ?>
                          <a href="<?= htmlspecialchars($p['shopee_url']) ?>" target="_blank" rel="noopener" class="btn btn-pill">See now</a>
                        <?php else: ?>
                          <button class="btn btn-pill" type="button" disabled>See now</button>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <script>
        (() => {
          const pills = document.querySelectorAll('#products .filter-pills .pill');
          const items = document.querySelectorAll('#products .products-row [data-cat]');
          const sect  = document.getElementById('products');

          function applyFilter(f) {
            items.forEach(it => {
              it.classList.toggle('d-none', it.dataset.cat !== f);
            });
          }

          // Filter ban đầu từ PHP (danh mục đầu tiên nếu không có ?cat=)
          const initialFilter = <?= json_encode($initialCat) ?>;
          applyFilter(initialFilter);

          // Đồng bộ active
          pills.forEach(b => b.classList.toggle('active', b.dataset.filter === initialFilter));

          // Click: không điều hướng, chỉ lọc
          pills.forEach(btn => {
            btn.addEventListener('click', (e) => {
              e.preventDefault();
              pills.forEach(b => b.classList.remove('active'));
              btn.classList.add('active');
              applyFilter(btn.dataset.filter);
              sect.scrollIntoView({ behavior: 'smooth', block: 'start' });
              history.replaceState(null, '', '?cat=' + encodeURIComponent(btn.dataset.filter)); // cập nhật URL
            }, { passive:false });
          });
        })();
        </script>
      </section>



      <!-- PROCESS -->
      <section class="process-section" id="process">
        <div class="container">
          <h2 class="title text-center mt-3">PRODUCTION PROCESS</h2>
          <p class="text-center pb-3">Rice straw production process</p>

          <div class="timeline">
            <div class="row row-cols-1 row-cols-lg-5 g-5 align-items-center">
              <!-- 1 -->
              <div class="col">
                <div class="step reveal-up">
                  <div class="circle-wrap">
                    <div class="circle">
                      <i class="bi bi-bag-check bi-process"></i>
                    </div>
                  </div>
                  <div class="mt-4 label">Raw Materials</div>
                  <div class="sublabel">
                    Rice flour, tapioca starch, natural colorants
                  </div>
                </div>
              </div>

              <!-- 2 -->
              <div class="col">
                <div class="step reveal-up">
                  <div class="circle-wrap">
                    <div class="circle">
                      <i class="bi bi-droplet-half bi-process"></i>
                    </div>
                  </div>
                  <div class="mt-4 label">Mixing</div>
                  <div class="sublabel">Loss rate ~2%</div>
                </div>
              </div>

              <!-- 3 -->
              <div class="col">
                <div class="step reveal-up">
                  <div class="circle-wrap">
                    <div class="circle">
                      <i class="bi bi-diagram-3 bi-process"></i>
                    </div>
                  </div>
                  <div class="mt-4 label">Extrusion</div>
                  <div class="sublabel">Forming the straw <br />80 - 90°C</div>
                </div>
              </div>

              <!-- 4 -->
              <div class="col">
                <div class="step reveal-up">
                  <div class="circle-wrap">
                    <div class="circle">
                      <i class="bi bi-thermometer-half bi-process"></i>
                    </div>
                  </div>
                  <div class="mt-4 label">Cutting &amp; Drying</div>
                  <div class="sublabel">Cold-drying <br />Loss rate ~3%</div>
                </div>
              </div>

              <!-- 5 -->
              <div class="col">
                <div class="step reveal-up">
                  <div class="circle-wrap">
                    <div class="circle">
                      <i class="bi bi-box-seam bi-process"></i>
                    </div>
                  </div>
                  <div class="mt-4 label">Packaging</div>
                  <div class="sublabel">Vacuum sealed dispatch</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script>
          (function () {
            const els = document.querySelectorAll("#process .reveal-up");
            if (!("IntersectionObserver" in window)) {
              els.forEach((e) => e.classList.add("is-in"));
              return;
            }
            const io = new IntersectionObserver(
              (entries) => {
                entries.forEach((en) => {
                  if (en.isIntersecting) {
                    en.target.classList.add("is-in");
                    io.unobserve(en.target);
                  }
                });
              },
              { threshold: 0.25 }
            );
            els.forEach((e) => io.observe(e));
          })();
        </script>
      </section>

      <!-- CERTIFICATIONS -->
      <section class="py-5 my-5 bg-light">
        <div class="container">
          <h2 class="title mb-4 text-center">
            CERTIFICATIONS & INSPECTION PARTNERS
          </h2>

          <div class="marquee marquee--3 mx-auto">
            <div class="marquee__track">
              <img src="assets/images/certs/logo1.jpg" alt="ISO 22000:2018" />
              <img src="assets/images/certs/logo2.jpg" alt="FSPCA" />
              <img src="assets/images/certs/logo3.jpg" alt="Eurofins" />

              <img
                src="assets/images/certs/logo1.jpg"
                alt=""
                aria-hidden="true"
              />
              <img
                src="assets/images/certs/logo2.jpg"
                alt=""
                aria-hidden="true"
              />
              <img
                src="assets/images/certs/logo3.jpg"
                alt=""
                aria-hidden="true"
              />
            </div>
          </div>
        </div>
      </section>

      <!-- REGISTER / CONTACT FORM -->
      <section id="lead" class="py-5 my-5">
        <div class="container">
          <div class="row g-4 align-items-center lead-wrap position-relative">
            <!-- LEFT: FORM PANEL -->
            <div class="col-lg-6">
              <div class="lead-panel p-4 p-md-5">
                <h2 class="display-6 fw-bold mb-4">REGISTRATION FORM</h2>
                <?php if (!empty($_SESSION['lead_ok'])): ?>
                  <div class="alert alert-success border-0 shadow-sm mb-3">
                    ✅ Your request has been sent. We will contact you soon!
                  </div>
                <?php unset($_SESSION['lead_ok']); ?>
                <?php elseif (!empty($_SESSION['lead_error'])): ?>
                  <div class="alert alert-danger border-0 shadow-sm mb-3">
                    <?= htmlspecialchars($_SESSION['lead_error']) ?>
                  </div>
                  <?php unset($_SESSION['lead_error']); ?>
                <?php endif; ?>

                <form id="leadForm" class="needs-validation" action="lead-submit.php" method="post" novalidate>
                  <!-- Honeypot chống bot: để trống/ẩn -->
                  <input type="text" name="website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;top:auto;width:1px;height:1px;opacity:0">

                  <div class="mb-3">
                    <input class="form-control form-lg" type="text" name="full_name" placeholder="Full name" required />
                    <div class="invalid-feedback">Please enter your name.</div>
                  </div>

                  <div class="mb-3">
                    <input class="form-control form-lg" type="text" name="business" placeholder="Business" />
                  </div>

                  <div class="mb-3">
                    <input class="form-control form-lg" type="tel" name="phone" placeholder="Phone number" required />
                    <div class="invalid-feedback">Please enter your phone number.</div>
                  </div>

                  <div class="mb-3">
                    <input class="form-control form-lg" type="email" name="email" placeholder="Email" required />
                    <div class="invalid-feedback">Please enter a valid email.</div>
                  </div>

                  <div class="mb-4">
                    <textarea class="form-control form-lg" rows="4" name="message" placeholder="Message"></textarea>
                  </div>

                  <div class="lead-connector" aria-hidden="true"></div>
                  <div class="text-center">
                    <button class="btn btn-eco-pill" type="submit">
                      CONTACT NOW TO RECEIVE A SAMPLE
                    </button>
                  </div>
                </form>
                <script>
                  (function () {
                    const form = document.getElementById('leadForm');
                    form.addEventListener('submit', function (e) {
                      if (!form.checkValidity()) {
                        e.preventDefault();
                        e.stopPropagation();
                      }
                      form.classList.add('was-validated');
                    }, false);
                  }());
                </script>

              </div>
            </div>

            <!-- RIGHT: PHOTO -->
            <div class="col-lg-6">
              <div class="lead-photo">
                <img
                  src="assets/images/banner_4.jpg"
                  class="img-fluid"
                  alt="Factory"
                />
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ECO INFO (3x2 grid with clickable cards) -->
      <section class="eco-mini py-5 my-4">
        <div class="container">
          <h2 class="h3 text-center fw-bold mb-3">
            ACTIONS FOR A GREENER FUTURE
          </h2>

          <div class="row g-3 g-lg-3 eco-mini-grid">
            <!-- 1 -->
            <div class="col-6 col-lg-4">
              <a
                class="eco-mini-card"
                href="https://www.facebook.com/share/p/1D8iYQWdbq/"
              >
                <figure class="ratio eco-mini-figure">
                  <img
                    src="assets/images/grid/grid_1.jpg"
                    alt="Nutritious meals for families"
                    class="eco-mini-img"
                  />
                </figure>
                <div class="eco-mini-body">
                  <h3 class="eco-mini-title">Growing Eco-Friendly Demand</h3>
                </div>
              </a>
            </div>

            <!-- 2 -->
            <div class="col-6 col-lg-4">
              <a
                class="eco-mini-card"
                href="https://www.facebook.com/share/p/17Q6GFwYek/"
              >
                <figure class="ratio eco-mini-figure">
                  <img
                    src="assets/images/grid/grid_2.jpg"
                    alt="Reduce plastic waste"
                    class="eco-mini-img"
                  />
                </figure>
                <div class="eco-mini-body">
                  <h3 class="eco-mini-title">Eco Straws at Aeon Fair</h3>
                </div>
              </a>
            </div>

            <!-- 3 -->
            <div class="col-6 col-lg-4">
              <a
                class="eco-mini-card"
                href="https://www.facebook.com/share/p/17hWb2K7eK/"
              >
                <figure class="ratio eco-mini-figure">
                  <img
                    src="assets/images/grid/grid_3.jpg"
                    alt="Community & environment"
                    class="eco-mini-img"
                  />
                </figure>
                <div class="eco-mini-body">
                  <h3 class="eco-mini-title">
                    Eco Straws: Green Dream Realized
                  </h3>
                </div>
              </a>
            </div>

            <!-- 4 -->
            <div class="col-6 col-lg-4">
              <a
                class="eco-mini-card"
                href="https://www.facebook.com/share/p/1BV8JicKpr/"
              >
                <figure class="ratio eco-mini-figure">
                  <img
                    src="assets/images/grid/grid_4.jpg"
                    alt="Healthy lifestyle"
                    class="eco-mini-img"
                  />
                </figure>
                <div class="eco-mini-body">
                  <h3 class="eco-mini-title">
                    Eco Straws: Sustainable Business Solutions
                  </h3>
                </div>
              </a>
            </div>

            <!-- 5 -->
            <div class="col-6 col-lg-4">
              <a
                class="eco-mini-card"
                href="https://www.facebook.com/share/p/1CMrdhXQqs/"
              >
                <figure class="ratio eco-mini-figure">
                  <img
                    src="assets/images/grid/grid_5.jpg"
                    alt="Circular practices"
                    class="eco-mini-img"
                  />
                </figure>
                <div class="eco-mini-body">
                  <h3 class="eco-mini-title">Eco Straws' Green Factory</h3>
                </div>
              </a>
            </div>

            <!-- 6 -->
            <div class="col-6 col-lg-4">
              <a
                class="eco-mini-card"
                href="https://www.facebook.com/share/p/1BG1krZE4U/"
              >
                <figure class="ratio eco-mini-figure">
                  <img
                    src="assets/images/grid/grid_6.jpg"
                    alt="Green energy"
                    class="eco-mini-img"
                  />
                </figure>
                <div class="eco-mini-body">
                  <h3 class="eco-mini-title">EcoStraws at VICHI Market</h3>
                </div>
              </a>
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
    <script src="assets/js/main.js?v=<?= time(); ?>"></script>
  </body>
</html>
