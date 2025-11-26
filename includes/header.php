   <a class="visually-hidden-focusable" href="#main"
      >Bỏ qua nội dung điều hướng</a
    >
    <nav
      class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top py-2"
      id="mainNavbar"
     >
      <div class="container">
        <a
          class="navbar-brand fw-bold d-flex align-items-center"
          href="index.php"
        >
          <img
            src="assets/images/brand.png"
            alt="Eco Straws Vietnam"
            class="img-fluid"
            style="width: auto; height: 40px"
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNav"
          aria-controls="offcanvasNav"
          aria-label="Mở menu"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="offcanvas offcanvas-end"
          tabindex="-1"
          id="offcanvasNav"
          aria-labelledby="offcanvasNavLabel"
        >
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavLabel">Menu</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="offcanvas"
              aria-label="Đóng"
            ></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
            </ul>
              <div class="d-flex align-items-center ms-2">
              <button class="btn btn-link p-0 nav-user-btn" data-bs-toggle="modal" data-bs-target="#adminLoginModal"
                      aria-label="Admin login">
                <i class="bi bi-person-circle"></i>
              </button>
            </div>
         </div>
        </div>
      </div>
    </nav>
    <!-- Admin Login Modal -->
    <div class="modal fade" id="adminLoginModal" tabindex="-1" aria-labelledby="adminLoginLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
          <div class="modal-header">
            <h5 class="modal-title" id="adminLoginLabel">Admin sign-in</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form action="admin/login.php" method="post" autocomplete="on" novalidate>
            <div class="modal-body">
              <div class="mb-3">
                <label for="adminUser" class="form-label">Username</label>
                <input id="adminUser" name="username" type="text" class="form-control" required autofocus>
              </div>

              <div class="mb-2 position-relative">
                <label for="adminPass" class="form-label">Password</label>
                <input id="adminPass" name="password" type="password" class="form-control pe-5" required>
              </div>

              <div class="form-text">Only administrators can access the dashboard.</div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-success">Sign in</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      (function () {
        const btn = document.getElementById('togglePass');
        const input = document.getElementById('adminPass');
        if (btn && input) {
          btn.addEventListener('click', () => {
            const on = input.type === 'password';
            input.type = on ? 'text' : 'password';
            btn.firstElementChild.className = on ? 'bi bi-eye-slash' : 'bi bi-eye';
          });
        }
      })();
    </script>
    <script>
    window.addEventListener('DOMContentLoaded', function () {
      // gỡ trạng thái modal/offcanvas mở sẵn (nếu có)
      document.body.classList.remove('modal-open', 'offcanvas-open');
      document.querySelectorAll('.modal.show, .offcanvas.show').forEach(el => {
        el.classList.remove('show');
        el.style.removeProperty('display');
      });
      // xoá mọi backdrop đang tồn tại
      document.querySelectorAll('.modal-backdrop, .offcanvas-backdrop').forEach(el => el.remove());
      // khôi phục scroll nếu bị khoá
      document.body.style.removeProperty('overflow');
    });
    </script>


