<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased text-gray-900">
<?php
include 'header.php';
?>
<section class="bg-cover bg-center h-screen">
    <div class="container mx-auto h-full flex justify-center items-center text-center">
        <div class="bg-black bg-opacity-50 p-8 rounded-lg">
            <h1 class="text-4xl font-bold text-white mb-4">Welcome to Our  Week9_Task</h1>
            <p class="text-white mb-6">Join us to enjoy exclusive features and services.</p>
            <div>
                <a href="login.php" class="bg-white text-orange-500 py-2 px-4 rounded hover:bg-gray-100 mr-4">Login</a>
                <a href="registration.php" class="bg-orange-500 text-white py-2 px-4 rounded hover:bg-orange-600">Register</a>
            </div>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>

</body>
</html>
