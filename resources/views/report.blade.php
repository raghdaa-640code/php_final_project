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
    padding: 50px 20px;

    background: var(--cream-light);
    color: var(--text);

    font-family: 'Cairo', sans-serif;
}

/* =========================
   PAGE TITLE
========================= */

body > h3 {
    margin-bottom: 30px !important;

    color: var(--burgundy);

    font-size: 28px;
    font-weight: 700;
}

/* =========================
   REPORT CARD
========================= */

body > .card {
    width: 100%;
    max-width: 600px;

    margin: 0 auto;

    padding: 35px 40px;

    background: var(--white);

    border: 1px solid var(--border);
    border-radius: 20px;

    box-shadow: 0 10px 30px rgba(77, 14, 19, 0.08);
}

/* =========================
   SUCCESS MESSAGE
========================= */

.card .alert {
    margin-bottom: 25px;

    padding: 12px 15px;

    background: #E9F3EC;
    color: #356B47;

    border: 1px solid #C9DFCF;
    border-radius: 10px;

    font-size: 13px;
}

/* =========================
   LABEL
========================= */

.form-label {
    display: block;

    margin-bottom: 9px;

    color: var(--burgundy);

    font-size: 14px;
    font-weight: 600;
}

/* =========================
   TEXTAREA
========================= */

textarea.form-control {
    min-height: 150px;

    padding: 13px 15px;

    background: var(--cream-light);

    color: var(--text);

    border: 1px solid var(--border);
    border-radius: 11px;

    font-family: inherit;
    font-size: 14px;

    resize: vertical;

    outline: none;

    transition: 0.25s ease;
}

textarea.form-control:focus {
    background: var(--white);

    border-color: var(--dusty-pink);

    box-shadow: 0 0 0 3px rgba(200, 164, 159, 0.18);
}

textarea.form-control::placeholder {
    color: var(--muted);
}

/* =========================
   SUBMIT BUTTON
========================= */

.card button[type="submit"] {
    min-width: 220px;

    padding: 12px 35px;

    background: var(--burgundy) !important;
    color: var(--white) !important;

    border: none !important;
    border-radius: 24px !important;

    font-family: inherit;
    font-size: 14px;
    font-weight: 600;

    cursor: pointer;

    transition: 0.25s ease;
}

.card button[type="submit"]:hover {
    background: var(--dark-burgundy) !important;

    transform: translateY(-2px);

    box-shadow: 0 7px 16px rgba(77, 14, 19, 0.16);
}

.card button[type="submit"]:active {
    transform: translateY(0);
}

/* =========================
   RESPONSIVE
========================= */

@media (max-width: 600px) {

    body {
        padding: 35px 15px;
    }

    body > h3 {
        font-size: 24px;
    }

    body > .card {
        padding: 28px 20px;

        border-radius: 17px;
    }

    textarea.form-control {
        min-height: 140px;
    }

    .card button[type="submit"] {
        width: 100%;
        min-width: 0;
    }
}
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
