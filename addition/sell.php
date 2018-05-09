<?php
    session_start();
    include("../config/connection_seller_acc.php");
    $_SESSION['edit_prod_noti']=0;
    $_SESSION['consumer_email']=null;
    $_SESSION['display']=null;
	$_SESSION['display1']=null;
    if(isset($_POST['submit_1']))
    {
        $j=$_POST['email1'];
        $k=$_POST['pass2'];
        $j=mysqli_real_escape_string($con,$j);
        $k=mysqli_real_escape_string($con,$k);
        $str1=bin2hex($k);
        $str1=$str1*99;
        $str1=$str1+1000;
        $str1=$str1/100;
        $str1=$str1+1;
        $str1=floor($str1);
        $sql4="select * from seller_acc where email='".$j."' and password='".$str1."' ";
        $rs2=mysqli_query($con,$sql4);
        $count1=mysqli_num_rows($rs2);
        if($count1>0)
        {
            $_SESSION['seller_email']=$j;
            header("location:selling_products.php");
        }
        else
        {
            echo "<script>alert ('Invalid Email Id or Password');</script>";
        }
    }
    
    if(isset($_POST['btn_sign_up']))
    {
        $a=$_POST['fr_nme'];
        $b=$_POST['lst_nme'];
        $c=$_POST['email'];
        $c=mysqli_real_escape_string($con,$c);
        $d=$_POST['pass'];
        $d=mysqli_real_escape_string($con,$d);
        $e=$_POST['pass1'];
        $e=mysqli_real_escape_string($con,$e);
        $f=$_POST['num'];
        $g=$_POST['str_nme'];
        $h=$_POST['str_add'];
        if($d!=$e)
        {
            echo "<script>alert ('Password Do not Match');</script>";
        }
        else
        {
            $str=bin2hex($d);
            $str=$str*99;
            $str=$str+1000;
            $str=$str/100;
            $str=$str+1;
            $str=floor($str);
            $sql1="select * from seller_acc where email='".$c."'";
            $rs1=mysqli_query($con,$sql1);
            $count=mysqli_num_rows($rs1);
            if($count>0)
            {
                echo "<script>alert ('User Already Exists');</script>";
                header("location:sell.php");
            }
            else
            {
                $_SESSION['seller_email']=$c;
                $sql2="insert into seller_acc(fr_nme,lst_nme,email,password,phone,str_nme,str_add) values('".$a."','".$b."','".$c."','".$str."','".$f."','".$g."','".$h."')";
                $rs=mysqli_query($con,$sql2);
                echo "<script>alert ('Account Successfuly Created');</script>";
                header("location:selling_products.php");
            }
        }
    }

?>
<html>
    <head>
        <title>Sell On YourCart</title>
        <link href="../stylesheets/sell_style.css" rel="stylesheet" />
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
                    Seller Login
                    <div class="fr_pass">
                        <a href="forgot_password_seller.php">Forgot Password?</a>
                    </div>
                    <form method="post">
                        <input type="text" id="email1" name="email1" placeholder="Email ID" required/>
                        <input type="password" id="pass2" name="pass2" placeholder="Password" required/>
                        <input type="submit" id="submit_1" name="submit_1" class="submit_1"/>
                    </form>
                </div>
            </div>
            <div class="sc">
                <div class="sc1">
                    <a href="../index.php" class="a_site">
                    <img src="../images_site/shopping-bag-icon-50478.png" class="img_sc1" />
                    <div class="sc1-1">
                        YourCart
                    </div>
                    </a>
                    <br/>
                    <div class="sc1-2">
                        Aiming to be India's #1 Online Shopping Site
                        <br />
                        <br />
                        Designed By :-
                        <br />
                        Students of HMRITM
                        <p class="para">
                            Chaitanya Sanoriya
                            <br/>
                            Rachit Mann
                            <br />
                            Sarthak Sareen
                            <br />
                            IT Stream 2<sup>nd</sup> Sem
                        </p>
                    </div>
                </div>
            </div>
            <div class="thr">
                <div class="head">
                    Sign up!
                </div>
                <div class="data">
                    <center>
                        <br />
                        <form method="post">
                            <table cellpadding="10px" class="tab1">
                                <tr>
                                    <td>
                                        First Name :
                                    </td>
                                    <td>
                                        <input type="text" id="fr_nme" name="fr_nme" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Last Name :
                                    </td>
                                    <td>
                                        <input type="text" id="lst_nme" name="lst_nme" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        E-Mail ID :
                                    </td>
                                    <td>
                                        <input type="email" id="email" name="email" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Password :
                                    </td>
                                    <td>
                                        <input type="password" id="pass" name="pass" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Re-type Password :
                                    </td>
                                    <td>
                                        <input type="password" id="pass1" name="pass1" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Phone Number :
                                    </td>
                                    <td>
                                        <input type="number" id="num" name="num" min=1000000000 max=99999999999 required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Store Name :
                                    </td>
                                    <td>
                                        <input type="text" id="str_nme" name="str_nme" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Store Address :
                                    </td>
                                    <td>
                                        <input type="text" id="str_add" name="str_add" required/>
                                    </td>
                                </tr>
                            </table>
                            <br />
                            <br />
                            <input type="submit" id="btn_sign_up" name="btn_sign_up" class="btn_sign_up" value="Sign up">
                        </form>
                    </center>
                </div>
            </div>
            <div class="four">
                <center>
                    All Rights are Reserved
                </center>
            </div>
        </div>
    </body>
</html>