<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit();
}

$host = 'localhost';
$db   = 'baddal';
$user = 'root';
$pass = '';

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$report_id = $id;
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_text = trim($_POST['report'] ?? '');

    if (!empty($new_text)) {
        $update_stmt = $pdo->prepare("UPDATE reports SET report = ?, updated_at = NOW() WHERE id = ? AND user_id = ?");
        $update_stmt->execute([$new_text, $report_id, $user_id]);

        header("Location: /show");
        exit();
    }
}

$stmt = $pdo->prepare("SELECT * FROM reports WHERE id = ? AND user_id = ?");
$stmt->execute([$report_id, $user_id]);
$report = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$report) {
    header("Location: /show");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تعديل الشكوى</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container"  style="margin-top: 50px;">
    <h3><center>تعديل محتوى الشكوى</center></h3>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <form action="" method="POST">
                <div class="save">
                    <textarea name="report" class="form-control" rows="4" cols="5"><?php echo htmlspecialchars($report['report'] ?? ''); ?></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success">حفظ التعديل</button>
                <a href="/show" class="btn btn-secondary">إلغاء</a>
            </form>

        </div>
    </div>
</body>
</html>