<?php
function g ($get) {
   return htmlspecialchars(mysql_real_escape_string($_GET[$get]));
}
function p ($post, $html = false) {
if ( is_array($_POST["$post"]) ){
$array = array();
foreach ($_POST[$post] as $posts){
$array[] = strip_tags(mysql_real_escape_string($posts));
}
return $array;
}else{
if ($html){
return mysql_real_escape_string(trim($_POST[$post]));
}else {
return str_replace("\n", "<br />", htmlspecialchars(trim($_POST[$post]),ENT_QUOTES));
}
}
}
include("fbaglan.php");
require_once("../forum/logged.php");
ob_start();
// Start session management
$user->session_begin();
$auth->acl($user->data);
if($user->data['group_id'] == 5 || $user->data['group_id'] == 8 || $user->data['group_id'] == 9 || $user->data['group_id'] == 10 || $user->data['group_id'] == 11 || $user->data['group_id'] == 12 || $user->data['group_id'] == 17 || $user->data['group_id'] == 13){
?>
<head>
<base href="https://sandreas-roleplay.com/ucp/">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>San Andreas Roleplay - Duyuru Yayınla</title>
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
		<li class="nav-item active">
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
            <h1 style=" float: left; " class="h3 mb-0 text-gray-800"><strong>Duyuru Yayınla</strong></h1>
		</div>
		<div class="container-fluid" id="container-wrapper">
		 <div class="row">
            <div class="card-body">
              <div class="card mb-4">
                <div class="card-body">
				<center><img style="width:400px;height:90px" src="https://media.discordapp.net/attachments/700639443429621883/715890989767589948/lsrplogo.png"></center>
				<br>
				<div class="card-body">
				<?php
					if ($_POST){
					$baslik = p("baslik");
					$yazar = $user->data['user_id'];
					$tarih = date('d.m.Y H:i:s');
					$resim = p("resim");
					$konu = p("konu");
					
					$newssave = mysqli_query($baglanti2, "INSERT INTO phpbb7a_news (baslik,yazar,tarih,resim,konu) VALUES ('$baslik','$yazar','$tarih','$resim','$konu')");
					if ($newssave){
					header("Refresh:1; http://localhost/ucp/duyurular");
					echo '					
					<div class="infobar success">
			        <div class="icon">
				    <i class="fas fa-check"></i></div>
			        <div class="message">Duyuruyu başarıyla yayınladın.</div></div><br><br>';
					}
					else{ echo '<div class="alert alert-danger"><strong>Hata!</strong><br> Duyuru veritabanına kaydedilirken bir sorun yaşandı tekrar deneyin.</div><br>'; echo mysql_error();}
					}
				?>
			     <form id="rootwizard-2" method="post" action="duyuru-yayinla.php" class="form-wizard validate">
				  <div class="form-row">
                   <div class="form-group col-md-12">
                    <label class="col-form-label">Duyuru başlığı</label>
                    <input type="text" class="form-control" name="baslik" placeholder="San Andreas Roleplay">
                   </div>
				   <div class="form-group col-md-6">
                    <label class="col-form-label">Duyuruyu yayınlayan</label>
                    <input type="text" class="form-control" name="yazar" placeholder="<?php echo $user->data['username']; ?>" disabled>
                   </div>
				   <div class="form-group col-md-6">
                    <label class="col-form-label">Duyuru tarihi</label>
                    <input type="text" class="form-control" name="tarih" placeholder="<?php echo date('d.m.Y H:i:s') ?>" disabled>
                   </div>
				   <div class="form-group col-md-12">
                    <label class="col-form-label">Duyuru resmi(link)</label>
                    <input type="text" class="form-control" name="resim" placeholder="https://media.discordapp.net/attachments/700639443429621883/715890989767589948/lsrplogo.png">
                   </div>
				   <div class="form-group col-md-12">
                    <label class="col-form-label">Duyuru konusu</label>
                    <textarea class="form-control" name="konu" rows="7"></textarea>
                   </div>
				   <div class="col-md-12  text-center">
					<button type="submit" class="btn btn-success mr-2 btn-sm">Duyuruyu yayınla</button>
				   </div>
                  </div>  
                 </form>				 
                </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Topbar -->
        <!-- Container Fluid-->
		<div class="container-fluid" id="container-wrapper">
		 <div class="row">
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
		  else {
		  ?>
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
</body>
<?php } } else { header("Refresh: 0; url=https://forum.ls-rp.web.tr"); } ob_end_flush(); ?>