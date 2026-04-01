/**
 * Kocaman Group — ana script
 */
(function () {
	'use strict';

	var doc = document;
	var body = doc.body;
	var header = doc.getElementById('site-header');
	var navToggle = doc.getElementById('nav-toggle');
	var navWrap = doc.getElementById('primary-menu-wrap');
	var scrollProgress = doc.getElementById('scroll-progress');
	var scrollProgressWrap = doc.getElementById('scroll-progress-wrap');
	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	function onScroll() {
		var y = window.scrollY || window.pageYOffset;
		if (header) {
			header.classList.toggle('is-scrolled', y > 24);
			header.classList.toggle('is-scrolled-deep', y > 160);
		}
		if (scrollProgress) {
			var docEl = doc.documentElement;
			var total = docEl.scrollHeight - window.innerHeight;
			var pct = total > 0 ? Math.min(100, Math.round((y / total) * 100)) : 0;
			scrollProgress.style.width = pct + '%';
			if (scrollProgressWrap) {
				scrollProgressWrap.setAttribute('aria-valuenow', String(pct));
			}
		}
	}

	function initNav() {
		if (!navToggle || !navWrap) return;
		navToggle.addEventListener('click', function () {
			var open = navWrap.classList.toggle('is-open');
			navToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
			body.classList.toggle('nav-open', open);
		});
		doc.querySelectorAll('.site-header__menu a').forEach(function (a) {
			a.addEventListener('click', function () {
				navWrap.classList.remove('is-open');
				navToggle.setAttribute('aria-expanded', 'false');
				body.classList.remove('nav-open');
			});
		});
	}

	function smoothAnchors() {
		doc.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
			anchor.addEventListener('click', function (e) {
				var id = this.getAttribute('href');
				if (!id || id === '#') return;
				var target = doc.querySelector(id);
				if (target) {
					e.preventDefault();
					var headerH = header ? header.offsetHeight : 0;
				var extra = parseInt(doc.documentElement.getAttribute('data-scroll-offset') || '', 10) || 0;
				var top = target.getBoundingClientRect().top + window.pageYOffset - headerH - extra;
					window.scrollTo({ top: top, behavior: reduceMotion ? 'auto' : 'smooth' });
				}
			});
		});
	}

	function initReveal() {
		var els = doc.querySelectorAll('[data-reveal]');
		if (!els.length || reduceMotion) {
			els.forEach(function (el) {
				el.classList.add('is-visible');
			});
			return;
		}
		els.forEach(function (el) {
			var d = el.getAttribute('data-reveal-delay');
			if (d !== null && d !== '') {
				el.style.transitionDelay = parseInt(d, 10) + 'ms';
			}
		});
		var io = new IntersectionObserver(
			function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						entry.target.classList.add('is-visible');
						io.unobserve(entry.target);
					}
				});
			},
			{ root: null, rootMargin: '0px 0px -10% 0px', threshold: 0.08 }
		);
		els.forEach(function (el) {
			io.observe(el);
		});
	}

	function initScrollSpy() {
		var sections = doc.querySelectorAll('main section[id]');
		var links = doc.querySelectorAll('.site-header__menu a[href^="#"]');
		if (!sections.length || !links.length) return;
		var map = {};
		links.forEach(function (a) {
			var href = a.getAttribute('href');
			if (href && href.length > 1) {
				map[href.slice(1)] = a;
			}
		});
		var io = new IntersectionObserver(
			function (entries) {
				entries.forEach(function (entry) {
					if (!entry.isIntersecting) return;
					var active = map[entry.target.id];
					if (!active) return;
					links.forEach(function (a) {
						a.classList.remove('is-active');
					});
					active.classList.add('is-active');
				});
			},
			{ root: null, rootMargin: '-18% 0px -52% 0px', threshold: 0 }
		);
		sections.forEach(function (s) {
			if (s.id) {
				io.observe(s);
			}
		});
	}

	function animateCounter(el, target, suffix) {
		var duration = 1400;
		var start = 0;
		var startTime = null;
		function step(ts) {
			if (!startTime) startTime = ts;
			var p = Math.min((ts - startTime) / duration, 1);
			var eased = 1 - Math.pow(1 - p, 3);
			var current = Math.round(start + (target - start) * eased);
			el.textContent = current + (suffix || '');
			if (p < 1) {
				requestAnimationFrame(step);
			}
		}
		requestAnimationFrame(step);
	}

	function initCounters() {
		var section = doc.querySelector('[data-stats-section]');
		if (!section) return;
		var nums = section.querySelectorAll('[data-counter]');
		if (!nums.length) return;
		var done = false;
		function run() {
			if (done) return;
			done = true;
			nums.forEach(function (n) {
				var target = parseInt(n.getAttribute('data-target'), 10);
				var suffix = n.getAttribute('data-suffix') || '';
				if (!isNaN(target)) {
					animateCounter(n, target, suffix);
				}
			});
		}
		if (reduceMotion) {
			run();
			return;
		}
		var io = new IntersectionObserver(
			function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						run();
						io.disconnect();
					}
				});
			},
			{ threshold: 0.25 }
		);
		io.observe(section);
	}

	function initBrandTabs() {
		var shell = doc.querySelector('.brands__shell');
		if (!shell) return;
		var tabs = shell.querySelectorAll('[data-brand-tab]');
		var panels = shell.querySelectorAll('.brands__panel');
		tabs.forEach(function (tab) {
			tab.addEventListener('click', function () {
				var id = tab.getAttribute('data-brand-tab');
				tabs.forEach(function (t) {
					var on = t === tab;
					t.classList.toggle('is-active', on);
					t.setAttribute('aria-selected', on ? 'true' : 'false');
				});
				panels.forEach(function (p) {
					var on = p.id === 'panel-' + id;
					p.classList.toggle('is-active', on);
					if (on) {
						p.removeAttribute('hidden');
					} else {
						p.setAttribute('hidden', '');
					}
				});
			});
		});
	}

	function initHeroParallax() {
		var media = doc.querySelector('.hero__media');
		if (!media || reduceMotion) return;
		var ticking = false;
		function update() {
			var y = window.scrollY;
			var shift = Math.min(y * 0.35, 120);
			media.style.transform = 'translate3d(0, ' + shift + 'px, 0) scale(1.05)';
			ticking = false;
		}
		window.addEventListener(
			'scroll',
			function () {
				if (!ticking) {
					requestAnimationFrame(update);
					ticking = true;
				}
			},
			{ passive: true }
		);
	}

	window.addEventListener('scroll', onScroll, { passive: true });
	onScroll();
	initNav();
	smoothAnchors();
	initReveal();
	initCounters();
	initBrandTabs();
	initHeroParallax();
	initScrollSpy();
})();
