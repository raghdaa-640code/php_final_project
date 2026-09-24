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
    <style>
        <style>
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
        font-family: Arial, sans-serif;
    }

    body > h3 {
        margin: 0 0 30px;
        color: var(--burgundy);
        font-size: 27px;
        font-weight: 700;
        text-align: center;
    }

    .row {
        margin: 0;
    }

    .row > .col-md-8 {
        width: 100%;
        max-width: 700px;
        padding: 0;
    }

    form {
        padding: 35px 40px;
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(77, 14, 19, 0.08);
    }

    .save {
        width: 100%;
    }

    textarea.form-control {
        width: 100%;
        min-height: 160px;
        padding: 14px 16px;
        background: var(--cream-light);
        color: var(--text);
        border: 1px solid var(--border);
        border-radius: 11px;
        font-family: inherit;
        font-size: 14px;
        line-height: 1.8;
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

    form .btn {
        padding: 10px 24px;
        border: none;
        border-radius: 22px;
        font-family: inherit;
        font-size: 13px;
        font-weight: 600;
        transition: 0.25s ease;
    }

    form .btn-success {
        background: var(--burgundy);
        color: var(--white);
    }

    form .btn-success:hover {
        background: var(--dark-burgundy);
        color: var(--white);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(77, 14, 19, 0.16);
    }

    form .btn-secondary {
        background: var(--sand);
        color: var(--burgundy);
    }

    form .btn-secondary:hover {
        background: var(--dusty-pink);
        color: var(--dark-burgundy);
        transform: translateY(-2px);
    }

    @media (max-width: 600px) {
        body {
            padding: 35px 15px;
        }

        body > h3 {
            font-size: 23px;
        }

        form {
            padding: 28px 20px;
            border-radius: 17px;
        }

        textarea.form-control {
            min-height: 145px;
        }

        form .btn {
            width: 100%;
            margin-bottom: 8px;
        }
    }
</style>
    </style>
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
