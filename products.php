<?php
require 'config.php';

// Auth check
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #23272f;
            margin: 0;
            padding: 0;
            color: #f1f3f8;
        }
        .welcome-container {
            max-width: 600px;
            margin: 40px auto 0 auto;
            background: #2d3142;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(30, 41, 59, 0.18);
            padding: 32px 28px 24px 28px;
            text-align: center;
        }
        .welcome-img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 18px;
            box-shadow: 0 2px 12px rgba(30, 41, 59, 0.18);
        }
        h2 {
            color: #7dcfff;
            margin-top: 0;
        }
        .logout {
            color: #e63946;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
            float: right;
        }
        .logout:hover {
            color: #b5171e;
        }
        .products-list {
            list-style: none;
            padding: 0;
            margin: 32px 0 0 0;
        }
        .products-list li {
            background: #22242c;
            margin-bottom: 16px;
            border-radius: 10px;
            padding: 18px 18px 18px 110px;
            position: relative;
            box-shadow: 0 2px 8px rgba(30, 41, 59, 0.10);
            transition: background 0.2s;
        }
        .products-list li:hover {
            background: #32364a;
        }
        .prod-img-thumb {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            width: 70px;
            height: 70px;
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 0 1px 6px rgba(30, 41, 59, 0.10);
        }
        .prod-link {
            color: #7dcfff;
            text-decoration: none;
            font-size: 1.1em;
            font-weight: 500;
            transition: color 0.2s;
        }
        .prod-link:hover {
            color: #fff;
        }
        .prod-price {
            color: #2b9348;
            font-weight: bold;
            margin-left: 8px;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <a class="logout" href="logout.php">Logout</a>
        <img class="welcome-img" src="images/admin.jpeg" alt="Admin">
        <h2>Welcome, <?= htmlspecialchars($_SESSION['user']); ?>!</h2>
        <h3>Products</h3>
        <ul class="products-list">
            <?php foreach ($PRODUCTS as $id => $prod): ?>
                <li>
                    <img class="prod-img-thumb" src="<?= htmlspecialchars($prod['image']) ?>" alt="<?= htmlspecialchars($prod['name']) ?>">
                    <a class="prod-link" href="product.php?id=<?= $id ?>">
                        <?= htmlspecialchars($prod['name']) ?>
                    </a>
                    <span class="prod-price">₹<?= number_format($prod['price']) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
