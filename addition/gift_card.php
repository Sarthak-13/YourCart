<?php
    session_start();
    include("../config/connection_seller_acc.php");
    $c=null;
    $_SESSION['j']=0;
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
    }
    
    if(isset($_POST['sc_input1']))
    {
        $r1=$_POST['sc_input'];
        $r1=mysqli_real_escape_string($con,$r1);
        $r2=str_replace(" ","%' or txt_1 LIKE '%",$r1);
        $_SESSION['r21']=$r2;
        echo $r2;
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
    
    $a=500;
?>

<html>
    <head>
        <title>
            YourCart Gift Card
        </title>
        <link href="../stylesheets/style_gift_card.css" rel="stylesheet" />
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
                <a href="../index1.php">
                    YourCart
                    <img src="../images_site/shopping-bag-icon-50478.png" />
                </a>
                <form class="sc_form" method="post">
                    <input type="text" name="sc_input" class="sc_input" placeholder="So, What are you wishing for today?" required/>
                    <input type="submit" class="sc_input1" value="Search" name="sc_input1"/>
                </form>
                <form class="sc_form1" method="post">
                    <input type="submit" name="cart1" class="sc_input2" value='Cart'/>
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
                <div class="b1">
                    Gift Card
                </div>
                <div class="b2">
                    Send Gift Cards to multiple recipients instantly. Last minute gifting is now a few clicks away!
                </div>
                <div class="b3">
                    Enter Gift Card Details
                </div>
                <div class="b4">
                    Gift Cards can be used for purchases from Sellers listed on YourCart.com. Card value can range from between Rs 25 and Rs 10000.
                </div>
                <div class="b5">
                    <div class="b5-1">
                    <form method="post">
                        <table cellpadding="10px" class="tab2">
                            <tr>
                                <td>
                                    Recievers Email :
                                </td>
                                <td>
                                    <input type="email" class="txt_box" placeholder="Recievers Email" disabled/>
                                </td>
                                <td>
                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspValue of Gift Card (Rs) 
                                </td>
                                <td>
                                    <input type="number" class="txt_box" name="val" value="500" disabled/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Re-type Email :
                                </td>
                                <td>
                                    <input type="number" class="txt_box" placeholder="Recievers Email" disabled/>
                                </td>
                                <td>
                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspNumber of Gift Cards
                                </td>
                                <td>
                                    <input type="number" name="no" class="txt_box" value="1" disabled/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Total Amount (Rs)
                                </td>
                                <td>
                                    <input type="number" class="txt_box" value="<?php echo $a?>" disabled/>
                                </td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
                 <div class="b6">
                    <button type="button" style="border:0; background: #f15e22; font-size:32; color:white;" disabled>Buy Gift Card</button>
                </div>
                 <div class="b7">
                    <br />
                    TERMS AND CONDITIONS<br/>
                    1. YourCart Gift Cards (GC) are issued by QwikCilver Solutions Pvt. Ltd and is the issuer of Gift Cards.<br />
                    2. The GC can be redeemed online against Sellers listed on www.YourCart.com only<br />
                    3. A GC can be purchased on www.YourCart.com using the following payment modes only - Credit Card, DebitCard and Net Banking.<br />
                    4. GCs can be redeemed by selecting the payment mode as Gift Card. GC payment option is not available for single order with multiple sellers<br />
                    5. GCs cannot be used to purchase other GCs, GCs cannot be used to purchase YourCart First subscriptions<br />
                    6. If the order value exceeds the GC amount, the balance must be paid by Credit Card/Debit Card/Internet Banking. Cash on Delivery payment option cannot be used to pay the balance amount<br />
                    7. If the order value is less than the amount of the GC, the outstanding balance (after deduction of order value) will reflect under the same GC and can be used for subsequent transactions<br />
                    8. GCs will expire after 12 months from the date of issue and any corresponding unused balance shall be forfeited thereafter<br />
                    9. GCs cannot be redeemed for Cash or Credit<br />
                    10. You can combine and use a maximum of 15 Gift Cards per order. They can be combined with promotional codes<br />
                    11. You are solely responsible for the safety and security of the GC. YourCart.com or QwikCilver Solutions Pvt. Ltd are not responsible for any acts of omission or commission if card is lost, stolen or used without YourCart Gift Cards (GC) are issued by QwikCilver Solutions Pvt. Ltd and is the issuer of Gift Cards<br />
                    12. You are solely responsible for the safety and security of the GC. YourCart.com or QwikCilver Solutions Pvt. Ltd are not responsible for any acts of omission or commission if card is lost, stolen or used without permission. Once the GC has been sent to you, you are bound to protect the GC PIN or GC number as confidential. In the event of any misuse of GC due to loss of any such confidential details due to the fault of the purchaser, YourCart/ QwikCilver Solutions Pvt. Ltd shall not be responsible for the same and no refund can be issued.<br />
                    13. YourCart.com/ QwikCilver Solutions Pvt. Ltd assume no responsibility for the products purchased using the GCs and any liability thereof is expressly disclaimed.<br />
                    14. Validity of GCs cannot be extended, new GCs cannot be provided against the expired/unused Gift Cards.<br />
                    15. In the event the beneficiary/Know Your Customer (KYC) details as per Reserve Bank of India (RBI) Guidelines are found to be incorrect/insufficient, QwikCilver Solutions Pvt. Ltd /YourCart.com retains the right to cancel the GC issued.<br />
                    16. GCs are a Prepaid Instrument subjected to regulations by Reserve Bank of India. YourCart/ QwikCilver Solutions Pvt. Ltd will be legally required to share the details of the purchase of the GCs and transaction undertaken using the GC. The issuer is also required to share the Know Your Customer (KYC) details of the purchaser/ redeemer of the GC with RBI or such statutory authorities, as per statutory guidelines issued from time to time. The YourCart/ QwikCilver Solutions Pvt. Ltd may contact the purchaser of the GC in this regard.<br />
                    17. There is no fee or other charges associated with GC purchase.
                    19. GCs cannot be reloaded or resold.
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