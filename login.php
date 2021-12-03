<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/Style/style.css?v=<?php echo time(); ?>">
    <title>Portal</title>
</head>

<body>
    <section class="loginSignupSection">
        <div class="imgBx">
            <img src="./Assets/images/loginGif.gif" alt="" />
        </div>
        <div class="contentBx">
            <img src="./Assets/images/loginGif1.gif" class="gifImage gifImage1" alt="" />
            <img src="./Assets/images/loginGif2.gif" class="gifImage gifImage2" alt="" />
            <div class="formBx">
                <h2 class="active">
                    <a href="#">Login</a>
                </h2>

                <form>
                    <div class="inputBx">
                        <span>Registered Username</span>
                        <input name="email" type="email" />
                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input name="password" type="password" />
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="sign in" />
                    </div>

                </form>
            </div>
        </div>
    </section>
</body>

</html>