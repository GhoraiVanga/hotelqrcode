 <?php 
include"include/link.php";

$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$qry = $conn->query("SELECT * FROM `qrcode` where `url`='$actual_link'  AND `status`='1' ");
if($qry->num_rows > 0){


}
else{
    echo '<script>window.location = "scanme.php";</script>';
  
}

    $string = $_GET['room_no'];
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'SUMANGHORAI'; // user define private key
    $secret_iv = 's1f4r8p9'; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo    
    $decrypted = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
 ?>
 <?php 
         $qry = $conn->query("SELECT * FROM `hotel_info`");
      foreach($qry->fetch_array() as $k => $val){
        $$k=$val;
    }
    
        ?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
    <title> <?php echo $name ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="HandheldFriendly" content="True">


    <meta name="author" content="WeCode Future QR Menu">
    <meta name="keywords" content="">
    <meta name="description" content="">

<!--    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//google.com">
    <link rel="dns-prefetch" href="//apis.google.com">
    <link rel="dns-prefetch" href="//ajax.googleapis.com">
    <link rel="dns-prefetch" href="//www.google-analytics.com">
    <link rel="dns-prefetch" href="//pagead2.googlesyndication.com">
    <link rel="dns-prefetch" href="//gstatic.com">
    <link rel="dns-prefetch" href="//oss.maxcdn.com">  -->

    <!-- Favicon-->
    <!-- Bootstrap v4.3.1 CSS -->
    <link rel="stylesheet" href="Stylesheets/bootstrap.min.css">

    <script async>
        var themecolor = '#2a41e8';
        var mapcolor = '#8080ff';
        var siteurl = '<?php  echo 	$base_url ?>';
        var template_name = 'restro-theme';
        var ajaxurl = siteurl + "orderaccess.php";
    </script>
    <style>
        :root{--theme-color-0_01: rgba(42,65,232,0.01);--theme-color-0_02: rgba(42,65,232,0.02);--theme-color-0_03: rgba(42,65,232,0.03);--theme-color-0_04: rgba(42,65,232,0.04);--theme-color-0_05: rgba(42,65,232,0.05);--theme-color-0_06: rgba(42,65,232,0.06);--theme-color-0_07: rgba(42,65,232,0.07);--theme-color-0_08: rgba(42,65,232,0.08);--theme-color-0_09: rgba(42,65,232,0.09);--theme-color-0_1: rgba(42,65,232,0.1);--theme-color-0_11: rgba(42,65,232,0.11);--theme-color-0_12: rgba(42,65,232,0.12);--theme-color-0_13: rgba(42,65,232,0.13);--theme-color-0_14: rgba(42,65,232,0.14);--theme-color-0_15: rgba(42,65,232,0.15);--theme-color-0_16: rgba(42,65,232,0.16);--theme-color-0_17: rgba(42,65,232,0.17);--theme-color-0_18: rgba(42,65,232,0.18);--theme-color-0_19: rgba(42,65,232,0.19);--theme-color-0_2: rgba(42,65,232,0.2);--theme-color-0_21: rgba(42,65,232,0.21);--theme-color-0_22: rgba(42,65,232,0.22);--theme-color-0_23: rgba(42,65,232,0.23);--theme-color-0_24: rgba(42,65,232,0.24);--theme-color-0_25: rgba(42,65,232,0.25);--theme-color-0_26: rgba(42,65,232,0.26);--theme-color-0_27: rgba(42,65,232,0.27);--theme-color-0_28: rgba(42,65,232,0.28);--theme-color-0_29: rgba(42,65,232,0.29);--theme-color-0_3: rgba(42,65,232,0.3);--theme-color-0_31: rgba(42,65,232,0.31);--theme-color-0_32: rgba(42,65,232,0.32);--theme-color-0_33: rgba(42,65,232,0.33);--theme-color-0_34: rgba(42,65,232,0.34);--theme-color-0_35: rgba(42,65,232,0.35);--theme-color-0_36: rgba(42,65,232,0.36);--theme-color-0_37: rgba(42,65,232,0.37);--theme-color-0_38: rgba(42,65,232,0.38);--theme-color-0_39: rgba(42,65,232,0.39);--theme-color-0_4: rgba(42,65,232,0.4);--theme-color-0_41: rgba(42,65,232,0.41);--theme-color-0_42: rgba(42,65,232,0.42);--theme-color-0_43: rgba(42,65,232,0.43);--theme-color-0_44: rgba(42,65,232,0.44);--theme-color-0_45: rgba(42,65,232,0.45);--theme-color-0_46: rgba(42,65,232,0.46);--theme-color-0_47: rgba(42,65,232,0.47);--theme-color-0_48: rgba(42,65,232,0.48);--theme-color-0_49: rgba(42,65,232,0.49);--theme-color-0_5: rgba(42,65,232,0.5);--theme-color-0_51: rgba(42,65,232,0.51);--theme-color-0_52: rgba(42,65,232,0.52);--theme-color-0_53: rgba(42,65,232,0.53);--theme-color-0_54: rgba(42,65,232,0.54);--theme-color-0_55: rgba(42,65,232,0.55);--theme-color-0_56: rgba(42,65,232,0.56);--theme-color-0_57: rgba(42,65,232,0.57);--theme-color-0_58: rgba(42,65,232,0.58);--theme-color-0_59: rgba(42,65,232,0.59);--theme-color-0_6: rgba(42,65,232,0.6);--theme-color-0_61: rgba(42,65,232,0.61);--theme-color-0_62: rgba(42,65,232,0.62);--theme-color-0_63: rgba(42,65,232,0.63);--theme-color-0_64: rgba(42,65,232,0.64);--theme-color-0_65: rgba(42,65,232,0.65);--theme-color-0_66: rgba(42,65,232,0.66);--theme-color-0_67: rgba(42,65,232,0.67);--theme-color-0_68: rgba(42,65,232,0.68);--theme-color-0_69: rgba(42,65,232,0.69);--theme-color-0_7: rgba(42,65,232,0.7);--theme-color-0_71: rgba(42,65,232,0.71);--theme-color-0_72: rgba(42,65,232,0.72);--theme-color-0_73: rgba(42,65,232,0.73);--theme-color-0_74: rgba(42,65,232,0.74);--theme-color-0_75: rgba(42,65,232,0.75);--theme-color-0_76: rgba(42,65,232,0.76);--theme-color-0_77: rgba(42,65,232,0.77);--theme-color-0_78: rgba(42,65,232,0.78);--theme-color-0_79: rgba(42,65,232,0.79);--theme-color-0_8: rgba(42,65,232,0.8);--theme-color-0_81: rgba(42,65,232,0.81);--theme-color-0_82: rgba(42,65,232,0.82);--theme-color-0_83: rgba(42,65,232,0.83);--theme-color-0_84: rgba(42,65,232,0.84);--theme-color-0_85: rgba(42,65,232,0.85);--theme-color-0_86: rgba(42,65,232,0.86);--theme-color-0_87: rgba(42,65,232,0.87);--theme-color-0_88: rgba(42,65,232,0.88);--theme-color-0_89: rgba(42,65,232,0.89);--theme-color-0_9: rgba(42,65,232,0.9);--theme-color-0_91: rgba(42,65,232,0.91);--theme-color-0_92: rgba(42,65,232,0.92);--theme-color-0_93: rgba(42,65,232,0.93);--theme-color-0_94: rgba(42,65,232,0.94);--theme-color-0_95: rgba(42,65,232,0.95);--theme-color-0_96: rgba(42,65,232,0.96);--theme-color-0_97: rgba(42,65,232,0.97);--theme-color-0_98: rgba(42,65,232,0.98);--theme-color-0_99: rgba(42,65,232,0.99);--theme-color-1: rgba(42,65,232,1);}
    </style>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="Stylesheets/normalize.css">
    <link rel="stylesheet" href="Stylesheets/theme.css?ver=6.1.1theme.css?ver=6.1.1">
    <link rel="stylesheet" type="text/css" href="Stylesheets/waves.css">
    <!--Icon CSS-->
    <link rel="stylesheet" href="https://qr.wecodefuture.com/includes/assets/css/icons.css">
    <script src="Scripts/jquery-3.4.1.min.js"></script>
