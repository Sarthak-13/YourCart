<?php
    session_start();
    include("../config/connection_seller_acc.php");
    if(isset($_POST['btn_submit']))
    {
        $a=$_POST['email'];
        $a=mysqli_real_escape_string($con,$a);
        $b=$_POST['num'];
        $c=$_POST['pass1'];
        $c=mysqli_real_escape_string($con,$c);
        $d=$_POST['pass2'];
        $d=mysqli_real_escape_string($con,$d);
        $sql="select * from seller_acc where email='".$a."' and phone='".$b."'";
        $rs=mysqli_query($con,$sql);
        $count=mysqli_num_rows($rs); 
        if($count>0)
        {
            if($c!=$d)
            {
                echo "<script>alert ('Password do not match');</script>";
            }
            else
            {
                $str=bin2hex($d);
                $str=$str*99;
                $str=$str+1000;
                $str=$str/100;
                $str=$str+1;
                $str=floor($str);
                $_SESSION['seller_email']=$a;
                $sql1="update seller_acc set password='".$str."' where email='".$a."' and phone='".$b."'";
                $rs=mysqli_query($con,$sql1);
                echo "<script>alert ('Password has been Changed');</script>";
                header("location:selling_products.php");
            }
        }
        
        else
        {
            echo "<script>alert ('Account not found')</script>";
        }
    }
?>
<html>
    <head>
        <title>
            Forgot Password
        </title>
        <link href="../stylesheets/forgot_password_seller.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <div class="fr">
                <br />
                <div class="fr1">
                    <a href="sell.php">
                        <img src="../images_site/logo2.png" class="logo" />
                    </a>
                </div>
                <div class="fr2">
                    Seller Hub
                    <br/>
                    Forgot Password
                </div>
            </div>
            <div class="sc">
                <form method="post">
                    Please Enter your Email address
                    <br />
                    <input type="email" name="email" id="email" placeholder="Email" style="width: 18%;" reuired/>
                    <br />
                    <br />
                    Please Enter your Phone Number
                    <br />
                    <input type="number" name="num" id="num" placeholder="Phone Number" style="width: 18%;" reuired/>
                    <br />
                    <br />
                     Please Enter your New Password
                    <br />
                    <input type="Password" name="pass1" id="pass1" placeholder="Password" style="width: 18%;" reuired/>
                    <br />
                    <br/>   
                    Please Re-type Your New Password
                    <br />
                    <input type="Password" name="pass2" id="pass2" placeholder="Re-type Password" style="width: 18%;" reuired/>
                    <br />  <br/>
                    <input type="submit" name="btn_submit" id="btn_submit" style="width:9%;"/>
                </form>
            </div>
            <div class="thr">
                All Rights are Reserved
            </div>
        </div>
    </body>
</html>