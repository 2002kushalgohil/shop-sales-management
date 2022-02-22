<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/Style/style.css?v=<?php echo time(); ?>">
    <title>Register @ Portal</title>
</head>

<body>
    <section class="section">
        <img class="gifImg gifImg1" src="./Assets//images//one.gif" alt="">
        <img class="gifImg gifImg2" src="./Assets//images//two.gif" alt="">
        <div class="LSDiv">
            <h2>
                Register
            </h2>
            <form action="" method="POST" name="login">
                <div class="LSDivInpDiv">
                    <span>Username</span>
                    <input name="username" type="text" />
                </div>
                <div class="LSDivInpDiv">
                    <span>Password</span>
                    <input name="password" type="password" />
                </div>
                <div class="LSDivInpDiv">
                    <span>Security Key</span>
                    <input name="key" type="password" />
                </div>
                <div class="LSBtsDiv">
                    <button class="btn"><a href="login.php">Already a Member ?</a></button>
                    <button class="btn" type="submit" name="register" value="Register">Submit</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
<?php
include('conn.php');
if (isset($_POST['register'])) {
    if ($_POST['key'] == "KG22VA30") {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];
            mysqli_select_db($conn, 'user') or die(mysqli_error($conn));
            $query = mysqli_query($conn, "SELECT * FROM login WHERE user_id='" . $user . "'");
            $numrows = mysqli_num_rows($query);
            if ($numrows == 0) {
                $query = mysqli_query($conn, "INSERT INTO login (user_id,password) VALUES ('$user','$pass')");
                if ($query) {
                    echo '<script>';
                    echo 'alert("User Registered Successfully")';
                    echo '</script>';
                }
            } else {
                echo '<script>';
                echo 'alert("User Already Exits")';
                echo '</script>';
            }
        } else {
            echo '<script>';
            echo ' alert("All fields are required")';
            echo '</script>';
        }
    } else {
        echo '<script>';
        echo 'alert("Not Authorised To Register");';
        echo '</script>';
    }
}
?>