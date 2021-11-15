 <?php 
date_default_timezone_set('Asia/Kolkata');
include 'db_connect.php'; 
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM `hotel_info`");
foreach($qry->fetch_array() as $k => $val){
    $$k=$val;
}
} 
 $invoiceid=$_GET['id'];
$date=date('d-m-Y');

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
           



td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.description,
th.description {
    width: 75px;
    max-width: 75px;
}

td.quantity,
th.quantity {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

td.price,
th.price {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 155px;
    max-width: 155px;
    
  
}

img {
    max-width: inherit;
    width: inherit;
}

@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
        </style>
        <title>Receipt example</title>
    </head>
    <body>
        
       <?php 
                $invoiceid=$_GET['id'];
                $qry = $conn->query("SELECT * FROM `order_details` WHERE `id`='$invoiceid'");
            foreach($qry->fetch_array() as $k => $val){
                $$k=$val;
           }
                
        ?>
        
        <div class="ticket"  style="font-size: 12px;
    font-family: 'Times New Roman';" >
           <!-- <img src="dist/img/hotel.png" alt="Logo">  -->
        <p class="centered">RECEIPT 
                <br><?php echo  $name ?>
                <br><?php  echo $phone  ?></p>
            <table>
                <thead>
                    <tr>
                        <th class="quantity">Q.</th>
                        <th class="description">Description</th>
                        <th class="price">Total</th>
                    </tr>
                </thead>
                <tbody>
               <?php
 
                $product = $conn->query("SELECT * FROM `order_content`  WHERE  `oid`= '$id' ");
                while($row2 = mysqli_fetch_array($product, MYSQLI_ASSOC))
                 {
                       
               
               ?>
                   
                    <tr>
                        <td class="quantity"><?php echo $row2[unit] ?></td>
                        <td class="description"><?php echo $row2[food] ?></td>
                        <td class="price"><?php echo $row2[price]*$row2[unit]   ?></td>
                    </tr>
                    
                    
                    
             <?php 
             
             
             }  ?>  
             
             
                    
                
             <tr>
                        <td class="quantity"></td>
                        <td class="description">SubTotal</td>
                        <td class="price"><?php echo $total ?></td>
                        
                    </tr>
                    
                      <tr>
                        <td class="quantity"></td>
                        <td class="description">CGST(2.5%)</td>
                        <td class="price"><?php echo .025* $total ?></td>
                    </tr>
                    
                    
                    
                      <tr>
                        <td class="quantity"></td>
                        <td class="description">CGST(2.5%) </td>
                        <td class="price"><?php echo .025* $total ?></td>
                    </tr>
                    
                  <tr>
                        <td class="quantity"></td>
                        <td class="description">Total:</td>
                        <td class="price"><?php echo (.05* $total)+$total ?></td>
                    </tr>
                    
                    
                    
                </tbody>
            </table>
            <p class="centered">Thanks for your purchase!
                <br><?php  echo $base_url  ?></p>
        </div>
        
        <button id="btnPrint" class="hidden-print" onclick="myFunction()">Print</button>
       
       
               <script>
  window.addEventListener("load", window.print());
</script>
       
<script>
function myFunction() {
  window.addEventListener("load", window.print());
}
</script>
       
       
    </body>
</html>


