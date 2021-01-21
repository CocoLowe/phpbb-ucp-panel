<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-9">
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/ucp/duyurular">
</head>
<?php
include("fbaglan.php");
$newsid = $_GET['id'];
$newsquery = mysqli_query($baglanti2, "SELECT * FROM phpbb7a_news WHERE id=".$newsid."");
$news = mysqli_fetch_assoc($newsquery);
mysqli_query($baglanti2, "DELETE from phpbb7a_news where id=".$newsid."");
?>