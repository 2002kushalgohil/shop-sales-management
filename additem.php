<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/Style/style.css?v=<?php echo time(); ?>">
    <title>Items @ Portal</title>
</head>
<body>
    <section class="loginSignupSection">
        <div class="imgBx">
            <img src="./Assets/images/loginGif.gif" alt="" />
        </div>
        <div class="contentBx">
            <img src="./Assets/images/logo.png" alt="" class="logo">
            <div class="formBx">
                <h2 class="active">
                    <a href="#">New Item</a>
                </h2>
                <form action="" method="POST" name="new Item">
                    <div class="inputBx">
                        <span>Item Name :</span>
                        <input name="iname" type="text" />
                    </div>
                    <div class="inputBx">
                        <span>Item Price : </span>
                        <input name="iprice" type="text" />
                    </div>                   
                    <div class="inputBx">
                        <span>Item Quantity : </span>
                        <input name="iqty" type="text" />
                    </div>
                    <div class="inputBx">
                        <span>Item Category : </span>
                        <input name="icat" type="text" />
                    </div>
                    <div class="inputBx">
                        <input type="submit" name="submit" value="Add Item"/>
                    </div>
                    <div class="inputBx">
                        <button class="regBtn"><a href="dashboard.php">Go To Home</a></button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
<?php
include('conn.php');
if(isset($_POST['submit']))
{
  if(!empty($_POST['iname']) && !empty($_POST['iprice']) && !empty($_POST['iqty']) && !empty($_POST['icat']))
	{
	    $iname=strtolower($_POST['iname']);  
        $iprice=$_POST['iprice'];  
        $iqty=$_POST['iqty'];  
        $icat=strtolower($_POST['icat']); 
        if($iprice<=0 || $iqty<=0)
            {
                echo'<script> alert(" Numbers Cannot be negative or zero !!") </script>';
            }
        else
            {
                mysqli_select_db($conn,'sam') or die(mysqli_error($conn));  
                $query=mysqli_query($conn,"SELECT * FROM item WHERE iname='".$iname."'");
                $numrows=mysqli_num_rows($query); 
                if($numrows==0) 
                    { 
                        $query = mysqli_query($conn,"INSERT INTO item(iname,iprice,qty,category) VALUES ('$iname','$iprice','$iqty','$icat')");
                        if($query)
                            {
                                echo '<script>';
                                echo 'alert(" Item Added to Stock Successfully !!")';
                                echo'</script>';
                            }
                        else
                            {
                                echo'<script> alert(" ~ Item Not Inserted !!") </script>';
                            }
                    }	  	
                else
                    {
                        echo'<script>';
                        echo 'alert(" Item Already Exists !! ")';
                        echo'</script>';
                    }
            }
	}
  else
    {  
    echo'<script>';
    echo' alert("All fields are required!")';
    echo '</script>';  
    }  
}
?>