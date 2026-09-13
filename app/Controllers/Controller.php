<?php
namespace App\Controllers;

class Controller {
    public function view(string $view, array $data = []): void {
        extract($data);

        $viewPath = str_replace('.', '/', $view);
        $fullPath = __DIR__ . '/../../resources/views/' . $viewPath . '.php';

        if (file_exists($fullPath)) {
            require_once $fullPath;
        } else {
            echo "<div style='direction: rtl; font-family: sans-serif; padding: 20px; background: #fff3f3; border: 1px solid #ffcdd2; border-radius: 8px; margin: 20px;'>";
            echo "<h3 style='color: #d32f2f;'>❌ لم يتم العثور على ملف الواجهة</h3>";
            echo "<p>المسار غير موجود: <code>" . htmlspecialchars($fullPath) . "</code></p>";
            echo "</div>";
        }
    }
}