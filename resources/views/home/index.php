<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<!-- قسم الواجهة الرئيسية (Hero Section) -->
<div class="bg-dark text-white py-5 mb-5 shadow-sm">
    <div class="container text-center py-4">
        <h1 class="fw-bold display-5 text-warning mb-3">مرحباً بكم في متجر دار الأصالة</h1>
        <p class="lead text-light opacity-75 mx-auto" style="max-width: 600px;">
            أرقى التشكيلات والمنتجات الفاخرة بين يديك مع خدمة التوصيل السريع والدفع عند الاستلام.
        </p>
    </div>
</div>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h3 class="fw-bold m-0"><i class="fa-solid fa-store me-2 text-warning"></i> المنتجات المتوفرة</h3>
    </div>

    <!-- شبكة عرض المنتجات -->
    <div class="row g-4">
        <?php if (empty($products)): ?>
            <div class="col-12 text-center py-5">
                <i class="fa-solid fa-box-open fa-3x text-muted mb-3"></i>
                <p class="text-muted fs-5">لا توجد منتجات معروضة حالياً في المتجر.</p>
            </div>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <!-- صورة المنتج -->
                        <div class="bg-light text-center p-3" style="height: 260px;">
                            <img src="/brand-store/assets/images/<?= htmlspecialchars($product->image_path ?: 'logo.jpg') ?>" 
                                 class="img-fluid h-100 object-fit-contain" 
                                 alt="<?= htmlspecialchars($product->name) ?>">
                        </div>
                        
                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="card-title fw-bold text-dark mb-2"><?= htmlspecialchars($product->name) ?></h5>
                            <p class="card-text text-muted small text-truncate mb-3">
                                <?= htmlspecialchars($product->description ?? 'منتج فاخر عالي الجودة من متجر دار الأصالة.') ?>
                            </p>
                            
                            <div class="mt-auto pt-3 border-top d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="fs-4 fw-bold text-warning"><?= number_format($product->price, 2) ?></span>
                                    <small class="fw-bold text-muted">دج</small>
                                </div>
                                
                                <a href="/brand-store/product?id=<?= $product->id ?>" class="btn btn-dark rounded-3 px-3 fw-bold">
                                    <i class="fa-solid fa-cart-shopping me-1"></i> طلب الآن
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>