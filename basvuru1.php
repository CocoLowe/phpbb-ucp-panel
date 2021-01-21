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
require_once("../forum/logged.php");
ob_start();
$baglanti = @mysqli_connect('77.83.200.146', 'sandreas', 'qbAZ3RfFmpHKVB5e'); 
$veritabani = @mysqli_select_db($baglanti, 'game_database'); 
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
  <title>San Andreas Roleplay - Karakter Başvurusu</title>
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
        <li class="nav-item">
        <a class="nav-link" href="ayarlar.php">
          <i class="fas fa-user-cog"></i>
          <span>Ayarlar</span>
        </a>
        </li>
		<br>
	  	<?php
		if($user->data['group_id'] == 5 || $user->data['group_id'] == 10){
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
            <h1 style=" float: left; font-size: 1.5em; font-weight: 500;" class="h3 mb-0 text-gray-800">Karakter Başvurusu</h1>
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
				<center><img style="width:400px;height:90px" src="qbAZ3RfFmpHKVB5e"></center>
				<br>
		<?php
        if (isset($_POST['bir']) & isset($_POST['bir'])) {
		    $_SESSION["test"] = "true";
            $soru1 = $_POST["bir"];
            $soru2 = $_POST['iki'];
		    $soru3 = $_POST['uc'];
            $soru4 = $_POST['dort'];
            $soru5 = $_POST['bes'];
            $soru6 = $_POST['alti'];
            $soru7 = $_POST['yedi'];
            $soru8 = $_POST['sekiz'];
			$soru9 = $_POST['dokuz'];
			$soru10 = $_POST['on'];
            $d = 0;
            $y = 0;
			
        if($soru1=="c") {
            $c1="DOĞRU" ;
            $d = $d+1;
        } 
		else {
            $c1 = "YANLIŞ";
            $y = $y+1;
        }
        if($soru2=="c") {
            $c2 = "DOĞRU";
            $d = $d+1;
        } 
		else {
            $c2 = "YANLIŞ";
            $y = $y+1;
        }
		if($soru3=="d") {
            $c2 = "DOĞRU";
            $d = $d+1;
        } 
		else {
            $c2 = "YANLIŞ";
            $y = $y+1;
        }
		if($soru4=="a") {
            $c2 = "DOĞRU";
            $d = $d+1;
        } 
		else {
            $c2 = "YANLIŞ";
            $y = $y+1;
        }
        if($soru5=="d") {
            $c2 = "DOĞRU";
            $d = $d+1;
        } 
		else {
            $c2 = "YANLIŞ";
            $y = $y+1;
        }
        if($soru6=="b") {
            $c2 = "DOĞRU";
            $d = $d+1;
        } 
		else {
            $c2 = "YANLIŞ";
            $y = $y+1;
        }
        if($soru7=="d") {
            $c2 = "DOĞRU";
            $d = $d+1;
        } 
		else {
            $c2 = "YANLIŞ";
            $y = $y+1;
        }
        if($soru8=="d") {
            $c2 = "DOĞRU";
            $d = $d+1;
        } 
		else {
            $c2 = "YANLIŞ";
            $y = $y+1;
        }
		if($soru9=="d") {
            $c2 = "DOĞRU";
            $d = $d+1;
        } 
		else {
            $c2 = "YANLIŞ";
            $y = $y+1;
        }
		if($soru10=="b") {
            $c2 = "DOĞRU";
            $d = $d+1;
        } 
		else {
            $c2 = "YANLIŞ";
            $y = $y+1;
        }
		if ($d==10){
		echo '
			 <div class="infobar success">
			  <div class="icon">
				<i class="fas fa-check"></i></div>
			 <div class="message">Soruları doğru cevapladın. Aşağıda bulunan soruların cevabını kurallarda aramana gerek yok, hiçbirinin belirlenen bir cevabı bulunmamaktadır. </div></div><br><br><br>'; 
			?>
			<div class="card-body">
			 <form id="rootwizard-2" method="post" action="basvuru.php" class="form-wizard validate">
				  <div class="form-row">
                   <div class="form-group col-md-12">
                    <label class="col-form-label">Karakter Adı</label>
                    <input type="text" class="form-control" name="app_char_name" placeholder="Karakter Adı" required>
                   </div>
				   <?php
				   $h_bul = mysqli_num_rows(mysqli_query($baglanti, "SELECT * FROM accounts WHERE forumID = '".$user->data['user_id']."'"));
		           if($h_bul < 1)
		           {
				   ?>
				   <div class="form-group col-md-6">
                    <label class="col-form-label">Karakter Şifresi</label>
                    <input type="password" class="form-control" name="app_password" placeholder="Karakter Şifresi" required>
                   </div>
				   <div class="form-group col-md-6">
                    <label class="col-form-label">Karakter Şifresi(Tekrar)</label>
                    <input type="password" class="form-control" name="app_password1" placeholder="Karakter Şifresi(Tekrar)" required>
                   </div>
				   <?php 
				   }
				   ?>
				   <div class="form-group col-md-12">
                    <label>Karakter Hikayesi</label>
                    <textarea class="form-control" name="app_story" rows="7" required></textarea>
                   </div>
				   <div class="col-md-12  text-center">
					<button type="submit" class="btn btn-success mr-2 btn-sm">Başvuruyu gönder</button>
				   </div>
                  </div>  
             </form>				 
            </div>  
		<?php
		}
		else{
		echo ' 
			<div class="infobar error">
			<div class="icon">
		    <i class="fas fa-ban"></i></div>
			<div class="message">Sorulan <b>10</b> sorudan yalnızca <b>'.$d.'</b> tanesine doğru cevap verebildin. Yönlendiriliyorsun..</div></div><br><br>';
			header("refresh:3;url=https://sandreas-roleplay.com/basvuru");
		}
        }
		if(!isset($_SESSION["test"])){
					date_default_timezone_set('Europe/Istanbul');
					if ($_POST){
					$app_char_name = str_replace( ' ', '_', p("app_char_name"));
					$app_forum_name = $user->data['username'];
					$app_forum_id = $user->data['user_id'];
					$app_password = hash("md5", $_POST['app_password']);
					$app_password1 = hash("md5", $_POST['app_password1']);
					$app_question1 = p("app_question1");
					$app_question2 = p("app_question2");
					$app_question3 = p("app_question3");
					$app_question4 = p("app_question4");
					$app_question5 = p("app_question5");
					$app_question6 = p("app_question6");
					$app_story = p("app_story");
					$app_register_date = date('d.m.Y H:i:s');
					$app_register_ip = $_SERVER['REMOTE_ADDR'];	
					
					$charcontrol = mysqli_query($baglanti, "SELECT char_name from characters where char_name='".$app_char_name."'");
					$appcontrol = mysqli_query($baglanti, "SELECT app_forum_id from applications where app_forum_id='".$app_forum_id."'");					
					if(mysqli_num_rows($charcontrol) || mysqli_num_rows($appcontrol)){
					echo '					
					<div class="infobar error">
			        <div class="icon">
				    <i class="fas fa-ban"></i></div>
			        <div class="message">Bu karakter adı mevcut veya hali hazırda bir başvurun bulunuyor.</div></div><br><br>';	
					}
					else if(isset($_POST["app_password"]) && $app_password != $app_password1) { echo '<div class="alert alert-danger"><strong>Hata!</strong><br> Girilen şifreler aynı olmak zorundadır.</div>'; }
					else{
					$accsave = mysqli_query($baglanti, "INSERT INTO accounts (forumID,password,username) VALUES ('$app_forum_id','$app_password','$app_forum_name')");
					$charsave = mysqli_query($baglanti, "INSERT INTO applications (app_char_name,app_password,app_forum_name,app_forum_id,app_question1,app_question2,app_question3,app_question4,app_question5,app_question6,app_story,app_register_date,app_register_ip) VALUES ('$app_char_name','$app_password','$app_forum_name','$app_forum_id','$app_question1','$app_question2','$app_question3','$app_question4','$app_question5','$app_question6','$app_story','$app_register_date','$app_register_ip')");
					if ($charsave){
					echo '
					<div class="infobar success">
			        <div class="icon">
				    <i class="fas fa-check"></i></div>
			        <div class="message">Karakter başvurunu başarıyla bize ulaştırdın sayfayı yenileyerek başvurun hakkında bilgilere sahip olabilir, düzenleyebilirsin.</div></div><br><br>';
					}
					else{ echo '					
					<div class="infobar error">
			        <div class="icon">
				    <i class="fas fa-ban"></i></div>
			        <div class="message">Bize gönderdiğin bir başvuru bulunuyor zaten.. Bulunan başvurun sonuçlanmadan buraya erişemezsin.</div></div><br><br>'; echo mysql_error();}
					}
					}
					?>
                <br>
				<form action="" method=POST>
                    <h6><strong>Bir şahsı elinizdeki silahla, bir sokak arasında tehdit ediyorsunuz. Kişi aniden /me belirtmeden size saldırdı, ne yaparsınız?</strong></h6>
                    <input type="radio" name="bir" value="a"> A) B kanalından rolü bölerim.<br>
                    <input type="radio" name="bir" value="b"> B) Rapor atarak kişiyi yöneticilere bildiririm.<br>
                    <input type="radio" name="bir" value="c"> C) Rol esnasında gerekli kanıtları toplar, rol sonrasında ise kişiyi şikayet ederim.<br>
                    <input type="radio" name="bir" value="d"> D) Kişiyi PM kanalından uyarırım.<br>
                    <br>
                    <h6><strong>Idlewood bölgesinde bir silahlı çatışmaya ister istemez dahil oldunuz. Size ateş açan kişiler sizi düşürdü ve CK sebebiyle karakteriniz yasaklandı. Bu durumda izleyeceğiniz ilk adım ne olurdu? </strong></h6>
                    <input type="radio" name="iki" value="a"> A) Yöneticilere farklı platformdan küfür etmek.<br>
                    <input type="radio" name="iki" value="b"> B) Bu durumu sorgulayarak arkasındaki sebebi aramak.<br>
                    <input type="radio" name="iki" value="c"> C) Yeni bir karakter açmak.<br>
                    <input type="radio" name="iki" value="d"> D) Ateş açan kişilerle OOC kavgaya girmek.<br>
                    <br>
                    <h6><strong>Oyuna yeni başladınız, karakterinizin hiç parası yok fakat para kazanmak istiyorsunuz. Nasıl bir yol izlersiniz?</strong></h6>
                    <input type="radio" name="uc" value="a"> A) Forumdan konu açıp, herkesden para isterim.<br>
                    <input type="radio" name="uc" value="b"> B) Oyuncular ile "/pm" kanalından iletişime geçer, para isteyip ricada bulunurum.<br>
                    <input type="radio" name="uc" value="c"> C) Çeşitli siteler üzerinden alım satım yaparak oyun parası elde ederim.<br>
                    <input type="radio" name="uc" value="d"> D) Karakterimin davranışlarına ve özelliklerine uygun olarak bir iş arayışında bulunurum, yada meslekler ile para kazanmaya çalışırım.<br>
                    <br>
                    <h6><strong>Aşağıdakilerden hangisi Powergaming çatısı altında değerlendirilebilcek bir ihlaldir?</strong></h6>
                    <input type="radio" name="dort" value="a"> A) 120 ile giden aracın açık penceresinden atlayıp koşarak kaçmaya başlamak.<br>
                    <input type="radio" name="dort" value="b"> B) Düşman birliğin 5 üyesinin seni tek başınayken kıstırmasına rağmen tehditler savurmak.<br>
                    <input type="radio" name="dort" value="c"> C) Daha önce hiç tanışmadığın birisinin ismini üzerindeki yazıdan okuyarak biliyor gibi rol yapmak.<br>
                    <input type="radio" name="dort" value="d"> D) Aracına arkadan çarpan kişiyi silah ile vurmak.<br>
                    <br>
                    <h6><strong>San Andreas Roleplay bünyesinde hesabınız yasaklandı, bu durumda ne yaparsınız?</strong></h6>
                    <input type="radio" name="bes" value="a"> A) Marvellous'a belirli bir ücret ödeyerek hesabımın banını kaldırtırım.<br>
                    <input type="radio" name="bes" value="b"> B) Banlanan hesabımı geride bırakıp yeni bir hesap açarım.<br>
                    <input type="radio" name="bes" value="c"> C) Yetkililere ağız dolusu küfür ederek içimi dökerim.<br>
                    <input type="radio" name="bes" value="d"> D) Hesabımın yasağı kalkana kadar yeni bir hesap açamam.<br>
                    <br>
                    <h6><strong>Aktif rol anında bir oyuncu OOC kanaldan rolü bölerek size hakaretler etmeye ve rolü kabul etmeyeceğini söylemeye başladı, bu esnada yapmanız gereken nedir?</strong></h6>
                    <input type="radio" name="alti" value="a"> A) OOC kanaldan bende hakaret eder, ağzının payını veririm.<br>
                    <input type="radio" name="alti" value="b"> B) Ekran görüntüsü alıp kişiye hakkında şikayet bildirisi oluşturacağıma dair bilgi veririm ve rolü en kısa sürede sonlandırmaya çalışırım. <br>
                    <input type="radio" name="alti" value="c"> C) Sinirlenip sunucuyu terkederim.<br>
                    <input type="radio" name="alti" value="d"> D) PM kanalından bir yöneticiyle iletişime geçip gelmesini isterim.<br>
                    <br>
                    <h6><strong>Aşağıdakilerden hangisi bir Powergaming kuralı ihlalidir?</strong></h6>
                    <input type="radio" name="yedi" value="a"> A) Birlik chatinden konuşup, adamlara planlı ateş açmak.<br>
                    <input type="radio" name="yedi" value="b"> B) Polis departmanına gidip, polisleri sopayla dövmek.<br>
                    <input type="radio" name="yedi" value="c"> C) Karakterimizi süperman gibi canlandırıp, zıplaya zıplaya gitmek.<br>
                    <input type="radio" name="yedi" value="d"> D) Binayı söküp başka galaksiye fırlatmak.<br>
                    <br>
                    <h6><strong>Karakteriniz ile bir hırsızlığa karıştınız, o anda bölgede olan polisler sizi fark etti ve kovalamaca başladı. Aracınıza son anda bir PIT manevrası uygulandı ve aracınızı artık kullanamıyorsunuz. Devamında ne gibi bir yol izlersiniz?</strong></h6>
                    <input type="radio" name="sekiz" value="a"> A) /q komutunu kullanırım, polisler gidene kadar oyuna girmem.<br>
					<input type="radio" name="sekiz" value="b"> B) İnternet kablosunu çekerim, biraz bekleyip sonrasında oyuna girerim ve internetim gitti diye yalan atarım.<br>
					<input type="radio" name="sekiz" value="c"> C) Kendi oyunuma crash verdiririm ve oyunum çökmüş gibi yapıp alacağım cezadan kurtulmaya çalışırım.<br>
					<input type="radio" name="sekiz" value="d"> D) Rolüme aracımı kullanamadığım noktadan devam ederim, polis direktiflerini uygularım veya karakterim yapabilecek haldeyse kaçmaya devam ederim.<br>
                    <br>
                    <h6><strong>Sunucuda bir açık buldunuz, ne yaparsınız?</strong></h6>
                    <input type="radio" name="dokuz" value="a"> A) Arkadaşlarım ile belli etmeden kullanırım.<br>
                    <input type="radio" name="dokuz" value="b"> B) Forum üzerinden açığı herkese yayarım, sunucuyu altüst ederim.<br>
                    <input type="radio" name="dokuz" value="c"> C) Oyun içerisinden spam atarak bir yetkiliye söylerim.<br>
                    <input type="radio" name="dokuz" value="d"> D) Forum üzerinden bir ticket ile raporlarım, açığı kullanmam ve düzelmesini beklerim.<br>
                    <br>
                    <h6><strong>Oldukça tenha bir sokakta karakterinizin etrafını bir kaç zenci çevreledi ve size tecavüz etmeye çalışıyorlar fakat buna izin vermediniz, ne yapmanız gerekiyor?</strong></h6>
                    <input type="radio" name="on" value="a"> A) İzin verip vermemem önemli değil, refuse-rp yapmamak için role devam etmeliyim.<br>
                    <input type="radio" name="on" value="b"> B) Ben izin vermediğim sürece karakterimi taciz/tecavüz edemezler fakat korkusuz rol gerçekleştirirsem edebilirler.<br>
                    <input type="radio" name="on" value="c"> C) Karakterim çok güçlü olduğu için herkesi etkisiz hale getiririm.<br>
                    <input type="radio" name="on" value="d"> D) Etrafımı saran kişileri yarıp aralarından fırlayarak kaçarım.<br>
                    <br>
					<div class="col-md-12  text-center">
					<input style="padding:5px;" class="btn btn-success btn-icon-split text" type="submit" value="Diğer adıma geç" name="btn">
                    </div>
				  </form>
		<?php }
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
<?php ob_end_flush(); ?>