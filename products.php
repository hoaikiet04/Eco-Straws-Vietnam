<!DOCTYPE html>
<html lang="vi" data-bs-theme="light">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Eco Straws Vietnam – Giao diện mẫu (Bootstrap)</title>
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

      <section class="py-5 my-4" id="products">
        <div class="container">
          <div class="row g-4">
            <!-- Sidebar filter -->
            <aside class="col-lg-3">
              <div class="filter-box">
                <div class="d-flex align-items-center gap-2 mb-3">
                  <i class="bi bi-sliders2 fs-4"></i>
                  <strong class="fs-5">Filter</strong>
                </div>
                <ul class="filter-list list-unstyled m-0">
                  <li>
                    <button class="filter-link active" data-filter="*">
                      All products
                    </button>
                  </li>
                  <li>
                    <button class="filter-link" data-filter="noodles">
                      Nutritional noodles
                    </button>
                  </li>
                  <li>
                    <button class="filter-link" data-filter="rice">
                      Rice straws
                    </button>
                  </li>
                  <li>
                    <button class="filter-link" data-filter="stirring">
                      Stirring bar
                    </button>
                  </li>
                </ul>
              </div>
            </aside>

            <!-- Content -->
            <div class="col-lg-9">
              <!-- Green heading bar -->
              <div class="category-bar mb-4">
                <span id="categoryTitle">NUTRITIONAL NOODLES</span>
              </div>

              <!-- Product grid (reuse your product-card) -->
              <div class="row g-4 products-row" id="productGrid">
                <!-- Sugar Free Noodles -->
                <div
                  class="col-12 col-md-6 col-xl-4 product-col"
                  data-category="noodles"
                >
                  <div class="product-card">
                    <figure class="product-figure">
                      <img
                        class="product-img"
                        src="assets/images/products/Mi-ngo-Thumbnail-web.png"
                        alt="Sugar Free Noodles"
                      />
                    </figure>
                    <div class="card-body">
                      <h5 class="product-title">Sugar Free Noodles</h5>
                      <div class="price-old">80.000 đ</div>
                      <div class="price-new mb-2">65.000 đ</div>
                      <a href="#" class="btn btn-pill">See now</a>
                    </div>
                  </div>
                </div>

                <!-- Corn Noodles -->
                <div
                  class="col-12 col-md-6 col-xl-4 product-col"
                  data-category="noodles"
                >
                  <div class="product-card">
                    <figure class="product-figure">
                      <img
                        class="product-img"
                        src="assets/images/products/Mi-cau-vong-Thumbnail-web.png"
                        alt="Corn Noodles"
                      />
                    </figure>
                    <div class="card-body">
                      <h5 class="product-title">Corn Noodles</h5>
                      <div class="price-old">65.000 đ</div>
                      <div class="price-new mb-2">50.000 đ</div>
                      <a href="#" class="btn btn-pill">See now</a>
                    </div>
                  </div>
                </div>

                <!-- Rainbow Noodles -->
                <div
                  class="col-12 col-md-6 col-xl-4 product-col"
                  data-category="noodles"
                >
                  <div class="product-card">
                    <figure class="product-figure">
                      <img
                        class="product-img"
                        src="assets/images/products/mi-cau-vong-Thumbnail-web.png"
                        alt="Rainbow Noodles"
                      />
                    </figure>
                    <div class="card-body">
                      <h5 class="product-title">Rainbow Noodles</h5>
                      <div class="price-old">65.000 đ</div>
                      <div class="price-new mb-2">45.000 đ</div>
                      <a href="#" class="btn btn-pill">See now</a>
                    </div>
                  </div>
                </div>

                <!-- Ví dụ các danh mục khác -->
                <!-- Rice straws -->
                <div
                  class="col-12 col-md-6 col-xl-4 product-col d-none"
                  data-category="rice"
                >
                  <div class="product-card">
                    <figure class="product-figure">
                      <img
                        class="product-img"
                        src="assets/images/products/straw-rice.png"
                        alt="Rice Straws"
                      />
                    </figure>
                    <div class="card-body">
                      <h5 class="product-title">Rice Straws</h5>
                      <div class="price-old">—</div>
                      <div class="price-new mb-2">Liên hệ</div>
                      <a href="#" class="btn btn-pill">See now</a>
                    </div>
                  </div>
                </div>

                <!-- Stirring bar -->
                <div
                  class="col-12 col-md-6 col-xl-4 product-col d-none"
                  data-category="stirring"
                >
                  <div class="product-card">
                    <figure class="product-figure">
                      <img
                        class="product-img"
                        src="assets/images/products/stir-bar.png"
                        alt="Stirring Bar"
                      />
                    </figure>
                    <div class="card-body">
                      <h5 class="product-title">Stirring Bar</h5>
                      <div class="price-old">—</div>
                      <div class="price-new mb-2">Liên hệ</div>
                      <a href="#" class="btn btn-pill">See now</a>
                    </div>
                  </div>
                </div>
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
