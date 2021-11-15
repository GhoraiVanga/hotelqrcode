<?php 
include 'db_connect.php'; 


if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM `order_details` WHERE id= ".$_GET['id']);
    foreach($qry->fetch_array() as $k => $val){
        $$k=$val;
    }
    }


?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="conitaner-fluid">
            <p><b>Guest Name : <?php echo $name ?></b></p>
            <p><b>Room No. : <?php echo $roomno ?></b></p>
            <p><b>Message : <?php echo $message ?></b></p>
            <table class="table-striped table table-bordered">
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
        </div>
       
            <div class="col-12 row row-cols-2">
                <div class="col-3">Order Status:</div>
                <div class="col-6">
                <?php 
                    switch($order_status){
                        case '0':
                            echo '<span class="badge badge-danger" style="font-size: 1em;">Pending</span>';
	                    break;
                        case '1':
                            echo '<span class="badge badge-primary" style="font-size: 1em;">Packed</span>';
	                    break;
                        case '2':
                            echo '<span class="badge badge-primary" style="font-size: 1em;">Approved</span>';
	                    break;
                        case '3':
                            echo '<span class="badge badge-success" style="font-size: 1em;">Delivered</span>';
	                    break;
                        default:
                            echo '<span class="badge badge-danger" style="font-size: 1em;">Cancelled</span>';
	                    break;
                    }
                ?>
                </div>
                <?php if(!isset($_GET['view'])): ?>
                <div class="col-3">
                    <button type="button" id="update_status" class="btn btn-sm btn-flat btn-primary">Update </button>
                </div>
                <?php endif; ?>
                
            </div>
         
            
        </div>
         
    </div>
</div>
<div class="modal-footer">
    <button type="button" onclick="goBack()" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<?php if(isset($_GET['view'])): ?>
<style>
    #uni_modal>.modal-dialog>.modal-content>.modal-footer{
        display:none;
    }
</style>
<?php endif; ?>
<script>
    $(function(){
        $('#update_status').click(function(){
            uni_modal("Update  Order Status", "update_status.php?oid=<?php echo $id ?>&status=<?php echo $order_status ?>")
        })
    })
</script>

<!-- Payment Status Update -->


<script>
    $(function(){
        $('#update_payment').click(function(){
            uni_modal("Update Payment Status", "update_payment.php?oid=<?php echo $id ?>&roomno=<?php echo $roomno ?>&paid=<?php echo $paid ?>")
        })
    })
</script>


<!-- Script For Go Back Button -->
<script>
function goBack() {
  window.history.back();
}
</script>