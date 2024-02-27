<!-- File: app/Views/auth/reset_password.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>

    <form action="<?= site_url('update-password') ?>" method="post">
        <input type="hidden" name="token" value="<?= $token ?>">
        
        <label for="password">New Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Update Password</button>
    </form>
</body>
</html>
