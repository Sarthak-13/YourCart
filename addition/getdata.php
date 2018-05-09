<?php
    include_once "../config/connection_seller_acc.php";
    
    if(!empty($_POST['cid']))
    {
        $a=$_POST['cid'];
        $sql5="select * from main_cate_sub where cid=$a";
        $result2=mysqli_query($con,$sql5);
        
        foreach($result2 as $main_cate_sub)
        {
            ?>
            <option value="<?php echo $main_cate_sub['sub_cate_id']; ?>"><?php echo $main_cate_sub['sub_cate']?></option>
            <?php
        }
    }
?>
