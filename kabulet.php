<head>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=https://sandreas-roleplay.com/ucp/basvurular">
</head>
<?php
$baglanti = @mysqli_connect('77.83.200.146', 'sandreas', 'qbAZ3RfFmpHKVB5e');
$veritabani = @mysqli_select_db($baglanti, 'game_database'); 
date_default_timezone_set('Europe/Istanbul');
$app_dbid = $_GET['app_dbid'];
$appquery = mysqli_query($baglanti, "SELECT * FROM applications WHERE app_dbid=".$app_dbid."");
$app = mysqli_fetch_assoc($appquery);
$forum_id = $app['app_forum_id'];
$forum_name = $app['app_forum_name'];
$register_ip = $app['app_register_ip'];
$gonderen = $app['app_forum_id'];
$alan = "2";
$char_name = $app['app_char_name'];
$char_pass = $app['app_password'];
$appquery1 = mysqli_query($baglanti, "SELECT * FROM accounts WHERE forumID=".$forum_id."");
$app1 = mysqli_fetch_assoc($appquery1);
$accid = $app1['id'];
mysqli_query($baglanti, "INSERT INTO characters (account_id,forumID,char_name) VALUES ('$accid','$forum_id','$char_name')");
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
		mysqli_query($baglanti2, "UPDATE `phpbb7a_users` SET `user_new_privmsg` = '$msgsayi', `user_unread_privmsg`= '$umsgsayi' WHERE `user_id` = '$alan'");
	}
	$metin = "
Merhaba $forum_name,

Basvurunuz ($char_name) yetkililer tarafindan degerlendirildi.
Basvurunuz kabul edilmistir.
Rehberler ve Sistemler bolumlerini inceleyerek oyun hakkinda detayli bilgi alabilirsiniz.
Iyi eglenceler dileriz.

San Andreas Roleplay";
	pmgonder(2,$gonderen,"[!] Karakter Basvurunuz Kabul Edildi.",$metin,time());
?>