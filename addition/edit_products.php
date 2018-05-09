<?php
    session_start();
    include("../config/connection_seller_acc.php");
    $_SESSION['edit_prod_noti']=0;
    $_SESSION['j']=0;
    $t1=$_SESSION['edit_prod_id'];
    if($t1==null)
    {
        header("location:sell.php");
    }
    $sql22="select * from products where txt_2='".$t1."'";
    $rs17=mysqli_query($con,$sql22);
    if($rs17!=null)
    {
        $result8=mysqli_fetch_row($rs17);
        $y1=$result8['6'];
        $y11=str_replace("<br />","_",$y1);
        $y2=$result8['7'];
        $y21=str_replace("<br />","_",$y2);
    }
    
    if(isset($_POST['sub_bt']))
    {
        $u1=$_POST['nme'];
        $u2=$_POST['txt_area1'];
        $u3=$_POST['txt_area2'];
        $u5=$result8['8'];
        $u6=$result8['16'];
        $u7=$u5-$u6;
        $u4=$_POST['num'];
        $q_l=$u4-$u7;
        $u21=str_replace("_","<br />",$u2);
        $u31=str_replace("_","<br />",$u3);
        $u1=mysqli_real_escape_string($con,$u1);
        $u21=mysqli_real_escape_string($con,$u21);
        $u31=mysqli_real_escape_string($con,$u31);
        $sql23="update products set txt_1='".$u1."', txt_area_1='".$u21."', txt_area_2='".$u31."', quantity='".$u4."', quantity_left='".$q_l."' where txt_2='".$t1."' ";
        $rs18=mysqli_query($con,$sql23);
        $_SESSION['edit_prod_noti']=1;
        header("location:selling_products.php");
    }
    
    if(isset($_POST['back_bt']))
    {
        header("location:selling_products.php");
    }
?>

<html>
    <head>
        <title>
            Edit <?php echo $t1;?> - YourCart
        </title>
        <link href="../stylesheets/edit_products_style.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <div class="fr">
                <div class="fr1">
                    <a href="selling_products.php" >
                        <img src="../images_site/logo2.png" class="logo"/>
                    </a>
                </div>
                <div class="fr2">
                    <u>Edit Products</u>
                    <br />
                    <?php echo $result8['4'];?>
                    <br />
                    (Product ID : <?php echo $t1;?>)
                </div>
                <div class="fr3">
                    <img src="../images/<?php echo $result8['9'];?>" class="img34" />
                </div>
            </div>
            <div class="sc">
                <br />
                <form method="post">
                    <center><table class="tab1" cellpadding="15px">
                        <tr>
                            <td>
                                Product Name &nbsp : &nbsp
                            </td>
                            <td>
                                <input type="text" name="nme" class="in" value="<?php echo $result8['4']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Technical Specs &nbsp : &nbsp  
                            </td>
                            <td>
                                <textarea name="txt_area1" class="in1"><?php echo $y11; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Description &nbsp : &nbsp  
                            </td>
                            <td>
                                <textarea name="txt_area2" class="in1"><?php echo $y21; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Quantity &nbsp : &nbsp
                            </td>
                            <td>
                                <input type="number" name="num" class="in" value="<?php echo $result8['8']; ?>" />
                            </td>
                        </tr>
                    </table>
                    <br />
                    <input type="submit" name="sub_bt" class="in2"/>
                    </center>
                </form>
                *use underscore (_) for next line
                <form method="post">
                    <br />
                    <input type="submit" name="back_bt" class="in3" value="back"/>
                </form>
            </div>
            <div class="thr">
                All Rights are Reserved
            </div>
        </div>
    </body>
</html>