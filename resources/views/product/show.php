<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="container my-5">
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show text-center shadow-sm mb-4" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i> <strong>تم إرسال طلبك بنجاح!</strong> سنتصل بك قريباً لتأكيد الطلب.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (!$product): ?>
        <div class="text-center py-5">
            <h3 class="text-danger fw-bold">المنتج غير موجود</h3>
            <p class="text-muted">المنتج الذي تبحث عنه غير متوفر أو تم حذفه.</p>
            <a href="/brand-store/" class="btn btn-dark mt-3">العودة للرئيسية</a>
        </div>
    <?php else: ?>
        <div class="row g-4 align-items-center bg-white p-4 rounded-4 shadow-sm border">
            <!-- صورة المنتج -->
            <div class="col-md-6 text-center">
                <img src="/brand-store/assets/images/<?= htmlspecialchars($product->image_path ?: 'logo.jpg') ?>" 
                     class="img-fluid rounded-4 object-fit-contain" 
                     style="max-height: 400px;" 
                     alt="<?= htmlspecialchars($product->name) ?>">
            </div>

            <!-- تفاصيل المنتج ونموذج الطلب -->
            <div class="col-md-6">
                <h2 class="fw-bold mb-3"><?= htmlspecialchars($product->name) ?></h2>
                <h3 class="text-warning fw-bold mb-3"><?= number_format($product->price, 2) ?> <small class="text-muted fs-6">دج</small></h3>
                <p class="text-muted mb-4"><?= htmlspecialchars($product->description ?? 'منتج فاخر عالي الجودة من متجر دار الأصالة.') ?></p>

                <hr class="my-4">

                <h5 class="fw-bold mb-3"><i class="fa-solid fa-truck-fast me-2 text-warning"></i> طلب المنتج (الدفع عند الاستلام)</h5>
                
                <form action="/brand-store/order/store" method="POST">
                    <input type="hidden" name="product_id" value="<?= $product->id ?>">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">الاسم الكامل</label>
                        <input type="text" name="customer_name" class="form-control" placeholder="أدخل اسمك الكامل" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">رقم الهاتف</label>
                        <input type="tel" name="customer_phone" class="form-control" placeholder="06XXXXXXXX" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">الولاية</label>
                        <input type="text" name="wilaya" class="form-control" placeholder="مثال: الجزائر، وهران، قسنطينة..." required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">العنوان الدقيق</label>
                        <input type="text" name="address" class="form-control" placeholder="أدخل البلدية أو اسم الشارع" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">الكمية</label>
                        <input type="number" name="quantity" class="form-control" value="1" min="1" max="<?= $product->total_stock ?? 10 ?>" required>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 py-3 fw-bold text-dark rounded-3 fs-5 shadow-sm">
                        <i class="fa-solid fa-paper-plane me-2"></i> تأكيد الطلب الآن
                    </button>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>

<?php if (isset($_GET['error']) && $_GET['error'] === 'out_of_stock'): ?>
    <div class="alert alert-danger alert-dismissible fade show text-center shadow-sm mb-4" role="alert">
        <i class="fa-solid fa-triangle-exclamation me-2"></i> <strong>عذراً!</strong> الكمية المطلوبة غير متوفرة حالياً في المخزون.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>