<?php
    session_start();
	include("../config/connection_seller_acc.php");
	$m=date("Y-m-d");
	$_SESSION['j']=0;
	$u=$_SESSION['check'];
	if($u==1)
	{
		echo "<script>alert ('Product with same Product ID Already Exists')</script>";
		$_SESSION['check']=0;
	}
    $a=$_SESSION['seller_email'];
	if($a==null)
	{
		echo "<script>alert ('You need to Login First');</script>";
		header("location:sell.php");
	}
    $sql="select * from seller_acc where email='".$a."'";
    $rs=mysqli_query($con,$sql);
    $result=mysqli_fetch_row($rs);
	$x=$result['5'];
	$w=$result['6'];
	$_SESSION['str_name']=$x;
	$_SESSION['str_addr']=$w;
    
    if(isset($_POST['logout']))
    {
		$_SESSION['seller_email']=null;
        header("location:sell.php");
    }
    if(isset($_POST['delete']))
    {
        $sql1="delete from seller_acc where email='".$a."'";
        $rs1=mysqli_query($con,$sql1);
		$sql9="delete from products where str_nme='".$x."' and str_add='".$w."'";
		$rs1=mysqli_query($con,$sql9);
        echo "<script>alert ('Account has been deleted')</script>";
		$_SESSION['seller_email']=null;
        header("location:sell.php");
    }
    $j=$result[5];
    $k=$result[6];
    
    if(isset($_POST['btn_submit']))
    {
        $a=$_POST['main_cate'];
        $b=$_POST['sub_cate'];
        $c=$_POST['sub_sub_cate'];
        $d=$_POST['txt_1'];
        $d=mysqli_real_escape_string($con,$d);
        $e=$_POST['txt_2'];
		$e=mysqli_real_escape_string($con,$e);
		$sql11="select * from products where txt_2='".$e."'";
		$rs5=mysqli_query($con,$sql11);
		$count3=mysqli_num_rows($rs5);
		if($count3>0)
		{
			echo "<script>alert ('Product with same Product ID Already Exists')</script>";
			$_SESSION['check']=1;
			header("location:selling_products.php");
		}
        $f1=$_POST['txt_area_1'];
		$f=str_replace("_","<br />",$f1);
        $f=mysqli_real_escape_string($con,$f);
        $g1=$_POST['txt_area_2'];
		$g=str_replace("_","<br />",$g1);
        $g=mysqli_real_escape_string($con,$g);
        $h=$_POST['num'];
        $l=$_POST['num_1'];
        $errors4= array();
        $errors1= array();
        $errors2= array();
        $errors3= array();
	
      $file_name1 = $_FILES['image1']['name'];
	  $file_name1 = time().$file_name1;
      $file_size1 =$_FILES['image1']['size'];
      $file_tmp1 =$_FILES['image1']['tmp_name'];
      $file_type1=$_FILES['image1']['type'];
      $file_ext1=explode('.',$file_name1);
      $file_ext1=strtolower($file_ext1[1]);
      $expensions1= array("jpeg","jpg","png");
      
     if(in_array($file_ext1,$expensions1)== false){
         $errors1[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
     
      
      if(empty($errors1)==true)
      {
         move_uploaded_file($file_tmp1,"../images/".$file_name1);
      }
	  else
      {
         print_r($errors1);
      }
      
      
      $file_name2 = $_FILES['image2']['name'];
	  $file_name2 = time().$file_name2;
      $file_size2 =$_FILES['image2']['size'];
      $file_tmp2 =$_FILES['image2']['tmp_name'];
      $file_type2=$_FILES['image2']['type'];
      $file_ext2=explode('.',$file_name2);
      $file_ext2=strtolower($file_ext2[1]);
      $expensions2= array("jpeg","jpg","png");
      
     if(in_array($file_ext2,$expensions2)== false){
         $errors2[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
     
      
      if(empty($errors2)==true)
      {
         move_uploaded_file($file_tmp2,"../images/".$file_name2);
      }
	  else
      {
         print_r($errors2);
      }
      
      
      $file_name3 = $_FILES['image3']['name'];
	  $file_name3 = time().$file_name3;
      $file_size3 =$_FILES['image3']['size'];
      $file_tmp3 =$_FILES['image3']['tmp_name'];
      $file_type3=$_FILES['image3']['type'];
      $file_ext3=explode('.',$file_name3);
      $file_ext3=strtolower($file_ext3[1]);
      $expensions3= array("jpeg","jpg","png");
      
     if(in_array($file_ext3,$expensions3)== false){
         $errors3[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
     
      
      if(empty($errors3)==true)
      {
         move_uploaded_file($file_tmp3,"../images/".$file_name3);
      }
	  else
      {
         print_r($errors3);
      }
      
      
      $file_name4 = $_FILES['image4']['name'];
	  $file_name4 = time().$file_name4;
      $file_size4 =$_FILES['image4']['size'];
      $file_tmp4 =$_FILES['image4']['tmp_name'];
      $file_type4=$_FILES['image4']['type'];
      $file_ext4=explode('.',$file_name4);
      $file_ext4=strtolower($file_ext4[1]);
      $expensions4= array("jpeg","jpg","png");
      
     if(in_array($file_ext4,$expensions4)== false){
         $errors4[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
     
      
      if(empty($errors4)==true)
      {
         move_uploaded_file($file_tmp4,"../images/".$file_name4);
      }
	  else
      {
         print_r($errors4);
      }
      
      if(empty($errors4)==true && empty($errors1)==true && empty($errors2)==true && empty($errors3)==true && $count3==0)
      {
		echo "<script>alert ('Goes in');</script>";
         $sql7="insert into products(main_cate,sub_cate,sub_sub_cate,txt_1,txt_2,txt_area_1,txt_area_2,quantity,img1,img2,img3,img4,str_nme,str_add,price,quantity_left,date) values('".$a."','".$b."','".$c."','".$d."','".$e."','".$f."','".$g."','".$h."','".$file_name1."','".$file_name2."','".$file_name3."','".$file_name4."','".$j."','".$k."','".$l."','".$h."','".$m."')";
         $rs3=mysqli_query($con,$sql7);
         echo "<script>alert ('Product Is Successfully In Display');</script>";
		 $_SESSION['display']=1;
		 $_SESSION['display1']=null;
		 header("location:selling_products.php");
      }
      
      else
      {
		$_SESSION['display']=null;
		$_SESSION['display1']=1;
        header("location:selling_products.php");
      }
    }
    
    $sql8="select * from products where str_nme='".$j."' and str_add='".$k."'";
    $rs1=mysqli_query($con,$sql8);
	$count2=mysqli_num_rows($rs1);
    $result4=mysqli_fetch_assoc($rs1);
	$total=0;
	
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
	
	if(isset($_POST['invoice_bt']))
	{
		header("location:invoice.php");
	}
	
	if(isset($_POST['all']))
	{
		header("location:all_offered_products.php");
	}
	$o1=1;
?>

<html>
    <head>
        <title>Start Selling with YourCart</title>
        <link href="../stylesheets/sell_product_style.css" rel="stylesheet" />
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
                    <?php echo $result[0]; ?>
                    &nbsp
                    <?php echo $result[1]; ?>
                    <br />
                    <?php echo $result[4]; ?>
                    <br />
                    <?php echo $result[5]; ?>
                    <br />
                    <?php echo $result[6]; ?>
                    <br/>
                    <div class="fr3">
                        <form  method="post">
                            <input type="submit" id="delete" name="delete" value="Delete Account"/>
                            &nbsp &nbsp
                            <input type="submit" id="logout" name="logout" value="Logout" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="sc1">
				<?php if($_SESSION['display']!=null)
				{?>
				Product Is Successfully In Display
				<?php }
				else if($_SESSION['display1']!=null)
				{?>
				There was a problem in displaying your product
				<br />
				Make sure the image file is less than 2mb
				<?php } ?>
                <br/>
            <div class="sc">
                &nbsp
                Product Information :-
                <form action="" method="POST" enctype="multipart/form-data">
                <table cellpadding=8px class="tab2">
                    <tr>
                        <td>
                            Main Category : 
                        </td>
                        <td>
                            <select name="main_cate" id="main_cate" onchange="getId(this.value);" required>
                            <option value="">Select Main Category</option>
                            <?php
                                $sql3="Select * from main_cate ";
                                $result1=mysqli_query($con,$sql3);
                                foreach($result1 as $main_cate)
                                {
                                    ?>
                                    <option value="<?php echo $main_cate["cid"]; ?>"><?php echo $main_cate['cate']?></option>
                                    <?php
                                }
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Sub Category :
                        </td>
                        <td>
                            <select name="sub_cate" id="sub_cate" onchange="getId1(this.value);" required>
                                <option value="">Select Sub Category</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Sub Sub Category :
                        </td>
                        <td>
                            <select name="sub_sub_cate" id="sub_sub_cate" required>
                                <option value="">Select Sub Sub Category</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Product Name : 
                        </td>
                        <td>
                            <input type="text" id="txt_1" name="txt_1" placeholder="Product name"  required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Product ID : 
                        </td>
                        <td>
                            <input type="text" id="txt_2" name="txt_2" placeholder="Product ID"  required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Quantity : 
                        </td>
                        <td>
                            <input type="number" id="num" name="num" placeholder="Quantity"  required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Price : 
                        </td>
                        <td>
                            <input type="number" id="num_1" name="num_1" placeholder="Price"  required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Technical Specs : 
                        </td>
                        <td>
                            <textarea id="txt_area_1" name="txt_area_1" placeholder="Technical Data" class="txt_area" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Desciption : 
                        </td>
                        <td>
                            <textarea id="txt_area_2" name="txt_area_2" placeholder="Description" class="txt_area" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Product Picture 1 :
                        </td>
                        <td>
                            <input type="file" name="image1" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Product Picture 2 :
                        </td>
                        <td>
                            <input type="file" name="image2" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Product Picture 3 :
                        </td>
                        <td>
                            <input type="file" name="image3" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Product Picture 4 :
                        </td>
                        <td>
                            <input type="file" name="image4" required/>
                        </td>
                    </tr>
                </table>
                <br />
				*use underscore (_) for next line
				<br />
				*Image size should be less than 2mb
				<br />
                <center><input type="submit" name="btn_submit" id="btn_submit" class="btn_submit"/></center>
                </form>
            </div>
            </div>
            <div class="thr">
				<br />
                <div class="thr1">
                    Products Offered by you :-
					<?php if($_SESSION['edit_prod_noti']==1){?>
					<p>Product Has been edited</p>
					<?php }?>
                </div>
				<div class="thr2">
					<br />
					<?php if($count2!=0)
						{?>
					<table cellpadding="8px" class="tab3">
						<tr>
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
						<?php do{
							if($o1!=10)
							{?>
						<tr>
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
						
						<?php $o1=$o1+1;
							} } while($result4=mysqli_fetch_assoc($rs1)) ?>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							<td class="last1">
								<form method="post">
									<button name="all" class="all">View All Offered Products</button>
								</form>
							</td>
						</tr>
					</table>
					<?php }
					else
					{
						echo "None";
					}
					?>
				</div>
            </div>
			
			<div class="five">
				<br />
				<form method="post">
					<center><input type="submit" name="invoice_bt" class="invoice_bt" value="Invoices" /></center>
				</form>
				<br />
			</div>
			<div class="four">
				<center>All Rights are Reserved</center>
			</div>
        </div>
        <script src="../config/jquery-1.8.0.min.js" ></script>
        <script>
            function getId(val)
            {
                $.ajax({
                    type:"POST",
                    url: "getdata.php",
                    data: "cid="+val,
                    success: function(data)
                    {
                        $("#sub_cate").html(data);
                    }
                })
            }
            
            function getId1(val1)
            {
                $.ajax({
                    type:"POST",
                    url: "getdata1.php",
                    data: "sub_cate_id="+val1,
                    success: function(data)
                    {
                        $("#sub_sub_cate").html(data);
                    }
                })
            }
        </script>
    </body>
</html>