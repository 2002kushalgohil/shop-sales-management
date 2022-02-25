<?php
include "conn.php";
$id = $_GET['id'];
mysqli_select_db($conn, 'sam') or die(mysqli_error($conn));
$qry = mysqli_query($conn, "SELECT * FROM sale WHERE sid='$id'");
$data = mysqli_fetch_array($qry);
$iname = $data['iname'];
$ipquery = mysqli_query($conn, "SELECT iprice FROM item WHERE iname='$iname'");
if (mysqli_num_rows($ipquery) > 0) {
    $row = mysqli_fetch_assoc($ipquery);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/Style/style.css">
    <title>Update @ Portal</title>
</head>

<body>
    <section class="section">
        <img class="gifImg gifImg1" src="./Assets//images//one.gif" alt="">
        <img class="gifImg gifImg2" src="./Assets//images//two.gif" alt="">
        <div class="LSDiv">
            <h2>
                Update Data
            </h2>
            <form action="" method="POST">
                <div class="LSDivInpDiv">
                    <p>Customer Name</p>
                    <input type="text" name="cname" value="<?php echo $data['cname'] ?>" placeholder="Customer Name" Required>
                </div>
                <div class="LSDivInpDiv">
                    <p>Item Name</p>
                    <input type="text" name="iname" value="<?php echo $data['iname'] ?>" placeholder="Item Name" Required>
                </div>
                <div class="LSDivInpDiv">
                    <p>Item Quantity</p>
                    <input type="number" name="iqty" value="<?php echo $data['iqty'] ?>" placeholder="Item quantity" Required>
                </div>
                <div class="LSDivInpDiv">
                    <p>Item Price</p>
                    <input type="number" name="iprice" value="<?php echo $row['iprice'] ?>" placeholder="Item price" Required>
                </div>
                <div class="LSDivInpDiv">
                    <p>Amount Paid</p>
                    <input type="number" name="amtpaid" value="<?php echo $data['amtpaid'] ?>" placeholder="amount Paid" Required>
                </div>
                <div class="LSBtsDiv">
                    <button class="btn"><a href="dashboard.php">Go To Home</a></button>
                    <button class="btn" type="submit" name="update" value="Update">Update</button>
                </div>
            </form>
        </div>
    </section>



</body>

</html>
<?php
if (isset($_POST['update'])) {
    $cname = $_POST['cname'];
    $iname = $_POST['iname'];
    $iprice = $_POST['iprice'];
    $iqty = $_POST['iqty'];
    $stotal = $iprice * $iqty;
    $amtpaid = $_POST['amtpaid'];
    $amtdue = $stotal - $amtpaid;
    if ($amtdue > 0) {
        $status = "UnPaid";
    } else {
        $status = "Paid";
    }
    $edit = mysqli_query($conn, "UPDATE sale SET cname='$cname',iname='$iname',iprice='$iprice',
        iqty='$iqty',stotal='$stotal',amtpaid='$amtpaid',amtdue='$amtdue',estatus='$status' WHERE sid='$id'");

    if ($edit) {
        echo "<script>alert('Data Updated Successfully')</script>";
        mysqli_close($db);
        header("location: dashboard.php");
        exit;
    } else {
        echo mysqli_error($conn);
    }
}
?>