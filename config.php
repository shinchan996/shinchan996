<?php
// Common config, session start, hard‑coded creds & product list
session_start();

$USER_CREDENTIALS = [
    // username => password (plain for demo – use hashing in prod!)
    'admin' => 'admin123',
];

$PRODUCTS = [
    1 => [
        'name'        => 'iPhone 15',
        'price'       => 79999,
        'description' => 'Latest Apple iPhone with A18 chip',
        'image'       => 'images/iphone15.jpg',
    ],
    2 => [
        'name'        => 'Samsung Galaxy S25',
        'price'       => 69999,
        'description' => 'Flagship Samsung phone with Exynos X',
        'image'       => 'images/galaxyS25.jpg',
    ],
    3 => [
        'name'        => 'OnePlus 13',
        'price'       => 55999,
        'description' => 'Smooth OxygenOS experience with Snapdragon 9 Gen 4',
        'image'       => 'images/oneplus13.jpg',
    ],
];
?>
