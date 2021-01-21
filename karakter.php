<?php
require_once("../forum/logged.php");
ob_start();
$baglanti = @mysqli_connect('77.83.200.146', 'sandreas', 'qbAZ3RfFmpHKVB5e'); 
$veritabani = @mysqli_select_db($baglanti, 'game_database'); 
// Start session management
$user->session_begin();
$auth->acl($user->data);
?>
<head>
<base href="https://sandreas-roleplay.com/ucp/">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>San Andreas Roleplay - Karakter</title>
</head>

<body id="page-top">
  <div style="background: linear-gradient(to bottom,rgba(50,100,160,.1),rgba(50,100,160,.1)),url(https://beta.ls-rp.com/assets/images/gunbg.png); height: 250px; margin-right: auto; margin-left: auto;" id="header"></div>
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
	    <div id="test123123">
          <img style=" padding:1px;" src="img/logo/logo2.png">
		</div>
        </div>
      </a>
	  <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed"></li>
      <li style="pointer-events: none;" class="nav-item">
        <a class="nav-link text-muted">
          <span>San Andreas Roleplay</span></a>
      </li>
	    <?php
	  		if ($user->data['username'] == 'Ziyaretçi')
             {
             echo '
              <li class="nav-item">
               <a class="nav-link" href="https://sandreas-roleplay.com/forum/">
                <i class="fas fa-user-plus"></i>
                <span>Kayıt Ol</span>
               </a>
              </li>'; 
            }
			else {
		?>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-theater-masks"></i>
          <span>Karakterler</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-gavel"></i>
          <span>Yetkili Kayıtları</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-globe"></i>
          <span>Aktif Üyeler</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="harita">
          <i class="fas fa-map"></i>
          <span>Harita</span>
        </a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="birlik">
          <i class="fas fa-users"></i>
          <span>Birlik</span>
        </a>
      </li>	
        <li class="nav-item">
        <a class="nav-link" href="ayarlar.php">
          <i class="fas fa-user-cog"></i>
          <span>Ayarlar</span>
        </a>
        </li>
		<br>
	  	<?php
		if($user->data['group_id'] == 5 || $user->data['group_id'] == 8 || $user->data['group_id'] == 9 || $user->data['group_id'] == 10 || $user->data['group_id'] == 11 || $user->data['group_id'] == 12 || $user->data['group_id'] == 17 || $user->data['group_id'] == 13){
		?>
		<li style="pointer-events: none;" class="nav-item">
        <a class="nav-link text-muted text-disabled">
          <span>Yönetici</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="basvurular">
          <i class="fas fa-user-plus"></i>
          <span>Karakter Başvuruları</span>
        </a>
        </li>
		<li class="nav-item">
        <a class="nav-link" href="basvurular">
          <i class="fas fa-user-plus"></i>
          <span>Ekip Başvuruları</span>
        </a>
        </li>
		<li class="nav-item">
        <a class="nav-link" href="duyurular">
          <i class="fas fa-ticket-alt"></i>
          <span>Biletler</span>
        </a>
        </li>
		<li class="nav-item">
        <a class="nav-link" href="duyurular">
          <i class="fas fa-newspaper"></i>
          <span>Duyurular</span>
        </a>
        </li>
		<li class="nav-item">
        <a class="nav-link" href="duyurular">
          <i class="fas fa-users-cog"></i>
          <span>Oyuncu Sorgula</span>
        </a>
        </li>
		<li class="nav-item">
        <a class="nav-link" href="duyurular">
          <i class="fas fa-user-times"></i>
          <span>Oyuncu Cezalandır</span>
        </a>
        </li>
		<?php
		}
			} 
        ?>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
		<?php 
		include('includes/nav.php'); 
		$char_name = $_GET['char_name'];
		$t_bul = $_GET['number'];
		$forumid = $user->data['user_id'];
	    $k_bul = mysqli_query($baglanti, "SELECT * FROM characters WHERE char_name='$char_name'");
		$ara = mysqli_fetch_array($k_bul);
		$char_dbid = $ara['id'];
		$forum_id = $ara['forumID'];	
		$dovus = $ara['fight_style'];
		$premium_bul = mysqli_query($baglanti, "SELECT * FROM accounts WHERE premium = '$donator'");
		$donator = $ara['premium'];
		$t_bul = mysqli_query($baglanti, "SELECT * FROM phones WHERE number='$number'"); 
		$number = $ara['number'];
		$faction = $ara['faction_id'];
		$k_fara = mysqli_query($baglanti, "SELECT * FROM factions WHERE factionID = '$faction'");
		$k_fara2 = mysqli_fetch_assoc($k_fara);
		if($faction > 1) {
			$k_olusum = $k_fara2['name'];
		}
		else {
			$k_olusum = "Sivil";
		}
		switch($dovus) {
        case 0: $kdovus = "Default"; break;
        case 4: $kdovus = "Normal"; break;
        case 5: $kdovus = "Boxing"; break;
        case 6: $kdovus = "Kungfu"; break;
        case 7: $kdovus = "Kneehead"; break;
        case 15: $kdovus = "Grabkick"; break;
        case 16: $kdovus = "Elbow"; break;
		}
		switch($donator) {
		case 0: $donator = "Oyuncu"; break;
		case 1: $donator = "Bronz Donator"; break;	
		case 2: $donator = "Silver Donator"; break;
		case 3: $donator = "Gold Donator"; break;
		case 4: $donator = "Platinum Donator"; break;
		case 5: $donator = "Diamond Donator"; break;		
		}  
		if($_GET["char_name"] != $char_name) { header("Location: https://sandreas-roleplay.com/ucp"); };
		if($user->data['user_id'] != $forum_id) { header("Location: https://sandreas-roleplay.com/ucp"); };
			?>
		<div style="background: #fff; height: 77px; border-bottom: 1px solid #D8D8D8; padding-left: 20px;" class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 style=" float: left; " class="h3 mb-0 text-gray-800"><strong><?php echo $ara["char_name"];?></strong></h1>
            <ol class="breadcrumb">
			<button style=" background:#2C5894;padding: 5px; font-size: 12px;" type="button" class="btn btn-success mb-1">
			<i class="fas fa-snowflake"></i> DONDUR(P)</button>
            </ol>
		</div>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
		<br>
          <div style="margin-left: 0rem;" class="row mb-3">
		   <?php
		   if ($user->data['username'] == 'Ziyaretçi')
           {
           echo '
		   <div class="col-lg-6">
		     <div class="alert alert-danger alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
               <h6><i class="fas fa-ban"></i><b> Giriş yapmamış gözüküyorsun, giriş yapabilmen için foruma yönlendiriliyorsun..</b></h6>
            </div>
		   </div>';  
		   header("Refresh: 5; url=https://sandreas-roleplay.com/forum");
           }
          ?>
            <div class="col-lg-6">
              <!-- Simple Tables -->
              <div style="border-top: 5px solid #2C5996;padding: 10px;width:260px;" class="card">
			    <div style=" border-bottom: 1px solid #D9D9D9;padding: 0rem .25rem 0.5rem 0rem;" class="card-header d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-semi-bold text-primary"><i style="color:#2C5996;" class="fas fa-child"></i> Skin Değiştir(Pasif)</h6>
                </div>
				<center><img src="img/skin.png" style="width: 170px;height:330px;"></center>
				<div class="card-footer"></div>
              </div>
            </div>
			<div style="width: 72%;" class="col-lg-6">
			  <div style="border-top: 5px solid #2C5996;padding: 10px;margin-bottom:10px;" class="card">
			    <div style=" border-bottom: 1px solid #D9D9D9;padding: 0rem .25rem 0.5rem 0rem;" class="card-header d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-semi-bold text-primary"><i style="color:#2C5996;" class="fas fa-user-ninja"></i> Out Of Character</h6>
				</div>
                <div style="font-size: 12px;" class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead style="padding:0rem 0rem 0rem 0rem;" class="thead-light">
                    </thead>
                    <tbody>
                      <tr>
                        <td><strong>Hesap ID</strong></td>
                        <td><?php echo $ara["account_id"];?></td>
                      </tr>
                      <tr>
                        <td><strong>Donator Seviyesi</strong></td>
                        <td><?php echo $donator;?></td>
                      </tr>
                      <tr>
                        <td><strong>Oynama Zamanı</strong></td>
                        <td><?php echo $ara["playing_hours"];?> Saat</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
			  <div style="border-top: 5px solid #2C5996;padding: 10px;"" class="card">
			    <div style=" border-bottom: 1px solid #D9D9D9;padding: 0rem .25rem 0.5rem 0rem;" class="card-header d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-semi-bold text-primary"><i style="color:#2C5996;" class="fas fa-gamepad"></i> In Character</h6>
				</div>
                <div style="font-size: 14px; " class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    </thead>
                    <tbody>
                      <tr>
                        <td><strong>Karakter Adı</strong></td>
                        <td><?php echo $ara["char_name"];?></td>
                      </tr>
                      <tr>
                        <td><strong>Oluşum Adı</strong></td>
                        <td><a href="/ucp/birlik/<?php echo $ara["factions"];?>"><?php echo $k_olusum ?></a></td>
                      </tr>
					  <tr>
                        <td><strong>Telefon Numarası</strong></td>
                        <td><?php echo $ara["number"];?></td>
                      </tr>
					  <tr>
                        <td><strong>Para</strong></td>
                        <td><i style="color:#047503;" class="fas fa-dollar-sign"></i> <?php echo number_format($ara["cash"]);?></td>
                      </tr>
					  <tr>
                        <td><strong>Banka Hesabı</strong></td>
                        <td><i style="color:#047503;" class="fas fa-dollar-sign"></i> <?php echo number_format($ara["cash_bank"]);?></td>
                      </tr>
					  <tr>
                        <td><strong>Mevduat Hesabı</strong></td>
                        <td><i class="fas fa-dollar-sign"></i> <?php echo number_format($ara["savings"]);?></td>
                      </tr>
					  <tr>
                        <td><strong>Maaş Hesabı</strong></td>
                        <td><i style="color:#047503;" class="fas fa-dollar-sign"></i> <?php echo number_format($ara["paycheck"]);?></td>
                      </tr>
                      <tr>
                        <td><strong>Dövüş Stili</strong></td>
                        <td><?php echo $kdovus;?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
			  </div>
          </div>
		  <div style="height: 55px; border-bottom: 1px solid #D8D8D8; padding-left:10px;" class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 style="float: left;font-weight:500;" class="h3 mb-0 text-gray-800">Karaktere ait araçlar</h1>
		  </div>
		  <div class="row mb-3">
		  		<?php			
			$aracbul = mysqli_query($baglanti, "SELECT * FROM vehicles WHERE owner_id='$char_dbid'"); 
		    while($cek = mysqli_fetch_array($aracbul)){
			$aracmodel = $cek['model'];
			$VehicleName = Array(
            400 => 'landstalker', 401 => 'bravura', 402 => 'buffalo', 403 => 'linerunner', 404 => 'perenail', 405 => 'sentinel', 406 => 'dumper', 407 => 'firetruck', 408 => 'trashmaster', 409 => 'stretch', 410 => 'manana', 411 => 'infernus', 412 => 'voodoo', 413 => 'pony', 414 => 'mule', 415 => 'cheetah', 416 => 'ambulance', 417 => 'levetian', 418 => 'moonbeam', 419 => 'esperanto', 420 => 'taxi', 421 => 'washington', 422 => 'bobcat', 423 => 'mr whoopee', 424 => 'bf injection', 425 => 'hunter', 426 => 'premier', 427 => 'enforcer', 428 => 'securicar', 429 => 'banshee', 430 => 'predator', 431 => 'bus', 432 => 'rhino', 433 => 'barracks', 434 => 'hotknife', 435 => 'artic trailer 1', 436 => 'previon', 437 => 'coach', 438 => 'cabbie', 439 => 'stallion', 440 => 'rumpo', 441 => 'rc bandit',
            442 => 'romero', 443 => 'packer', 444 => 'monster', 445 => 'admiral', 446 => 'squalo', 447 => 'seasparrow', 448 => 'pizza boy', 449 => 'tram', 450 => 'artic trailer 2', 451 => 'turismo', 452 => 'speeder', 453 => 'reefer', 454 => 'tropic', 455 => 'flatbed', 456 => 'yankee', 457 => 'caddy', 458 => 'solair', 459 => 'top fun', 460 => 'skimmer', 461 => 'pcj 600', 462 => 'faggio', 463 => 'freeway', 464 => 'rc baron', 465 => 'rc raider', 466 => 'glendale', 467 => 'oceanic', 468 => 'sanchez', 469 => 'sparrow', 470 => 'patriot', 471 => 'quad', 472 => 'coastgaurd', 473 => 'dinghy', 474 => 'hermes', 475 => 'sabre', 476 => 'rustler', 477 => 'zr 350', 478 => 'walton', 479 => 'regina', 480 => 'comet', 481 => 'bmx', 482 => 'burriro', 483 => 'camper', 484 => 'marquis', 485 => 'baggage', 
            486 => 'dozer', 487 => 'maverick', 488 => 'vcn maverick', 489 => 'rancher', 490 => 'fbi rancher', 491 => 'virgo', 492 => 'greenwood', 493 => 'jetmax', 494 => 'hotring', 495 => 'sandking', 496 => 'blistac', 497 => 'police maverick', 498 => 'boxville', 499 => 'benson', 500 => 'mesa', 501 => 'rc goblin', 502 => 'hotring a', 503 => 'hotring b', 504 => 'blood ring banger', 505 => 'rancher (lure)', 506 => 'super gt', 507 => 'elegant', 508 => 'journey', 509 => 'bike', 510 => 'mountain bike', 511 => 'beagle', 512 => 'cropduster', 513 => 'stuntplane', 514 => 'petrol', 515 => 'roadtrain', 516 => 'nebula', 517 => 'majestic', 518 => 'buccaneer', 519 => 'shamal', 520 => 'hydra', 521 => 'fcr 900', 522 => 'nrg 500', 523 => 'hpv 1000', 524 => 'cement', 525 => 'towtruck', 526 => 'fortune',
            527 => 'cadrona', 528 => 'fbi truck', 529 => 'williard', 530 => 'fork lift', 531 => 'tractor', 532 => 'combine', 533 => 'feltzer', 534 => 'remington', 535 => 'slamvan', 536 => 'blade', 537 => 'freight', 538 => 'streak', 539 => 'vortex', 540 => 'vincent', 541 => 'bullet', 542 => 'clover', 543 => 'sadler', 544 => 'firetruck la', 545 => 'hustler', 546 => 'intruder', 547 => 'primo', 548 => 'cargobob', 549 => 'tampa', 550 => 'sunrise', 551 => 'merit', 552 => 'utility van', 553 => 'nevada', 554 => 'yosemite', 555 => 'windsor', 556 => 'monster a', 557 => 'monster b', 558 => 'uranus', 559 => 'jester', 560 => 'sultan', 561 => 'stratum', 562 => 'elegy', 563 => 'raindance', 564 => 'rc tiger', 565 => 'flash', 566 => 'tahoma', 567 => 'savanna', 568 => 'bandito', 569 => 'freight flat',
            570 => 'streak', 571 => 'kart', 572 => 'mower', 573 => 'duneride', 574 => 'sweeper', 575 => 'broadway', 576 => 'tornado', 577 => 'at 400', 578 => 'dft 30', 579 => 'huntley', 580 => 'stafford', 581 => 'bf 400', 582 => 'news van', 583 => 'tug', 584 => 'petrol tanker', 585 => 'emperor', 586 => 'wayfarer', 587 => 'euros', 588 => 'hotdog', 589 => 'club', 590 => 'freight box', 591 => 'artic trailer 3', 592 => 'andromada', 593 => 'dodo', 594 => 'rc cam', 595 => 'launch', 596 => 'cop car ls', 597 => 'cop car sf', 598 => 'cop car lv', 599 => 'ranger', 600 => 'picador', 601 => 'swat tank', 602 => 'alpha', 603 => 'phoenix', 604 => 'glendale (damage)', 605 => 'sadler (damage)', 606 => 'bag box a', 607 => 'bag box b', 608 => 'stairs', 609 => 'boxville (black)', 610 => 'farm trailer', 611 => 'utility van trailer'
            );
			?>
			
		    <div class="col-lg-6">
			<br>
              <a style="text-decoration: none;" href="/arac/<?=$cek["id"]?>"/><div style="color:#2C5996;background:#C3E0F3;padding: 10px;width: 413px; height: 198px; overflow: hidden;" class="card mb-4">
			    <div style="background:#C3E0F3;border-bottom: 1px solid #D9D9D9;padding: 0rem .25rem 0.5rem 0rem;" class="card-header d-flex flex-row align-items-center justify-content-between">
				  <h6 class="m-0 font-weight-normal text-grey"><strong><?php echo ucfirst($VehicleName[$aracmodel]) ?></strong> <?php echo $cek["plate"];?></h6>
				  <h6 class="m-0 font-weight-normal">0 mil <i class="fas fa-tachometer-fast"></i></h6>
				</div>
				<img style="position: absolute;margin-top:-70px;width: 400px;height:280px;" src="img/vehicles/<?php echo $cek["model"];?>.png">
				<div style="float:right;padding-right:5px;" class="">
				  <h6 style="float:right" class="m-0 font-weight-normal"><?php echo $cek["engine_health"];?>% <i class="fas fa-heartbeat"></i></h6>
				  <br><h6 style="float:right" class="m-0 font-weight-normal"><?php echo $cek["battery_health"];?>% <i class="fas fa-battery-half" style="margin-left: -5px;"></i></h6>
				</div>
              </div>
            </div><?php } 
			if (mysqli_num_rows($aracbul) == 0){
			echo '
		      <div class="card-body">
				<div class="infobar warning">
			    <div class="icon">
				<i class="fas fa-exclamation-triangle"></i></div>
			    <div class="message">Karaktere ait araç bulunmuyor.</div></div>
			  </div>';
			}?>
          </div>
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
          <div class="copyright text-center my-auto">
            <span>&copy; San Andreas Roleplay 2020
            </span>
          </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <link href="https://pro.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700+Ubuntu:400,700" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
					<style>
					.table td, .table th {
                     padding: .55rem 0rem .35rem 0rem;
                     vertical-align: top;
                     font-weight: 500;
	                 font-size: 14px;
					 border:0;
                    }
                    .card .table td, .card .table th {
                     padding-right: 1.5rem;
                     padding-left: 0rem;
                    }
                    </style>  
</body>
<?php ob_end_flush(); ?>