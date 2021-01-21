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
  <title>San Andreas Roleplay - UCP</title>
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
</head>

<body id="page-top">
  <div style="background: linear-gradient(to bottom,rgba(50,100,160,.1),rgba(50,100,160,.1)),url(https://beta.ls-rp.com/assets/images/gunbg.png); height: 250px;" id="header"></div>
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
               <a class="nav-link" href="sandreas-roleplay.com/ucp">
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
          <span>Yönetici Kayıtları</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-globe"></i>
          <span>Aktif Oyuncular</span>
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
        <a class="nav-link" href="#">
          <i class="fas fa-ticket-alt"></i>
          <span>Ticket</span>
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
          <span>Yönetici Alanı</span></a>
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
        <a class="nav-link" href="oyuncu-cezalandir">
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
		<?php include('includes/nav.php'); ?>
		<div style="background: #fff; height: 77px; border-bottom: 1px solid #D8D8D8; padding-left: 20px;" class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 style="float: left; font-size: 1.5em; font-weight: 500;" class="h3 mb-0 text-gray-800">Karakterlerim</h1>
            <ol class="breadcrumb">
			<a href="basvuru" style="padding: 8px; font-size: 12px; border-radius: 3px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.2);" class="btn btn-success mb-1">
			<i class="fas fa-plus-circle" style="padding-right: : 5px;"></i> Yeni Karakter Oluştur</a>
            </ol>
		</div>
        <!-- Topbar -->

        <!-- Container Fluid-->
		<div class="container-fluid" id="container-wrapper">
		 <div class="row mb-3">
		  <div class="card-body">
		  <?php
		  if ($user->data['username'] == 'Ziyaretçi')
          {
          echo '
		  		<div class="lsrp-alert" role="alert">
                Paneldeki özellikleri kullanabilmek için giriş yapmış olman gerekiyor. Giriş yapmak için foruma yönlendiriliyorsun.
                </div>';  
		  header("Refresh: 500; url=https://sandreas-roleplay.com/forum");
          }
		  else {
		  $lsrpkbul = mysqli_query($baglanti, "SELECT * FROM characters WHERE forumID = '".$user->data['user_id']."' ORDER BY id ASC"); 
		  while($bul = mysqli_fetch_array($lsrpkbul)){
			if ($bul["banned"] == 0) {
				$durum_icon = "fas fa-battery-empty";
				$durum_yazi = "Aktif";
				$durum_renk = "green";
			} 
			else  {
				$durum_icon = "fas fa-battery-slash";
				$durum_yazi = "Yasaklı";
				$durum_renk = "red";
			}
		    $bul["char_name"] = str_replace($duzelt1,$duzelt2,$bul["char_name"]);	
          ?>
              <div style="padding: 15px;width: 413px; height: 198px; overflow: hidden; float: left; margin-left: 10px; margin-top: 10px;" class="card mb-4">
			    <div style=" border-bottom: 1px solid #D9D9D9;padding: 0rem .25rem 0.5rem 0rem;" class="card-header d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-grey"><lsrp style="color:#7D7D7D;list-style-type:none;"><?=$bul["account_id"]?></lsrp> <a style="color: #000; " href="karakter/<?=$bul["char_name"]?>"><?=$bul["char_name"]?></a></h6><h6 class="m-0 font-weight-bold text-danger"><i style="color:<?=$durum_renk?>;" title="<?=$durum_yazi?>" class="<?=$durum_icon?>"></i></h6>
                </div>
				 <div style=" position: absolute; width: 200px;margin-left: -55px;margin-top:15px;">
					<img src="img/skin/<?=$bul["skin"]?>.png" style="width: 98%;">
				 </div>
				 <div style="font-size:13px;margin-top:20px;margin-left:120px;z-index:10;" class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <tbody>
                        <tr>Hesap ID:</tr>             <strong><?=$bul["id"]?></strong><br>   
						<tr>Karakter Adı:</tr>         <strong><?=$bul["char_name"]?></strong><br>
						<tr>Telefon Numarası:</tr>     <strong><?=$bul["telephone"]?></strong><br>
                    </tbody>
                  </table>
                 </div>
              </div>
			 <?php }
			if (mysqli_num_rows($lsrpkbul) == 0){
			?>
		  		<div class="lsrp-alert" role="alert">
                San Andreas Roleplay sunucusunda oynamanız için karakter sahibi olmanız gerekiyor. Karakter Başvurunuzu göndermeyi unutmayın, sizleri bekliyoruz.
                </div>
				<a href="basvuru" style="padding: 8px; font-size: 12px; border-radius: 3px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.2);" class="btn btn-success mb-1">
			    <i class="fas fa-plus-circle"></i> İlk karakterini oluştur!</a>
			<?php 
		  }	}		 ?>
          </div>
        </div>
       </div>
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
          <div class="copyright text-center my-auto">
            <span>&copy; Sandreas Roleplay 2020
            </span>
          </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>
</body>
<?php ob_end_flush(); ?>