<?php
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/Style/style.css?v=<?php echo time(); ?>">
    <title>Home @ Portal</title>
</head>

<body>
    <nav>
        <img src="./Assets/images/logo.png" alt="">
        <h1>Sales Management System</h1>
        <div class="dahsboardForm">
            <a href="logout.php"><button>Log Out</button></a>
        </div>
    </nav>
    <div class="dahsboardFormDiv">
        <div class="olinks">
            <div class="dahsboardForm">
                <a href="addcust.php"><button>New Customer</button></a>
            </div>
            <div class="dahsboardForm">
                <a href="additem.php"><button>New Item</button></a>
            </div>
        </div>
        <form class="dahsboardForm" action="" method="POST">
            <div>
                <p>Customer Name</p>
                <input type="text" name="cname">
            </div>
            <div>
                <p>Item Name</p>
                <input type="text" name="iname">
            </div>
            <div>
                <p>Item Price</p>
                <input type="number" name="iprice">
            </div>
            <div>
                <p>Quantity</p>
                <input type="number" name="iqty">
            </div>
            <div>
                <p>Amount Paid</p>
                <input type="number" name="amtpaid">
            </div>
            <div>
                <button name="submit" value="submit" onclick=readData()>Submit</button>
            </div>
        </form>
    </div>
    <div class="dashboardSection">
        <div class="purchase-table">
            <table class="dashboard-content-table">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Customer Name</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Amount Due</th>
                        <th class="actionsTh">
                            <div>Update</div>
                            <div>Delete</div>
                        </th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['submit'])) {
                        // checkpoint for Empty Values ...
                        if (!empty($_POST['cname']) && !empty($_POST['iname']) && !empty($_POST['iqty']) && !empty($_POST['amtpaid'])) {
                            if ($_POST['iqty'] <= 0) {
                                echo '<script> alert("Qty Cannot be Zero or Negative") </script>';
                            } else {
                                // select database ...
                                mysqli_select_db($conn, 'sam') or die("cannot select DB");
                                // assigning Values to varibles ...
                                $cname = $_POST['cname'];
                                $iname = strtolower($_POST['iname']);
                                $iprice = $_POST['iprice'];
                                $amtpaid = $_POST['amtpaid'];
                                $iqty = $_POST['iqty'];
                                date_default_timezone_set('Asia/Kolkata');
                                $sdate = date('d-m-y');
                                $stime = date('h:i:s');
                                $total = $iqty * $iprice;
                                $amtdue = abs($total - $amtpaid);
                                // checkpoint for value of status ...
                                if ($amtdue > 0) {
                                    $status = "UnPaid";
                                } else {
                                    $status = "Paid";
                                }
                                $query = mysqli_query($conn, "INSERT INTO sale(sid,sdate,stime,cname,iname,iqty,iprice,stotal,amtpaid,amtdue,estatus) VALUES ('','$sdate','$stime','$cname','$iname','$iqty','$iprice','$total','$amtpaid','$amtdue','$status')");
                                // checkpoint for record insertion operation ...
                                if ($query) {
                                    echo '<script>';
                                    echo 'alert("RECORD INSERTED SUCCESSFULLY ");';
                                    echo '</script>';
                                } else {
                                    echo '<script> alert(" ~ Record Not Inserted !!") </script>';
                                }
                            }
                        } else {
                            echo '<script>';
                            echo 'alert(" ~ Empty Field Not Allowed !!")';
                            echo '</script>';
                        }
                    }
                    ?>
                    <?php
                    mysqli_select_db($conn, 'sam') or die("cannot select DB");
                    $result = mysqli_query($conn, "SELECT * from sale");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row["sid"] . '</td>';
                            echo '<td>' . $row["cname"] . '</td>';
                            echo '<td>' . $row["iname"] . '</td>';
                            echo '<td>' . $row["iqty"] . '</td>';
                            echo '<td>' . $row["stotal"] . '</td>';
                            echo '<td>' . $row["amtdue"] . '</td>';
                            echo '<td class="dashboardTableBtn">
                            <button class="dashboardTableUpdate">Update</button>
                            <button class="dashboardTableDelete">Delete</button></td>';
                            if($row["estatus"]=='UnPaid'){
                                echo '<td class="dashboardUnPaid">' . $row["estatus"] . '</td>';
                            }
                            else{
                                echo '<td class="dashboardPaid">' . $row["estatus"] . '</td>';
                            }
                            echo '</tr>';
                        }
                    } else {
                        echo '<h3 class="error"> No Record found </h3>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>