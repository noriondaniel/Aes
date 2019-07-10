<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>

<!DOCTYPE html>
<html>
<head>
<title>Fell Your Voice</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

    h1 {
        color: white; 
        text-align: right;
    }

body{
     
      background-image: url(http://www.tacadallas.com/wp-content/uploads/2017/04/singing-classes.jpg);
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-color: #66999;
      background-size: cover;
    }

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}

.social {
  position: relative;
  top: -200px;
  left: -10px; 
  /*left: 100;*/ 
  /*top: 200px;*/ 
  /*z-index: 0;*/
}
 
  .social ul {
    list-style: none;
  }
  .social ul li a {
    display: inline-block;
    color:#fff;
    background: #000;
    padding: 10px 15px;
    text-decoration: none;
    -webkit-transition:all 500ms ease;
    -o-transition:all 500ms ease;
    transition:all 500ms ease; 
  }
  .social ul li a:hover {
    background: #000; 
    padding: 10px 30px; 
  }


</style>

</head>
<body>
<div class="topnav" id="myTopnav">
      
      <a href="#" class="active" >Home</a>
      <a href="users">Users</a>
      <a href="clients">Clients</a>
      <a href="workers">Workers</a>
      <a href="reservations">Reservations</a>
      <a href="rentals">Rentals</a>
      <a href="punishments">Punishments</a>
      <a href="purchases">Purchases</a>
      <a href="products">Products</a>
      <a href="ballots">Ballots</a>
      <a href="boxs">Boxs</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<h1> Box Feel Your Voice</h1>

  <div class="fotorama" align="right";
      data-width="45%"
      data-height="50%"
      data-nav="thumbs">
       >
     <img src="https://scontent.faqp2-2.fna.fbcdn.net/v/t1.0-9/18056703_803548333143500_5756806423038912195_n.jpg?_nc_cat=109&_nc_oc=AQkIXhNuRg5QLeeonv6hm8Jcy7NXbhyoH5Zm4yrwYlWs3RC65qUwNpW6Y0bEopEe9OU&_nc_ht=scontent.faqp2-2.fna&oh=d11a4a6696a38fc96d1c2629fe5078a7&oe=5DB99FC8">
    <img src="https://scontent.faqp2-1.fna.fbcdn.net/v/t1.0-9/16708612_767425096755824_5639798534228850308_n.jpg?_nc_cat=111&_nc_oc=AQmbEIhV20xvnIf_sF8yf5iL1ptGZXavCdIkR6yQuPtnUzYYYWTo5D1gZJ1MqvFg2zA&_nc_ht=scontent.faqp2-1.fna&oh=49233ed17033b5880d88abeb6b9c8e80&oe=5D7BC4BC">
    <img src="https://scontent.faqp2-2.fna.fbcdn.net/v/t1.0-9/61047198_1291870214311307_6693920815324332032_n.jpg?_nc_cat=104&_nc_oc=AQlSr1rkeaXq42_CbPNBpHkSua807Iof5x46xO65AGzFMtA5FJ5WxrNTH3T6OTF3AGs&_nc_ht=scontent.faqp2-2.fna&oh=df1a177265c70958db5bdf8dc3e4b431&oe=5DAF6574">
  </div>
  

  

  <div class="social">
    <ul>
      <li><a href="https://www.facebook.com/KaraokeFeelYourVoice/" target="_blank"><img alt="Síguenos en Facebook" height="35" width="35" src="https://2.bp.blogspot.com/-28mh2hZK3HE/XCrIxxSCW0I/AAAAAAAAH_M/XniFGT5c2lsaVNgf7UTbPufVmIkBPnWQQCLcBGAs/s1600/facebook.png" title="Síguenos en Facebook"/></a>
      <li><a href="https://www.youtube.com/?hl=es-419&gl=PE" target="_blank"><img alt="Ir a Youtube" height="35" width="35" src="https://1.bp.blogspot.com/-CUKx1kAd-ls/XCrI4UAvNqI/AAAAAAAAIBI/-i1neUt8kZwP6YOsFOXX5p0Bnqa29m-JgCLcBGAs/s1600/youtube2.png" title="Ir a Youtube"/></a>
      <li><a href="https://www.netflix.com/browse" target="_blank"><img alt="Ir a Netflix" height="35" width="35" src="https://images-na.ssl-images-amazon.com/images/I/41Ix1vMUK7L.png" title="Ir a Netflix"/></a>
      
    </ul>
  </div>

</body>
</html>
