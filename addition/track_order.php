<?php
    session_start();
    include("../config/connection_seller_acc.php");
    $_SESSION['check']=null;
    $_SESSION['j']=0;
    $c=null;
    $count=0;
    if(isset($_POST['cart1']))
    {
        header("location:cart.php");
    }
    if(isset($_POST['logout1']))
    {
        $_SESSION['consumer_email']=null;
    }

    
    if($_SESSION['consumer_email']!=null)
    {
        $c=$_SESSION['consumer_email'];
        $sql13="select * from ".$_SESSION['con_fr_nme']."_".$_SESSION['con_phone']." ORDER BY date DESC";
        $rs=mysqli_query($con,$sql13);
        if($rs!=null)
        {
            $count=mysqli_num_rows($rs);
        }
        if($count>0)
        {
            $result=mysqli_fetch_assoc($rs);
        }
    }
    
    if(isset($_POST['sc_input1']))
    {
        $r1=$_POST['sc_input'];
        $r1=mysqli_real_escape_string($con,$r1);
        $r2=str_replace(" ","%' or txt_1 LIKE '%",$r1);
        $_SESSION['r21']=$r2;
        header("location:search.php");
    }
    
    if(isset($_POST['sub_cate']))
    {
        $a=$_POST['sub_cate'];
        $_SESSION['sub_cate_value']=$a;
        header("location:search_by_sub_cate.php");
    }
    
    if(isset($_POST['sub_sub_cate']))
    {
        $b=$_POST['sub_sub_cate'];
        $_SESSION['sub_sub_cate_value']=$b;
        header("location:search_by_sub_sub_cate.php");
    }
    
    $total1=0;
?>

