<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<div class="container my-5">
    <!-- شريط التنقل العلوي للإدارة -->
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <div class="btn-group">
            <a href="/brand-store/admin/products" class="btn btn-warning fw-bold active"><i class="fa-solid fa-boxes-stacked me-1"></i> المنتجات</a>
            <a href="/brand-store/admin/orders" class="btn btn-outline-dark fw-bold"><i class="fa-solid fa-list-check me-1"></i> الطلبات</a>
        </div>
        <a href="/brand-store/admin/products/create" class="btn btn-success fw-bold text-white rounded-3 shadow-sm">
            <i class="fa-solid fa-plus me-1"></i> إضافة منتج جديد
        </a>
    </div>

    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
            تمت إضافة المنتج بنجاح!
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['deleted'])): ?>
        <div class="alert alert-warning alert-dismissible fade show rounded-3 mb-4" role="alert">
            تم حذف المنتج بنجاح.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>الصورة</th>
                        <th>اسم المنتج</th>
                        <th>السعر</th>
                        <th>الكمية / المخزون</th>
                        <th>خيارات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($products)): ?>
                        <tr><td colspan="5" class="text-center py-4 text-muted">لا توجد منتجات حالياً.</td></tr>
                    <?php else: ?>
                        <?php foreach ($products as $prod): ?>
                            <tr>
                                <td>
                                    <img src="/brand-store/assets/images/<?= $prod->image_path ?: 'logo.jpg' ?>" width="50" height="50" class="rounded object-fit-cover border">
                                </td>
                                <td class="fw-bold"><?= htmlspecialchars($prod->name) ?></td>
                                <td class="text-warning fw-bold"><?= number_format($prod->price, 2) ?> دج</td>
                                <td>
                                    <span class="badge <?= ($prod->total_stock ?? 0) > 0 ? 'bg-info text-dark' : 'bg-danger' ?> fs-6">
                                        <?= $prod->total_stock ?? 0 ?> قطعة
                                    </span>
                                </td>
                                <td>
                                    <a href="/brand-store/admin/products/delete?id=<?= $prod->id ?>" class="btn btn-sm btn-outline-danger fw-bold" onclick="return confirm('هل أنت تأكد من حذف هذا المنتج؟')">
                                        <i class="fa-solid fa-trash me-1"></i> حذف
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>