</head>
<body class="default ltr">
<!--[if lt IE 8]>
<p class="browserupgrade">
    You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.
</p>
<![endif]-->
<!-- Preloading -->
<div class="preloading">
    <div class="wrap-preload">
        <div class="cssload-loader"></div>
    </div>
</div>
<!-- .Preloading -->
<!-- Sidebar left -->
<nav id="sidebarleft" class="sidenav">
    <div class="sidebar-header">
        <img src="Images/1633410109615bdc3dae601.jpg">
    </div>
    <div class="heading">
        <div class="title col-secondary font-weight-normal">BROWSE MENU</div>
    </div>
    <ul class="list-unstyled components">
        


    <?php 
$data = mysqli_query($conn,"SELECT * FROM `food_category` WHERE `status`='1'");
while($row = mysqli_fetch_array($data))
{

    ?>


        <li>
            <a href="#" data-catid="<?php echo $row['id'];  ?>" class="menu-category"><i class="icon-material-outline-restaurant"></i> <?php echo  $row['category_name']; ?> </a>
        </li>
 
        

<?php } ?>




    </ul>
</nav>
<!-- .Sidebar left -->

<!-- Header  -->
<nav class="navbar navbar-expand-lg navbar-light bg-header">
    <div class="container-fluid flex-nowrap">
        <button type="button" id="sidebarleftbutton" class="btn mr-4">
            <i class="icon-feather-menu"></i>
        </button>
          <!--   <button type="button" class="btn btn-default ml-auto mr-1" id="call-the-waiter-btn" title="Call the Waiter">
            <i class="fa fa-bell"></i>
            <span class=" d-sm-inline">Call the Waiter</span>
        </button>   -->
        
     <a href="trackorder.php?room=<?php echo $string; ?>"<button type="button" class="btn btn-default ml-auto mr-1"  title="Track Your Order">
            
            <span class="d-sm-inline">Track Your Order</span>
        </button> </a>
        
        
        
                    </div>
