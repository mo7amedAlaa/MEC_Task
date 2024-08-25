<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
 </head>

<body class="bg-gray-100 flex flex-col w-full items-center   min-h-screen">
<?php
require "./header.php";
?>
<div class="container flex-1 p-5 mx-auto flex items-center justify-center">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8   h-fit  ">
        <?php
        if($_GET['success']){
            echo "<p class='text-2xl font-semibold text-center   text-white p-4 bg-green-500 mb-2 rounded-lg shadow-md text-center '>$_GET[success]</p>";
        }
        ?>
        <h2 class="text-2xl font-semibold text-center mb-6 text-orange-600">Register</h2>
        <form action="server.php" method="POST" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-orange-700">Name</label>
                <input type="text" name="name" id="name"
                       class="mt-1 block w-full px-3 py-2 border border-orange-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-orange-700">Email</label>
                <input type="email" name="email" id="email"
                       class="mt-1 block w-full px-3 py-2 border border-orange-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-orange-700">Password</label>
                <input type="password" name="password" id="password"
                       class="mt-1 block w-full px-3 py-2 border border-orange-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-orange-700">Profile Image</label>
                <input type="file" name="image" id="image" accept="image/*"
                       class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
            </div>

            <div>
                <button type="submit" name="registration_submit"
                        class="w-full bg-orange-600 text-white py-2 px-4 rounded-md hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                    Register
                </button>
            </div>
        </form>
        <?php
        if($_GET['error']){
            echo "<p class='text-lg font-semibold text-center   text-red-500  mt-2   text-center '>$_GET[error]</p>" ;
        }
        ?>
    </div>
</div>
  <?php
  require "./footer.php";
  ?>
</body>
</html>
