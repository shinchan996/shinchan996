<?php
require 'config.php';

// Auth check
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$id = (int)($_GET['id'] ?? 0);
if (!isset($PRODUCTS[$id])) {
    die('Product not found');
}
$prod = $PRODUCTS[$id];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($prod['name']) ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #23272f;
            margin: 0;
            padding: 0;
            color: #f1f3f8;
        }
        .container {
            max-width: 500px;
            margin: 40px auto;
            background: #2d3142;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(30, 41, 59, 0.18);
            padding: 32px 28px 24px 28px;
        }
        h2 {
            color: #7dcfff;
            margin-top: 0;
        }
        .price {
            font-size: 1.3em;
            color: #2b9348;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .desc {
            margin-bottom: 18px;
            color: #bfc9d1;
        }
        .back {
            display: inline-block;
            margin-bottom: 18px;
            color: #7dcfff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        .back:hover {
            color: #fff;
        }
        .logout {
            float: right;
            color: #e63946;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        .logout:hover {
            color: #b5171e;
        }
        img {
            display: block;
            margin: 0 auto 18px auto;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(30, 41, 59, 0.18);
        }
    </style>
</head>
<body>
    <div class="container">
        <a class="back" href="products.php">← Back to list</a>
        <a class="logout" href="logout.php">Logout</a>
        <h2><?= htmlspecialchars($prod['name']) ?></h2>
        <div class="price">Price: ₹<?= number_format($prod['price']) ?></div>
        <div class="desc"><?= nl2br(htmlspecialchars($prod['description'])) ?></div>
        <?php if (!empty($prod['image'])): ?>
            <img src="<?= htmlspecialchars($prod['image']) ?>" alt="<?= htmlspecialchars($prod['name']) ?>" width="300">
        <?php endif; ?>
    </div>
</body>
</html>