</nav>
<!-- .Header  -->
<!-- Content  -->
<div id="content">
    <!-- Content Wrap  -->
    <div class="content-wrap">
        
    <!-- Hotel Details -->    
        
        
        
        <div class="single-page-header detail-header" data-background-image="admin/menu/<?php echo $photo  ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="single-page-header-inner">
                            <div class="left-side">
                                <div class="header-image"><img src="admin/menu/<?php echo $photo  ?>" ></div>
                                <div class="header-details">
                                    <h3><?php echo $name ?> <br> Room  : <?=$decrypted;?><span><?php echo $tagline ?></span></h3>
                                    <ul>
                                         <li><i class="icon-feather-watch margin-right-5"></i> <?php  echo $working_hours?></li>  <li><i class="icon-feather-map margin-right-5"></i> <?php  echo $address?></li>
                                                                            </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php 
$data1 = mysqli_query($conn,"SELECT * FROM `food_items` WHERE `status`='1' ");
while($row1 = mysqli_fetch_array($data1))
{

    ?>

                
             <div class="card-body menu-category-item menu-category-<?php echo $row1['fcid'];?> ">
                <div class="section-menu" data-id="<?=$row1['id'];?>" data-name="<?=$row1['title'];?>" data-price="<?=$row1['price'];?> &#8377;" data-amount="<?=$row1['price'];?>" data-description="<?=$row1['description'];?>" data-image-url="menu/<?=$row1['photo'];?>">
                    <div class="menu-item list">
                        <div class="menu-image">
                            <?php 
                            $photo=$row1['photo'];
                            if($photo=='')
                            {
                                
                             ?>
                            <img src="BackupFood/noimage.jpeg">
                            
                            <?php } else {  ?>
                             <img src="admin/menu/<?=$row1['photo'];?>">
                            
                            <?php } ?>
                            
                        </div> 
                        <div class="menu-content">
                            <div class="menu-detail">
                                <div class="menu-title">
                                    <div class="badge abs <?=$row1['type'];?>">
                                        <i class="fa fa-circle"></i></div><br>
                                    <h4><?=$row1['title'];?></h4>
                                    <div class="menu-recipe"><?=$row1['description'];?></div>
                                    <div class="menu-price"> &#8377; <?=$row1['price'];?> </div>
                                </div>
                                <?php 
                                $available=$row1['available'];
                                if($available=='1')
                                {
                                    
                                 ?>
                                 <div class="add-menu">
                                    <div class="add-btn add-item-to-order">
                                        <span>Add</span>
                                        <i class="icon-feather-plus"></i>
                                    </div>
                                </div>
                                <?php } else {  ?>
                                 <div class="menu-recipe">Not Available</div>
                                
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <?php }?>  
                
                 
                
    </div>
</div>
<!-- .Content  -->

<style>
    
    .card-body{
            
    margin: 0em 0em 1.5em 0em;
    border-bottom: 1px solid powderblue;
    width: 100%;
    }
    
    
</style>






<!-- Bottom Panel  -->
<div class="footer none" id="view-order-wrapper">
    <div class="clearfix"></div>
    <div class="order-footer">
        <div class="view-order">
            <div class="">
                <div class="item"><span id="view-order-quantity">1</span> Item(s)</div>
                <span class="price"><span id="view-order-price"></span></span>
            </div>
            <button class="order-btn" id="viewOrderBtn">View Cart <i class="icon-material-outline-keyboard-arrow-right"></i></button>
        </div>
    </div>
</div>
<!-- Bottom Panel  -->

<!-- Customized Menu -->
<div id="viewOrder" class="sidenav bottom">
    <div class="sidebar-header bg-white">
        <div class="navbar-heading">
            <h4>Cart Contents</h4>
        </div>
        <button type="button" id="dismiss" class="btn ml-auto">
            <i class="icon-feather-x"></i>
        </button>
    </div>
    <div class="your-order-content">
        <form type="post" data-id="6" id="send-order-form">
        <div class="sidebar-wrapper">
            <div class="section">
                <div class="your-order-items"></div>
            </div>
            <div class="section3">
                <div class="total-price">
                    <div class="grand-total">
                        <span> Total</span><span class="float-right"><span class="your-order-price"></span></span>
                    </div>
                </div>
            </div>
                        <div class="section">
                <div class="col-text font-medium my-2">Ordering type</div>
                <div class="form-group">
                    <div class="form-line">
                        <select name="ordering-type" id="ordering-type" class="form-control" required>
                     <option value="delivery">On room</option>
                <!--  <option value="on-table">Delivery</option>  -->
                                                    </select>
                    </div>
                </div>
            </div>
                        <input name="pay_via" id="pay_via" type="hidden" value="pay_on_counter">
                        <div class="section">
                <div class="col-text font-medium my-2">Your Details</div>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                    </div>
                </div>
                <div class="form-group" id="table-number-field">
                    <div class="form-line">
                        <input type="hidden" name="table" value="<?=$string?>"  class="form-control" placeholder="Table Number">
                    </div>
                </div>
                <div class="form-group" id="phone-number-field">
                    <div class="form-line">
                        <input type="number" name="phone-number" class="form-control" placeholder="Phone Number">
                    </div>
                </div>
            <!--   <div class="form-group" id="address-field">
                    <div class="form-line">
                        <textarea class="form-control" name="address" placeholder="Address" rows="1"></textarea>
                    </div>
                </div> -->
                <div class="form-group">
                    <div class="form-line">
                        <textarea class="form-control" name="message" placeholder="Allergy Information/Any other Instruction" rows="1"></textarea>
                    </div>
                </div>
            </div>
                    </div>
                    <!-- Bottom Panel  -->
        <div class="footer footer-extras">
            <div class="clearfix"></div>
            <div class="section">
                <small class="form-error"></small>
                <button type="submit" class="btn btn-primary btn-block" id="submit-order-button">Place Order</button>
            </div>
        </div>
        <!-- Bottom Panel  -->
                    </form>
    </div>
    <div class="order-success-message none">
        <i class="icon-feather-check qr-success-icon"></i>
        <h4>Order Placed Succesfully</h4>
        
                
     <a href="trackorder.php?room=<?php echo $string; ?>"<button type="button" class="btn btn-default ml-auto mr-1"  title="Track Your Order">
           
            <span class="d-sm-inline">Track Your Order</span>
        </button> </a>
        
        
    </div>
    
    
    
    
</div>
<!--Customized Menu-->

<!-- Customized Menu -->
<div id="menuCustomize" class="sidenav bottom">
    <div class="sidebar-header">
        <div class="navbar-heading">
            <h4></h4>
        </div>
        <button type="button" id="dismiss" class="btn ml-auto">
            <i class="icon-feather-x"></i>
        </button>
    </div>
    <div class="sidebar-wrapper">
        <div class="section">
            <p class="mb-0 customize-item-description"></p>
        </div>
        <div class="line-separate mt-0"></div>
        <div class="section">
            <div class="extras-heading">
                <div class="title">Description</div>
                <small>Please select extra items</small>
                
            </div>
            <div id="customize-extras">
            </div>
        </div>
    </div>
    <!-- Bottom Panel  -->
    <div class="footer footer-extras">
        <div class="clearfix"></div>
        <div class="section">
            <div class="row no-gutters">
                <div class="col-3 p-r-10">
                    <div class="add-menu">
                        <div class="add-btn add-item-btn">
                            <div class="wrapper h-100">
                                <div class="addition menu-order-quantity-decrease">
                                    <i class="icon-feather-minus"></i>
                                </div>
                                <div class="count">
                                    <span class="num" id="menu-order-quantity">1</span>
                                </div>
                                <div class="addition menu-order-quantity-increase">
                                    <i class="icon-feather-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9 p-l-10">
                    <button type="button" class="btn btn-primary btn-block" id="add-order-button">Add <span id="order-price"></span></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Panel  -->
</div>
<!--Customized Menu-->

<!-- Call the waiter -->
<div id="call-waiter-box" class="sidenav bottom">
    <div class="sidebar-header bg-white">
        <div class="navbar-heading">
            <h4>Call the Waiter</h4>
        </div>
        <button type="button" id="dismiss" class="btn ml-auto">
            <i class="icon-feather-x"></i>
        </button>
    </div>
    <div class="your-order-content">
        <form type="post" data-id="6" id="call-waiter-form">
            <div class="sidebar-wrapper">
                <div class="section">
                    <div class="form-group" id="table-number-field">
                        <div class="form-line">
                            <input type="number" name="table" class="form-control" placeholder="Table Number">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bottom Panel  -->
            <div class="footer footer-extras">
                <div class="clearfix"></div>
                <div class="section">
                    <small class="form-error"></small>
                    <button type="submit" class="btn btn-primary btn-block" id="send-call-waiter">Send</button>
                </div>
            </div>
            <!-- Bottom Panel  -->
        </form>
    </div>
    <div class="order-success-message none">
        <i class="icon-feather-check qr-success-icon"></i>
        <h4>Sent Successfully</h4>
    </div>
</div>
<!-- Call the waiter -->
<?php 


$return_arr3 = array();
$data2 = mysqli_query($conn,"SELECT * FROM `food_items` WHERE `status`='1' ");
while($row2 = mysqli_fetch_array($data2))
{
    $arr = array (
        $row2['id']=>array(
            "id" => $row2['id'],
            "title" => $row2['title'],
            "price" => $row2['price'],
            "type" => $row2['type'],
            "description" => $row2['description'],
            "extras" => $row2['extras'],
        )
        
    );
    array_push($return_arr3,$arr);
}
$variable =  json_encode($return_arr3);


$variable = str_replace("[", "", $variable);
$variable = str_replace("]", "", $variable);
$variable = str_replace("},{", ",", $variable);
$variable = str_replace("777", "[]", $variable);

//echo $variable;

?>

<div class="overlay"></div>
<script>
    var TOTAL_MENUS = <?=$variable?>;
    
    var CURRENCY_SIGN = '&#8377;';
    var CURRENCY_LEFT = 0;
    var CURRENCY_DECIMAL_PLACES = 2;
    var CURRENCY_DECIMAL_SEPARATOR = '.';
    var CURRENCY_THOUSAND_SEPARATOR = ',';

    var session_uname = "xyzabc";
    var session_uid = "13";
    var session_img = "{USERPIC}";
    // Language Var
    var LANG_ERROR_TRY_AGAIN = "Error: Please try again.";
    var LANG_LOGGED_IN_SUCCESS = "Logged in successfully. Redirecting...";
    var LANG_ERROR = "Error";
    var LANG_CANCEL = "Cancel";
    var LANG_DELETED = "Deleted";
    var LANG_ARE_YOU_SURE = "Are you sure?";
    var LANG_YOU_WANT_DELETE = "{LANG_YOU_WANT_DELETE}";
    var LANG_YES_DELETE = "Yes, delete it";
    var LANG_SHOW = "Show";
    var LANG_HIDE = "Hide";
    var LANG_HIDDEN = "Hidden";

    var LANG_TYPE_A_MESSAGE = "Type a message";
    var LANG_ADD_FILES_TEXT = "{LANG_ADD_FILES_TEXT}";
    var LANG_JUST_NOW = "Just now";
    var LANG_PREVIEW = "Preview";
    var LANG_SEND = "Send";
    var LANG_FILENAME = "{LANG_FILENAME}";
    var LANG_STATUS = "Status";
    var LANG_SIZE = "Size";
    var LANG_DRAG_FILES_HERE = "{LANG_DRAG_FILES_HERE}";
    var LANG_STOP_UPLOAD = "{LANG_STOP_UPLOAD}";
    var LANG_ADD_FILES = "{LANG_ADD_FILES}";

    var LANG_ADD = "Add";
    var LANG_PAY_NOW = "Pay Now";
    var LANG_SEND_ORDER = "Send Order";
</script>
<!-- Optional JavaScript -->
<!--  Bootstrap v4.3.1 JS -->
<script src="Scripts/bootstrap.min.js"></script>
<script src="Scripts/waves.js"></script>
<script src="Scripts/jquery.cookie.min.js"></script>
<!--  Custom JS -->
<script src="Scripts/theme.js?ver=6.1.1"></script>

</body>
</html> 