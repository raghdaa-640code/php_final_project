<?php

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

$search_ByTitle = isset($_GET['title']) ? trim($_GET['title']) : '';
$search_ByType  = isset($_GET['type']) ? trim($_GET['type']) : '';

$books = [];

if (!empty($search_ByTitle) && !empty($search_ByType)) {
    $stmt = $pdo->prepare("SELECT books.*, users.phone AS user_phone FROM books JOIN users ON books.user_id = users.id WHERE books.title LIKE ? AND books.type LIKE ?");
    $stmt->execute(["$search_ByTitle", "$search_ByType"]);
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
} 

elseif (!empty($search_ByTitle)) {
    $stmt = $pdo->prepare("SELECT books.*, users.phone AS user_phone FROM books JOIN users ON books.user_id = users.id WHERE books.title LIKE ?");
    $stmt->execute(["$search_ByTitle"]);
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
} 

elseif (!empty($search_ByType)) {
    $stmt = $pdo->prepare("SELECT books.*, users.phone AS user_phone FROM books JOIN users ON books.user_id = users.id WHERE books.type LIKE ?");
    $stmt->execute(["$search_ByType"]);
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
} 

else {
    $books = [];
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>بحث الكتب</title>
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
    padding: 40px 20px;

    background: var(--cream-light);
    color: var(--text);

    font-family: 'Cairo', sans-serif;
}

/* =========================
   PAGE TITLE
========================= */

.search {
    margin: 0 0 35px;

    color: var(--burgundy);

    font-size: 30px;
    font-weight: 700;

    text-align: center;
}

.search center {
    display: block;
}

/* =========================
   SEARCH FORM
========================= */

form.row {
    max-width: 850px;

    margin: 0 auto;
    padding: 25px;

    background: var(--white);

    border: 1px solid var(--border);
    border-radius: 18px;

    box-shadow: 0 8px 25px rgba(77, 14, 19, 0.07);
}

/* Inputs */

form.row input.form-control {
    width: 100%;
    height: 46px;

    margin-top: 0;

    padding: 0 15px;

    background: var(--cream-light);

    color: var(--text);

    border: 1px solid var(--border);
    border-radius: 10px;

    font-size: 14px;

    outline: none;

    transition: 0.25s ease;
}

form.row input.form-control:focus {
    background: var(--white);

    border-color: var(--dusty-pink);

    box-shadow: 0 0 0 3px rgba(200, 164, 159, 0.18);
}

form.row input::placeholder {
    color: var(--muted);
}

/* Search button */

form.row > .btn {
    width: 100%;

    margin-top: 5px;

    text-align: center;
}

form.row > .btn button {
    min-width: 140px;

    padding: 11px 28px;

    background: var(--burgundy);
    color: var(--white);

    border: none;
    border-radius: 24px;

    font-size: 14px;
    font-weight: 600;

    transition: 0.25s ease;
}

form.row > .btn button:hover {
    background: var(--dark-burgundy);

    transform: translateY(-2px);

    box-shadow: 0 6px 15px rgba(77, 14, 19, 0.16);
}

/* =========================
   RESULTS
========================= */

.main-card {
    max-width: 1100px;

    margin: 40px auto 0;

    display: flex;
    flex-wrap: wrap;

    justify-content: center;

    gap: 22px;
}

/* =========================
   BOOK CARD
========================= */

.main-card > .card {
    width: 300px;
    min-height: 410px;

    margin: 0;

    background: var(--white);

    border: 1px solid var(--border);
    border-radius: 20px;

    overflow: hidden;

    box-shadow: 0 8px 25px rgba(77, 14, 19, 0.08);

    transition: 0.25s ease;
}

.main-card > .card:hover {
    transform: translateY(-6px);

    box-shadow: 0 15px 30px rgba(77, 14, 19, 0.13);
}

.main-card .card-body {
    padding: 25px 20px;
}

/* =========================
   BOOK IMAGE
========================= */

.main-card img {
    width: 120px;
    height: 160px;

    object-fit: cover;

    margin: 0 auto 18px;

    border-radius: 10px;

    border: 1px solid var(--border);

    box-shadow: 0 5px 15px rgba(77, 14, 19, 0.08);
}

/* =========================
   BOOK TITLE
========================= */

.main-card .card-title {
    margin: 0 0 18px;

    color: var(--burgundy);

    font-size: 20px;
    font-weight: 700;

    line-height: 1.5;
}

/* =========================
   BOOK DETAILS
========================= */

.main-card .card-text {
    margin-bottom: 9px;

    color: var(--text);

    font-size: 13px;
    line-height: 1.7;
}

/* =========================
   REQUEST BUTTON
========================= */

.main-card form:not(.row) {
    margin-top: 16px;
}

.main-card .btn-success {
    padding: 9px 20px;

    background: var(--burgundy);
    color: var(--white);

    border: none;
    border-radius: 22px;

    font-size: 12px;
    font-weight: 600;

    transition: 0.25s ease;
}

.main-card .btn-success:hover {
    background: var(--dark-burgundy);

    transform: translateY(-2px);

    box-shadow: 0 5px 12px rgba(77, 14, 19, 0.15);
}

/* =========================
   PHONE MESSAGE
========================= */

