<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Product Details – TechZone</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />
</head>
<body data-page="product-details">
    <header class="tz-header">
        <div class="container nav">
            <a class="logo" href="<?php echo e(route('home')); ?>">TechZone</a>
            <nav class="menu" id="navMenu">
                <a href="<?php echo e(route('home')); ?>">Home</a>
                <a href="<?php echo e(route('products')); ?>">Products</a>
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('cart')); ?>">Cart <span class="cart-badge" id="cartCount">0</span></a>
                <?php endif; ?>
                <a href="<?php echo e(route('about')); ?>">About</a>
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
        <div class="product-detail" id="productDetail">
            <div class="detail-media"><img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>"></div>
            <div class="detail-info">
                <h1><?php echo e($product->name); ?></h1>
                <div class="muted"><?php echo e($product->brand); ?> • <?php echo e($product->category); ?></div>
                <div class="rating" style="margin:6px 0" id="productRating" data-rating="<?php echo e($product->rating); ?>"></div>
                <div class="price" style="font-size:1.6rem;margin:6px 0">$<?php echo e(number_format($product->price, 2)); ?></div>
                <p><?php echo e($product->description); ?></p>
                <div class="specs">
                    <div>Warranty: 1 Year</div>
                    <div>Delivery: 3-5 days</div>
                    <div>Return: 7 days</div>
                    <div>Stock: In stock</div>
                </div>
                <div style="display:flex;gap:8px;margin-top:10px">
                    <button class="btn btn-primary" id="pdAdd" data-product-id="<?php echo e($product->id); ?>">Add to Cart</button>
                    <a class="btn btn-ghost" href="<?php echo e(route('cart')); ?>">Go to Cart</a>
                </div>
            </div>
        </div>
        <section class="related">
            <h2 class="section-title">You may also like</h2>
            <div class="grid products-grid" id="relatedProducts">
                <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="product-card">
                        <div class="product-thumb">
                            <img src="<?php echo e($related->image); ?>" alt="<?php echo e($related->name); ?>">
                            <?php if($related->price < 400): ?>
                                <span class="badge">SALE</span>
                            <?php endif; ?>
                        </div>
                        <div class="product-body">
                            <div class="product-title"><?php echo e($related->name); ?></div>
                            <div class="muted"><?php echo e($related->brand); ?> • <?php echo e($related->category); ?></div>
                            <div class="rating" id="rating-<?php echo e($related->id); ?>" data-rating="<?php echo e($related->rating); ?>"></div>
                            <div class="price">$<?php echo e(number_format($related->price, 2)); ?></div>
                            <div class="product-actions">
                                <a class="btn btn-ghost" href="<?php echo e(route('product.show', $related->id)); ?>">View Details</a>
                                <button class="btn btn-primary" data-add="<?php echo e($related->id); ?>">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    </main>

    <footer class="tz-footer">
        <div class="container footer-grid">
            <div>
                <h3>TechZone</h3>
                <p>Premium gadgets. Great value.</p>
            </div>
        </div>
    </footer>

    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</body>
</html>


<?php /**PATH D:\laravel\TechZone\resources\views/product-details.blade.php ENDPATH**/ ?>