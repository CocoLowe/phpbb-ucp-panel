<?php
require_once("../forum/logged.php");
ob_start();
// Start session management
$user->session_begin();
$auth->acl($user->data);
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Los Santos Roleplay - Karakter Başvurusu</title>
  <link href="https://pro.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700+Ubuntu:400,700" rel="stylesheet">
</head>

<body id="page-top">
  <div style="background-image: url(img/background.png); height: 249px;" id="header"></div>
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="img/logo/logo2.png">
        </div>
      </a>
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <span>Los Santos Roleplay</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="forms.html">
          <i class="fas fa-theater-masks"></i>
          <span>Karakterler</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="forms.html">
          <i class="fas fa-gavel"></i>
          <span>Yetkili Kayıtları</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="forms.html">
          <i class="fas fa-globe"></i>
          <span>Aktif Üyeler</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ui-colors.html">
          <i class="fas fa-map"></i>
          <span>Harita</span>
        </a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="ui-colors.html">
          <i class="fas fa-users"></i>
          <span>Birlik</span>
        </a>
      </li>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fab fa-twitter"></i>
          </button>
		  <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fab fa-youtube"></i>
          </button>
		  <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fab fa-discord"></i>
          </button>
		  <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fab fa-teamspeak"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
		<?php	
		include("fbaglan.php");
		$grupid = $user->data['group_id'];
		$grupidbul = mysqli_query($baglanti2, "SELECT * FROM phpbb7a_groups WHERE group_id = '$grupid'"); 
		if($grupidbul >= 1)
		{
			$f_bul = mysqli_query($baglanti2, "SELECT * FROM phpbb7a_groups WHERE group_id = '$grupid'");
			$ara = mysqli_fetch_assoc($f_bul);
			$grup = $ara['group_name'];
			
		}
		else if($grupidbul < 1)
		{
			$grup = "bulunamadı";
		}
		?>
                <span class="ml-2 d-none d-lg-inline text-white small"><strong><?php echo $user->data['username']; ?></strong><br><?php echo $grup ?>&nbsp;</span>
				<img style="border-radius: 50%!important;" class="img-profile rounded-circle" src="<?php echo $user->data['user_avatar']; ?>" style="max-width: 60px">  
			  </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="login.html">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
		<div style="background: #fff; height: 77px; border-bottom: 1px solid #D8D8D8; padding-left: 20px;" class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 style=" float: left; " class="h3 mb-0 text-gray-800"><strong>Karakter Başvurusu</strong></h1>
		</div>
        <!-- Topbar -->
        <!-- Container Fluid-->
		<div class="container-fluid" id="container-wrapper">
		 <div class="row">
            <div class="card-body">
              <div class="card mb-4">
                <div class="card-body">
				<center><img style="width:400px;height:90px" src="https://www.upload.ee/image/11756260/sandreasllogo.png"></center>
				<br>
				<div class="alert alert-warning" role="alert">
                <hr>
				<center><a href="#">Oyun Kuralları</a> | <a href="#">Genel Kurallar</a> | <a href="#">Forum Kuralları</a></center>
                </div>
                 <div class="card-body">
				  <div class="form-row">
                   <div class="form-group col-md-6">
                    <label for="karakter-adi" class="col-form-label">Karakter Adı</label>
                    <input type="text" class="form-control" id="karakter-adi" placeholder="Karakter Adı">
                   </div>
                   <div class="form-group col-md-6">
                    <label for="kullanici" class="col-form-label">Kullanıcı Adı</label>
                    <input type="text" class="form-control" name="kullanici" id="kullanici" placeholder="<?php echo $user->data['username']; ?>" disabled>
                   </div>
				   <div class="form-group col-md-4">
                    <label for="yas" class="col-form-label">Karakter Yaşı</label>
                    <input type="number" class="form-control" name="yas" id="yas" placeholder="">
                   </div>	
				   <div class="form-group col-md-4">
                    <label for="uyruk" class="col-form-label">Karakter Uyruğu</label>
                    <select class="form-control mb-3">
                    <option value="Siyah">Türk</option>
                    </select>
                   </div>
				   <div class="form-group col-md-4">
                    <label for="ten" class="col-form-label">Karakter Ten Rengi</label>
                    <select class="form-control mb-3">
                    <option value="Siyah">Siyah</option>
					<option value="Beyaz">Beyaz</option>
                    </select>
                   </div>
				   <div class="form-group col-md-12">
                    <label for="hikaye">Karakter Hikayesi</label>
                    <textarea class="form-control" id="hikaye" rows="7"></textarea>
                   </div>
				   <div class="col-md-12  text-center">
					<button type="submit" class="btn btn-success mr-2 btn-sm">Başvuruyu gönder</button>
				   </div>
                  </div>        
                 </div>                                      
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
            <span>&copy; Los Santos Roleplay 2019
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
<?php ob_end_flush(); ?>