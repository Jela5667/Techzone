<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>About – TechZone</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />
</head>
<body data-page="about">
    <header class="tz-header">
        <div class="container nav">
            <a class="logo" href="<?php echo e(route('home')); ?>">TechZone</a>
            <nav class="menu" id="navMenu">
                <a href="<?php echo e(route('home')); ?>">Home</a>
                <a href="<?php echo e(route('products')); ?>">Products</a>
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('cart')); ?>">Cart <span class="cart-badge" id="cartCount">0</span></a>
                <?php endif; ?>
                <a href="<?php echo e(route('about')); ?>" class="active">About</a>
                <a href="<?php echo e(route('contact')); ?>">Contact</a>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->isAdmin()): ?>
                        <a href="<?php echo e(route('admin')); ?>">Admin</a>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer; padding: 10px 12px; border-radius: 12px; font-size: inherit; font-family: inherit;">Logout (<?php echo e(auth()->user()->name); ?>)</button>
                    </form>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>">Login</a>
                    <a href="<?php echo e(route('register')); ?>">Register</a>
                <?php endif; ?>
            </nav>
            <button class="hamburger" id="hamburger" aria-label="Toggle Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </header>

    <main class="container">
        <h1 class="page-title">About TechZone</h1>
        <div class="about-hero">
            <div class="about-copy">
                <p>TechZone is Pakistan’s modern online gadget store. We curate the latest smartphones, laptops, wearables, and accessories at competitive prices, backed by fast delivery and exceptional customer service.</p>
                <div class="about-stats">
                    <div class="stat"><strong>1500+</strong><span>Products</span></div>
                    <div class="stat"><strong>99%</strong><span>Happy Customers</span></div>
                    <div class="stat"><strong>50+</strong><span>Top Brands</span></div>
                </div>
            </div>
            <div class="about-media">
                <img loading="lazy" src="https://images.unsplash.com/photo-1510557880182-3d4d3cba35a5?auto=format&fit=crop&w=1200&q=80" alt="Gadgets" />
            </div>
        </div>

        <div class="about-values">
            <div class="about-card">
                <h3>Our Mission</h3>
                <p>Empower everyone with cutting‑edge technology at fair prices.</p>
            </div>
            <div class="about-card">
                <h3>Quality First</h3>
                <p>Authentic products from trusted brands and sellers.</p>
            </div>
            <div class="about-card">
                <h3>Customer Focused</h3>
                <p>Hassle‑free returns, responsive support, and secure checkout.</p>
            </div>
        </div>
    </main>

    <footer class="tz-footer">
        <div class="container footer-grid">
            <div>
                <h3>TechZone</h3>
                <p>Technology for everyone.</p>
            </div>
        </div>
    </footer>

    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</body>
</html>


<?php /**PATH D:\laravel\TechZone\resources\views/about.blade.php ENDPATH**/ ?>