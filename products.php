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
      <?php
        // Kết nối đã có: include "includes/connect.php"
        $conn->set_charset('utf8mb4');

        /* Lấy danh mục để hiển thị filter + kiểm tra hợp lệ slug */
        $cats = [];                 // ['noodles' => ['id'=>..,'slug'=>..,'name'=>..], ...]
        $res  = $conn->query("SELECT id, slug, name FROM categories ORDER BY id");
        while ($row = $res->fetch_assoc()) {
          $cats[$row['slug']] = $row;
        }

        /* Slug đang chọn (?cat=...). '*' = tất cả */
        $cat = isset($_GET['cat']) && $_GET['cat'] !== '' ? trim($_GET['cat']) : '*';

        /* Lấy sản phẩm (có slug danh mục). Nếu $cat hợp lệ và khác '*', lọc theo slug */
        $sql = "SELECT p.id, p.name, p.price, p.old_price, p.image, p.shopee_url, c.slug
                FROM products p
                JOIN categories c ON c.id = p.category_id
                WHERE p.status = 1";
        $params = []; $types = '';

        if ($cat !== '*' && isset($cats[$cat])) {
          $sql .= " AND c.slug = ? ";
          $params[] = $cat; $types .= 's';
        }
        $sql .= " ORDER BY p.created_at DESC";

        $stmt = $conn->prepare($sql);
        if (!empty($params)) $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $products = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        /* Helper định dạng tiền (nếu cần) */
        function price_cad($n) { return 'C$' . number_format((float)$n, 2); }
        ?>

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
                  <li><button class="filter-link<?= ($cat==='*'?' active':'') ?>" data-filter="*">All products</button></li>
                  <?php foreach ($cats as $slug => $row): ?>
                    <li>
                      <button class="filter-link<?= ($cat===$slug?' active':'') ?>"
                              data-filter="<?= htmlspecialchars($slug) ?>">
                        <?= htmlspecialchars($row['name']) ?>
                      </button>
                    </li>
                  <?php endforeach; ?>
                </ul>

              </div>
            </aside>

            <!-- Content -->
            <div class="col-lg-9">
              <!-- Green heading bar -->
              <div class="category-bar mb-4">
                <span id="categoryTitle">
                  <?= $cat === '*' ? 'ALL PRODUCTS'
                                  : (isset($cats[$cat]) ? strtoupper($cats[$cat]['name']) : 'ALL PRODUCTS') ?>
                </span>
              </div>

              <!-- Product grid (reuse your product-card) -->
              <div class="row g-4 gy-5 products-row" id="productGrid">
              <?php if (empty($products)): ?>
                <div class="col-12"><div class="alert alert-light border text-center">No products found.</div></div>
              <?php else: ?>
                <?php foreach ($products as $p): ?>
                  <div class="col-12 col-md-6 col-xl-4 product-col" data-category="<?= htmlspecialchars($p['slug']) ?>">
                    <div class="product-card">
                      <figure class="product-figure">
                        <img class="product-img" src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
                      </figure>
                      <div class="card-body text-center">
                        <h5 class="product-title"><?= htmlspecialchars($p['name']) ?></h5>

                        <?php if (!is_null($p['old_price']) && $p['old_price'] > 0): ?>
                          <div class="price-old"><?= price_cad($p['old_price']) ?></div>
                        <?php else: ?>
                          <div class="price-old" style="visibility:hidden">.</div>
                        <?php endif; ?>

                        <div class="price-new mb-2"><?= price_cad($p['price']) ?></div>

                        <?php if (!empty($p['shopee_url'])): ?>
                          <a href="<?= htmlspecialchars($p['shopee_url']) ?>" target="_blank" rel="noopener" class="btn btn-pill">See now</a>
                        <?php else: ?>
                          <button class="btn btn-pill" disabled>See now</button>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>

              </div>    
            </div>
          </div>
        </div>
      </section>
      <script>
        const TITLE = {
          '*': 'ALL PRODUCTS',
          <?php foreach ($cats as $slug=>$row): ?>
            '<?= $slug ?>': '<?= strtoupper($row["name"]) ?>',
          <?php endforeach; ?>
        };

        (() => {
          const titleEl = document.getElementById('categoryTitle');
          const gridRow = document.getElementById('productGrid');
          const buttons = document.querySelectorAll('.filter-link');
          const cards   = document.querySelectorAll('#productGrid .product-col');

          // lấy trực tiếp từ server (đã qua alias nếu có)
          let current = <?= json_encode($cat) ?>;
          if (!TITLE[current]) current = '*';

          function apply(cat){
            buttons.forEach(b => b.classList.toggle('active', b.dataset.filter===cat));
            let shown = 0;
            cards.forEach(c => {
              const show = (cat==='*' || c.dataset.category===cat);
              c.classList.toggle('d-none', !show);
              if (show) shown++;
            });
            titleEl.textContent = TITLE[cat] || TITLE['*'];
            gridRow.classList.toggle('justify-content-center', shown < 3);

            const url = new URL(window.location.href);
            if (cat==='*') url.searchParams.delete('cat'); else url.searchParams.set('cat', cat);
            history.replaceState(null, '', url);
          }

          apply(current);
          buttons.forEach(btn=>{
            btn.addEventListener('click', e=>{
              e.preventDefault();
              apply(btn.dataset.filter || '*');
            }, {passive:false});
          });
        })();
      </script>


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
