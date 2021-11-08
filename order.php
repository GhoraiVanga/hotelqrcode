<?php 
include"include/link.php";


if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM `order_details` WHERE id= ".$_GET['id']);
    foreach($qry->fetch_array() as $k => $val){
        $$k=$val;
    }
    }


?>
<!-- saved from url=(0052)https://craftpip.github.io/jquery-confirm/table.html -->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
        <body>
<table class="table table-bordered table-condensed table-striped">
    <colgroup>
                   
                    <col width="15%">
                    <col width="30%">
                    <col width="20%">
                    <col width="20%">
                </colgroup>
                <thead>
                    <tr>
                      
                        <th>Unit</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $olist = $conn->query("SELECT * FROM `order_content` WHERE `oid`= '$id' ");
                            while($row=$olist->fetch_assoc()):

                    ?>
                    <tr>
                    
                        <td><?php echo $row['unit'] ?></td>
                        <td><?php echo $row['food']  ?></td>
                        <td class="text-right"><?php echo number_format($row['price']) ?></td>
                        <td class="text-right"><?php echo number_format($row['price'] * $row['unit']) ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan='3'  class="text-right">Total</th>
                        <th class="text-right"><?php echo number_format($total) ?></th>
                    </tr>
                </tfoot>
</table>
</body>
</html>