<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=/ucp/basvurular">
</head>
<?php
$baglanti = @mysqli_connect('77.83.200.146', 'sandreas', 'qbAZ3RfFmpHKVB5e'); 
$veritabani = @mysqli_select_db($baglanti, 'game_database'); 
$app_dbid = $_GET['app_dbid'];
$appquery = mysqli_query($baglanti, "SELECT * FROM applications WHERE app_dbid=".$app_dbid."");
$app = mysqli_fetch_assoc($appquery);
$forum_name = $app['app_forum_name'];
$forum_id = $app['app_forum_id'];
$char_name = $app['app_char_name'];
$gonderen = $app['app_forum_id'];
$alan = "2";
mysqli_query($baglanti, "DELETE from applications where app_dbid=".$app_dbid."");

	function pmgonder($gonderen,$alan,$baslik,$icerik,$zmn) {
		include('fbaglan.php');
		mysqli_query($baglanti2, "INSERT INTO `phpbb_privmsgs` (`author_id`,`enable_bbcode`,`message_subject`,`message_text`,`to_address`,`message_time`) VALUES ('$gonderen','1','$baslik','$icerik','u_$alan','$zmn')");
		$sec= mysqli_fetch_array(mysqli_query($baglanti2, "SELECT * FROM `phpbb_privmsgs` WHERE `author_id` = '$gonderen' AND `to_address` = 'u_$alan' ORDER BY `msg_id` DESC LIMIT 0,1"));
		$msgid = $sec["msg_id"];
		mysqli_query($baglanti2, "INSERT INTO `phpbb_privmsgs_to` (`msg_id`,`user_id`,`author_id`,`pm_new`,`pm_unread`,`folder_id`) VALUES ('$msgid','$alan','$gonderen','1','1','0')");
		$sec2 = mysqli_fetch_array(mysqli_query($baglanti2, "SELECT * FROM `phpbb_users` WHERE `user_id` = '$alan'"));
		$msgsayi = $sec2["user_new_privmsg"]+1;
		$umsgsayi = $sec2["user_unread_privmsg"]+1;
		mysqli_query($baglanti2, "UPDATE `phpbb_users` SET `user_new_privmsg` = '$msgsayi', `user_unread_privmsg`= '$umsgsayi' WHERE `user_id` = '$alan'");
	}
	$metin = "
Merhaba $forum_name,

Basvurunuz ($char_name) yetkililer tarafindan degerlendirildi.

Basvurunuzun geneli basvuru standartlarina uymamaktadir. Kopya icerik kullaniyor olabilirsiniz. Lutfen sunucu hakkinda daha fazla bilgi edinip, sunucu bilgileri bolumunde yer alan oyun kurallarini tekrar okuyunuz. Basvurunuzu oyun kurallari ve basvuru kriterlerine uygun sekilde yeniden doldurunuz. Basvurunuz reddedilmistir.

San Andreas Roleplay";
	pmgonder(2,$gonderen,"[!] Karakter Basvurunuz Reddedildi.",$metin,time());
?>