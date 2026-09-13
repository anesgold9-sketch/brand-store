<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<div class="container my-5">
    <!-- شريط التنقل العلوي بين إدارة الطلبات والمنتجات -->
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <div class="btn-group">
            <a href="/brand-store/admin/orders" class="btn btn-warning fw-bold active"><i class="fa-solid fa-list-check me-1"></i> إدارة الطلبات</a>
            <a href="/brand-store/admin/products" class="btn btn-outline-dark fw-bold"><i class="fa-solid fa-boxes-stacked me-1"></i> إدارة المنتجات والمخزون</a>
        </div>
        <a href="/brand-store/admin/products/create" class="btn btn-success fw-bold text-white rounded-3 shadow-sm">
            <i class="fa-solid fa-plus me-1"></i> إضافة منتج جديد
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>اسم الزبون</th>
                        <th>رقم الهاتف</th>
                        <th>الولاية</th>
                        <th>المبلغ الإجمالي</th>
                        <th>حالة الطلب</th>
                        <th>التاريخ</th>
                        <th>خيارات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($orders)): ?>
                        <tr><td colspan="8" class="text-center py-4 text-muted">لا توجد طلبات مسجلة حالياً.</td></tr>
                    <?php else: ?>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td class="fw-bold">#<?= $order->id ?></td>
                                <td><?= htmlspecialchars($order->customer_name ?? '') ?></td>
                                <td><?= htmlspecialchars($order->customer_phone ?? '') ?></td>
                                <td><?= htmlspecialchars($order->wilaya ?? '') ?></td>
                                <td class="text-warning fw-bold"><?= number_format($order->total_price ?? 0, 2) ?> دج</td>
                                <td>
                                    <?php 
                                        $statusClass = 'bg-warning text-dark';
                                        $statusText = 'قيد الانتظار';
                                        if (($order->status ?? '') === 'confirmed') { $statusClass = 'bg-info text-dark'; $statusText = 'مؤكد'; }
                                        elseif (($order->status ?? '') === 'delivered') { $statusClass = 'bg-success'; $statusText = 'تم التسليم'; }
                                        elseif (($order->status ?? '') === 'cancelled') { $statusClass = 'bg-danger'; $statusText = 'ملغى'; }
                                    ?>
                                    <span class="badge <?= $statusClass ?> fs-6 py-2 px-3"><?= $statusText ?></span>
                                </td>
                                <td><?= $order->created_at ?? '' ?></td>
                                <td>
                                    <a href="/brand-store/admin/orders/show?id=<?= $order->id ?>" class="btn btn-sm btn-dark fw-bold">
                                        <i class="fa-solid fa-eye me-1"></i> التفاصيل
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