<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col items-center   min-h-screen">
<?php
require "./header.php";
?>
<div class="container flex-1 p-5 mx-auto flex items-center justify-center  ">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full my-6 max-w-sm h-fit">
        <h2 class="text-2xl font-bold mb-4 text-center text-orange-500">Login</h2>

        <?php
        session_start();
        if (isset($_SESSION['user_id'])) {
            header("Location: profile.php");
            exit;
        }
        if (isset($_GET['error'])) {
            echo '<p class="text-red-500 mb-4">' . htmlspecialchars($_GET['error']) . '</p>';
        }
        ?>

        <form action="server.php" method="post">
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password:</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
            </div>
            <button type="submit" name="login_submit" class="w-full bg-orange-500 text-white py-2 rounded-md hover:bg-orange-600 transition duration-300">Login</button>
        </form>
    </div>

</div>
<?php
require "./footer.php";
?>
</body>
</html>
