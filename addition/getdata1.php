<?php
    include_once "../config/connection_seller_acc.php";
    if(!empty($_POST['sub_cate_id']))
    {
        
        $o=$_POST['sub_cate_id'];
        $sql6="select * from sub_sub_cate where sub_cate_id='".$o."'";
        $result3=mysqli_query($con,$sql6);
        
        foreach($result3 as $sub_sub_cate)
        {
            ?>
            <option value="<?php echo $sub_sub_cate['sub_sub_cate_id']; ?>"><?php echo $sub_sub_cate['cate']?></option>
            <?php
        }
    }
?>
