<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="container my-5 text-center" style="max-width: 600px;">
    <div class="card border-0 shadow rounded-4 p-5">
        <div class="mb-4">
            <i class="fa-solid fa-circle-check text-success fa-5x"></i>
        </div>
        <h2 class="fw-bold text-dark mb-2">شكراً لطلبك من دار الأصالة!</h2>
        <p class="text-muted fs-5">تم استلام طلبك بنجاح برقم: <strong class="text-warning">#<?= htmlspecialchars($orderNumber) ?></strong></p>
        <p class="text-secondary small mb-4">سيتصل بك فريقنا قريباً على رقم هاتفك لتأكيد العنوان والشحن.</p>
        <div>
            <a href="/brand-store/products" class="btn btn-dark fw-bold px-4 py-2">متابعة التسوق</a>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>