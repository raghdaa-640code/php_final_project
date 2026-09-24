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
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap');
:root {
    --cream: #EEE4DA;
    --cream-light: #F8F2EC;
    --sand: #D8C4AC;
    --dusty-pink: #C8A49F;
    --burgundy: #4D0E13;
    --dark-burgundy: #3A080C;
    --text: #3E2A2B;
    --muted: #806D6D;
    --white: #FFFFFF;
    --border: #DED1C7;
}

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    min-height: 100vh;
    padding: 45px 20px;
    background: var(--cream-light);
    color: var(--text);
    font-family: 'Cairo', sans-serif;
}

/* العنوان */
h3.text {
    margin: 0 0 35px;
    color: var(--burgundy);
    font-size: 28px;
    font-weight: 700;
    text-align: center;
}

/* الحاوية */
.reports {
    width: 100%;
    max-width: 800px;
}

/* كارت الشكوى */
.report-card {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 18px;
    padding: 22px 25px;
    margin-bottom: 18px;
    box-shadow: 0 8px 25px rgba(77, 14, 19, 0.07);
    transition: 0.25s ease;
}

.report-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 28px rgba(77, 14, 19, 0.11);
}

/* نص الشكوى */
.report-card > div:first-child {
    gap: 20px;
}

.report-card p {
    color: var(--text);
    font-size: 14px;
    line-height: 1.8;
}

/* أزرار تعديل وحذف */
.report-card .btn {
    border: none;
    border-radius: 20px;
    padding: 8px 14px;
    font-family: inherit;
    font-size: 11px;
    font-weight: 600;
    transition: 0.25s ease;
    white-space: nowrap;
}

.report-card .btn-warning {
    background: var(--sand);
    color: var(--burgundy);
}

.report-card .btn-warning:hover {
    background: var(--dusty-pink);
    color: var(--dark-burgundy);
    transform: translateY(-2px);
}

.report-card .btn-danger {
    background: #8E3038;
    color: var(--white);
}

.report-card .btn-danger:hover {
    background: #6F2028;
    transform: translateY(-2px);
}

/* رد الإدارة */
.admin-reply {
    background: var(--cream);
    border-right: 4px solid var(--burgundy);
    padding: 13px 16px;
    margin-top: 18px;
    border-radius: 10px;
}

.admin-reply small {
    display: block;
    margin-bottom: 5px;
    color: var(--burgundy);
    font-size: 11px;
}

.admin-reply p {
    margin: 0 !important;
    color: var(--text);
    font-size: 13px;
}

/* زر إضافة شكوى */
.text-center.mt-4 {
    max-width: 250px;
    margin: 30px auto 0 !important;
    border: none;
    border-radius: 25px;
    background: var(--burgundy);
    transition: 0.25s ease;
}

.text-center.mt-4:hover {
    background: var(--dark-burgundy);
    transform: translateY(-2px);
    box-shadow: 0 7px 16px rgba(77, 14, 19, 0.16);
}

.text-center.mt-4 .btn {
    width: 100%;
    padding: 11px 20px;
    color: var(--white) !important;
    font-family: inherit;
    font-size: 13px;
    font-weight: 600;
}

/* الموبايل */
@media (max-width: 650px) {

    body {
        padding: 30px 15px;
    }

    h3.text {
        font-size: 23px;
        margin-bottom: 25px;
    }

    .report-card {
        padding: 18px;
    }

    .report-card > div:first-child {
        flex-direction: column !important;
        align-items: stretch !important;
        gap: 15px;
    }

    .report-card > div:first-child > div {
        display: flex;
        gap: 8px;
    }

    .report-card .btn {
        flex: 1;
        margin-left: 0 !important;
        text-align: center;
    }

    .admin-reply {
        padding: 12px;
    }

    .text-center.mt-4 {
        max-width: 100%;
    }
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
