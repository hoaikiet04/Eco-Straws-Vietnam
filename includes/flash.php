<?php
// includes/flash.php   
$toasts = [];
if (!empty($_SESSION['lead_ok'])) {
  $toasts[] = [
    'type' => 'success',
    'title' => 'Submitted!',
    'msg' => 'Your request has been sent. We will contact you soon.',
    'icon' => 'bi-check-circle-fill'
  ];
}
if (!empty($_SESSION['lead_error'])) {
  $toasts[] = [
    'type' => 'danger',
    'title' => 'Oops!',
    'msg' => htmlspecialchars($_SESSION['lead_error']),
    'icon' => 'bi-exclamation-triangle-fill'
  ];
}

// clear once
unset($_SESSION['lead_ok'], $_SESSION['lead_error']);

if ($toasts):
?>
  <!-- Toast container -->
  <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1080">
    <?php foreach ($toasts as $t): ?>
      <div class="toast text-bg-<?= $t['type'] ?> border-0 shadow-lg mb-2"
           role="alert" aria-live="assertive" aria-atomic="true"
           data-bs-delay="4500">
        <div class="toast-header border-0">
          <i class="bi <?= $t['icon'] ?> me-2 text-<?= $t['type'] ?>"></i>
          <strong class="me-auto"><?= $t['title'] ?></strong>
          <small>just now</small>
          <button type="button" class="btn-close ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          <?= $t['msg'] ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <script>
    // Tự động show tất cả toast
    document.addEventListener('DOMContentLoaded', () => {
      const list = document.querySelectorAll('.toast');
      list.forEach(el => new bootstrap.Toast(el).show());
    });
  </script>
<?php endif; ?>
