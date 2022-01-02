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
    <section class="loginSignupSection">
        <div class="imgBx">
            <img src="./Assets/images/loginGif.gif" alt="" />
        </div>
        <div class="contentBx">
            <!-- <img src="./Assets/images/loginGif1.gif" class="gifImage gifImage1" alt="" />
            <img src="./Assets/images/loginGif2.gif" class="gifImage gifImage2" alt="" /> -->
            <img src="./Assets/images/logo.png" alt="" class="logo">
            <div class="formBx">
                <h2 class="active">
                    <a href="#">New Customer</a>
                </h2>
                <form action="" method="POST" name="new customer">
                    <div class="inputBx">
                        <span>Name :</span>
                        <input name="cname" type="text" />
                    </div>
                    <div class="inputBx">
                        <span>Mobile No : </span>
                        <input name="mob" type="text" />
                    </div>
                    <div class="inputBx">
                        <input type="submit" name="submit" value="Add Customer"/>
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
  if(!empty($_POST['cname']) && !empty($_POST['mob']))
	{
	    $user=strtolower($_POST['cname']);  
        $pass=strtolower($_POST['mob']); 
        if(strlen($pass)!=10){
            echo'<script> alert(" mobile No must be 10 digit !!") </script>';
        }
        else{

        mysqli_select_db($conn,'sam') or die(mysqli_error($conn));  
        $query=mysqli_query($conn,"SELECT * FROM customer WHERE cname='".$user."'");
        $numrows=mysqli_num_rows($query); 
	    if($numrows==0) 
            { 
                $query = mysqli_query($conn,"INSERT INTO customer(cname,mobile) VALUES ('$user','$pass')");
                if($query){
                    echo '<script>';
                    echo 'alert(" Customer Registered Successfully !!")';
                    echo'</script>';
                }
            }	  	
        else{
             echo'<script>';
             echo 'alert(" Customer Already Exists !! ")';
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