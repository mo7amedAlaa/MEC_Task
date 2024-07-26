<?php
// Path to the JSON file where user data is stored
$dataFile = 'database.json';
$data = [];

// Check if the file exists and read data
if (file_exists($dataFile)) {
    $data = json_decode(file_get_contents($dataFile), true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
<link rel="stylesheet" href="Style.css">
</head>
<body>
<div class="container">
    <h1>Registered Users</h1>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>
        <?php if (empty($data)): ?>
            <tr>
                <td colspan="3" class="no-data">No users registered yet.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($data as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($user['image']); ?>" alt="User Image"></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
    <a href="index.php" class="link">Back to Registration Form</a>
</div>
</body>
</html>
