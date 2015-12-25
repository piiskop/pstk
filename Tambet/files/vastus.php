<?php  require_once 'configuration.php';?>
<html>
<meta charset="utf-8">
<title>Vastus</title>
<body>
<?php /**
* 1.2 Väljundid
 * Algus- ja lõpuhetke vahemik võimalikult lühikesel kujul:
 * 1.2.1: “d.m.y h-h”,
 * 1.2.2: “d.m.y h:m-h:m”,
 * 1.2.3: “d.-d.m.y” (nt “26.-27.2.2005”),
 * 1.2.4: “d.m.-d.m.y”,
 * 1.2.5: “d.m.y-d.m.y”. **/ ?>

ÜL I. 20150327-28 Tambet= <br> 
<?php 
$alates = $_POST["from"]; 
$kuni= $_POST["to"]; 
?>
<?php echo $alates; ?><br>
<?php echo $kuni; ?><br>
<br>
ÜL II. 20150327-28 Tambet= <br>
<?php 
echo $_POST["paev"]; 

?>

</body>
</html>