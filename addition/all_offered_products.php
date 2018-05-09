<?php
    session_start();
    include("../config/connection_seller_acc.php");
    $a=$_SESSION['seller_email'];
	
	
    if($a==null)
	{
		echo "<script>alert ('You need to Login First');</script>";
		header("location:sell.php");
	}
    if($_SESSION['str_name']!=null)
    {
        $p1=$_SESSION['str_name'];
        $p2=$_SESSION['str_addr'];
        $sql8="select * from products where str_nme='".$p1."' and str_add='".$p2."'";
    $rs1=mysqli_query($con,$sql8);
	$count2=mysqli_num_rows($rs1);
    $result4=mysqli_fetch_assoc($rs1);
	$total=0;
    }
    
    if(isset($_POST['back_bt']))
    {
        header("location:selling_products.php");
    }
	
	if(isset($_POST['delete_product']))
	{
		$v=$_POST['delete_product'];
		$sql10="delete from products where txt_2='".$v."' and str_nme='".$x."' and str_add='".$w."'";
		echo $sql10;
		$rs4=mysqli_query($con,$sql10);
		echo "<script>alert ('The Product has been Deleted');</script>";
		header("location:selling_products.php");
	}
	
	if(isset($_POST['edit_product']))
	{
		$_SESSION['edit_prod_id']=$_POST['edit_product'];
		header("location:edit_products.php");
	}
?>

<html>
    <head>
        <title>
            All Offered Products - Yourcart
        </title>
        <link href="../stylesheets/all_offered_products_style.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container" data-stellar-background-ratio="0.7">
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
                <?php if($count2==0) {
                    ?>
                    <div class="sc1">
                        No Products Sold
                    </div>
                <?php }
                    
					else {?>
                    
                    <div class="sc2">
                        <table cellpadding="10px" class="tab3">
						<tr>
							<th></th>
							<th>
								Product Name
							</th>
							<th>
								Product ID
							</th>
							<th>
								Quanitiy left
							</th>
							<th>
								Products Sold
							</th>
							<th>
								Earnings
							</th>
							<th>
								Remove Products
							</th>
							<th>
								Edit Product
							</th>
						</tr>
						<?php do{ ?>
						<tr>
							<td class="img10">
								<img src="../images/<?php echo $result4['img1']?>" class="img9" />
							</td>
							<td>
								<?php echo $result4['txt_1'];?>
							</td>
							<td>
								<?php echo $result4['txt_2'];?>
							</td>
							<td>
								<?php echo $result4['quantity_left'];?>
							</td>
							<td>
								<?php
								$z=$result4['quantity']-$result4['quantity_left'];
								echo $z;
								?>
							</td>
							<td>
								<?php
								$z=$result4['quantity']-$result4['quantity_left'];
								$y=$z*$result4['price'];
								echo $y;
								$total=$total+$y;
								?>
							</td>
							<td>
								<form method=post>
									<button type=submit name="delete_product" value="<?php echo $result4['txt_2']?>">Delete</button>
								</form>
							</td>
							<td>
								<form method=post>
									<button type=submit name="edit_product" value="<?php echo $result4['txt_2']?>">Edit</button>
								</form>
							</td>
						</tr>
						<?php } while($result4=mysqli_fetch_assoc($rs1)) ?>
						<tr>
							<td>
								<br />
								Total Earnings = <?php echo $total;?>
							</td>
						</tr>
						<tr>
							<td>
								<form name="cash_out" method="post">
									<center>
										<input type="submit" name="cash_out1" class="cash_out1" value="Cash Your Earnings" />
									</center>
								</form>
							</td>
						</tr>
					</table>
						<?php } ?>
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
		<script src="../config/jquery-2.0.2.js"></script>
        <script src="../config/jquery.stellar.min.js"></script>
        <script>
            $.stellar();
        </script>
    </body>
</html>

<?php
	if(isset($_POST['cash_out1']))
	{
		if($total!=0)
		{
			echo "<script>alert ('A mail has been sent to you about your cash out preferences');</script>";
		}
		else
		{
			echo "<script>alert ('Error : Balance Nill');</script>";
		}
	}
?>