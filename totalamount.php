<?php
ob_start();
include"include/link.php";
session_start();
  if(!isset($_SESSION['room']))
    header('location:trackorder.php');
$room=$_SESSION['room'];


if(isset($room)){
    $qry = $conn->query("SELECT  SUM(total)  AS TotalAmount  from `order_details` WHERE  `paid`='0' AND `roomno`= ".$room);
    foreach($qry->fetch_array() as $k => $val){
        $$k=$val;
    }
    }
    
  $qry = $conn->query("SELECT name FROM `hotel_info`");
foreach($qry->fetch_array() as $k => $val){
        $$k=$val;
    }  
    
 
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Amount</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
@import url("https://fonts.googleapis.com/css?family=Nunito+Sans");
:root {
  --blue: #0e0620;
  --white: #fff;
  --green: #2ccf6d;
}

html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: "Nunito Sans";
  color: var(--blue);
  font-size: 1em;
}

button {
  font-family: "Nunito Sans";
}

ul {
  list-style-type: none;
  -webkit-padding-start: 35px;
          padding-inline-start: 35px;
}

svg {
  width: 100%;
  visibility: hidden;
}

h1 {
  font-size: 7.5em;
  margin: 15px 0px;
  font-weight: bold;
}

h2 {
  font-weight: bold;
}

.hamburger-menu {
  position: absolute;
  top: 0;
  left: 0;
  padding: 35px;
  z-index: 2;
}
.hamburger-menu button {
  position: relative;
  width: 30px;
  height: 22px;
  border: none;
  background: none;
  padding: 0;
  cursor: pointer;
}
.hamburger-menu button span {
  position: absolute;
  height: 3px;
  background: #000;
  width: 100%;
  left: 0px;
  top: 0px;
  transition: 0.1s ease-in;
}
.hamburger-menu button span:nth-child(2) {
  top: 9px;
}
.hamburger-menu button span:nth-child(3) {
  top: 18px;
}
.hamburger-menu [data-state=open] span:first-child {
  transform: rotate(45deg);
  top: 10px;
}
.hamburger-menu [data-state=open] span:nth-child(2) {
  width: 0%;
  opacity: 0;
}
.hamburger-menu [data-state=open] span:nth-child(3) {
  transform: rotate(-45deg);
  top: 10px;
}

nav {
  position: absolute;
  height: 100%;
  top: 0;
  left: 0;
  background: var(--green);
  color: var(--blue);
  width: 300px;
  z-index: 1;
  padding-top: 80px;
  transform: translateX(-100%);
  transition: 0.24s cubic-bezier(0.52, 0.01, 0.8, 1);
}
nav li {
  transform: translateX(-5px);
  transition: 0.16s cubic-bezier(0.44, 0.09, 0.46, 0.84);
  opacity: 0;
}
nav a {
  display: block;
  font-size: 1.75em;
  font-weight: bold;
  text-decoration: none;
  color: inherit;
  transition: 0.24s ease-in-out;
}
nav a:hover {
  text-decoration: none;
  color: var(--white);
}
nav[data-state=open] {
  transform: translateX(0%);
}
nav[data-state=open] ul li:nth-child(1) {
  transition-delay: 0.16s;
  transform: translateX(0px);
  opacity: 1;
}
nav[data-state=open] ul li:nth-child(2) {
  transition-delay: 0.32s;
  transform: translateX(0px);
  opacity: 1;
}
nav[data-state=open] ul li:nth-child(3) {
  transition-delay: 0.48s;
  transform: translateX(0px);
  opacity: 1;
}
nav[data-state=open] ul li:nth-child(4) {
  transition-delay: 0.64s;
  transform: translateX(0px);
  opacity: 1;
}

.btn {
  z-index: 1;
  overflow: hidden;
  background: transparent;
  position: relative;
  padding: 8px 50px;
  border-radius: 30px;
  cursor: pointer;
  font-size: 1em;
  letter-spacing: 2px;
  transition: 0.2s ease;
  font-weight: bold;
  margin: 5px 0px;
}
.btn.green {
  border: 4px solid var(--green);
  color: var(--blue);
}
.btn.green:before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  width: 0%;
  height: 100%;
  background: var(--green);
  z-index: -1;
  transition: 0.2s ease;
}
.btn.green:hover {
  color: var(--white);
  background: var(--green);
  transition: 0.2s ease;
}
.btn.green:hover:before {
  width: 100%;
}

@media screen and (max-width: 768px) {
  body {
    display: block;
  }

  .container {
    margin-top: 70px;
    margin-bottom: 70px;
  }
    .room{
    text-align: center;
  }
  
}

.root {
  padding: 1rem;
  border-radius: 5px;
  box-shadow: 0 2rem 6rem rgba(0, 0, 0, 0.3);
}

figure {
  display: flex;
}
figure img {
  width: 8rem;
  height: 8rem;
  border-radius: 15%;
  border: 1.5px solid #f05a00;
  margin-right: 1.5rem;
  padding:1rem;
}
figure figcaption {
  display: flex;
  flex-direction: column;
  justify-content: space-evenly;
}
figure figcaption h4 {
  font-size: 1.4rem;
  font-weight: 500;
}
figure figcaption h6 {
  font-size: 1rem;
  font-weight: 300;
}
figure figcaption h2 {
  font-size: 1.6rem;
  font-weight: 500;
}

