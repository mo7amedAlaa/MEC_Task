<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
<div class="container">
    <h1>Register</h1>
    <form action="handleSubmit.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>

        <label for="image">Profile Picture:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
        <button type="submit" >Register</button>
        <?php if (isset($_GET['error'])): ?>
        <p  class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>
    </form>

</div>
</body>
</html>

