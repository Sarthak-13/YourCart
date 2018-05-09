<?php
    session_start();
    include("../config/connection_seller_acc.php");
    $_SESSION['j']=0;
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
        $sql4="select * from consumer_acc where email='".$j."' and password='".$str1."' ";
        $rs2=mysqli_query($con,$sql4);
        $count1=mysqli_num_rows($rs2);
        $result=mysqli_fetch_row($rs2);
        if($count1>0)
        {
            $_SESSION['consumer_email']=$j;
            $_SESSION['con_fr_nme']=$result['0'];
            $_SESSION['con_phone']=$result['4'];
            $_SESSION['con_lst_nme']=$result['1'];
            $_SESSION['con_pin_code']=$result['7'];
            header("location:../index1.php");
        }
        else
        {
            echo "<script>alert ('Invalid Email Id or Password');</script>";
        }
    }
    
    if(isset($_POST['btn_sign_up']))
    {
        $a=$_POST['fr_nme'];
        $a=mysqli_real_escape_string($con,$a);
        $b=$_POST['lst_nme'];
        $b=mysqli_real_escape_string($con,$b);
        $c=$_POST['email'];
        $c=mysqli_real_escape_string($con,$c);
        $d=$_POST['pass'];
        $d=mysqli_real_escape_string($con,$d);
        $e=$_POST['pass1'];
        $e=mysqli_real_escape_string($con,$e);
        $f=$_POST['num'];
        $h=$_POST['hme_add'];
        $u=$_POST['pin_cd'];
        $h=mysqli_real_escape_string($con,$h);
        if($d!=$e)
        {
            $_SESSION['invalid']=1;
            header("location:sign_up.php");
        }
        else
        {
            $str=bin2hex($d);
            $str=$str*99;
            $str=$str+1000;
            $str=$str/100;
            $str=$str+1;
            $str=floor($str);
            $sql1="select * from consumer_acc where email='".$c."' or phone='".$f."' ";
            $rs1=mysqli_query($con,$sql1);
            $count=mysqli_num_rows($rs1);
            if($count>0)
            {
                $_SESSION['already_exist']=1;
                header("location:sign_up.php");
            }
            else
            {
                $_SESSION['consumer_email']=$c;
                $sql2="insert into consumer_acc(fr_nme,lst_nme,email,password,phone,hme_add,pin_code) values('".$a."','".$b."','".$c."','".$str."','".$f."','".$h."','".$u."')";
                $rs=mysqli_query($con,$sql2);
                $sql3="create table ".$a."_".$f." (sid bigint(10) AUTO_INCREMENT,Product_ID varchar(10), product_name varchar(255), Status int(1),mode_of_payment int(1),price int(10),date Date,quantity int(10),PRIMARY KEY (sid))";
                echo "<br />";
                echo $sql2;
                $rs9=mysqli_query($con,$sql3);
                echo "<script>alert ('Account Successfuly Created');</script>";
                $_SESSION['log1']=1;
                $_SESSION['con_fr_nme']=$a;
                $_SESSION['con_phone']=$f;
                $_SESSION['con_lst_nme']=$b;
                $_SESSION['con_pin_code']=$u;
                header("location:../index1.php");
            }
        }
    }

?>
<html>
    <head>
        <title>Login on YourCart</title>
        <link href="../stylesheets/sign_up_style.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <div class="fr">
                <br />
                <div class="fr1">
                    <a href="sign_up.php">
                        <img src="../images_site/logo3.png" class="logo" />
                    </a>
                </div>
                <div class="fr2">
                    Consumer Login
                    <div class="fr_pass">
                        <a href="forgot_password_consumer.php">Forgot Password?</a>
                    </div>
                    <form method="post">
                        <input type="text" id="email1" name="email1" placeholder="Email ID" required/>
                        <input type="password" id="pass2" name="pass2" placeholder="Password" required/>
                        <input type="submit" id="submit_1" name="submit_1" class="submit_1"/>
                    </form>
                    <?php if($_SESSION['con_pass_change']==1){?>
                        Password has been changed
                    <?php }?>
                </div>
            </div>
            <div class="sc">
                <div class="sc1">
                    <a href="../index1.php" class="a_site">
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
                        <?php if($_SESSION['already_exist']==1)
                        {?>User Account Already Exists
                        <?php }?>
                        <?php if($_SESSION['invalid']==1)
                        {?>Passwords do not match
                        <?php }?>
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
                                        Home Address :
                                    </td>
                                    <td>
                                        <input type="text" id="hme_add" name="hme_add" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Pin Code :
                                    </td>
                                    <td>
                                        <input type="num" id="pin_cd" name="pin_cd" min=100000 max=999999 required/>
                                    </td>
                                </tr>
                            </table>
                            <br />
                            *Please do not start your number with 0
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