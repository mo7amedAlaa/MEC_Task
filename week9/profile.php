<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=Please login to access this page.");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col items-center   min-h-screen">
<?php
require "./header.php";
?>
<div class="container flex-1 p-5 mx-auto flex items-center justify-center">

<div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-sm h-fit">
    <h2 class="text-2xl font-bold mb-4 text-center text-orange-500">Profile</h2>

    <img src="<?= htmlspecialchars($_SESSION['image']) ?>" alt="Profile Image" class="w-24 h-24 rounded-full mx-auto mb-4">
    <p class="text-gray-700 mb-2"><strong>Name:</strong> <?= htmlspecialchars($_SESSION['name']) ?></p>
    <p class="text-gray-700 mb-4"><strong>Email:</strong> <?= htmlspecialchars($_SESSION['email']) ?></p>

    <a href="edit_profile.php" class="block w-full text-center bg-orange-500 text-white py-2 rounded-md hover:bg-orange-600 transition duration-300">Edit Profile</a>
    <a href="logout.php" class="block w-full text-center mt-4 bg-red-500 text-white py-2 rounded-md hover:bg-red-600 transition duration-300">Logout</a>
</div>
</div>
<?php
require "./footer.php";
?>
</body>
</html>
