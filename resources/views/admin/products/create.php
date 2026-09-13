<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<div class="container my-5" style="max-width: 700px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold"><i class="fa-solid fa-folder-plus me-2 text-warning"></i> إضافة منتج جديد</h3>
        <a href="/brand-store/admin/products" class="btn btn-outline-dark btn-sm fw-bold">إلغاء والعودة</a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="/brand-store/admin/products/store" method="POST" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label class="form-label fw-bold">اسم المنتج</label>
                <input type="text" name="name" class="form-control form-control-lg" placeholder="مثال: قفطان فاخر" required>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">السعر (دج)</label>
                    <input type="number" step="0.01" name="price" class="form-control form-control-lg" placeholder="15000" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">الكمية / المخزون المتاح</label>
                    <input type="number" name="total_stock" class="form-control form-control-lg" value="10" min="0" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">صورة المنتج</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">وصف المنتج</label>
                <textarea name="description" class="form-control" rows="4" placeholder="تفاصيل المنتج، القماش، الألوان المتاحة..."></textarea>
            </div>

            <button type="submit" class="btn btn-warning w-100 fw-bold py-3 text-dark rounded-3 shadow">
                <i class="fa-solid fa-plus-circle me-1"></i> حفظ المنتج وتوفيره بالمتجر
            </button>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>