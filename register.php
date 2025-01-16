<?php
require_once 'connect.php';
require_once 'header1.php';

echo '<h2 class="w3-container w3-teal">Register</h2>';

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($dbcon, $_POST['username']);
    $email = mysqli_real_escape_string($dbcon, $_POST['email']);
    $password = mysqli_real_escape_string($dbcon, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($dbcon, $_POST['confirm_password']);

    // Check if username or email already exists
    $sql_check = "SELECT * FROM admin WHERE username = '$username' OR email = '$email'";
    $result_check = mysqli_query($dbcon, $sql_check);
    $row_count = mysqli_num_rows($result_check);

    if ($row_count > 0) {
        echo "<div class='w3-panel w3-pale-red w3-display-container'>Username or email already exists. Please choose a different one.</div>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='w3-panel w3-pale-red w3-display-container'>Invalid email format.</div>";
    } elseif ($password !== $confirm_password) {
        echo "<div class='w3-panel w3-pale-red w3-display-container'>Passwords do not match.</div>";
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert the new user into the database
        $sql_insert = "INSERT INTO admin (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        if (mysqli_query($dbcon, $sql_insert)) {
            echo "<div class='w3-panel w3-pale-green w3-display-container'>Registration successful. <a href='login.php'>Login here</a>.</div>";
        } else {
            echo "<div class='w3-panel w3-pale-red w3-display-container'>An error occurred. Please try again later.</div>";
        }
    }
}
?>

<form action="" method="POST" class="w3-container w3-padding">
    <label>Username</label>
    <input type="text" name="username" value="<?php if (isset($_POST['username'])) { echo strip_tags($_POST['username']); } ?>" class="w3-input w3-border" required>
    <label>Email</label>
    <input type="email" name="email" value="<?php if (isset($_POST['email'])) { echo strip_tags($_POST['email']); } ?>" class="w3-input w3-border" required>
    <label>Password</label>
    <input type="password" name="password" class="w3-input w3-border" required>
    <label>Confirm Password</label>
    <input type="password" name="confirm_password" class="w3-input w3-border" required>
    <p><input type="submit" name="register" value="Register" class="w3-btn w3-teal"></p>
</form>

<?php
include("footer.php");
?>
