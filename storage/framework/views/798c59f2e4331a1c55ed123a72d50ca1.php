<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Login – TechZone</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />
</head>
<body data-page="login">
    <header class="tz-header">
        <div class="container nav">
            <a class="logo" href="<?php echo e(route('home')); ?>">TechZone</a>
            <nav class="menu" id="navMenu">
                <a href="<?php echo e(route('home')); ?>">Home</a>
                <a href="<?php echo e(route('products')); ?>">Products</a>
                <a href="<?php echo e(route('cart')); ?>">Cart <span class="cart-badge" id="cartCount">0</span></a>
                <a href="<?php echo e(route('about')); ?>">About</a>
                <a href="<?php echo e(route('contact')); ?>">Contact</a>
            </nav>
            <button class="hamburger" id="hamburger" aria-label="Toggle Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </header>

    <main class="container" style="max-width: 500px; margin: 40px auto;">
        <div class="contact-card">
            <h1 class="page-title" style="text-align: center;">Login</h1>
            
            <?php if(session('success')): ?>
                <div style="background: #10b981; color: #052e1c; padding: 12px; border-radius: 12px; margin-bottom: 16px;">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div style="background: #ef4444; color: #fff; padding: 12px; border-radius: 12px; margin-bottom: 16px;">
                    <ul style="margin: 0; padding-left: 20px;">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('login')); ?>" class="contact-form">
                <?php echo csrf_field(); ?>
                <div class="form-field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus />
                </div>
                <div class="form-field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required />
                </div>
                <div class="form-field" style="display: flex; align-items: center; gap: 8px;">
                    <input type="checkbox" id="remember" name="remember" />
                    <label for="remember" style="margin: 0;">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
            </form>
            
            <div style="text-align: center; margin-top: 16px; color: var(--muted);">
                Don't have an account? <a href="<?php echo e(route('register')); ?>" style="color: var(--brand-solid); font-weight: 600;">Register here</a>
            </div>
        </div>
    </main>

    <footer class="tz-footer">
        <div class="container footer-grid">
            <div>
                <h3>TechZone</h3>
                <p>Your one-stop shop for the latest gadgets.</p>
            </div>
        </div>
    </footer>

    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</body>
</html>

<?php /**PATH D:\laravel\TechZone\resources\views/login.blade.php ENDPATH**/ ?>