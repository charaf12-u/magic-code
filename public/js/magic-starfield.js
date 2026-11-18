// =========================================================================
// MAGIC CODE — REFINED AMBIENT STARFIELD & MAGICAL WAND FOLLOWER
// High-End Luxury Dark Cosmos (Smooth 60fps, No UI Blocking, No Latency)
// =========================================================================

(function () {
    'use strict';

    // Guard for reduced motion preference
    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    var canvas = document.getElementById('magicStarfield');
    if (!canvas) return;

    var ctx = canvas.getContext('2d');
    if (!ctx) return;

    // ── Device & Performance Scaling ────────────────────────────────────────
    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    var width = window.innerWidth;
    var height = window.innerHeight;

    function resize() {
        width = window.innerWidth;
        height = window.innerHeight;
        canvas.width = width * dpr;
        canvas.height = height * dpr;
        canvas.style.width = width + 'px';
        canvas.style.height = height + 'px';
        ctx.scale(dpr, dpr);
    }
    resize();
    window.addEventListener('resize', resize, { passive: true });

    // ── Starfield Palette & Particles ───────────────────────────────────────
    var STAR_COUNT = Math.min(130, Math.floor((width * height) / 9000));
    var stars = [];
    var shootingStars = [];

    // Ambient mouse coordinates
    var mouse = {
        x: width / 2,
        y: height / 2,
        targetX: width / 2,
        targetY: height / 2,
        hasMoved: false
    };

    // ── Floating Magical Cursor Particle ────────────────────────────────────
    var cursorStar = document.getElementById('magic-cursor-star');
    if (!cursorStar) {
        cursorStar = document.createElement('div');
        cursorStar.id = 'magic-cursor-star';
        cursorStar.setAttribute('aria-hidden', 'true');
        document.body.appendChild(cursorStar);
    }

    // Star Class
    function Star() {
        this.reset(true);
    }

    Star.prototype.reset = function (initial) {
        this.x = Math.random() * width;
        this.y = initial ? Math.random() * height : -10;
        this.size = Math.random() * 1.2 + 0.6; // 0.6px to 1.8px
        this.baseAlpha = Math.random() * 0.5 + 0.2;
        this.alpha = this.baseAlpha;
        this.twinkleSpeed = Math.random() * 0.02 + 0.008;
        this.twinkleDir = Math.random() > 0.5 ? 1 : -1;
        this.vx = (Math.random() - 0.5) * 0.15;
        this.vy = Math.random() * 0.25 + 0.08; // slow downwards cosmic drift
        // Color tint: 70% diamond white, 15% warm orange, 15% electric green
        var r = Math.random();
        if (r > 0.85) {
            this.colorType = 'green';
        } else if (r > 0.70) {
            this.colorType = 'orange';
        } else {
            this.colorType = 'white';
        }
    };

    Star.prototype.update = function () {
        this.x += this.vx;
        this.y += this.vy;

        // Subtle twinkling
        this.alpha += this.twinkleSpeed * this.twinkleDir;
        if (this.alpha > this.baseAlpha + 0.25 || this.alpha > 0.9) {
            this.twinkleDir = -1;
        } else if (this.alpha < this.baseAlpha - 0.2 || this.alpha < 0.1) {
            this.twinkleDir = 1;
        }

        // Gentle magnetic sway when cursor passes near (non-intrusive)
        if (mouse.hasMoved) {
            var dx = mouse.x - this.x;
            var dy = mouse.y - this.y;
            var dist = Math.sqrt(dx * dx + dy * dy);
            if (dist < 120 && dist > 1) {
                var force = (120 - dist) / 120 * 0.6;
                this.x += (dx / dist) * force;
                this.y += (dy / dist) * force;
            }
        }

        // Wrap boundaries
        if (this.y > height + 10) this.reset(false);
        if (this.x < -10) this.x = width + 10;
        if (this.x > width + 10) this.x = -10;
    };

    Star.prototype.draw = function () {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        var a = Math.max(0, Math.min(1, this.alpha));
        if (this.colorType === 'green') {
            ctx.fillStyle = 'rgba(53, 213, 31, ' + (a * 0.9) + ')';
        } else if (this.colorType === 'orange') {
            ctx.fillStyle = 'rgba(255, 120, 20, ' + (a * 0.9) + ')';
        } else {
            ctx.fillStyle = 'rgba(255, 255, 255, ' + a + ')';
        }
        ctx.fill();
    };

    // Shooting Star Class (Rare & Elegant)
    function ShootingStar() {
        this.reset();
    }

    ShootingStar.prototype.reset = function () {
        this.x = Math.random() * (width * 0.8) + (width * 0.2);
        this.y = Math.random() * (height * 0.4);
        this.len = Math.random() * 80 + 70;
        this.speed = Math.random() * 12 + 10;
        this.angle = Math.PI / 4 + (Math.random() - 0.5) * 0.2; // roughly 45 deg downwards
        this.vx = -Math.cos(this.angle) * this.speed;
        this.vy = Math.sin(this.angle) * this.speed;
        this.alpha = 1;
        this.decay = Math.random() * 0.02 + 0.015;
    };

    ShootingStar.prototype.update = function () {
        this.x += this.vx;
        this.y += this.vy;
        this.alpha -= this.decay;
    };

    ShootingStar.prototype.draw = function () {
        if (this.alpha <= 0) return;
        var tailX = this.x - Math.cos(this.angle) * -this.len;
        var tailY = this.y - Math.sin(this.angle) * this.len;

        var grad = ctx.createLinearGradient(this.x, this.y, tailX, tailY);
        grad.addColorStop(0, 'rgba(255, 255, 255, ' + this.alpha + ')');
        grad.addColorStop(0.35, 'rgba(255, 106, 0, ' + (this.alpha * 0.85) + ')');
        grad.addColorStop(0.70, 'rgba(53, 213, 31, ' + (this.alpha * 0.75) + ')');
        grad.addColorStop(1, 'rgba(53, 213, 31, 0)');

        ctx.strokeStyle = grad;
        ctx.lineWidth = 1.5;
        ctx.beginPath();
        ctx.moveTo(this.x, this.y);
        ctx.lineTo(tailX, tailY);
        ctx.stroke();
    };

    // Initialize stars
    for (var i = 0; i < STAR_COUNT; i++) {
        stars.push(new Star());
    }

    // Rare shooting star timer
    var lastShootingStarTime = Date.now();
    var nextShootingStarInterval = 8000 + Math.random() * 10000;

    // ── Mouse Listeners ─────────────────────────────────────────────────────
    document.addEventListener('mousemove', function (e) {
        mouse.targetX = e.clientX;
        mouse.targetY = e.clientY;
        if (!mouse.hasMoved) {
            mouse.x = e.clientX;
            mouse.y = e.clientY;
            mouse.hasMoved = true;
            cursorStar.style.opacity = '1';
        }
    }, { passive: true });

    document.addEventListener('mouseleave', function () {
        cursorStar.style.opacity = '0';
    });

    document.addEventListener('mouseenter', function () {
        if (mouse.hasMoved) cursorStar.style.opacity = '1';
    });

    // Hover interactive elements
    document.addEventListener('mouseover', function (e) {
        if (e.target && e.target.closest('a, button, input, textarea, select, .btn, .filter-btn, [role="button"]')) {
            cursorStar.classList.add('magic-cursor--hover');
        }
    }, { passive: true });

    document.addEventListener('mouseout', function (e) {
        if (e.target && e.target.closest('a, button, input, textarea, select, .btn, .filter-btn, [role="button"]')) {
            cursorStar.classList.remove('magic-cursor--hover');
        }
    }, { passive: true });

    document.addEventListener('mousedown', function () {
        cursorStar.classList.add('magic-cursor--click');
    });

    document.addEventListener('mouseup', function () {
        cursorStar.classList.remove('magic-cursor--click');
    });

    // ── Animation Loop (Buttery Smooth 60fps) ───────────────────────────────
    function animate() {
        requestAnimationFrame(animate);

        // Smooth cursor interpolation (lerp)
        if (mouse.hasMoved) {
            mouse.x += (mouse.targetX - mouse.x) * 0.2;
            mouse.y += (mouse.targetY - mouse.y) * 0.2;

            // Offset slightly by 14px so it floats beside pointer without blocking click
            cursorStar.style.transform = 'translate3d(' + (mouse.x + 12) + 'px, ' + (mouse.y + 12) + 'px, 0)';
        }

        ctx.clearRect(0, 0, width, height);

        // Draw and update stars
        for (var s = 0; s < stars.length; s++) {
            stars[s].update();
            stars[s].draw();
        }

        // Spawn shooting star if interval passed
        var now = Date.now();
        if (now - lastShootingStarTime > nextShootingStarInterval) {
            shootingStars.push(new ShootingStar());
            lastShootingStarTime = now;
            nextShootingStarInterval = 10000 + Math.random() * 14000;
        }

        // Draw and update shooting stars
        for (var j = shootingStars.length - 1; j >= 0; j--) {
            var ss = shootingStars[j];
            ss.update();
            ss.draw();
            if (ss.alpha <= 0) {
                shootingStars.splice(j, 1);
            }
        }
    }

    animate();
})();
