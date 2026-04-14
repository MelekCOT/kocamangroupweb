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
			scrollProgress.style.height = pct + '%';
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

	function initCookieConsent() {
		var el = doc.getElementById('cookie-consent');
		if (!el) return;
		var key = el.getAttribute('data-storage-key') || 'kocaman_cookie_consent';
		var storage = null;
		try {
			storage = window.localStorage;
		} catch (e) {
			return;
		}
		if (storage.getItem(key)) {
			return;
		}
		el.removeAttribute('hidden');
		el.setAttribute('aria-hidden', 'false');
		doc.body.classList.add('cookie-consent-active');

		function dismiss(value) {
			try {
				storage.setItem(key, value);
			} catch (err) {}
			el.setAttribute('hidden', '');
			el.setAttribute('aria-hidden', 'true');
			doc.body.classList.remove('cookie-consent-active');
			window.dispatchEvent(new CustomEvent('kocamanCookieConsent', { detail: { value: value } }));
		}

		el.querySelectorAll('[data-cookie-choice]').forEach(function (btn) {
			btn.addEventListener('click', function () {
				var v = btn.getAttribute('data-cookie-choice');
				dismiss(v === 'accept' ? 'accepted' : 'rejected');
			});
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

	function initCustomCursor() {
		if (reduceMotion) return;
		if (!window.matchMedia('(pointer: fine)').matches) return;

		var wrap = doc.createElement('div');
		wrap.id = 'kg-cursor';
		wrap.setAttribute('aria-hidden', 'true');
		wrap.innerHTML =
			'<span class="kg-cursor__trail kg-cursor__trail--lag3"></span>' +
			'<span class="kg-cursor__trail kg-cursor__trail--lag2"></span>' +
			'<span class="kg-cursor__trail kg-cursor__trail--lag1"></span>' +
			'<span class="kg-cursor__dot"></span>';
		doc.body.appendChild(wrap);

		var dot = wrap.querySelector('.kg-cursor__dot');
		var lag1 = wrap.querySelector('.kg-cursor__trail--lag1');
		var lag2 = wrap.querySelector('.kg-cursor__trail--lag2');
		var lag3 = wrap.querySelector('.kg-cursor__trail--lag3');
		if (!dot || !lag1 || !lag2 || !lag3) return;

		doc.documentElement.classList.add('kg-cursor-active');

		var mx = 0;
		var my = 0;
		var cx = 0;
		var cy = 0;
		var t1x = 0;
		var t1y = 0;
		var t2x = 0;
		var t2y = 0;
		var t3x = 0;
		var t3y = 0;
		var ready = false;

		function lerp(a, b, t) {
			return a + (b - a) * t;
		}

		function setTransform(el, x, y) {
			el.style.transform = 'translate3d(' + x + 'px,' + y + 'px,0) translate(-50%,-50%)';
		}

		doc.addEventListener(
			'mousemove',
			function (e) {
				mx = e.clientX;
				my = e.clientY;
				if (!ready) {
					ready = true;
					cx = cy = t1x = t1y = t2x = t2y = t3x = t3y = mx;
					wrap.classList.add('is-ready');
				}
				var target = doc.elementFromPoint(mx, my);
				var hoverInteractive =
					target &&
					target.closest(
						'a[href], button:not(:disabled), [role="button"], .btn, input[type="submit"]:not(:disabled), input[type="button"]:not(:disabled), summary, select, label[for]'
					);
				var textField =
					target &&
					target.closest(
						'input[type="text"], input[type="email"], input[type="tel"], input[type="url"], input[type="search"], input[type="number"], input[type="password"], textarea, [contenteditable="true"]'
					);
				wrap.classList.toggle('kg-cursor--hover', !!(hoverInteractive && !textField));
				wrap.classList.toggle('kg-cursor--text', !!textField);
			},
			{ passive: true }
		);

		function tick() {
			if (ready) {
				cx = lerp(cx, mx, 0.32);
				cy = lerp(cy, my, 0.32);
				t1x = lerp(t1x, cx, 0.24);
				t1y = lerp(t1y, cy, 0.24);
				t2x = lerp(t2x, t1x, 0.2);
				t2y = lerp(t2y, t1y, 0.2);
				t3x = lerp(t3x, t2x, 0.17);
				t3y = lerp(t3y, t2y, 0.17);
				setTransform(lag3, t3x, t3y);
				setTransform(lag2, t2x, t2y);
				setTransform(lag1, t1x, t1y);
				setTransform(dot, cx, cy);
			}
			window.requestAnimationFrame(tick);
		}
		window.requestAnimationFrame(tick);
	}

	function initServiceGallery() {
		var roots = doc.querySelectorAll('[data-service-gallery]');
		if (!roots.length) return;

		roots.forEach(function (root) {
			var vp = root.querySelector('[data-gallery-viewport]');
			var prevBtn = root.querySelector('[data-gallery-prev]');
			var nextBtn = root.querySelector('[data-gallery-next]');
			var dotsWrap = root.querySelector('[data-gallery-dots]');
			if (!vp) return;

			var slides = vp.querySelectorAll('[data-gallery-slide]');
			var n = slides.length;
			if (n < 1) return;

			function step() {
				return Math.max(1, vp.clientWidth || 1);
			}

			function currentIndex() {
				var w = step();
				var i = Math.round(vp.scrollLeft / w);
				if (i < 0) i = 0;
				if (i > n - 1) i = n - 1;
				return i;
			}

			function goTo(i) {
				i = Math.max(0, Math.min(n - 1, i));
				var behavior = reduceMotion ? 'auto' : 'smooth';
				vp.scrollTo({ left: i * step(), behavior: behavior });
			}

			function syncDots() {
				if (!dotsWrap) return;
				var i = currentIndex();
				dotsWrap.querySelectorAll('[data-gallery-dot]').forEach(function (d) {
					var di = parseInt(d.getAttribute('data-gallery-dot'), 10);
					var on = di === i;
					d.classList.toggle('is-active', on);
					d.setAttribute('aria-current', on ? 'true' : 'false');
				});
			}

			if (prevBtn) {
				prevBtn.addEventListener('click', function () {
					goTo(currentIndex() - 1);
				});
			}
			if (nextBtn) {
				nextBtn.addEventListener('click', function () {
					goTo(currentIndex() + 1);
				});
			}

			if (dotsWrap) {
				dotsWrap.addEventListener('click', function (e) {
					var t = e.target.closest('[data-gallery-dot]');
					if (!t) return;
					var di = parseInt(t.getAttribute('data-gallery-dot'), 10);
					if (!isNaN(di)) goTo(di);
				});
			}

			vp.addEventListener(
				'scroll',
				function () {
					window.requestAnimationFrame(syncDots);
				},
				{ passive: true }
			);

			vp.addEventListener('keydown', function (e) {
				if (e.key === 'ArrowLeft') {
					e.preventDefault();
					goTo(currentIndex() - 1);
				} else if (e.key === 'ArrowRight') {
					e.preventDefault();
					goTo(currentIndex() + 1);
				}
			});

			var autoTimer = null;
			var galleryAutoMs = 3800;
			if (!reduceMotion && n > 1) {
				function tickAuto() {
					var cur = currentIndex();
					goTo(cur >= n - 1 ? 0 : cur + 1);
				}
				autoTimer = window.setInterval(tickAuto, galleryAutoMs);
				root.addEventListener('mouseenter', function () {
					if (autoTimer) {
						window.clearInterval(autoTimer);
						autoTimer = null;
					}
				});
				root.addEventListener('mouseleave', function () {
					if (!autoTimer) {
						autoTimer = window.setInterval(tickAuto, galleryAutoMs);
					}
				});
			}

			window.addEventListener('resize', function () {
				syncDots();
			});
			syncDots();
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
	initCookieConsent();
	initCustomCursor();
	initServiceGallery();
})();
