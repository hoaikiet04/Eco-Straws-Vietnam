<?php
// admin/products.php
include "../includes/connect.php";

// Fetch categories
$categories = [];
$resCats = $conn->query("SELECT id, name FROM categories ORDER BY id ASC");
if ($resCats) {
    while ($row = $resCats->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Helper: format currency CAD
function formatCad($value): string {
    $num = (float)$value;
    return 'C$' . number_format($num, 2, '.', ',');
}

// Helper: convert stored image path to web URL
function buildImageUrl(string $path): string {
    $path = trim($path);
    if ($path === '') return '';

    // If it's a Windows absolute path, cut from "assets\..."
    if (preg_match('/^[A-Za-z]:\\\\/', $path)) {
        $pos = stripos($path, 'assets\\');
        if ($pos !== false) {
            $sub = substr($path, $pos);           // e.g. assets\images\products\...
            $sub = str_replace('\\', '/', $sub);  // to web slashes
            return '../' . $sub;
        } else {
            // Fallback: just strip drive and xampp root if possible
            $path = str_replace('\\', '/', $path);
            $pos2 = stripos($path, 'assets/');
            if ($pos2 !== false) {
                $sub = substr($path, $pos2);
                return '../' . $sub;
            }
            return '';
        }
    }

    // If starts with "assets/" → assume project root
    if (strpos($path, 'assets/') === 0) {
        return '../' . $path;
    }

    // Otherwise return as-is (you can store proper web URL if muốn)
    return $path;
}

// Filter by category
$currentCategoryId = isset($_GET['category']) && $_GET['category'] !== ''
    ? (int)$_GET['category']
    : null;

// Handle add / edit / delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        $name        = trim($_POST['name'] ?? '');
        $category_id = (int)($_POST['category_id'] ?? 0);
        $price       = trim($_POST['price'] ?? '');
        $old_price   = trim($_POST['old_price'] ?? '');
        $image       = trim($_POST['image'] ?? '');
        $shopee_url  = trim($_POST['shopee_url'] ?? '');
        $status      = isset($_POST['status']) ? 1 : 0;

        if ($name && $category_id && $price !== '' && $image) {
            $sql = "INSERT INTO products (category_id, name, price, old_price, image, shopee_url, status)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $old_price_param = $old_price !== '' ? $old_price : null;
                $shopee_param    = $shopee_url !== '' ? $shopee_url : null;
                $stmt->bind_param(
                    "isssssi",
                    $category_id,
                    $name,
                    $price,
                    $old_price_param,
                    $image,
                    $shopee_param,
                    $status
                );
                $stmt->execute();
                $stmt->close();
            }
        }

        header("Location: products.php");
        exit;
    }

    if ($action === 'edit') {
        $id          = (int)($_POST['id'] ?? 0);
        $name        = trim($_POST['name'] ?? '');
        $category_id = (int)($_POST['category_id'] ?? 0);
        $price       = trim($_POST['price'] ?? '');
        $old_price   = trim($_POST['old_price'] ?? '');
        $image       = trim($_POST['image'] ?? '');
        $shopee_url  = trim($_POST['shopee_url'] ?? '');
        $status      = isset($_POST['status']) ? 1 : 0;

        if ($id && $name && $category_id && $price !== '' && $image) {
            $sql = "UPDATE products
                    SET category_id = ?, name = ?, price = ?, old_price = ?, image = ?, shopee_url = ?, status = ?
                    WHERE id = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $old_price_param = $old_price !== '' ? $old_price : null;
                $shopee_param    = $shopee_url !== '' ? $shopee_url : null;
                $stmt->bind_param(
                    "isssssii",
                    $category_id,
                    $name,
                    $price,
                    $old_price_param,
                    $image,
                    $shopee_param,
                    $status,
                    $id
                );
                $stmt->execute();
                $stmt->close();
            }
        }

        header("Location: products.php");
        exit;
    }

    if ($action === 'delete') {
        $id = (int)($_POST['id'] ?? 0);
        if ($id) {
            $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
            if ($stmt) {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->close();
            }
        }
        header("Location: products.php");
        exit;
    }
}

// Fetch products (order by ID DESC)
$products = [];
if ($currentCategoryId) {
    $sql = "SELECT p.*, c.name AS category_name
            FROM products p
            JOIN categories c ON p.category_id = c.id
            WHERE p.category_id = ?
            ORDER BY p.id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $currentCategoryId);
    $stmt->execute();
    $res = $stmt->get_result();
} else {
    $sql = "SELECT p.*, c.name AS category_name
            FROM products p
            JOIN categories c ON p.category_id = c.id
            ORDER BY p.id DESC";
    $res = $conn->query($sql);
}
if ($res) {
    while ($row = $res->fetch_assoc()) {
        $products[] = $row;
    }
}

