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
        <h1>Sales Management System</h1>
        <ul>
            <li><a href="logout.php"><button class="btn">Log Out</button></a></li>
        </ul>
    </nav>
    <div>

    </div>
    <div class="adminTopDiv">
        <button class="btn">Download Report</button>
    </div>
    <div class="dashboardSection">

        <table class="dashboardTable">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Customer Name</th>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Amount Due</th>

                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['submit'])) {
                    if (!empty($_POST['cname']) && !empty($_POST['iname']) && !empty($_POST['iqty']) && !empty($_POST['amtpaid'])) {
                        if ($_POST['iqty'] <= 0) {
                            echo '<script> alert("Qty Cannot be Zero or Negative") </script>';
                        } else {
                            mysqli_select_db($conn, 'sam') or die("cannot select DB");
                            $cname = $_POST['cname'];
                            $iname = strtolower($_POST['iname']);
                            $ipquery = mysqli_query($conn, "SELECT iprice FROM item WHERE iname='$iname'");
                            if (mysqli_num_rows($ipquery) > 0) {
                                while ($row = mysqli_fetch_assoc($ipquery)) {
                                    $iprice = $row['iprice'];
                                }
                            }
                            $amtpaid = $_POST['amtpaid'];
                            $iqty = $_POST['iqty'];
                            date_default_timezone_set('Asia/Kolkata');
                            $sdate = date('d-m-y');
                            $stime = date('h:i:s');
                            $total = $iqty * $iprice;
                            $amtdue = abs($total - $amtpaid);
                            if ($amtdue > 0) {
                                $status = "UnPaid";
                            } else {
                                $status = "Paid";
                            }
                            $query = mysqli_query($conn, "INSERT INTO sale(sid,sdate,stime,cname,iname,iqty,stotal,amtpaid,amtdue,estatus) VALUES ('','$sdate','$stime','$cname','$iname','$iqty','$total','$amtpaid','$amtdue','$status')");
                            if ($query) {
                                echo '<script>';
                                echo 'alert("RECORD INSERTED SUCCESSFULLY ");';
                                echo '</script>';
                            } else {
                                echo '<script> alert("Record Not Inserted") </script>';
                            }
                        }
                    } else {
                        echo '<script>';
                        echo 'alert("Empty Field Not Allowed")';
                        echo '</script>';
                    }
                }
                ?>
                <?php
                mysqli_select_db($conn, 'sam') or die("cannot select DB");
                $result = mysqli_query($conn, "SELECT * from sale");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?php echo $row["sid"] ?></td>
                            <td><?php echo $row["cname"] ?></td>
                            <td><?php echo $row["iname"] ?></td>
                            <td><?php echo $row["iqty"] ?></td>
                            <td><?php echo $row["stotal"] ?></td>
                            <td><?php echo $row["amtdue"] ?></td>

                            <?php
                            if ($row["estatus"] == 'UnPaid') {
                                echo '<td class="dashboardUnPaid">' . $row["estatus"] . '</td>';
                            } else {
                                echo '<td class="dashboardPaid">' . $row["estatus"] . '</td>';
                            }
                            ?>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>