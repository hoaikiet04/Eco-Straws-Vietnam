<?php
// lead-submit.php
session_start();
require __DIR__ . '/includes/connect.php';   // $conn (mysqli)
$conn->set_charset('utf8mb4');

/**
 * Redirect về đúng trang đã gửi form (dựa vào HTTP_REFERER).
 * Giữ nguyên query string, và gắn anchor hợp lý.
 */
function back_to_referrer($ok = null, $err = null) {
    if ($ok)  $_SESSION['lead_ok']    = 1;
    if ($err) $_SESSION['lead_error'] = $err;

    // base path của project (đổi nếu thư mục của bạn khác)
    $base = '/ecostraws_bootstrap/';

    $ref = $_SERVER['HTTP_REFERER'] ?? '';
    $path = parse_url($ref, PHP_URL_PATH) ?? '';
    $query = parse_url($ref, PHP_URL_QUERY);
    $qs = $query ? ('?' . $query) : '';

    // Chỉ cho phép quay lại đường dẫn nội bộ thuộc project để tránh open-redirect
    if (strpos($path, $base) !== 0) {
        $path = $base . 'index.php';
    }

    // Chọn anchor theo trang
    if (strpos($path, 'contact.php') !== false) {
        $anchor = '#contactForm';
    } elseif (strpos($path, 'index.php') !== false) {
        $anchor = '#lead';
    } else {
        // fallback
        $anchor = '';
    }

    header('Location: ' . $path . $qs . $anchor);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Method Not Allowed';
    exit;
}

// Honeypot
if (!empty($_POST['website'] ?? '')) {
    back_to_referrer(null, 'Spam detected.');
}

$full_name = trim($_POST['full_name'] ?? '');
$business  = trim($_POST['business']  ?? '');
$phone     = trim($_POST['phone']     ?? '');
$email     = trim($_POST['email']     ?? '');
$message   = trim($_POST['message']   ?? '');

if ($full_name === '' || $phone === '' || $email === '') {
    back_to_referrer(null, 'Please fill in required fields.');
}

$sql = "INSERT INTO leads (full_name, business, phone, email, message)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    back_to_referrer(null, 'System error. Please try again later.');
}
$stmt->bind_param('sssss', $full_name, $business, $phone, $email, $message);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    back_to_referrer(1, null);
}

$stmt->close();
$conn->close();
back_to_referrer(null, 'Could not save your request. Try again later.');
