<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<style>
    .hero-panel {
        background: linear-gradient(135deg, #1f1f1f 0%, #0d0d0d 100%);
        border-radius: 0 0 26px 26px;
        padding: 80px 0 70px;
        box-shadow: 0 18px 35px rgba(0, 0, 0, 0.18);
    }

    .hero-heading {
        font-size: clamp(2.3rem, 4vw, 4.5rem);
        color: #f4b73a;
        font-weight: 800;
        line-height: 1.2;
    }

    .hero-subtext {
        max-width: 760px;
        margin: 0 auto;
        font-size: 1.2rem;
        color: rgba(255,255,255,0.85);
        line-height: 1.8;
    }

    .section-shell {
        padding: 50px 0 80px;
    }

    .section-heading {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 14px;
        margin-bottom: 30px;
        font-weight: 800;
        font-size: clamp(1.8rem, 2vw, 2.5rem);
        color: #1b1b1b;
    }

    .section-heading .icon-box {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #f4b73a, #d89b18);
        color: #111;
        box-shadow: 0 10px 20px rgba(244,183,58,0.3);
    }

    .product-card {
        background: #ffffff;
        border: 1px solid #eaeaea;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 14px 30px rgba(0,0,0,0.06);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        height: 100%;
    }

    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 40px rgba(0,0,0,0.12);
    }

    .product-image-wrap {
        height: 280px;
        background: #f5f5f5;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border-bottom: 1px solid #f0f0f0;
    }

    .product-image-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-body {
        padding: 20px;
    }

    .product-name {
        font-size: 1.3rem;
        font-weight: 800;
        color: #1d1d1d;
        margin-bottom: 10px;
    }

    .product-description {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.7;
        min-height: 72px;
        margin-bottom: 18px;
    }

    .product-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        border-top: 1px solid #f0f0f0;
        padding-top: 16px;
    }

    .price-text {
        color: #f4b73a;
        font-weight: 800;
        font-size: 1.55rem;
    }

    .price-text small {
        font-size: 0.7rem;
        color: #666;
        margin-right: 2px;
    }

    .order-btn {
        background: linear-gradient(135deg, #f4b73a, #d89b18);
        border: none;
        color: #111;
        border-radius: 12px;
        padding: 10px 18px;
        font-weight: 800;
        transition: opacity 0.2s ease;
    }

    .order-btn:hover {
        opacity: 0.92;
        color: #111;
    }
</style>

<section class="hero-panel">
    <div class="container text-center">
        <h1 class="hero-heading mb-3">مرحبا بكم في متجر دار الأصالة</h1>
        <p class="hero-subtext">
            أرقى التشكيلات والمنتجات الفاخرة بين يديك مع خدمة التوصيل السريع والدفع عند الاستلام.
        </p>
    </div>
</section>

<section class="section-shell">
    <div class="container">
        <div class="section-heading">
            <span class="icon-box"><i class="fa-solid fa-bag-shopping"></i></span>
            <span>المنتجات المتوفرة</span>
        </div>

        <div class="row g-4">
            <?php if (empty($products)): ?>
                <div class="col-12 text-center py-5">
                    <i class="fa-solid fa-box-open fa-3x text-muted mb-3"></i>
                    <p class="text-muted fs-5">لا توجد منتجات معروضة حالياً في المتجر.</p>
                </div>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="product-card">
                            <div class="product-image-wrap">
                                <img src="/brand-store/assets/images/<?= htmlspecialchars($product->image_path ?: 'logo.jpg') ?>"
                                     alt="<?= htmlspecialchars($product->name) ?>">
                            </div>

                            <div class="product-body">
                                <h4 class="product-name"><?= htmlspecialchars($product->name) ?></h4>
                                <p class="product-description">
                                    <?= htmlspecialchars($product->description ?? 'منتج فاخر عالي الجودة من متجر دار الأصالة.') ?>
                                </p>

                                <div class="product-footer">
                                    <div class="price-text"><?= number_format($product->price, 2) ?><small>دج</small></div>
                                    <a href="/brand-store/product?id=<?= $product->id ?>" class="btn order-btn">
                                        <i class="fa-solid fa-cart-shopping me-1"></i> أطلب الآن
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>