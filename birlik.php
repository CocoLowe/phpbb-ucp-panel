<?php
require_once("../forum/logged.php");
ob_start();
$baglanti = @mysqli_connect('77.83.200.146', 'sandreas', 'qbAZ3RfFmpHKVB5e'); 
$veritabani = @mysqli_select_db($baglanti, 'game_database'); 
// Start session management
$user->session_begin();
$auth->acl($user->data);
?>
<html lang="en">
<head>
<base href="http://sandreas-roleplay.com/ucp/">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>San Andreas Roleplay - Birlik</title>
  <link href="https://pro.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900+Ubuntu:400,700" rel="stylesheet">
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
               <a class="nav-link" href="https://sandreas-roleplay.com/ucp">
                <i class="fas fa-user-plus"></i>
                <span>Kayıt Ol</span>
               </a>
              </li>'; 
            }
			else {
		?>
      <li class="nav-item">
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
	  <li class="nav-item active">
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
		<?php 
		include('includes/nav.php'); 
		$lsrpkbul = mysqli_query($baglanti, "SELECT * FROM characters WHERE forumID = '".$user->data['user_id']."' ORDER BY id ASC"); 
		$kara = mysqli_fetch_assoc($lsrpkbul);	
        $k_olusum = $kara['faction_id'];

        $k_fara = mysqli_query($baglanti, "SELECT * FROM factions WHERE factionID = '$k_olusum'");
		$k_fara2 = mysqli_fetch_assoc($k_fara);
		if($k_olusum1 > 0) {
			$k_olusum1 = $k_fara2['name'];
		}	
		$birlik = $k_olusum;
        $sonuc = mysqli_query($baglanti, "select * from factions inner join characters on factions.factionID=characters.faction_id  WHERE banned = '0' and factionID like '%".$birlik."%' and faction_id = '".$birlik."' order by faction_rank_id desc") or die("Error: " . mysqli_error($baglan));
        $sonuc2 = mysqli_query($baglanti, "select * from factions  WHERE factionID like '%".$birlik."%'");
        $birliksay = mysqli_query($baglanti, "select COUNT(*) from factions inner join characters on factions.factionID=characters.faction_id  WHERE banned = '0' and factionID like '%".$birlik."%' and faction_id = '".$birlik."' ");
		$birlikuyesayisi = mysqli_fetch_array($birliksay);
		
		$birlikvericek = mysqli_fetch_assoc($sonuc2);
        if ($sonuc) {
        $birlikad = $birlikvericek ['name'];
        $k_birlikturu = $birlikvericek ['type'];
        $k_birlikID = $birlikvericek ['id'];
        }
		?>
		<div style="background: #fff; height: 77px; border-bottom: 1px solid #D8D8D8; padding-left: 20px;" class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 style="float: left; font-size: 1.5em; font-weight: 500;" class="h3 mb-0 text-gray-800"><?php echo $k_fara2["name"];?><br><div style="font-weight:bold;font-size:12px;"><i class="fa fa-users"></i>  <?php echo $birlikuyesayisi[0]; ?> üye</h1>
            <ol class="breadcrumb">
			<button style="padding: 5px; font-size: 12px;" type="button" class="btn btn-success mb-1">
			<i class="fa fa-comment"></i> Birlik tanıtımını görüntüle</button>
            </ol>
		</div>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
		<div style="height: 55px; border-bottom: 1px solid #D8D8D8; padding-left:10px;" class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 style="float: left;font-weight:500;" class="h3 mb-0 text-gray-800">Birlik Üyeleri</h1>
		</div>
		      <div class="card mb-4">
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Forum Adı</th>
                        <th>Karakter Adı</th>
                        <th>Rütbe Seviyesi</th>
                        <th>Seviye</th>
                      </tr>
                    </thead>
                    <tbody>
		<?php 
		while($satir = mysqli_fetch_array($sonuc))
        {
		if ($sonuc)
        {
		$k_forumadi = $satir['forumName'];
		$k_level = $satir['level'];
		$k_faction = $satir['Birlik'];
		$k_cinsiyet = $satir['Cinsiyet'];
		$k_isim = $satir['char_name'];
		$faction_rank_id = $satir['faction_rank_id'];
	    }
		?>
                      <tr>
                        <td><a href="#"><?php echo $k_forumadi; ?></a></td>
                        <td><a href="#"><?php echo $k_isim; ?></a></td>
                        <td><?php echo $faction_rank_id; ?></td>
                        <td><?php echo $k_level; ?></td>
                      </tr>
		<?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
			  <?php
			  if($kara['faction_id'] == -1 || $kara['faction_id'] == 0) { header("Location: https://sandreas-roleplay.com/ucp"); };
			if ($lsrpkbul < -1){
			?>
		  		<div class="lsrp-alert" role="alert">
                Henüz bir karakteriniz yok gibi görünüyor! Karakter, Los Santos evreninde kendi hikayesi, hafızası ve mülkiyeti ile hizipsel bir kişidir. Bir başvuru göndererek ve karakterinizin nasıl ortaya çıktığı ve Los Santos'taki rolleri hakkında kısa bir arka plan hikayesi yazarak bir tane oluşturabilirsiniz.
                </div>
				<a href="basvuru" style="padding: 8px; font-size: 12px; border-radius: 3px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.2);" class="btn btn-success mb-1">
			    <i class="fas fa-plus-circle"></i> İLK KARAKTERİNİ OLUŞTUR</a>
			<?php 
		  }		 ?>
        <br>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
          <div class="copyright text-center my-auto">
            <span>&copy; San Andreas Roleplay 2019
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

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
</body>

</html>