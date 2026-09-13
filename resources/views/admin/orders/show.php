<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<div class="container my-5" style="max-width: 900px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold"><i class="fa-solid fa-file-invoice me-2 text-warning"></i> تفاصيل الطلب #<?= $order->id ?></h4>
        <a href="/brand-store/admin/orders" class="btn btn-outline-dark btn-sm fw-bold">العودة للطلبات</a>
    </div>

    <div class="row g-4">
        <!-- معلومات الزبون -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                <h5 class="fw-bold text-warning mb-3"><i class="fa-solid fa-user me-2"></i> بيانات العميل</h5>
                <p class="mb-2"><strong>الاسم:</strong> <?= htmlspecialchars($order->customer_name) ?></p>
                <p class="mb-2"><strong>الهاتف:</strong> <a href="tel:<?= $order->customer_phone ?>"><?= htmlspecialchars($order->customer_phone) ?></a></p>
                <p class="mb-2"><strong>الولاية:</strong> <?= htmlspecialchars($order->wilaya) ?></p>
                <p class="mb-0"><strong>العنوان:</strong> <?= htmlspecialchars($order->address) ?></p>
            </div>
        </div>

        <!-- تحديث حالة الطلب -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                <h5 class="fw-bold text-warning mb-3"><i class="fa-solid fa-sliders me-2"></i> تغيير حالة الطلب</h5>
                <form action="/brand-store/admin/orders/update-status" method="POST">
                    <input type="hidden" name="order_id" value="<?= $order->id ?>">
                    <div class="mb-3">
                        <select name="status" class="form-select form-select-lg">
                            <option value="pending" <?= $order->status == 'pending' ? 'selected' : '' ?>>قيد الانتظار</option>
                            <option value="confirmed" <?= $order->status == 'confirmed' ? 'selected' : '' ?>>تم التأكيد هاتفياً</option>
                            <option value="shipped" <?= $order->status == 'shipped' ? 'selected' : '' ?>>تم الشحن مع الشركة</option>
                            <option value="delivered" <?= $order->status == 'delivered' ? 'selected' : '' ?>>تم التسليم والقبض</option>
                            <option value="cancelled" <?= $order->status == 'cancelled' ? 'selected' : '' ?>>طلب ملغى</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning w-100 fw-bold text-dark">حفظ الحالة الجديدة</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>