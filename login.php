<?php
require 'config.php';

// Redirect if already logged in
if (isset($_SESSION['user'])) {
    header('Location: products.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($USER_CREDENTIALS[$username]) && $USER_CREDENTIALS[$username] === $password) {
        $_SESSION['user'] = $username;
        header('Location: products.php');
        exit;
    }
    $error = 'Invalid username or password';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(120deg, #23272f 0%, #2d3142 100%);
            margin: 0;
            padding: 0;
            color: #f1f3f8;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            max-width: 400px;
            margin: 40px auto;
            background: #2d3142;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(30, 41, 59, 0.18);
            padding: 36px 32px 28px 32px;
            text-align: center;
            opacity: 0;
            transform: translateY(40px) scale(0.98);
            animation: fadeInUp 0.8s cubic-bezier(.23,1.02,.32,1) 0.1s forwards;
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        .login-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 18px;
            box-shadow: 0 2px 12px rgba(30, 41, 59, 0.18);
            opacity: 0;
            transform: scale(0.7);
            animation: avatarPop 0.7s cubic-bezier(.23,1.02,.32,1) 0.5s forwards;
        }
        @keyframes avatarPop {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        h2 {
            color: #7dcfff;
            margin-top: 0;
            margin-bottom: 18px;
            opacity: 0;
            animation: fadeInText 0.7s cubic-bezier(.23,1.02,.32,1) 0.7s forwards;
        }
        @keyframes fadeInText {
            to {
                opacity: 1;
            }
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 16px;
            opacity: 0;
            animation: fadeInText 0.7s cubic-bezier(.23,1.02,.32,1) 0.9s forwards;
        }
        label {
            font-weight: 500;
            color: #bfc9d1;
            text-align: left;
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            border: 1px solid #495057;
            border-radius: 8px;
            font-size: 1em;
            background: #23272f;
            color: #f1f3f8;
            transition: border 0.2s, box-shadow 0.2s;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border: 1.5px solid #7dcfff;
            outline: none;
            box-shadow: 0 0 0 2px #7dcfff33;
        }
        button[type="submit"] {
            background: linear-gradient(90deg, #3b5bdb 0%, #5f8efc 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 0;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            margin-top: 8px;
            transition: background 0.2s, transform 0.15s;
        }
        button[type="submit"]:hover {
            background: linear-gradient(90deg, #274690 0%, #3b5bdb 100%);
            transform: scale(1.04);
        }
        .error {
            color: #e63946;
            background: #3a1a1a;
            border-radius: 6px;
            padding: 8px 12px;
            margin-bottom: 10px;
            text-align: center;
            opacity: 0;
            animation: fadeInText 0.7s cubic-bezier(.23,1.02,.32,1) 1.1s forwards;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img class="login-avatar" src="images/admin.jpeg" alt="Admin">
        <h2>Login</h2>
        <?php if ($error): ?>
            <div class="error"> <?= htmlspecialchars($error) ?> </div>
        <?php endif; ?>
        <form method="post">
            <label>Username:<br><input type="text" name="username" required autocomplete="username"></label>
            <label>Password:<br><input type="password" name="password" required autocomplete="current-password"></label>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
