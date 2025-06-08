<?php
require 'config.php';

session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logged Out | PHP Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: linear-gradient(120deg, #23272f 0%, #2d3142 100%);
            color: #f1f3f8;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .logout-container {
            background: #2d3142;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(30, 41, 59, 0.18);
            padding: 40px 36px 32px 36px;
            text-align: center;
            max-width: 350px;
        }
        .logout-container img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 18px;
            box-shadow: 0 2px 12px rgba(30, 41, 59, 0.18);
        }
        h2 {
            color: #7dcfff;
            margin: 0 0 10px 0;
        }
        p {
            color: #bfc9d1;
            margin-bottom: 24px;
        }
        a.button {
            display: inline-block;
            background: linear-gradient(90deg, #3b5bdb 0%, #5f8efc 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 32px;
            font-size: 1.1em;
            font-weight: bold;
            text-decoration: none;
            transition: background 0.2s;
            box-shadow: 0 2px 8px rgba(30, 41, 59, 0.10);
        }
        a.button:hover {
            background: linear-gradient(90deg, #274690 0%, #3b5bdb 100%);
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <img src="images/admin.jpeg" alt="Admin">
        <h2>Goodbye!</h2>
        <p>You have been logged out.<br>We hope to see you again soon.</p>
        <a class="button" href="login.php">Log in again</a>
    </div>
</body>
</html>
