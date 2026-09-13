<?php require_once __DIR__ . '/layouts/header.php'; ?>

<div class="container my-5 d-flex justify-content-center">
    <div class="card border-0 shadow-lg rounded-5 overflow-hidden text-center text-white" style="max-width: 400px; width: 100%; background: linear-gradient(135deg, #0d2818 0%, #05100a 100%);">
        
        <div class="p-4 pt-5 position-relative">
            <div class="mb-3">
                <img src="/brand-store/assets/images/logo.jpg" class="rounded-circle border border-3 border-warning shadow" width="110" height="110" style="object-fit: cover;" alt="دار الأصالة">
            </div>
            <h3 class="fw-bold text-warning mb-1">دار الأصالة</h3>
            <p class="text-light small opacity-75">لالملابس الفاخرة والعطور التقليدية</p>
        </div>

        <div class="card-body p-4 pt-0">
            <div class="d-grid gap-2 mb-4">
                <a href="tel:0552164213" class="btn btn-warning fw-bold py-2 rounded-3 text-dark">
                    <i class="fa-solid fa-phone me-2"></i> اتصال: 0552164213
                </a>
                <a href="https://wa.me/213552164213" target="_blank" class="btn btn-success fw-bold py-2 rounded-3">
                    <i class="fa-brands fa-whatsapp me-2"></i> مراسلة عبر الواتساب
                </a>
                <a href="/brand-store/" class="btn btn-outline-light fw-bold py-2 rounded-3">
                    <i class="fa-solid fa-store me-2 text-warning"></i> تصفح المتجر الإلكتروني
                </a>
            </div>

            <div class="d-flex justify-content-center gap-4 fs-4 mb-4">
                <a href="https://instagram.com/daralasala.1" target="_blank" class="text-warning"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://facebook.com/DarElAsala" target="_blank" class="text-warning"><i class="fa-brands fa-facebook"></i></a>
            </div>

            <div class="bg-white p-3 rounded-4 d-inline-block shadow-sm mb-2">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=130x130&data=http://localhost/brand-store/vcard" width="130" height="130" alt="QR Code">
            </div>
            <p class="text-muted small mt-1">امسح الرمز لحفظ البطاقة</p>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>