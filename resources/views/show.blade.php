<?php

session_start();

$host = 'localhost';
$db   = 'baddal';
$user = 'root';
$pass = '';

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);

$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    header("Location: /login");
    exit();
} else {
    $stmt = $pdo->prepare("SELECT * FROM reports WHERE user_id = ? ORDER BY id DESC");
    $stmt->execute([$user_id]);
    $reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>عرض الشكاوي</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            margin-top: 30px;
        }
        h3{
            margin-bottom: 30px;
        }
        .report-card {
            background-color: rgba(128, 128, 128, 0.213);
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
        }
        .admin-reply {
            background-color: #e9ecef;
            border-right: 4px solid #0d6efd;
            padding: 10px 15px;
            margin-top: 12px;
            border-radius: 4px;
        }
        .text-center{
            max-width: 250px;
            border-width: 30px;
            border: 4px solid blue;
            border-radius: 5px;
            background: blue;
        }
    </style>
</head>
<body class="container">

    <h3 class="text"><center>قائمة الشكاوي الخاصة بك</center></h3>

    <div class="row justify-content-center">
        <div class="col-md-8 reports">
            <?php 
            if (count($reports) > 0) {
                foreach ($reports as $rep) {
    
                    echo "<div class='report-card'>";
                    
                    echo "<div style='display: flex; justify-content: space-between; align-items: center;'>";
                    echo "<p style='margin: 0;'>" . htmlspecialchars($rep['report']) . "</p>";

                    echo "<div>";
                    echo "<a href='/edit/" . $rep['id'] . "' class='btn btn-warning btn-sm' style='margin-left: 10px;'>تعديل الشكوى</a>";
                    echo "<a href='/delete/" . $rep['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"هل أنت متأكد من الحذف؟\");'>حذف الشكوى</a>";
                    echo "</div>";
                    echo "</div>";

                    if (!empty($rep['admin_reply'])) {
                        echo "<div class='admin-reply'>";
                        echo "<small><strong>رد الإدارة:</strong></small>";
                        echo "<p style='margin: 0;'>" . htmlspecialchars($rep['admin_reply']) . "</p>";
                        echo "</div>";
                    }

                    echo "</div>";
                }
            }
            ?>

            <center>
            <div class="text-center mt-4">
                <a href="/report" class="btn" style="color: rgba(245, 245, 245, 0.919);">إضافة شكوى جديدة</a>
            </div>
            </center>

        </div>
    </div>

</body>
</html>