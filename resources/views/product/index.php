<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<!-- قسم البانر الرئيسي -->
<div class="container my-4">
    <div id="heroCarousel" class="carousel slide carousel-fade shadow-lg rounded-5 overflow-hidden" data-bs-ride="carousel" data-bs-interval="4000">
        
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner" style="min-height: 360px;">
            <div class="carousel-item active p-5 text-center text-white position-relative" style="background: linear-gradient(135deg, #062c19 0%, #02120a 100%); min-height: 360px;">
                <div class="d-flex flex-column justify-content-center align-items-center h-100 py-4">
                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-3 fs-6">فخامة الأصالة</span>
                    <h1 class="fw-bold text-warning display-5 mb-2">تشكيلة دار الأصالة</h1>
                    <p class="fs-5 text-light opacity-90 max-w-600 mb-4">أرقى الملابس والعطور التقليدية المصممة بعناية لتناسب ذوقك الرفيع</p>
                    <a href="#catalog" class="btn btn-warning fw-bold px-4 py-2 rounded-pill text-dark shadow-sm">تصفح المنتجات</a>
                </div>
            </div>

            <div class="carousel-item p-5 text-center text-white position-relative" style="background: linear-gradient(135deg, #2b1f0d 0%, #0d0803 100%); min-height: 360px;">
                <div class="d-flex flex-column justify-content-center align-items-center h-100 py-4">
                    <span class="badge bg-light text-dark px-3 py-2 rounded-pill fw-bold mb-3 fs-6">جودة لا تضاهى</span>
                    <h1 class="fw-bold text-warning display-5 mb-2">أصالة التصميم والإنتاج</h1>
                    <p class="fs-5 text-light opacity-90 max-w-600 mb-4">اختر منتجك المفضل واطلبه فوراً عبر خدمة الدفع عند الاستلام</p>
                    <a href="#catalog" class="btn btn-outline-warning fw-bold px-4 py-2 rounded-pill shadow-sm">طلب سريع</a>
                </div>
            </div>

            <div class="carousel-item p-5 text-center text-white position-relative" style="background: linear-gradient(135deg, #1f0a10 0%, #080204 100%); min-height: 360px;">
                <div class="d-flex flex-column justify-content-center align-items-center h-100 py-4">
                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-3 fs-6">توصيل سريع</span>
                    <h1 class="fw-bold text-warning display-5 mb-2">شحن لجميع الولايات</h1>
                    <p class="fs-5 text-light opacity-90 max-w-600 mb-4">نوفر لك تجربة تسوق سهلة مع ضمان الجودة حتى باب منزلكم</p>
                    <a href="#catalog" class="btn btn-warning fw-bold px-4 py-2 rounded-pill text-dark shadow-sm">تسوق الآن</a>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

<!-- معرض المنتجات -->
<div class="container my-5" id="catalog">
    <div class="row g-4">
        <?php if (empty($products)): ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted">لا توجد منتجات معروضة حالياً.</p>
            </div>
        <?php else: ?>
            <?php foreach ($products as $prod): ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="/brand-store/assets/images/<?= $prod->image_path ?: 'logo.jpg' ?>" class="card-img-top object-fit-cover" height="260" alt="<?= htmlspecialchars($prod->name) ?>">
                        <div class="card-body d-flex flex-column justify-content-between text-center p-3">
                            <div>
                                <h6 class="fw-bold text-dark mb-2"><?= htmlspecialchars($prod->name) ?></h6>
                                <p class="text-warning fw-bold fs-5 mb-3"><?= number_format($prod->price, 2) ?> دج</p>
                            </div>
                            <a href="/brand-store/product?id=<?= $prod->id ?>" class="btn btn-dark w-100 fw-bold rounded-3">
                                <i class="fa-solid fa-cart-shopping me-1 text-warning"></i> أطلب الآن
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>