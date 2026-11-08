/**
 * Magic Code — Client Interactions & Professional UI Animations
 */
document.addEventListener('DOMContentLoaded', () => {
    // =========================================================================
    // 1. Reading Scroll Progress Bar
    // =========================================================================
    const progressBar = document.getElementById('scrollProgress');
    const updateProgressBar = () => {
        if (!progressBar) return;
        const totalHeight = document.documentElement.scrollHeight - window.innerHeight;
        if (totalHeight > 0) {
            const progress = (window.scrollY / totalHeight) * 100;
            progressBar.style.width = `${Math.min(100, Math.max(0, progress))}%`;
        }
    };

    // =========================================================================
    // 2. Header Scroll Effect & Back-to-Top Button
    // =========================================================================
    const header = document.getElementById('siteHeader');
    const backToTopBtn = document.getElementById('backToTopBtn');
    const floatingWhatsApp = document.getElementById('floatingWhatsApp');

    const handleWindowScroll = () => {
        const scrollY = window.scrollY;

        // Header glassmorphism on scroll
        if (header) {
            if (scrollY > 20) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }

        // Back to top button visibility
        if (backToTopBtn) {
            if (scrollY > 400) {
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.classList.remove('visible');
            }
        }

        // Update reading progress bar
        updateProgressBar();
    };

    window.addEventListener('scroll', handleWindowScroll, { passive: true });
    handleWindowScroll();

    if (backToTopBtn) {
        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // =========================================================================
    // 3. Mobile Navigation Toggle
    // =========================================================================
    const menuToggle = document.getElementById('menuToggle');
    const mobileNav = document.getElementById('mobileNav');

    if (menuToggle && mobileNav) {
        menuToggle.addEventListener('click', () => {
            const isOpen = mobileNav.classList.toggle('open');
            menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            mobileNav.setAttribute('aria-hidden', isOpen ? 'false' : 'true');
        });

        // Close on ESC key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && mobileNav.classList.contains('open')) {
                mobileNav.classList.remove('open');
                menuToggle.setAttribute('aria-expanded', 'false');
                mobileNav.setAttribute('aria-hidden', 'true');
                menuToggle.focus();
            }
        });

        // Close mobile nav when clicking a link
        mobileNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileNav.classList.remove('open');
                menuToggle.setAttribute('aria-expanded', 'false');
                mobileNav.setAttribute('aria-hidden', 'true');
            });
        });
    }

    // =========================================================================
    // 4. Interactive Spotlight Cursor Follower on Cards
    // =========================================================================
    const spotlightCards = document.querySelectorAll('.service-card, .project-card, .cta-box, .contact-card, .feature-list > div, .testimonial-card');
    spotlightCards.forEach(card => {
        card.classList.add('has-spotlight');
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
        });
    });

    // =========================================================================
    // 5. Scroll Reveal Animation via IntersectionObserver
    // =========================================================================
    if ('IntersectionObserver' in window) {
        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12,
            rootMargin: '0px 0px -40px 0px'
        });

        document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));
    } else {
        document.querySelectorAll('.reveal').forEach(el => el.classList.add('visible'));
    }

    // =========================================================================
    // 6. Animated Number Counters (Count-up)
    // =========================================================================
    const counterElements = document.querySelectorAll('.stats strong');
    if ('IntersectionObserver' in window && counterElements.length > 0) {
        const parseNumber = (text) => {
            const match = text.match(/[\d\s,.]+/);
            if (!match) return null;
            const cleanStr = match[0].replace(/\s/g, '').replace(',', '.');
            const num = parseFloat(cleanStr);
            return isNaN(num) ? null : num;
        };

        const counterObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const originalText = el.textContent.trim();
                    const targetNum = parseNumber(originalText);

                    if (targetNum !== null && targetNum > 0) {
                        const hasPlus = originalText.includes('+');
                        const hasPercent = originalText.includes('%');
                        const hasLessThan = originalText.includes('<');
                        const hasM = originalText.includes('M');
                        const isDecimal = originalText.includes('.');

                        let start = 0;
                        const duration = 1400;
                        const startTime = performance.now();

                        const animate = (currentTime) => {
                            const elapsed = currentTime - startTime;
                            const progress = Math.min(elapsed / duration, 1);
                            // Easing: easeOutExpo
                            const easeProgress = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);
                            const currentVal = start + (targetNum - start) * easeProgress;

                            let formatted = isDecimal ? currentVal.toFixed(1) : Math.floor(currentVal).toLocaleString('fr-FR');
                            if (hasLessThan) formatted = '< ' + formatted;
                            if (hasM) formatted += 'M';
                            if (hasPlus) formatted += '+';
                            if (hasPercent) formatted += '%';

                            el.textContent = formatted;

                            if (progress < 1) {
                                requestAnimationFrame(animate);
                            } else {
                                el.textContent = originalText;
                            }
                        };

                        requestAnimationFrame(animate);
                    }
                    observer.unobserve(el);
                }
            });
        }, { threshold: 0.4 });

        counterElements.forEach(el => counterObserver.observe(el));
    }

    // =========================================================================
    // 7. Interactive Portfolio Filters (Projects Page)
    // =========================================================================
    const filterBtns = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');

    if (filterBtns.length > 0 && portfolioItems.length > 0) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const filter = btn.getAttribute('data-filter');

                portfolioItems.forEach(item => {
                    const category = item.getAttribute('data-category') || '';
                    if (filter === 'all' || category.includes(filter)) {
                        item.style.display = 'grid';
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'translateY(0)';
                        }, 20);
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'translateY(15px)';
                        setTimeout(() => {
                            item.style.display = 'none';
                        }, 250);
                    }
                });
            });
        });
    }

    // =========================================================================
    // 8. FAQ Accordion (Expand / Collapse)
    // =========================================================================
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const questionBtn = item.querySelector('.faq-question');
        if (questionBtn) {
            questionBtn.addEventListener('click', () => {
                const isOpen = item.classList.contains('active');

                // Close all other accordion items
                faqItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                        const otherBtn = otherItem.querySelector('.faq-question');
                        if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
                    }
                });

                // Toggle current item
                if (isOpen) {
                    item.classList.remove('active');
                    questionBtn.setAttribute('aria-expanded', 'false');
                } else {
                    item.classList.add('active');
                    questionBtn.setAttribute('aria-expanded', 'true');
                }
            });
        }
    });

    // =========================================================================
    // 9. Toast Notification Helper
    // =========================================================================
    window.showMagicToast = (message) => {
        let toast = document.getElementById('magicToast');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'magicToast';
            toast.className = 'magic-toast';
            document.body.appendChild(toast);
        }
        toast.textContent = message;
        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3200);
    };

    // =========================================================================
    // 10. Smooth Anchor Scrolling with Header Offset
    // =========================================================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', (e) => {
            const href = anchor.getAttribute('href');
            if (href === '#' || href === '') return;

            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                const headerHeight = header ? header.offsetHeight : 80;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerHeight;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
});
