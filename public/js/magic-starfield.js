// ==========================================
// MAGIC CODE — STARFIELD + STAR CURSOR
// Adapted from portfolio starfield.js
// Brand: #050505 background, #35d51f neon green
// ==========================================

(function () {
    'use strict';

    // ── Settings ──────────────────────────────
    var totalObjects      = 350;
    var maxVelocity       = 1.5;
    var starSize          = 1;
    var twinkleFreq       = 40000;
    var shootingStarFreq  = 250;
    var shootingStarVelocity = 48;
    var shootingStarSize  = 4;

    // Green palette for brand colours
    var GREEN_BRIGHT  = 'rgba(53,213,31,';     // #35d51f — cursor cluster
    var GREEN_MID     = 'rgba(80,230,55,';     // slightly lighter
    var WHITE_STAR    = 'rgba(255,255,255,';   // background drift stars
    var SHOOT_COLOR   = 'rgba(53,213,31,';     // shooting stars

    // ── Mouse ─────────────────────────────────
    var mouse = {
        x: window.innerWidth  / 2,
        y: window.innerHeight / 2,
        radius: 180
    };

    // ── Custom cursor div (star glyph) ─────────
    var cursorStar = document.createElement('div');
    cursorStar.id = 'magic-cursor-star';
    cursorStar.setAttribute('aria-hidden', 'true');
    document.body.appendChild(cursorStar);

    // ── Canvas setup ──────────────────────────
    var canvas = document.getElementById('magicStarfield');
    if (!canvas) return; // Safety guard

    canvas.width  = window.innerWidth  || 1024;
    canvas.height = window.innerHeight || 768;
    var ctx = canvas.getContext('2d');

    // ── Star arrays ───────────────────────────
    var stars        = [];
    var shootingStars = [];

    // ── requestAnimFrame shim ─────────────────
    var raf = window.requestAnimationFrame ||
              window.webkitRequestAnimationFrame ||
              window.mozRequestAnimationFrame ||
              function (cb) { setTimeout(cb, 16); };

    // =========================================
    // Star constructor
    // =========================================
    function Star() {
        this.X         = Math.random() * canvas.width;
        this.Y         = Math.random() * canvas.height;
        this.Velocity  = Math.random() * maxVelocity;
        this.Opacity   = ((Math.random() * 10 + 1) * 0.1);
        this.Collected = false;
        this.Lag       = Math.random() * 0.15 + 0.05;
        this.isGreen   = false; // set for collected stars

        this.Update = function () {
            if (mouse.x != null && mouse.y != null) {
                var dx = mouse.x - this.X;
                var dy = mouse.y - this.Y;
                var dist = Math.sqrt(dx * dx + dy * dy);

                // Collect nearby stars into cursor cloud
                if (dist < 50) {
                    this.Collected = true;
                    this.isGreen   = true;
                }

                if (this.Collected) {
                    // Snake / tail cloud following cursor
                    var tx = mouse.x + (Math.random() * 12 - 6);
                    var ty = mouse.y + (Math.random() * 12 - 6);
                    this.X += (tx - this.X) * this.Lag;
                    this.Y += (ty - this.Y) * this.Lag;
                    this.Opacity = 0.75 + Math.random() * 0.25;
                } else {
                    // Magnetic pull from mouse radius
                    if (dist < mouse.radius) {
                        var force = (mouse.radius - dist) / mouse.radius;
                        var angle = Math.atan2(dy, dx);
                        this.X += Math.cos(angle) * force * 2;
                        this.Y += Math.sin(angle) * force * 2;
                    }

                    // Drift left
                    this.X -= this.Velocity;

                    if (this.X < 0) {
                        this.X = canvas.width + 1;
                        this.Y = Math.random() * canvas.height;
                    }
                    if (this.Y < 0) this.Y = canvas.height;
                    if (this.Y > canvas.height) this.Y = 0;
                }
            } else {
                this.X -= this.Velocity;
                if (this.X < 0) {
                    this.X = canvas.width + 1;
                    this.Y = Math.random() * canvas.height;
                }
                if (this.Y < 0) this.Y = canvas.height;
                if (this.Y > canvas.height) this.Y = 0;
            }
        };

        this.Draw = function () {
            var color = this.isGreen ? GREEN_BRIGHT : WHITE_STAR;
            ctx.fillStyle = color + this.Opacity + ')';

            var sz = this.Collected ? starSize + 1.5 : starSize;

            if (Math.round(Math.random() * twinkleFreq) === 1 || this.Collected) {
                ctx.fillRect(this.X, this.Y, sz + 2, sz + 2);
            } else {
                ctx.fillRect(this.X, this.Y, sz, sz);
            }
        };
    }

    // =========================================
    // ShootingStar constructor
    // =========================================
    function ShootingStar() {
        this.X      = canvas.width + 200;
        this.Y      = Math.random() * canvas.height;
        this.Length = 900;

        this.Update = function () {
            this.X -= shootingStarVelocity;
        };

        this.Draw = function () {
            for (var i = 0; i < this.Length; i++) {
                var op = Math.max(0, 0.75 - 0.001 * i);
                ctx.fillStyle = SHOOT_COLOR + op + ')';
                ctx.fillRect(this.X + i, this.Y, shootingStarSize, shootingStarSize);
            }
        };
    }

    // =========================================
    // Init
    // =========================================
    function init() {
        for (var i = 0; i < totalObjects; i++) {
            var star = new Star();
            if (i < 60) {
                star.Collected = true;
                star.isGreen   = true;
                star.Lag       = Math.random() * 0.15 + 0.05;
                star.X         = mouse.x;
                star.Y         = mouse.y;
            }
            stars.push(star);
        }
    }

    // =========================================
    // Draw loop
    // =========================================
    function draw() {
        raf(draw);
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        for (var f = 0; f < stars.length; f++) {
            stars[f].Update();
            stars[f].Draw();
        }
        for (var g = 0; g < shootingStars.length; g++) {
            shootingStars[g].Update();
            shootingStars[g].Draw();
        }
    }

    // =========================================
    // Update loop (spawns shooting stars)
    // =========================================
    function update() {
        if (Math.round(Math.random() * shootingStarFreq) === 1) {
            shootingStars.push(new ShootingStar());
        }
        for (var f = shootingStars.length - 1; f >= 0; f--) {
            if (shootingStars[f].X < -1200) {
                shootingStars.splice(f, 1);
            }
        }
    }

    // ── Start ─────────────────────────────────
    init();
    setInterval(update, 30);
    raf(draw);

    // ── Event listeners ───────────────────────
    document.addEventListener('mousemove', function (e) {
        mouse.x = e.clientX;
        mouse.y = e.clientY;

        // Move CSS cursor glyph
        cursorStar.style.transform = 'translate(' + (e.clientX - 10) + 'px, ' + (e.clientY - 10) + 'px)';
        cursorStar.style.opacity   = '1';
    });

    document.addEventListener('mouseleave', function () {
        cursorStar.style.opacity = '0';
    });

    document.addEventListener('mouseenter', function () {
        cursorStar.style.opacity = '1';
    });

    // Click burst — flash cursor star
    document.addEventListener('mousedown', function () {
        cursorStar.classList.add('magic-cursor--click');
    });
    document.addEventListener('mouseup', function () {
        cursorStar.classList.remove('magic-cursor--click');
    });

    // Hover interactive elements
    document.addEventListener('mouseover', function (e) {
        if (e.target && e.target.closest('a, button, input, textarea, select, .btn, .filter-btn, [role="button"]')) {
            cursorStar.classList.add('magic-cursor--hover');
        }
    });
    document.addEventListener('mouseout', function (e) {
        if (e.target && e.target.closest('a, button, input, textarea, select, .btn, .filter-btn, [role="button"]')) {
            cursorStar.classList.remove('magic-cursor--hover');
        }
    });

    window.addEventListener('resize', function () {
        canvas.width  = window.innerWidth;
        canvas.height = window.innerHeight;
    });

})();

