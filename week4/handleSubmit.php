<?php

$imageDir = 'uploads/';
if (!file_exists($imageDir)) {
    mkdir($imageDir, 0777, true);
}


$dataFile = 'database.json';

function isValidImage($file) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    return in_array($file['type'], $allowedTypes) && $file['size'] <= 1048576; // 1MB
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_FILES['image'];

    if (!isValidImage($image)) {
        header('Location: index.php?error=Invalid image or file size exceeds 1MB');
        exit();
    }

    $imagePath = $imageDir . basename($image['name']);
    move_uploaded_file($image['tmp_name'], $imagePath);

    $userData = [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
        'image' => $imagePath
    ];

    $data = [];
    if (file_exists($dataFile)) {
        $data = json_decode(file_get_contents($dataFile), true);
    }

    $data[] = $userData;
    file_put_contents($dataFile, json_encode($data));
    header('Location: showPage.php ');
    exit();
}
?>