<html>
    <head>
        <title>
            Track your Order - YourCart
        </title>
        <link href="../stylesheets/track_order_style.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container" data-stellar-background-ratio="0.3">
            <div class="head">
            <div class="fr">
                <a href="sell.php">Sell</a>
                &nbsp|&nbsp
                <a href="gift_card.php">Gift Card</a>
                &nbsp|&nbsp
                <a href="customer_care.php">24x7 Customer Care</a>
                &nbsp|&nbsp
                <a href="track_order.php">Track Order</a>
                &nbsp|&nbsp
                <?php if($c==null)
                {?>
                <a href="sign_up.php">Sign Up / Login</a>
                <?php }
                else
                { echo $c;?>
                <form method="post" class="form10">
                    <button type="submit" name="logout1" id="logout1" class="logout1">Log out</button>
                </form>
                <?php
                }
                ?>
            </div>
            <div class="sc">
                <a href="../index.php">
                    YourCart
                    <img src="../images_site/shopping-bag-icon-50478.png" />
                </a>
                <form class="sc_form" method="post">
                    <input type="text" name="sc_input" class="sc_input" placeholder="So, What are you wishing for today?" required/>
                    <input type="submit" class="sc_input1" value="Search" name="sc_input1"/>
                </form>
                <form class="sc_form1" method="post">
                    <button type="submit" name="cart1" class="sc_input2">Cart</button>
                </form>
            </div>
            <div class="thr">
                 <div class="dropdown">
                    <button class="dropbtn">ELECTRONICS</button>
                    <div class="dropdown-content">
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="1" class="header" >Mobiles</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="1" class="data">Samsung</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="2" class="data">Apple</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="3" class="data">HTC</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="4" class="data">Sony</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="5" class="data">Motorola</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="6" class="data">Lenovo</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="7" class="data">Asus</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="2" class="header" >Mobile Accessories</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="8" class="data">Memory Card</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="9" class="data">Cases & Covers</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="10" class="data">Power banks</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="11" class="data">Headphones & Headsets</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="3" class="header" >Laptops</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="12" class="data">Samsung</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate"  value="13" class="data">Apple</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate"  value="14" class="data">Dell</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate"  value="15" class="data">Sony</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate"  value="16" class="data">Acer</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate"  value="17" class="data">Lenovo</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate"  value="18" class="data">HP</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate"  value="4" class="header" >Computer Accessories</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate"  value="19" class="data">External Hard Disks</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="20" class="data">Mouse</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="21" class="data">Keyboards</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="22" class="data">Pendrives</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="23" class="data">Routers</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="5" class="header" >Television</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="24" class="data">Samsung</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="25" class="data">Sony</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="26" class="data">LG</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="27" class="data">Sharp</button>
                            </form>
                        </div>
                    </div>
                </div>
                 <div class="dropdown">
                    <button class="dropbtn">MEN</button>
                    <div class="dropdown-content">
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="6" class="header" >Footwear</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="28" class="data">Puma</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="29" class="data">Nike</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="30" class="data">Rebook</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="31" class="data">Addidas</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="32" class="data">Aldo</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="33" class="data">Bata</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="34" class="data">Fila</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="7" class="header" >Tshirts</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="35" class="data">Puma</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="36" class="data">Nike</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="37" class="data">Rebook</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="38" class="data">Addidas</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="39" class="data">Aldo</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="40" class="data">Louise Philips</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="41" class="data">Cantabil</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="8" class="header" >Shirts</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="42" class="data">Peter England</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="43" class="data">US Polo</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="44" class="data">Ralph Lauren</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="45" class="data">Louise Philips</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="46" class="data">Aldo</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="9" class="header" >Trousers</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="47" class="data">Peter England</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="48" class="data">US Polo</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="49" class="data">Ralph Lauren</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="50" class="data">Louise Philips</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="51" class="data"/>Aldo</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="10" class="header" >Wallet</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="52" class="data">Vans</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="53" class="data">US Polo</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="54" class="data">Ralph Lauren</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="55" class="data">Louise Philips</button>
                            </form>
                        </div>
                    </div>
                </div>
                 <div class="dropdown">
                    <button class="dropbtn">WOMEN</button>
                    <div class="dropdown-content">
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="11" class="header" >Footwear</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate_" value="56" class="data">Puma</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate_" value="57" class="data">Nike</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="58" class="data">Rebook</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="59" class="data">Addidas</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="60" class="data">Aldo</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="61" class="data">Bata</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="62" class="data">Fila</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="12" class="header" >Tops</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="63" class="data">Puma</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="64" class="data">Nike</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="65" class="data">Rebook</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="66" class="data">Addidas</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="67" class="data">Aldo</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="68" class="data">Louise Philips</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="69" class="data">Cantabil</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="13" class="header" >Ethnic</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="70" class="data">Lifestyle</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="71" class="data">Lakshita</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="72" class="data">Temptation</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="73" class="data">Zara</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="14" class="header" >Trousers</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value=""74 class="data">Peter England</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="75" class="data">US Polo</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="76" class="data">Ralph Lauren</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="77" class="data">Louise Philips</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="78" class="data"/>Aldo</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="15" class="header" >Bags</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="79" class="data">Vans</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="80" class="data">US Polo</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="81" class="data">Ralph Lauren</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="82" class="data">Louise Philips</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="83" class="data">Louis Vuitton</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="84" class="data">Gucci</button>
                            </form>
                        </div>
                    </div>
                </div>
                 <div class="dropdown">
                    <button class="dropbtn">BABY & KIDS</button>
                    <div class="dropdown-content">
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="16" class="header" >Footwear</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="85" class="data">Puma</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="86" class="data">Nike</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="87" class="data">Rebook</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="88" class="data">Addidas</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="89" class="data">Aldo</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="90" class="data">Bata</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="91" class="data">Fila</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="17" class="header" >Clothing</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="92" class="data">Puma</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="93" class="data">Nike</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="94" class="data">Rebook</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="95" class="data">Addidas</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="96" class="data">Aldo</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="97" class="data">Louise Philips</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="98" class="data">Cantabil</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="18" class="header" >Baby Care</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="99" class="data">Baby Monitors</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="100" class="data">Diapers</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="101" class="data">Wipes</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="102" class="data">Strollers</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="103" class="data">Feeding</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="104" class="data">Nursing</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="19" class="header" >Kids Sports</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="105" class="data">Cricket Bats</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="106" class="data">Balls</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="107" class="data">Indoor Games</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="108" class="data">Educational Toys</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="109" class="data"/>Outdoor Games</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="20" class="header" >School Supplies</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="110" class="data">Lunch Box</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="111" class="data">Stationary</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="112" class="data">Notebooks</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="113" class="data">Water Bottles</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="114" class="data">School Bags</button>
                            </form>
                        </div>
                    </div>
                </div>
                 <div class="dropdown">
                    <button class="dropbtn">HOME & FURNITURE</button>
                    <div class="dropdown-content1">
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="21" class="header" >Bed and Living</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="115" class="data">Bedsheets</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="116" class="data">Blankets</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="117" class="data">Cushions</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="118" class="data">Curtains</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="119" class="data">Mats</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="120" class="data">Mattresses</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="22" class="header" >Furniture</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="121" class="data">Sofas</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="122" class="data">Beds</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="123" class="data">Dining Table</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="124" class="data">Tv Cabinets</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="125" class="data">Shoe Racks</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="126" class="data">Inflatable Sofas</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="23" class="header" >Lighting</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="127" class="data">CFL</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="128" class="data">LED</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="129" class="data">Wall Lamps</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="130" class="data">Table Lamps</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="131" class="data">Torches</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="24" class="header" >Tools</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="132" class="data">Screw Drivers</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="133" class="data">Lawns and Gardening</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="134" class="data">Electrical</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="135" class="data">Paints Suppplies</button>
                            </form>
                        </div>
                    </div>
                </div>
                 <div class="dropdown">
                    <button class="dropbtn">BOOKS & MEDIA</button>
                    <div class="dropdown-content1">
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="25" class="header" >Books</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="136" class="data">Academic</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="137" class="data">Entrance Exam</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="138" class="data">Fiction</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="139" class="data">Children</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="140" class="data">Comics</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="141" class="data">Self Help</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="142" class="data">Business</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="143" class="data">Biography</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="144" class="data">History</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="26" class="header" >Gaming</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="145" class="data">PC Games</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="146" class="data">Xbox 360 Games</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="147" class="data">PS3 Games</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="148" class="data">Xbox One Games</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="149" class="data">PS4 Games</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="150" class="data">Accessories</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="27" class="header" >Stationary</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="151" class="data">Pens</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="152" class="data">Diaries</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="153" class="data">Calculators</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="154" class="data">Files</button>
                            </form>
                        </div>
                    </div>
                </div>
                 <div class="dropdown">
                    <button class="dropbtn">AUTOMOBILES</button>
                    <div class="dropdown-content2">
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="28" class="header" >Accessories</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="155" class="data">Car Media Players</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="156" class="data">Car Speakers</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="157" class="data">Mobile Holders</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="158" class="data">Car Covers</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="159" class="data">Bike Covers</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="160" class="data">Car Mats</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="161" class="data">Car Seat Covers</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="162" class="data">Car Pillows</button>
                            </form>
                        </div>
                        <div class="divs">
                            <form method=post>
                                <button type="submit" id="sub_cate" name="sub_cate" value="29" class="header" >Essentials</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="163" class="data">Breakdown Tools</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="164" class="data">Helmets</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="165" class="data">Oils</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="166" class="data">Lights</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="167" class="data">Tyres</button>
                                <br />
                                <button type="submit" id="sub_sub_cate" name="sub_sub_cate" value="168" class="data">Spare Parts</button>
                            </form>
                        </div>
                    </div>
                 </div>
                </div>
            </div>
            <div class="body1">
                <div class="b3">
                    Track Order
                </div>
                <?php if($c==null)
                {
                ?>
                    <div class="b1">
                        You have not logged in<br />
                        to Track your order you must be Logged In
                    </div>
                <?php }
                else
                {
                    if($count==0)
                    {
                        ?>
                        <div class="b1">
                            There are no order placed by you
                        </div>
                <?php
                    }
                    
                    else
                    {
                        ?>
                        <div class="b2">
                        <table cellpadding="20px" class="tab1">
                            <tr>
                                <th>Product Name</th>
                                <th>Product ID</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Mode of payment</th>
                            </tr>
                            <?php
                            do {
                                if($result['Status']==1)
                                {
                                ?>
                                <tr>
                                <td><?php echo $result['product_name']; ?></td>
                                <td><?php echo $result['Product_ID']; ?></td>
                                <td><?php echo $result['quantity']; ?></td>
                                <td><?php echo $result['price']; $total1=$total1+$result['price'];?></td>
                                <td><?php echo $result['date'];?></td>
                                <td><?php echo "Shipped"; ?></td>
                                <td><?php if($result['mode_of_payment']==1){echo "Online";} else{echo "Cash On Delivery";}?></td>
                                </tr>
                            <?php
                                }}while($result=mysqli_fetch_assoc($rs))
                            ?>
                        </table>
                        </div>
                <?php
                    }
                }
                ?>
                <div class="tot">
                    Total Spent on YourCart = Rs. <?php echo $total1; ?>
                </div>
            </div>
            <div class="footer">
                <div class="footer1">
                    HELP
                    <br /><br />
                    <a href="payment_help.php">Payment</a>
                    <hr />
                    <a href="shipping_help.php">Shipping</a>
                    <hr />
                    <a href="returns_cancellation_help.php">Returns & Cancellation</a>
                    <hr />
                    <a href="yourcart_story.php">YourCart Story</a>
                    <hr />
                </div>
                <div class="footer2">
                    Features
                    <br /><br />
                    <a href="sell.php">Sell on YourCart</a>
                    <hr />
                    <a href="gift_card.php">Gift Card</a>
                    <hr />
                    <a href="customer_care.php">Customer Care</a>
                    <hr />
                    <a href="track_order.php">Track Order</a>
                    <hr />
                </div>
            </div>
            <div class="rights">
                All Rights are Reserved
            </div>
        </div>
        <script src="../config/jquery-2.0.2.js"></script>
        <script src="../config/jquery.stellar.min.js"></script>
        <script>
            $.stellar();
        </script>
    </body>
</html>