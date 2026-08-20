(function () {
  'use strict';

  /* ---- Nav scroll effect ---- */
  var nav = document.querySelector('.nav');
  var navThreshold = 80;

  function handleNavScroll() {
    if (window.scrollY > navThreshold) {
      nav.classList.add('nav--scrolled');
    } else {
      nav.classList.remove('nav--scrolled');
    }
  }

  window.addEventListener('scroll', handleNavScroll, { passive: true });
  handleNavScroll();

  /* ---- Mobile hamburger ---- */
  var hamburger = document.querySelector('.nav-hamburger');
  var navList = document.querySelector('.nav-list');

  if (hamburger && navList) {
    hamburger.addEventListener('click', function () {
      hamburger.classList.toggle('active');
      navList.classList.toggle('open');
      document.body.style.overflow = navList.classList.contains('open') ? 'hidden' : '';
    });

    navList.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        hamburger.classList.remove('active');
        navList.classList.remove('open');
        document.body.style.overflow = '';
      });
    });
  }

  /* ---- Scroll reveal (Intersection Observer) ---- */
  var revealElements = document.querySelectorAll('.fade-in, .fade-in-up');

  if (revealElements.length > 0) {
    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1, rootMargin: '0px 0px -50px 0px' }
    );

    revealElements.forEach(function (el) {
      observer.observe(el);
    });
  }

  /* ---- Tabs ---- */
  var tabGroups = document.querySelectorAll('[data-tabs]');

  tabGroups.forEach(function (group) {
    var btns = group.querySelectorAll('.tab-btn');
    var panels = group.querySelectorAll('.tab-panel');

    btns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var target = btn.getAttribute('data-tab');

        btns.forEach(function (b) { b.classList.remove('active'); });
        panels.forEach(function (p) { p.classList.remove('active'); });

        btn.classList.add('active');

        var targetPanel = group.querySelector('.tab-panel[data-panel="' + target + '"]');
        if (targetPanel) targetPanel.classList.add('active');
      });
    });
  });

  /* ---- Accordion ---- */
  var accordionHeaders = document.querySelectorAll('.accordion-header');

  accordionHeaders.forEach(function (header) {
    header.addEventListener('click', function () {
      var item = header.closest('.accordion-item');
      if (item) {
        item.classList.toggle('active');
      }
    });
  });

  /* ---- Lightbox ---- */
  var lightbox = document.getElementById('lightbox');
  var lightboxImg = lightbox ? lightbox.querySelector('img') : null;

  if (lightbox && lightboxImg) {
    document.addEventListener('click', function (e) {
      var trigger = e.target.closest('[data-lightbox]');
      if (trigger) {
        e.preventDefault();
        var src = trigger.getAttribute('data-lightbox') || trigger.getAttribute('src');
        if (src) {
          lightboxImg.setAttribute('src', src);
          lightboxImg.setAttribute('alt', trigger.getAttribute('alt') || '');
          lightbox.classList.add('active');
          document.body.style.overflow = 'hidden';
        }
      }
    });

    lightbox.addEventListener('click', function (e) {
      if (e.target === lightbox || e.target.classList.contains('lightbox-close')) {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
      }
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && lightbox.classList.contains('active')) {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
      }
    });
  }

  /* ---- Stat counter animation ---- */
  var statNumbers = document.querySelectorAll('.stat-number');

  statNumbers.forEach(function (el) {
    var value = parseInt(el.getAttribute('data-count'), 10);
    if (isNaN(value)) return;

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            animateCounter(el, value);
            observer.unobserve(el);
          }
        });
      },
      { threshold: 0.5 }
    );

    observer.observe(el);
  });

  function animateCounter(el, target) {
    var duration = 1500;
    var start = performance.now();

    function step(now) {
      var elapsed = now - start;
      var progress = Math.min(elapsed / duration, 1);
      var eased = 1 - Math.pow(1 - progress, 3);
      var current = Math.round(eased * target);
      el.textContent = current;

      if (progress < 1) {
        requestAnimationFrame(step);
      } else {
        el.textContent = target;
      }
    }

    requestAnimationFrame(step);
  }

  /* ---- Hero slider ---- */
  var slides = document.querySelectorAll('.hero-slide');
  var dots = document.querySelectorAll('.hero-dot');
  var heroSubtitle = document.querySelector('.hero-subtitle');
  var heroTagline = document.querySelector('.hero-tagline');
  var currentSlide = 0;
  var slideTimer = null;
  var SLIDE_INTERVAL = 6000;

  function goToSlide(index) {
    if (slides.length === 0) return;
    currentSlide = (index + slides.length) % slides.length;

    slides.forEach(function (s, i) {
      s.classList.toggle('active', i === currentSlide);
    });
    dots.forEach(function (d, i) {
      d.classList.toggle('active', i === currentSlide);
    });

    var slide = slides[currentSlide];
    if (heroSubtitle && slide.getAttribute('data-judul')) {
      heroSubtitle.textContent = slide.getAttribute('data-judul');
    }
    if (heroTagline && slide.getAttribute('data-deskripsi')) {
      heroTagline.textContent = slide.getAttribute('data-deskripsi');
    }
  }

  function nextSlide() {
    goToSlide(currentSlide + 1);
  }

  function startSlider() {
    if (slides.length > 1) {
      slideTimer = setInterval(nextSlide, SLIDE_INTERVAL);
    }
  }

  if (slides.length > 0) {
    dots.forEach(function (dot, i) {
      dot.addEventListener('click', function () {
        goToSlide(i);
        clearInterval(slideTimer);
        startSlider();
      });
    });

    startSlider();
  }

})();
