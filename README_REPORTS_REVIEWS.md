# البلاغات والآراء

تمت إضافة الجزء الخاص بالبلاغات والآراء مع Laravel بطريقة بسيطة مناسبة للمبتدئين.

## الصفحات

- `/reviews` : كل المستخدمين يشوفوا كل الآراء.
- `/report` : المستخدم المسجل دخول يشوف بلاغاته وردود المسؤول.
- `/admin/reports` : المسؤول فقط يشوف كل البلاغات ويرد عليها.
- `/admin/reviews` : المسؤول فقط يشوف كل الآراء ويضيف/يحذف رأيًا أو يحذف كل الآراء.
- `/login` : تسجيل الدخول.

## أهم الملفات

- `app/Http/Controllers/User/ReviewController.php`
- `app/Http/Controllers/User/ReportController.php`
- `app/Http/Controllers/Admin/ReviewController.php`
- `app/Http/Controllers/Admin/ReportController.php`
- `app/Http/Controllers/AuthController.php`
- `app/Models/review.php`
- `app/Models/report.php`
- `database/migrations/2026_09_21_000000_add_admin_reply_to_reports_table.php`
- `resources/views/reviews/index.blade.php`
- `resources/views/reviews/edit.blade.php`
- `resources/views/report.blade.php`
- `resources/views/admin/reports/index.blade.php`
- `resources/views/admin/reviews/index.blade.php`
- `routes/web.php`

## بعد استبدال الملفات

من داخل مجلد المشروع شغلي:

```bash
composer install
php artisan migrate
php artisan storage:link
php artisan serve
```

لو قاعدة البيانات موجودة والمشروع كان عامل migrate قبل كده، شغلي `php artisan migrate` فقط لإضافة عمود `admin_reply`.

صور المستخدمين متوقعة أن تكون داخل `storage/app/public`، لذلك `php artisan storage:link` مهم لعرضها.

> ملاحظة: تم استخدام `Illuminate\Http\Request` العادي في الـ Controllers، ولم يتم استخدام General Request أو Form Request للعمليات الجديدة.
