<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/Style/style.css?v=<?php echo time(); ?>">
    <title>Customer @ Portal</title>
</head>

<body>
    <section class="section">
        <img class="gifImg gifImg1" src="./Assets//images//one.gif" alt="">
        <img class="gifImg gifImg2" src="./Assets//images//two.gif" alt="">
        <div class="LSDiv">
            <h2>
                New Customer
            </h2>
            <form action="" method="POST" name="new customer">
                <div class="LSDivInpDiv">
                    <span>Name :</span>
                    <input name="cname" type="text" />
                </div>
                <div class="LSDivInpDiv">
                    <span>Mobile No : </span>
                    <input name="mob" type="text" />
                </div>
                <div class="LSBtsDiv">
                    <button class="btn"><a href="dashboard.php">Go To Home</a></button>
                    <button class="btn" type="submit" name="submit" value="Add Customer">Add Customer</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
<?php
include('conn.php');
if (isset($_POST['submit'])) {
    if (!empty($_POST['cname']) && !empty($_POST['mob'])) {
        $user = strtolower($_POST['cname']);
        $pass = strtolower($_POST['mob']);
        if (strlen($pass) != 10) {
            echo '<script> alert("Mobile No must be 10 digit") </script>';
        } else {

            mysqli_select_db($conn, 'sam') or die(mysqli_error($conn));
            $query = mysqli_query($conn, "SELECT * FROM customer WHERE cname='" . $user . "'");
            $numrows = mysqli_num_rows($query);
            if ($numrows == 0) {
                $query = mysqli_query($conn, "INSERT INTO customer(cname,mobile) VALUES ('$user','$pass')");
                if ($query) {
                    echo '<script>';
                    echo 'alert(" Customer Registered Successfully")';
                    echo '</script>';
                }
            } else {
                echo '<script>';
                echo 'alert("Customer Already Exists")';
                echo '</script>';
            }
        }
    } else {
        echo '<script>';
        echo ' alert("All fields are required")';
        echo '</script>';
    }
}
?>