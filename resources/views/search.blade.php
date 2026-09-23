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
        body{margin-top: 30px;}
        input{margin-top: 30px;}
        .main-card {margin-top: 30px;}
        .card{
            max-width: 500px;
            margin: 0 auto;
            margin-bottom: 15px;
        }
        .card-title{margin-bottom: 10px;}
        .card-text{margin-bottom: 10px;}
        img{
            width: 100px;
            height: 130px; 
            object-fit: cover; 
            border-radius: 5px; 
            margin-bottom: 15px;
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