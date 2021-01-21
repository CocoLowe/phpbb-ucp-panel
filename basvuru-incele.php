<?php
require_once("../forum/logged.php");
ob_start();
$baglanti = @mysqli_connect('77.83.200.146', 'sandreas', 'qbAZ3RfFmpHKVB5e'); 
$veritabani = @mysqli_select_db($baglanti, 'game_database'); 
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
  <title>San Andreas - Karakter Başvuruları</title>
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
               <a class="nav-link" href="ucp.ls-rp.web.tr">
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
        <li class="nav-item active">
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
		<?php
	    $app_dbid = $_GET['app_dbid'];
	    $appquery = mysqli_query($baglanti, "SELECT * FROM applications WHERE app_dbid='".$app_dbid."'");
	    $app = mysqli_fetch_array($appquery);
		?>
		<div style="background: #fff; height: 77px; border-bottom: 1px solid #D8D8D8; padding-left: 20px;" class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 style=" float: left; " class="h3 mb-0 text-gray-800"><strong><?php echo $app['app_char_name'] ?></strong></h1>
		</div>
		<div class="container-fluid" id="container-wrapper">
		 <div class="row">
            <div class="card-body">
              <div class="card mb-4">
                <div class="card-body">
				<center><img style="width:400px;height:90px" src="https://media.discordapp.net/attachments/700639443429621883/715890989767589948/lsrplogo.png"></center>
				<br>
				<div class="card-body">
				<div class="infobar warning">
			    <div class="icon">
		        <i class="fas fa-exclamation-triangle"></i></div>
			   <div class="message">Şu anda <strong><?php echo $app['app_forum_name'] ?></strong> adlı forum hesabının karakter başvurusunu inceliyorsun.</div></div><br><br>
			     <form id="rootwizard-2" method="post" action="basvuru.php" class="form-wizard validate">
				  <div class="form-row">
                   <div class="form-group col-md-12">
                    <label class="col-form-label">Karakter Adı</label>
                    <input type="text" class="form-control" placeholder="<?php echo $app['app_char_name'] ?>" disabled>
                   </div>
				   <div class="form-group col-md-12">
                    <label>Karakter Hikayesi</label>
                    <textarea class="form-control" rows="7" placeholder="<?php echo $app['app_story'] ?>" disabled></textarea>
                   </div>
                   <div class="form-group col-md-12">
                    <label class="col-form-label">Reddetme Sebebi</label>
                    <input type="text" class="form-control" name="sebep">
                   </div>
				   <div class="col-md-12  text-center">
					<a href="https://sandreas-roleplay.com/ucp/kabulet.php?app_dbid=<?php echo $app['app_dbid'] ?>" class="btn btn-success mr-2 btn-sm">Kabul et</a>
					<a href="https://sandreas-roleplay.com/ucp/reddet.php?app_dbid=<?php echo $app['app_dbid'] ?>" class="btn btn-danger mr-2 btn-sm">Reddet</a>
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
		  		<div class="lsrp-alert" role="alert">
                Paneldeki özellikleri kullanabilmek için giriş yapmış olman gerekiyor. Giriş yapmak için foruma yönlendiriliyorsun.
                </div>';  
		  header("Refresh: 5; url=https://sandreas-roleplay.com/forum/");
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
<?php } } else { header("Refresh: 0; url=https://sandreas-roleplay.com/forum/"); } ob_end_flush(); ?>