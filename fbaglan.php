<?php
$baglanti2 = @mysqli_connect('localhost', 'sandreasroleplay_phpbb', '][R74S1wPp'); 
$veritabani = @mysqli_select_db($baglanti2, 'sandreasroleplay_phpbb'); 
mysqli_query($baglanti2, "SET NAMES 'UTF8'");
mysqli_query($baglanti2, "SET character_set_connection = 'UTF8'");
mysqli_query($baglanti2, "SET character_set_client = 'UTF8'");
mysqli_query($baglanti2, "SET character_set_results = 'UTF8'");
?>