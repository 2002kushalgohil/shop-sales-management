<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/Style/style.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>

<body>
    <div class="dahsboardFormDiv">
        <form class="dahsboardForm">
            <div>
                <p>Customer Name</p>
                <input type="text">
            </div>
            <div>
                <p>Item</p>
                <input type="text">
            </div>
            <div>
                <p>Quantity</p>
                <input type="number">
            </div>
            <div>
                <p>Total Price</p>
                <input type="number">
            </div>
            <div>
                <p>Amount Due</p>
                <input type="number">
            </div>
            <div>
                <button>Submit</button>
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
                    <tr>
                        <td>1</td>
                        <td>Kushal Gohil</td>
                        <td>Parle G</td>
                        <td>2</td>
                        <td>10</td>
                        <td>9</td>
                        <td class="dashboardTableBtn"><button class="dashboardTableUpdate">Update</button><button class="dashboardTableDelete">Delete</button></td>
                        <td class="dashboardUnPaid">Unpaid</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>varun Anand</td>
                        <td>Red paint</td>
                        <td>1</td>
                        <td>100</td>
                        <td>0</td>
                        <td class="dashboardTableBtn"><button class="dashboardTableUpdate">Update</button><button class="dashboardTableDelete">Delete</button></td>
                        <td class="dashboardPaid">Paid</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Abhinav Bankar</td>
                        <td>LED Light</td>
                        <td>2</td>
                        <td>1000</td>
                        <td>9</td>
                        <td class="dashboardTableBtn"><button class="dashboardTableUpdate">Update</button><button class="dashboardTableDelete">Delete</button></td>
                        <td class="dashboardUnPaid">Unpaid</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Deva varma</td>
                        <td>Mobile</td>
                        <td>1</td>
                        <td>50000</td>
                        <td>9</td>
                        <td class="dashboardTableBtn"><button class="dashboardTableUpdate">Update</button><button class="dashboardTableDelete">Delete</button></td>
                        <td class="dashboardUnPaid">Unpaid</td>
                    </tr>
                </tbody>

            </table>

        </div>
    </div>
    </div>
    </div>
</body>

</html>