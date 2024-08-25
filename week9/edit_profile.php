<?php
session_start();
require "./conn.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=Please login to access this page.");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $image = $_FILES['image'];

    if (empty($name) || empty($email)) {
        header("Location: edit_profile.php?error=All fields are required.");
        exit;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: edit_profile.php?error=Invalid email format.");
        exit;
    } else {
        try {
            if ($image['name']) {
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (!in_array($image['type'], $allowedTypes)) {
                    header("Location: edit_profile.php?error=Uploaded file must be an image (JPEG, PNG, or GIF).");
                    exit;
                }
                $uploadDir = 'uploads/';
                $uploadFile = $uploadDir . basename($image['name']);
                move_uploaded_file($image['tmp_name'], $uploadFile);
            } else {
                $uploadFile = $_SESSION['image'];
            }

            $stmt = $conn->prepare("UPDATE user SET name = ?, email = ?, image = ? WHERE id = ?");
            $stmt->execute([$name, $email, $uploadFile, $_SESSION['user_id']]);

            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['image'] = $uploadFile;

            header("Location: profile.php?success=Profile updated successfully.");
            exit;
        } catch (PDOException $e) {
            header("Location: edit_profile.php?error=Database error: " . $e->getMessage());
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col items-center   min-h-screen">
<?php
require "./header.php";
?>
<div class="container flex-1 p-5 mx-auto flex items-center justify-center">

<div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-sm h-fit">
    <h2 class="text-2xl font-bold mb-4 text-center text-orange-500">Edit Profile</h2>

    <?php
    if (isset($_GET['error'])) {
        echo '<p class="text-red-500 mb-4">' . htmlspecialchars($_GET['error']) . '</p>';
    }
    ?>

    <form action="edit_profile.php" method="post" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($_SESSION['name']) ?>" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($_SESSION['email']) ?>" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>

</div>
<div class="mb-4">
    <label for="image" class="block text-gray-700">Profile Image:</label>
    <input type="file" id="image" name="image" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
</div>
<button type="submit" name="edit_profile_submit" class="w-full bg-orange-500 text-white py-2 rounded-md hover:bg-orange-600 transition duration-300">Save Changes</button>
</form>
</div>
</div>
<?php
require "./footer.php";
?>
</body>
</html>
