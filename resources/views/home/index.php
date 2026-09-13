<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<style>
    body {
        background: #f6f3ee;
    }

    .hero-shell {
        background: linear-gradient(135deg, #111111 0%, #1c1c1c 50%, #0f0f0f 100%);
        padding: 48px 0 70px;
        border-bottom-left-radius: 36px;
        border-bottom-right-radius: 36px;
        box-shadow: 0 22px 45px rgba(20, 20, 20, 0.18);
    }

    .hero-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 40px;
        min-height: 440px;
    }

    .hero-text {
        flex: 1;
        padding-left: 20px;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #f8c75b, #e2a930);
        color: #141414;
        border-radius: 999px;
        padding: 10px 18px;
        font-size: 0.9rem;
        font-weight: 800;
        margin-bottom: 18px;
    }

    .hero-title {
        font-size: clamp(2.3rem, 3vw, 4.1rem);
        line-height: 1.2;
        font-weight: 900;
        color: #f5c559;
        margin-bottom: 18px;
    }

    .hero-description {
        max-width: 700px;
        font-size: 1.1rem;
        line-height: 1.9;
        color: rgba(255,255,255,0.85);
        margin-bottom: 28px;
    }

    .hero-actions {
        display: flex;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .btn-primary-gold {
        background: linear-gradient(135deg, #f5c559, #d89c1c);
        border: 0;
        color: #121212;
        border-radius: 14px;
        padding: 14px 24px;
        font-weight: 800;
        box-shadow: 0 16px 24px rgba(245, 197, 89, 0.25);
    }

    .btn-outline-light {
        border-radius: 14px;
        padding: 14px 24px;
        font-weight: 800;
    }

    .hero-stats {
        margin-top: 32px;
        display: flex;
        align-items: center;
        gap: 30px;
        flex-wrap: wrap;
    }

    .stat-box {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 18px;
        padding: 16px 20px;
        min-width: 140px;
    }

    .stat-box strong {
        display: block;
        font-size: 1.5rem;
        color: #f5c559;
    }

    .stat-box span {
        color: rgba(255,255,255,0.7);
        font-size: 0.85rem;
    }

    .hero-visual {
        flex: 0 0 480px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hero-card {
        width: 100%;
        max-width: 440px;
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 30px;
        padding: 18px;
        box-shadow: 0 30px 60px rgba(0,0,0,0.35);
    }

    .hero-card img {
        width: 100%;
        height: 440px;
        object-fit: cover;
        border-radius: 24px;
    }

    .features-strip {
        margin-top: -30px;
        position: relative;
        z-index: 2;
    }

    .feature-box {
        background: #fff;
        border: 1px solid #efefef;
        border-radius: 20px;
        padding: 22px 18px;
        box-shadow: 0 18px 35px rgba(0,0,0,0.05);
        text-align: center;
        height: 100%;
    }

    .feature-icon {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        background: linear-gradient(135deg, #f8d276, #e4aa2a);
        color: #111;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        margin-bottom: 14px;
    }

    .feature-title {
        font-weight: 800;
        color: #1d1d1d;
        margin-bottom: 8px;
    }

    .feature-text {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.7;
    }

    .products-section {
        padding: 70px 0 80px;
    }

    .section-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 26px;
        flex-wrap: wrap;
    }

    .section-head h2 {
        font-size: clamp(1.8rem, 2vw, 2.5rem);
        font-weight: 900;
        color: #1f1f1f;
        margin: 0;
    }

    .section-head .accent {
        color: #d89c1c;
    }

    .view-more {
        color: #1f1f1f;
        font-weight: 800;
        text-decoration: none;
        border-bottom: 2px solid #f0bf52;
    }

    .product-card {
        background: #ffffff;
        border-radius: 24px;
        overflow: hidden;
        border: 1px solid #efefef;
        box-shadow: 0 16px 35px rgba(0,0,0,0.05);
        height: 100%;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 24px 45px rgba(0,0,0,0.1);
    }

    .product-image {
        height: 290px;
        background: #f3f3f3;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-body {
        padding: 20px;
    }

    .product-name {
        font-size: 1.2rem;
        font-weight: 800;
        color: #1d1d1d;
        margin-bottom: 10px;
    }

    .product-description {
        color: #666;
        font-size: 0.92rem;
        line-height: 1.8;
        min-height: 75px;
        margin-bottom: 16px;
    }

    .product-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        border-top: 1px solid #f0f0f0;
        padding-top: 16px;
    }

    .price {
        color: #d89c1c;
        font-size: 1.5rem;
        font-weight: 900;
    }

    .price small {
        font-size: 0.7rem;
        color: #666;
        margin-right: 3px;
    }

    .order-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 16px;
        border-radius: 12px;
        background: linear-gradient(135deg, #f3c763, #dc9d1c);
        color: #171717;
        font-weight: 800;
        text-decoration: none;
    }

    .promo-box {
        background: linear-gradient(135deg, #f4d77d, #e9b63b);
        border-radius: 28px;
        padding: 36px 28px;
        margin-top: 10px;
        box-shadow: 0 20px 40px rgba(225, 169, 44, 0.25);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
    }

    .promo-text {
        color: #1d1d1d;
    }

    .promo-text h3 {
        font-size: clamp(1.5rem, 2vw, 2.1rem);
        font-weight: 900;
        margin: 0 0 8px;
    }

    .promo-text p {
        margin: 0;
        color: rgba(20,20,20,0.8);
        line-height: 1.8;
    }

    @media (max-width: 991px) {
        .hero-content {
            flex-direction: column;
            text-align: center;
        }

        .hero-text {
            padding-left: 0;
        }

        .hero-description {
            margin-left: auto;
            margin-right: auto;
        }

        .hero-actions {
            justify-content: center;
        }

        .hero-stats {
            justify-content: center;
        }

        .hero-visual {
            flex-basis: auto;
            width: 100%;
        }
    }
</style>

<section class="hero-shell">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <div class="hero-badge">أفضل العروض اليوم</div>
                <h1 class="hero-title">مرحباً بكم في متجر دار الأصالة</h1>
                <p class="hero-description">
                    أرقى التشكيلات والمنتجات الفاخرة بين يديك مع خدمة توصيل سريعة، ودفع عند الاستلام
                    لتحصل على تجربة تسوق مريحة وموثوقة.
                </p>

                <div class="hero-actions">
                    <a href="#products" class="btn btn-primary-gold">تصفح المنتجات</a>
                    <a href="/brand-store/about" class="btn btn-outline-light">من نحن</a>
                </div>

                <div class="hero-stats">
                    <div class="stat-box">
                        <strong>+500</strong>
                        <span>طلب تم إرساله</span>
                    </div>
                    <div class="stat-box">
                        <strong>24/7</strong>
                        <span>خدمة العملاء</span>
                    </div>
                    <div class="stat-box">
                        <strong>4.9</strong>
                        <span>تقييم العملاء</span>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-card">
                    <img src="/brand-store/assets/images/logo.jpg" alt="دار الأصالة">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="features-strip">
    <div class="container">
        <div class="row g-4">
            <div class="col-12 col-md-4">
                <div class="feature-box">
                    <div class="feature-icon"><i class="fa-solid fa-truck-fast"></i></div>
                    <div class="feature-title">توصيل سريع</div>
                    <div class="feature-text">نوفر خدمة توصيل في جميع الولايات مع متابعة طلبك من البداية إلى النهاية.</div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="feature-box">
                    <div class="feature-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <div class="feature-title">ضمان الجودة</div>
                    <div class="feature-text">كل منتج يتم اختياره بعناية لضمان أصالة الجودة والأداء العالي.</div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="feature-box">
                    <div class="feature-icon"><i class="fa-solid fa-headset"></i></div>
                    <div class="feature-title">دعم فني</div>
                    <div class="feature-text">فريق جاهز للإجابة على استفساراتك وتقديم المساعدة أثناء الطلب.</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="products-section" id="products">
    <div class="container">
        <div class="section-head">
            <h2><span class="accent">المنتجات</span> المتوفرة</h2>
            <a href="/brand-store/products" class="view-more">عرض الكل</a>
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
                            <div class="product-image">
                                <img src="/brand-store/assets/images/<?= htmlspecialchars($product->image_path ?: 'logo.jpg') ?>"
                                     alt="<?= htmlspecialchars($product->name) ?>">
                            </div>
                            <div class="product-body">
                                <div class="product-name"><?= htmlspecialchars($product->name) ?></div>
                                <div class="product-description">
                                    <?= htmlspecialchars($product->description ?? 'منتج فاخر عالي الجودة من متجر دار الأصالة.') ?>
                                </div>
                                <div class="product-footer">
                                    <div class="price"><?= number_format($product->price, 2) ?><small>دج</small></div>
                                    <a href="/brand-store/product?id=<?= $product->id ?>" class="order-btn">
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

<section class="container pb-5">
    <div class="promo-box">
        <div class="promo-text">
            <h3>خصومات خاصة على المنتجات المختارة</h3>
            <p>استفد من عروضنا الحالية واطلب الآن للحصول على أفضل الأسعار والمزايا.</p>
        </div>
        <a href="#products" class="btn btn-primary-gold">استعرض العروض</a>
    </div>
</section>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>