<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/Style/style.css?v=<?php echo time(); ?>">
    <title>Login @ Portal</title>
</head>

<body>
    <section class="loginSignupSection">
        <div class="imgBx">
            <img src="./Assets/images/loginGif.gif" alt="" />
        </div>
        <div class="contentBx">
            <img src="./Assets/images/loginGif1.gif" class="gifImage gifImage1" alt="" />
            <img src="./Assets/images/loginGif2.gif" class="gifImage gifImage2" alt="" />
            <img src="./Assets/images/logo.png" alt="" class="logo">
            <div class="formBx">
                <h2 class="active">
                    <a href="#">Login</a>
                </h2>
                <form action="" method="POST" name="login">
                    <div class="inputBx">
                        <span>Username</span>
                        <input name="username" type="text" />
                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input name="password" type="password" />
                    </div>
                    <div class="inputBx">
                        <input type="submit" name="submit" value="sign in" />
                    </div>
                    <div class="inputBx">
                        <button class="regBtn"><a href="register.php">Register</a></button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>
<?php
include('conn.php');
if (isset($_POST['submit'])) {
    if (!($_POST['username'] == 'admin')) {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];
            mysqli_select_db($conn, 'user') or die(mysqli_error($conn));
            $query = mysqli_query($conn, "SELECT * FROM login WHERE user_id='" . $user . "' AND password='" . $pass . "'");
            $numrows = mysqli_num_rows($query);
            if ($numrows != 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $dbusername = $row['user_id'];
                    $dbpassword = $row['password'];
                }
                if ($user == $dbusername && $pass == $dbpassword) {
                    session_start();
                    $_SESSION['sess_user'] = $user;
                    header("location: dashboard.php");
                } else {
                    echo '<script>';
                    echo 'alert(" User Not Found")';
                    echo '</script>';
                }
            } else {
                echo '<script>';
                echo 'alert("Invalid username or password!")';
                echo '</script>';
            }
        } else {
            echo '<script>';
            echo ' alert("All fields are required!")';
            echo '</script>';
        }
    }
    else{
        header("Location: admin.php");
    }
}
?>