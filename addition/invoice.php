<?php
    session_start();
    include("../config/connection_seller_acc.php");
    $a=$_SESSION['seller_email'];
	$_SESSION['j']=0;
    if($a==null)
	{
		echo "<script>alert ('You need to Login First');</script>";
		header("location:sell.php");
	}
    if($_SESSION['str_name']!=null)
    {
        $p1=$_SESSION['str_name'];
        $p2=$_SESSION['str_addr'];
        $sql26="select * from invoice_table where str_name='".$p1."' and str_add='".$p2."' ORDER BY invoice_no DESC";
        $rs221=mysqli_query($con,$sql26);
        if($rs221!=null)
        {
            $count=mysqli_num_rows($rs221);
        }
        if($count>0)
        {
            $result9=mysqli_fetch_assoc($rs221);
        }
    }
    
    if(isset($_POST['back_bt']))
    {
        header("location:selling_products.php");
    }
?>

<html>
    <head>
        <title>
            Invoice Table - Yourcart
        </title>
        <link href="../stylesheets/invoice_style.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <div class="fr">
                <div class="fr1">
                    <br />
                    <a href="selling_products.php" >
                        <img src="../images_site/logo2.png" class="img"/>
                    </a>
                </div>
                <div class="fr2">
                    Invoices Table
                </div>
            </div>
            <div class="sc">
                <?php if($count==0) {
                    ?>
                    <div class="sc1">
                        No Products Sold
                    </div>
                <?php }
                    
					else {?>
                    
                    <div class="sc2">
                        <table class="tab" cellpadding="20px">
                            <tr>
                                <th>Invoice Number</th>
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Product ID</th>
								<th>Quantity</th>
                                <th>Price</th>
                                <th>Consumer Name</th>
                                <th>Consumer Phone Number</th>
                            </tr>
                            <?php
								
								do{?>
                            <tr>
                                <td><?php echo $result9['invoice_no']; ?></td>
                                <td><?php echo $result9['date']; ?></td>
                                <td><?php echo $result9['prod_name']; ?></td>
                                <td><?php echo $result9['prod_id']; ?></td>
								<td><?php echo $result9['quantity']; ?></td>
                                <td><?php echo $result9['price']; ?></td>
                                <td><?php echo $result9['con_fr_name'];?> &nbsp<?php echo $result9['con_lst_name']; ?></td>
                                <td><?php echo $result9['con_phone']; ?></td>
                            </tr>
                            <?php }while($result9=mysqli_fetch_assoc($rs221));
					}?>
                        </table>
                    </div>  
            </div>
            <div class="thr">
                <form method="post">
                    <button name="back_bt" class="back_bt">Back</button>
                </form>
            </div>
            <div class="four">
                All Rights Are Reserved
            </div>
        </div>
    </body>
</html>