.main-card p[style*="198754"] {
    margin-top: 15px !important;
    padding: 10px 12px;

    background: #E9F3EC;

    color: #356B47 !important;

    border-radius: 10px;

    font-size: 12px;
}

/* =========================
   UNAVAILABLE MESSAGE
========================= */

.main-card .text-danger {
    margin-top: 15px;

    padding: 9px 12px;

    background: #F8E8E9;

    color: #8E3038 !important;

    border-radius: 10px;

    font-size: 12px;
}

/* =========================
   NO RESULTS
========================= */

.main-card .alert-warning {
    width: 100%;
    max-width: 600px;

    margin: 10px auto;
    padding: 16px 20px;

    background: var(--cream);

    color: var(--burgundy);

    border: 1px solid var(--border);
    border-radius: 12px;

    font-size: 14px;
}

/* =========================
   INITIAL MESSAGE
========================= */

.main-card .text-muted {
    width: 100%;

    padding: 20px;

    background: var(--white);

    color: var(--muted) !important;

    border: 1px solid var(--border);
    border-radius: 14px;

    font-size: 14px;
}

/* =========================
   RESPONSIVE
========================= */

@media (max-width: 700px) {

    body {
        padding: 30px 15px;
    }

    .search {
        font-size: 25px;
        margin-bottom: 25px;
    }

    form.row {
        padding: 20px;
    }

    form.row > .btn button {
        width: 100%;
    }

    .main-card {
        margin-top: 30px;
    }

    .main-card > .card {
        width: 100%;
        max-width: 360px;
    }
}

@media (max-width: 450px) {

    body {
        padding: 25px 12px;
    }

    .search {
        font-size: 22px;
    }

    form.row {
        padding: 16px;
    }

    .main-card > .card {
        min-height: 390px;
    }
}
    </style>
</head>
<body class="container">

    <h2 class="search"><center> البحث عن الكتب </center></h2>

    <form method="GET" action="" class="row g-3">

        <!-- By name -->
        <div class="col-md-6">
            <input type="text" name="title" value="<?php echo htmlspecialchars($search_ByTitle); ?>" class="form-control" placeholder="اسم الكتاب ...">
        </div>
        
        <!-- By type -->
        <div class="col-md-6">
            <input type="text" name="type" value="<?php echo htmlspecialchars($search_ByType); ?>" class="form-control" placeholder="... نوع الكتاب">
        </div>

        <!-- search Button -->
        <div class="btn">
            <button type="submit" class="btn btn-primary">البحث</button>
        </div>
    </form>

    <div class="main-card">
        <?php if (!empty($search_ByTitle) || !empty($search_ByType)): ?>
            <?php if (!empty($books)): ?>
                <?php foreach ($books as $book): ?>
                        <div class="card">
                            <div class="card-body">
                                <center>
                                
                                <?php if (!empty($book['image'])): ?>
                                    <img src="storage/images/<?php echo htmlspecialchars($book['image']); ?>" alt="صورة الكتاب">
                                <?php endif; ?>

                                <h3 class="card-title"><?php echo htmlspecialchars($book['title']); ?></h3>
                                <p class="card-text"> الوضع الحالي : <?php echo htmlspecialchars($book['state']); ?></p>
                                <p class="card-text">النوع: <?php echo htmlspecialchars($book['type']); ?></p>
                                <p class="card-text">الحالة: <?php echo htmlspecialchars($book['status']); ?></p>

                                <?php 
                                    $currentState = trim($book['state'] ?? '');
                                    $currentStatus = trim($book['status'] ?? '');
                                    
                                    $isAvailable = ($currentState == 'متاح' || strtolower($currentState) == 'available' || $currentStatus == 'متاح' || strtolower($currentStatus) == 'available');
                                ?>

                                <?php if ($isAvailable): ?>
                                    
                                    <?php 
                                        $isRequested = isset($_GET['request_book_id']) && $_GET['request_book_id'] == $book['id'];
                                    ?>

                                    <?php if ($isRequested): ?>
                                        <p style="font-weight: bold; color: #198754; margin-top: 10px;">
                                            رقم تليفون صاحب الكتاب: <?php echo htmlspecialchars($book['user_phone'] ?? 'غير متوفر'); ?>
                                        </p>
                                    <?php else: ?>
                                        <form method="GET" action="">
                                            <input type="hidden" name="title" value="<?php echo htmlspecialchars($search_ByTitle); ?>">
                                            <input type="hidden" name="type" value="<?php echo htmlspecialchars($search_ByType); ?>">
                                            <input type="hidden" name="request_book_id" value="<?php echo $book['id']; ?>">
                                            
                                            <button type="submit" class="btn btn-success btn-sm mb-2">
                                                اطلب الكتاب الآن
                                            </button>
                                        </form>
                                    <?php endif; ?>

                                <?php else: ?>
                                    <p class="text-danger">هذا الكتاب غير متاح حالياً</p>
                                <?php endif; ?>

                                </center>
                            </div>
                        </div>
                <?php endforeach; ?>

            <?php else: ?>
                <div class="col-12 text-center">
                    <div class="alert alert-warning">عذراً، هذا الكتاب غير متاح حالياً.</div>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <div class="col-12 text-center">
                <p class="text-muted">الرجاء إدخال اسم أو نوع الكتاب للبحث...</p>
            </div>
        <?php endif; ?>
    </div>
    
</body>
</html>
