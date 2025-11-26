<?php
// admin/index.php
include "../includes/connect.php";

// Handle "mark as read"
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['seen_ids']) && is_array($_POST['seen_ids'])) {
        $seenIds = array_map('intval', $_POST['seen_ids']);

        $stmt = $conn->prepare("UPDATE leads SET status = 'seen' WHERE id = ? AND status = 'new'");
        if ($stmt) {
            foreach ($seenIds as $id) {
                $stmt->bind_param("i", $id);
                $stmt->execute();
            }
            $stmt->close();
        }
    }

    // Stay on admin leads page, just reload
    header("Location: admin.php");
    exit;
}

// Fetch leads, order by ID DESC
$sql = "SELECT * FROM leads ORDER BY id DESC";
$result = $conn->query($sql);
$leads = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $leads[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Leads</title>
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
            max-width: 1200px;
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

        .badge-new {
            background-color: #e0f2fe;
            color: #0369a1;
        }
        .badge-seen {
            background-color: #fef9c3;
            color: #854d0e;
        }
        .badge-done {
            background-color: #dcfce7;
            color: #15803d;
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



<div class="page-wrapper">
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0">Leads Management</h5>
                <small class="text-muted">Check “Read” and click Save to update status.</small>
            </div>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-light">
                        <tr>
                            <th scope="col" style="width:60px;">ID</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Business</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col" style="min-width:220px;">Message</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center" style="width:80px;">Read</th>
                            <th scope="col" style="width:160px;">Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (empty($leads)): ?>
                            <tr>
                                <td colspan="9" class="text-center py-3">
                                    No leads yet.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($leads as $lead): ?>
                                <?php
                                $status = $lead['status'];
                                $badgeClass = 'badge-new';
                                if ($status === 'seen') $badgeClass = 'badge-seen';
                                if ($status === 'done') $badgeClass = 'badge-done';

                                $isRead = $status !== 'new';
                                ?>
                                <tr>
                                    <td><?= htmlspecialchars($lead['id']) ?></td>
                                    <td><?= htmlspecialchars($lead['full_name']) ?></td>
                                    <td><?= htmlspecialchars($lead['business']) ?></td>
                                    <td><?= htmlspecialchars($lead['phone']) ?></td>
                                    <td><?= htmlspecialchars($lead['email']) ?></td>
                                    <td><?= nl2br(htmlspecialchars($lead['message'])) ?></td>
                                    <td>
                                        <span class="badge <?= $badgeClass ?>">
                                            <?= htmlspecialchars($status) ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($isRead): ?>
                                            <input class="form-check-input" type="checkbox" checked disabled>
                                        <?php else: ?>
                                            <input class="form-check-input" type="checkbox"
                                                   name="seen_ids[]" value="<?= $lead['id'] ?>">
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            <?= htmlspecialchars($lead['created_at']) ?>
                                        </small>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if (!empty($leads)): ?>
                    <button type="submit" class="btn btn-main mt-2">
                        Save read status
                    </button>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
