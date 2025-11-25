<?php
// /admin/login.php
session_start();
require __DIR__ . '/../includes/connect.php'; // dùng $conn (mysqli)

// nên đặt charset ngay sau khi kết nối
$conn->set_charset('utf8mb4');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = trim($_POST['username'] ?? '');
    $p = (string)($_POST['password'] ?? '');

    // Chuẩn bị câu lệnh
    $sql = "SELECT id, username, password_hash FROM users WHERE username = ? LIMIT 1";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('s', $u);
        $stmt->execute();
        $result = $stmt->get_result();
        $admin = $result->fetch_assoc();

        if ($admin && password_verify($p, $admin['password_hash'])) {
            $_SESSION['admin_id'] = (int)$admin['id'];
            $_SESSION['admin_name'] = $admin['username'];
            $stmt->close();
            $conn->close();
            header('Location: admin.php'); // chuyển đến dashboard
            exit;
        }

        // Sai thông tin
        $_SESSION['login_error'] = 'Invalid username or password';
        $stmt->close();
        $conn->close();
        header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/'));
        exit;
    } else {
        // Lỗi prepare (hiếm khi xảy ra)
        $_SESSION['login_error'] = 'System error. Please try again.';
        $conn->close();
        header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/'));
        exit;
    }
}

http_response_code(405);
echo 'Method Not Allowed';
