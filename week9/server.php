<?php
session_start();
require "./conn.php";
if (isset($_POST['registration_submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $image = $_FILES['image'];

    if (empty($name) || empty($email) || empty($password) || empty($image['name'])) {
        header("Location: registration.php?error=All fields are required.");
        exit;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: registration.php?error=Invalid email format.");
        exit;
    } elseif (strlen($password) < 5 || strlen($password) > 10) {
        header("Location: registration.php?error=Password must be between 5 and 10 characters.");
        exit;
    } else {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($image['type'], $allowedTypes)) {
            header("Location: registration.php?error=Uploaded file must be an image (JPEG, PNG, or GIF).");
            exit;
        } else {
            $uploadDir ='../week9/uploads/';

            $uploadFile = $uploadDir . basename($image['name']);
            if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
echo 'done';
                try {
                    $stmt = $conn->prepare("INSERT INTO user (name, email, password, image) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$name, $email, $hashedPassword, $uploadFile]);
                    header("Location: registration.php?success=Successfully registered!");
                    exit;
                } catch (PDOException $e) {

                    header("Location: registration.php?error=Database error: " . $e->getMessage());                    exit;
                }
            } else {
                header("Location: registration.php?error=Failed to upload image.");
                exit;
            }
        }
    }
}

if (isset($_POST['login_submit'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        header("Location: login.php?error=All fields are required.");
        exit;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: login.php?error=Invalid email format.");
        exit;
    } else {
        try {
            $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['image'] = $user['image'];


                header("Location: profile.php");
                exit;
            } else {
                header("Location: login.php?error=Invalid email or password.");
                exit;
            }
        } catch (PDOException $e) {
            header("Location: login.php?error=Database error: " . $e->getMessage());
            exit;
        }
    }
}






