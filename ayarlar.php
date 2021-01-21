<?php
require_once("forum/logged.php");
ob_start();
// Start session management
$user->session_begin();
$auth->acl($user->data);
error_reporting(0);
?>
<head>
<base href="https://sandreas-roleplay.com/ucp/">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>San Andreas Roleplay - Ayarlar</title>
  <link href="https://pro.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700+Ubuntu:400,700" rel="stylesheet">
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
        <li class="nav-item active">
        <a class="nav-link" href="ayarlar">
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
		<?php include('includes/nav.php'); ?>
		<div style="background: #fff; height: 77px; border-bottom: 1px solid #D8D8D8; padding-left: 20px;" class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 style=" float: left; " class="h3 mb-0 text-gray-800"><strong>Ayarlar</strong></h1>
		</div>
        <!-- Topbar -->
        <!-- Container Fluid-->
		<div class="container-fluid" id="container-wrapper">
		 <div class="row">
            <div class="card-body">
			<?php
				if ($user->data['username'] == 'Ziyaretçi')
                {
                echo '
		  		<div class="lsrp-alert" role="alert">
                Paneldeki özellikleri kullanabilmek için giriş yapmış olman gerekiyor. Giriş yapmak için foruma yönlendiriliyorsun.
                </div>';  
		        header("Refresh: 5; url=https://sandreas-roleplay.com/forum");
                }
		        else {
			?>
              <div class="card mb-4">
                <div class="card-body">
				<?php
		        $pass = mysqli_query($baglanti, "SELECT * FROM masters WHERE forum_id = '".$user->data['user_id']."'"); 
		        $veri = mysqli_fetch_array($pass);
		        if ($veri["acc_pass"] == 1) {	
	            if ($_POST)
	            {
		            $acc_pass  = $_POST['acc_pass'];
                    $acc_pass1 = $_POST['acc_pass1'];

                    if(isset($_POST["acc_pass"]) && $acc_pass != $acc_pass1) { echo '<div class="alert alert-danger"><strong>Hata!</strong><br> Girilen şifreler aynı olmak zorundadır.</div>'; }
		            else if(isset($_POST["acc_pass"]) && $password == $password1) {
			            $hsorgu = mysqli_query($baglanti, "SELECT * FROM masters WHERE forum_id = '".$user->data['user_id']."'");
			            $hesapbul1 = mysqli_num_rows($hsorgu);
			            if($hesapbul1 > 0 && $acc_pass == $acc_pass1) {
				            $sifre_sha1 = sha1($acc_pass);
				            $sorgugonder = "UPDATE masters SET acc_pass = '$sifre_sha1' WHERE forum_id = '".$user->data['user_id']."'";
				            $sorgu2 = mysqli_query($baglanti, $sorgugonder);
				            mysqli_close($baglanti);
			            }
		            }
	            }	
				if ($sorgugonder){
				echo '<div class="alert alert-success"><strong>Başarılı!</strong><br> Şifrenizi başarıyla belirlediniz, sunucuya giriş yapabilirsiniz.</div>';
				}				
		        ?>
				<div class="alert alert-warning" role="alert">
                Yeni kayıt olduğun için şifreni belirlemen gerekiyor, diğer sunucularda kullandığın şifreyi-leri kullanmamanı öneririm, herhangi bir çalınma durumunda yetkililer mesuliyeti üstlenmez.
                </div>
				  <form method="post" action="ayarlar.php">
                    <div class="form-group">
                      <label>Şifre</label>
                      <input type="text" class="form-control" name="acc_pass">
                    </div>
                    <div class="form-group">
                      <label>Şifre Tekrarı</label>
                      <input type="text" class="form-control" name="acc_pass1">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success btn-block">Şifreyi belirle</button>
                    </div>
                  </form>
				<?php
		        }
		        else  {
	            if ($_POST)
	            {
		            $acc_pass  = $_POST['acc_pass'];
                    $acc_pass1 = $_POST['acc_pass1'];

                    if(isset($_POST["acc_pass"]) && $acc_pass != $acc_pass1) { echo '<div class="alert alert-danger"><strong>Hata!</strong><br> Girilen şifreler aynı olmak zorundadır.</div>'; }
		            else if(isset($_POST["acc_pass"]) && $password == $password1) {
			            $hsorgu = mysqli_query($baglanti, "SELECT * FROM masters WHERE forum_id = '".$user->data['user_id']."'");
			            $hesapbul1 = mysqli_num_rows($hsorgu);
			            if($hesapbul1 > 0 && $acc_pass == $acc_pass1) {
				            $sifre_sha1 = sha1($acc_pass);
				            $sorgugonder = "UPDATE masters SET acc_pass = '$sifre_sha1' WHERE forum_id = '".$user->data['user_id']."'";
				            $sorgu2 = mysqli_query($baglanti, $sorgugonder);
				            mysqli_close($baglanti);
			            }
		            }
	            }	
				if ($sorgugonder){
				echo '<div class="alert alert-success"><strong>Başarılı!</strong><br> Şifrenizi başarıyla belirlediniz, sunucuya giriş yapabilirsiniz.</div>';
				}				
				?>
				  <form method="post" action="ayarlar.php">
                    <div class="form-group">
                      <label>Şifre Değiştir</label>
                      <input type="text" class="form-control" name="acc_pass">
                    </div>
                    <div class="form-group">
                      <label>Şifre Değiştir</label>
                      <input type="text" class="form-control" name="acc_pass1">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success btn-block">Şifreyi değiştir</button>
                    </div>
                  </form>
				<?php
			    }
                ?>
                </div>
              </div>
            </div>
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

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
</body>
<?php } ob_end_flush(); ?>