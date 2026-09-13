<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="container-fluid my-4 px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold"><i class="fa-solid fa-gauge text-warning me-2"></i> لوحة تحكم دار الأصالة</h2>
        <a href="/brand-store/admin/products/create" class="btn btn-warning fw-bold text-dark">
            <i class="fa-solid fa-plus me-1"></i> إضافة منتج جديد
        </a>
    </div>

    <!-- كروت الإحصائيات -->
    <div class="row g-3 mb-5">
        <div class="col-md-3">
            <div class="card bg-dark text-white p-3 rounded-4 border-0 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-secondary small d-block">إجمالي المبيعات</span>
                        <h3 class="fw-bold text-warning mb-0"><?= number_format($stats['total_revenue'], 2) ?> دج</h3>
                    </div>
                    <i class="fa-solid fa-coins fa-2x text-warning"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-white p-3 rounded-4 border-0 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small d-block">الطلبات الجديدة</span>
                        <h3 class="fw-bold text-danger mb-0"><?= $stats['pending_orders'] ?></h3>
                    </div>
                    <i class="fa-solid fa-clock fa-2x text-danger"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-white p-3 rounded-4 border-0 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small d-block">إجمالي الطلبات</span>
                        <h3 class="fw-bold text-dark mb-0"><?= $stats['total_orders'] ?></h3>
                    </div>
                    <i class="fa-solid fa-box-archive fa-2x text-primary"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-white p-3 rounded-4 border-0 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small d-block">عدد المنتجات</span>
                        <h3 class="fw-bold text-success mb-0"><?= $stats['total_products'] ?></h3>
                    </div>
                    <i class="fa-solid fa-shirt fa-2x text-success"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- شريط التنقل السريع -->
    <div class="d-flex gap-2 mb-4">
        <a href="/brand-store/admin/dashboard" class="btn btn-dark active">الرئيسية</a>
        <a href="/brand-store/admin/orders" class="btn btn-outline-dark">إدارة الطلبات</a>
        <a href="/brand-store/admin/products" class="btn btn-outline-dark">إدارة المنتجات</a>
    </div>

    <!-- جدول أحدث الطلبات -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white p-3 fw-bold border-0">
            <i class="fa-solid fa-list me-2 text-warning"></i> أحدث الطلبات المستلمة
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>رقم الطلب</th>
                        <th>اسم العميل</th>
                        <th>الهاتف</th>
                        <th>الولاية</th>
                        <th>المبلغ الإجمالي</th>
                        <th>الحالة</th>
                        <th>التاريخ</th>
                        <th>الإجراء</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($recentOrders)): ?>
                        <tr><td colspan="8" class="text-center py-4 text-muted">لا توجد طلبات مستلمة حتى الآن.</td></tr>
                    <?php else: ?>
                        <?php foreach ($recentOrders as $ord): ?>
                            <tr>
                                <td class="fw-bold">#<?= $ord->order_number ?></td>
                                <td><?= htmlspecialchars($ord->guest_name) ?></td>
                                <td><?= htmlspecialchars($ord->guest_phone) ?></td>
                                <td><?= $ord->wilaya_name ?></td>
                                <td class="fw-bold text-success"><?= number_format($ord->total, 2) ?> دج</td>
                                <td>
                                    <span class="badge bg-<?= $ord->status === 'Pending' ? 'warning text-dark' : ($ord->status === 'Delivered' ? 'success' : 'secondary') ?>">
                                        <?= $ord->status ?>
                                    </span>
                                </td>
                                <td class="small text-muted"><?= date('Y-m-d H:i', strtotime($ord->created_at)) ?></td>
                                <td>
                                    <a href="/brand-store/admin/orders/show?id=<?= $ord->id ?>" class="btn btn-sm btn-outline-dark">عرض</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>