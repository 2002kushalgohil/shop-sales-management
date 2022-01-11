<?php
    include "conn.php";
    $id = $_GET['id'];
    mysqli_select_db($conn, 'sam') or die(mysqli_error($conn));
    $qry = mysqli_query($conn, "SELECT * FROM sale WHERE sid='$id'");
    $data = mysqli_fetch_array($qry);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./Assets/Style/style.css">
        <title>Update @ Portal</title>
        <style>
            .heading {
                display: grid;
                background-color: red;
                place-items: center;
                width: 20rem;
                height: 3rem;
                border-radius: 1.5rem;
                margin: auto auto 1rem auto;
                background-color: #fff;
                color: var(--main-Color);
                font-weight: 900;
                border: .2rem solid #036ffc;
            }

            .dahsboardFormDiv {
                display: flex;
                align-items: center;
                flex-direction: column;
                flex-wrap: wrap;
                
            }
            .dahsboardForm {
                display: flex;
                flex-wrap: wrap;
                width:50%;
                height:fit-content;
            }
        </style>
    </head>

    <body>

        
        <div class="dahsboardFormDiv">
        <nav>
            <img src="./Assets/images/logo.png" alt="">
            <h1>Sales Management System</h1>
        </nav>
            <div class="heading">
                <p>Update Data</p>
            </div>
            <form class="dahsboardForm" method="POST">
                <div>
                    <p>Customer Name</p>
                    <input type="text" name="cname" value="<?php echo $data['cname'] ?>" placeholder="Customer Name" Required>
                </div>
                <div>
                    <p>Item Name</p>
                    <input type="text" name="iname" value="<?php echo $data['iname'] ?>" placeholder="Item Name" Required>
                </div>
                <div>
                    <p>Item Price</p>
                    <input type="number" name="iqty" value="<?php echo $data['iqty'] ?>" placeholder="Item quantity" Required>
                </div>
                <div>
                    <p>Quantity</p>
                    <input type="number" name="iprice" value="<?php echo $data['iprice'] ?>" placeholder="Item price" Required>
                </div>
                <div>
                    <p>Amount Paid</p>
                    <input type="number" name="amtpaid" value="<?php echo $data['amtpaid'] ?>" placeholder="amount Paid" Required>
                </div>
                <div>
                    <button name="update" value="Update">Update </button>
                </div>
            </form>
        </div>
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
            mysqli_close($db);
            header("location:dashboard.php");
            exit;
        } else {
            echo mysqli_error($conn);
        }
    }
?>