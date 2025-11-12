
(function(){
  'use strict';

  // Navbar shrink on scroll
  const navbar = document.getElementById('mainNavbar');
  const onScroll = () => (window.scrollY > 10) ? navbar.classList.add('scrolled') : navbar.classList.remove('scrolled');
  document.addEventListener('scroll', onScroll);
  onScroll();

  // Activate nav link based on current path
  const links = document.querySelectorAll('.navbar .nav-link');
  links.forEach(link => {
    const url = new URL(link.href, window.location.href);
    const current = window.location.pathname.split('/').pop() || 'index.html';
    if(url.pathname.endsWith(current)) link.classList.add('active');
  });

  // Simple filter without external libs
  function applyFilter(filter){
    const cards = document.querySelectorAll('.product-card');
    cards.forEach(card => {
      const cat = card.getAttribute('data-category');
      const show = (filter === '*' || filter === cat);
      card.style.display = show ? '' : 'none';
    });
  }
  document.querySelectorAll('.filter-btn')?.forEach(btn => {
    btn.addEventListener('click', e => {
      document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
      e.currentTarget.classList.add('active');
      applyFilter(e.currentTarget.getAttribute('data-filter'));
    });
  });

  // Bootstrap validation + mock submit
  const forms = document.querySelectorAll('form');
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      } else {
        event.preventDefault();
        const toastEl = document.getElementById('sentToast');
        if (toastEl) {
          const toast = new bootstrap.Toast(toastEl);
          toast.show();
        } else {
          alert('Đã gửi (mô phỏng). Hãy cấu hình backend/email thật.');
        }
        form.reset();
      }
      form.classList.add('was-validated');
    }, false);
  });

  // Smooth scroll for internal anchors (jQuery used here just to meet requirement if needed)
  $(document).on('click', 'a[href^="#"]', function(e){
    const target = document.querySelector(this.getAttribute('href'));
    if(target){
      e.preventDefault();
      window.scrollTo({ top: target.offsetTop - 72, behavior: 'smooth' });
    }
  });
})();
