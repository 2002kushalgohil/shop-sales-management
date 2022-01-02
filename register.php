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
                    <a href="#">Register</a>
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
                        <input type="submit" name="register" value="Register"/>
                    </div>
                    <div class="inputBx">
                        <button class="regBtn"><a href="login.php">Login</a></button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
<?php 
include('conn.php');
if(isset($_POST['register']))
{
  if(!empty($_POST['username']) && !empty($_POST['password']))
	{
	    $user=$_POST['username'];  
        $pass=$_POST['password']; 
        mysqli_select_db($conn,'user') or die(mysqli_error($conn));  
        $query=mysqli_query($conn,"SELECT * FROM login WHERE user_id='".$user."'");
        $numrows=mysqli_num_rows($query); 
	    if($numrows==0) 
            {
                // "INSERT INTO login (user_id,password) VALUES ('$user','$pass')";
                $query = mysqli_query($conn,"INSERT INTO login (user_id,password) VALUES ('$user','$pass')");
                if($query){
                    echo '<script>';
                    echo 'alert(" User Registered Successfully !!")';
                    echo'</script>';
                }
            }	  	
        else{
             echo'<script>';
             echo 'alert("User Already Exits !!")';
             echo'</script>';
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
