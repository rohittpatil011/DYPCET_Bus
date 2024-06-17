<?php

session_start();

// Connect to the database
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'dypcetbus';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die('Failed to connect to the database: ' . mysqli_connect_error());
}


// Check if the user submitted the login form
if (isset($_POST['submit'])) {
    // Get the user's email and password
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email is registered
    $sql = 'SELECT * FROM students WHERE email = "$email"';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('email', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // The email is not registered
        $error_message = 'The email is not registered.';
    } else {
        // The email is registered
        $user = $result->fetch_assoc();

        // Check if the password is correct
        if (!password_verify($password, $user['password'])) {
            // The password is incorrect
            $error_message = 'The password is incorrect.';
        } else {
            // The password is correct
            // Log the user in
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['id'];

            // Redirect the user to the dashboard
            header('Location: student_home.html');
            exit;
        }
    }
}

// Close the database connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (isset($error_message)) : ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <form action="samplelogin.php" method="post">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
