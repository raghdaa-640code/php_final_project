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

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo " Connection is failed !" . $error->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $report_text = trim($_POST['report'] ?? '');
    
    $user_id = $_SESSION['user_id'];

    if (!empty($report_text)) {
        $stmt = $pdo->prepare("INSERT INTO reports (report, user_id, created_at, updated_at) VALUES (?, ?, NOW(), NOW())");
        $stmt->execute([$report_text, $user_id]);

        header("Location: /show");
        exit();

    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تقديم شكوى أو بلاغ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { margin-top: 50px; }
        .my-card { max-width: 600px; margin: 0 auto; }
    </style>
</head>
<body class="container">
    <h3 class="text-center mb-4"> تقديم شكوى </h3>
    <div class="card">

        <?php if (!empty($success_message)): ?>
            <div class="alert">
                <?php echo $success_message; ?>
            </div>
                <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="report" class="form-label">محتوى الشكوى :</label>
                <textarea name="report" id="report" rows="5" class="form-control" placeholder="اكتب شكواك هنا ..." required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" style="border-radius: 4px; background:blue; padding: 10px 100px; color:white;">إرسال</button>
            </div>
        </form>
    </div>

</body>
</html>