.order-track {
  margin-top: 2rem;
  padding: 0 1rem;
  border-top: 1px dashed #2c3e50;
  padding-top: 2.5rem;
  display: flex;
  flex-direction: column;
}
.order-track-step {
  display: flex;
  height: 7rem;
}
.order-track-step:last-child {
  overflow: hidden;
  height: 4rem;
}
.order-track-step:last-child .order-track-status span:last-of-type {
  display: none;
}
.order-track-status {
  margin-right: 1.5rem;
  position: relative;
}
.order-track-status-dot {
  display: block;
  width: 2.2rem;
  height: 2.2rem;
  border-radius: 50%;
  background: #f05a00;
}
.order-track-status-line {
  display: block;
  margin: 0 auto;
  width: 2px;
  height: 7rem;
  background: #f05a00;
}
.order-track-text-stat {
  font-size: 1.3rem;
  font-weight: 500;
  margin-bottom: 3px;
}
.order-track-text-sub {
  font-size: 1rem;
  font-weight: 300;
}

.order-track {
  transition: all .3s height 0.3s;
  transform-origin: top center;
}

</style>

</head>
<body>
    
    <div class="room" > <?php echo $name ?></div> 
<!-- partial:index.partial.html -->
<div class="hamburger-menu">
  <button class="burger" data-state="closed">
    <span></span>
    <span></span>
    <span></span>
  </button>
</div>
<nav data-state="closed">
  <ul>
  <li>
    <a href="scanme.php"  >Order Food</a>
  </li> 
  <li>
    <a href="trackorder.php"  >Track Order</a>
  </li>

<!--  <li>
    <a href="totalamount.php" style="color:white">Order Amount</a>
  </li>     -->
  <li>
    <a href="contact.php">Contact Details</a>
  </li> 
  
  </ul>
</nav>
<main>
  <div class="container">
    <div class="row">
      <div class="col-md-12 align-self-center">
        <section class="root">
          <figure>
            <img src="https://image.flaticon.com/icons/svg/970/970514.svg" alt="">
            <figcaption>
              <h4> Amount Details</h4>
              <h6>Room Number : <?php echo $room ?></h6>
              <h2>Total : &#8377;<?php  echo $TotalAmount ?> </h2>
            </figcaption>
          </figure>
                       
          <div class="order-track">
          
                      <?php 
                      $i=0;
                    $olist = $conn->query("SELECT * FROM `order_details` WHERE `roomno`= '$room'  AND `paid`='0' ");
                            while($row=$olist->fetch_assoc()):
                    $i++
                    ?>
       
              
            <div class="order-track-step">
              <div class="order-track-status">
                <span class="order-track-status-dot"></span>
                <span class="order-track-status-line"></span>
              </div>
              <div class="order-track-text">
                <p class="order-track-text-stat">#<?php echo $i ?>   <?php if($row['order_status'] == 0): ?>
                                    <span class="badge badge-light" data-id="<?php echo $row[id] ?>">Pending</span>
                                <?php elseif($row['order_status'] == 1): ?>
                                    <span class="badge badge-primary" data-id="<?php echo $row[id] ?>" >Packed</span>
								<?php elseif($row['order_status'] == 2): ?>
                                    <span class="badge badge-warning" data-id="<?php echo $row[id] ?>" >Out for Delivery</span>
								<?php elseif($row['order_status'] == 3): ?>
                                    <span class="badge badge-success" data-id="<?php echo $row[id] ?>">Delivered</span>
                                <?php else: ?>
                                    <span class="badge badge-danger" data-id="<?php echo $row[id] ?>" >Cancelled</span>
                                <?php endif; ?>
                                
                          <span class="order-track-text-sub">&#8377;<?php  echo $row[total] ?></span>
                                </p> 
                <span class="order-track-text-sub"><?php  echo $row[timeoforder] ?></span>
                
               
              </div>
            </div>
     <?php endwhile; ?>
   
          </div>
          
          
          
          
        </section>
       
      </div>

    </div>
  </div>
</main>
<!-- partial -->

  <script>
 


const burger = document.querySelector('.burger');
const nav = document.querySelector('nav');

burger.addEventListener('click', e => {
  burger.dataset.state === 'closed' ? burger.dataset.state = "open" : burger.dataset.state = "closed";
  nav.dataset.state === "closed" ? nav.dataset.state = "open" : nav.dataset.state = "closed";
});
  
  
  </script>
  
  
   <script>
$('.badge').on('touchstart', function(e) {  
    $.confirm({
    title: 'Your Order ',
 
    content: 'url:order.php?id='+$(this).attr('data-id'),
    onContentReady: function () {
        var self = this;
        this.setContentPrepend('<div>all ordering item</div>');
        setTimeout(function () {
            self.setContentAppend('<div>Thanks For Your Order</div>');
        }, 2000);
    },
    columnClass: 'medium',
});
});  
 </script>
  
  
  
  
  
  

</body>
</html>