// If editing a product
$editProduct = null;
if (isset($_GET['edit_id'])) {
    $editId = (int)$_GET['edit_id'];
    if ($editId) {
        $stmt = $conn->prepare("
            SELECT p.*, c.name AS category_name
            FROM products p
            JOIN categories c ON p.category_id = c.id
            WHERE p.id = ?
        ");
        $stmt->bind_param("i", $editId);
        $stmt->execute();
        $editRes = $stmt->get_result();
        $editProduct = $editRes->fetch_assoc();
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --main-color: #69c167;
            --main-color-dark: #4ba550;
        }

        body {
            background-color: #f4f5f7;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        /* NAVBAR */
        .admin-navbar {
            background: linear-gradient(90deg, var(--main-color), var(--main-color-dark));
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
        }

        .admin-navbar .navbar-brand {
            font-weight: 600;
            letter-spacing: 0.03em;
        }

        .brand-logo-img {
            height: 32px;
            width: auto;
            object-fit: contain;
            filter: drop-shadow(0 0 4px rgba(0,0,0,0.4));
        }

        .brand-title {
            font-size: 15px;
            line-height: 1.1;
        }

        .brand-sub {
            font-size: 11px;
            opacity: 0.9;
        }

        .admin-navbar .nav-link {
            font-size: 14px;
            font-weight: 500;
            padding: 0.45rem 0.9rem;
            border-radius: 999px;
            transition: background-color 0.2s ease, color 0.2s ease, transform 0.1s ease;
        }

        .admin-navbar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.12);
            transform: translateY(-1px);
        }

        .admin-navbar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.22);
            color: #ffffff !important;
        }

        .admin-navbar .btn-logout {
            border-radius: 999px;
            font-size: 13px;
            padding-inline: 14px;
            border-color: rgba(255, 255, 255, 0.65);
        }

        .admin-navbar .btn-logout:hover {
            background-color: #ffffff;
            color: var(--main-color-dark);
        }

        .page-wrapper {
            max-width: 1300px;
            margin: 24px auto;
        }

        .bg-main {
            background-color: var(--main-color) !important;
        }

        .btn-main {
            background-color: var(--main-color);
            border-color: var(--main-color);
            color: #fff;
        }

        .btn-main:hover {
            opacity: 0.9;
            color: #fff;
        }

        .product-card img {
            object-fit: contain;
            height: 160px;
        }
    </style>


</head>
<body>

<?php
    $currentFile = basename($_SERVER['PHP_SELF']); // admin.php, products.php
?>

    <nav class="navbar navbar-expand-lg navbar-dark admin-navbar">
        <div class="container-fluid container-lg">
            <a class="navbar-brand d-flex align-items-center gap-2" href="admin.php">
                <img src="../assets/images/logo.png"
                    alt="ECOSTRAWS VIETNAM"
                    class="brand-logo-img">
                <span>
                    <span class="brand-title d-block">ECOSTRAWS VIETNAM</span>
                    <span class="brand-sub d-block">Admin Dashboard</span>
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#adminNavbarCollapse" aria-controls="adminNavbarCollapse"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="adminNavbarCollapse">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item">
                        <a class="nav-link <?= $currentFile === 'admin.php' ? 'active' : '' ?>"
                        href="admin.php">
                            Messages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentFile === 'products.php' ? 'active' : '' ?>"
                        href="products.php">
                            Products
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a href="../index.php" class="btn btn-sm btn-outline-light btn-logout">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



<div class="page-wrapper px-3 px-md-0">
    <div class="row g-3">
        <!-- Form add / edit -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        <?= $editProduct ? "Edit Product #".htmlspecialchars($editProduct['id']) : "Add New Product" ?>
                    </h5>
                </div>
                <div class="card-body">
                    <form method="post">
                        <?php if ($editProduct): ?>
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($editProduct['id']) ?>">
                        <?php else: ?>
                            <input type="hidden" name="action" value="add">
                        <?php endif; ?>

                        <div class="mb-3">
                            <label class="form-label">Product name</label>
                            <input type="text" name="name" class="form-control" required
                                   value="<?= $editProduct ? htmlspecialchars($editProduct['name']) : '' ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">-- Select category --</option>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= $cat['id'] ?>"
                                        <?= $editProduct && $cat['id'] == $editProduct['category_id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($cat['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price (CAD)</label>
                            <input type="number" name="price" class="form-control"
                                   step="0.01" min="0" required
                                   value="<?= $editProduct ? htmlspecialchars($editProduct['price']) : '' ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Old price (optional)</label>
                            <input type="number" name="old_price" class="form-control"
                                   step="0.01" min="0"
                                   value="<?= $editProduct ? htmlspecialchars($editProduct['old_price']) : '' ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image path</label>
                            <input type="text" name="image" class="form-control" required
                                   placeholder="assets/images/products/..."
                                   value="<?= $editProduct ? htmlspecialchars($editProduct['image']) : '' ?>">
                            <div class="form-text">
                                Store relative path like <code>assets/images/products/...</code>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Shopee URL (optional)</label>
                            <input type="text" name="shopee_url" class="form-control"
                                   placeholder="https://shopee.vn/..."
                                   value="<?= $editProduct ? htmlspecialchars($editProduct['shopee_url']) : '' ?>">
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox"
                                   name="status" id="statusCheck"
                                <?= $editProduct ? ($editProduct['status'] ? 'checked' : '') : 'checked' ?>>
                            <label class="form-check-label" for="statusCheck">
                                Active (visible on site)
                            </label>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-main">
                                <?= $editProduct ? "Save changes" : "Add product" ?>
                            </button>
                            <?php if ($editProduct): ?>
                                <a href="products.php" class="btn btn-outline-secondary">
                                    Cancel
                                </a>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Products grid -->
        <div class="col-lg-8">
            <div class="card shadow-sm mb-3">
                <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <div>
                        <strong><?= count($products) ?></strong> products
                    </div>
                    <form method="get" class="d-flex align-items-center gap-2">
                        <select name="category" class="form-select form-select-sm"
                                onchange="this.form.submit()">
                            <option value="">All categories</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= $cat['id'] ?>"
                                    <?= $currentCategoryId == $cat['id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($cat['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if ($currentCategoryId): ?>
                            <a href="products.php" class="btn btn-sm btn-outline-secondary">
                                Clear
                            </a>
                        <?php endif; ?>
                    </form>
                </div>
            </div>

            <?php if (empty($products)): ?>
                <div class="alert alert-info">No products found.</div>
            <?php else: ?>
                <div class="row g-3">
                    <?php foreach ($products as $product): ?>
                        <?php $imageUrl = buildImageUrl($product['image']); ?>
                        <div class="col-md-6 col-xl-4">
                            <div class="card product-card h-100 shadow-sm">
                                <div class="card-img-top d-flex justify-content-center align-items-center bg-white border-bottom" style="min-height: 170px;">
                                    <?php if ($imageUrl): ?>
                                        <img src="<?= htmlspecialchars($imageUrl) ?>"
                                            alt="<?= htmlspecialchars($product['name']) ?>"
                                            class="img-fluid p-2">
                                    <?php else: ?>
                                        <div class="text-muted small p-3 text-center w-100">
                                            Image not available
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title mb-1">
                                        <?= htmlspecialchars($product['name']) ?>
                                    </h6>
                                    <div class="text-muted small mb-1">
                                        <?= htmlspecialchars($product['category_name']) ?>
                                    </div>
                                    <div class="mb-1">
                                        <span class="fw-semibold" style="color:#69c167;">
                                            <?= formatCad($product['price']) ?>
                                        </span>
                                        <?php if (!is_null($product['old_price'])): ?>
                                            <span class="text-muted text-decoration-line-through ms-1 small">
                                                <?= formatCad($product['old_price']) ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-2">
                                        <?php if ($product['status']): ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Hidden</span>
                                        <?php endif; ?>
                                        <?php if ($product['shopee_url']): ?>
                                            <a href="<?= htmlspecialchars($product['shopee_url']) ?>"
                                            target="_blank"
                                            class="small ms-2 text-decoration-none"
                                            style="color:#69c167;">
                                                Shopee
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <small class="text-muted mb-2">
                                        Created: <?= htmlspecialchars($product['created_at']) ?>
                                    </small>
                                    <div class="mt-auto d-flex justify-content-between">
                                        <a href="products.php?edit_id=<?= $product['id'] ?>"
                                        class="btn btn-sm btn-outline-secondary">
                                            Edit
                                        </a>
                                        <form method="post"
                                            onsubmit="return confirm('Delete this product?');">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Bootstrap JS bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
