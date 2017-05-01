<? session_start();
if(!isset($_SESSION['utms'])) {
    $_SESSION['utms'] = array();
    $_SESSION['utms']['utm_source'] = '';
    $_SESSION['utms']['utm_medium'] = '';
    $_SESSION['utms']['utm_term'] = '';
    $_SESSION['utms']['utm_content'] = '';
    $_SESSION['utms']['utm_campaign'] = '';
}
$_SESSION['utms']['utm_source'] = $_GET['utm_source'];
$_SESSION['utms']['utm_medium'] = $_GET['utm_medium'];
$_SESSION['utms']['utm_term'] = $_GET['utm_term'];
$_SESSION['utms']['utm_content'] = $_GET['utm_content'];
$_SESSION['utms']['utm_campaign'] = $_GET['utm_campaign']; 
$_SESSION['server']['referer'] = $_SERVER['HTTP_REFERER'];
include ('config.php');
$price_old=floor(($price_new/(100-$skidka))*100);

?>

<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
<script src="config/jquery.maskedinput.js"></script> 
<script type="text/javascript">
   jQuery(function($){
   $(".phone").mask("\+38(0*9) 999-99-99");   
   });
</script>
<?= $head_index ?>

</head>
<body>

<?= $body_index  ?>

Новая цена <?= $price_new ?> <?= $valuta ?> <br>

Старая цена <?= $price_old ?><?= $valuta ?> <br>

Скидка <?= $skidka ?>%

 <form method="post" action="zakaz.php" class="orderformcdn" onsubmit="if(this.name.value==''){alert('Введите Ваше имя!');return false}if(this.phone.value==''){alert('Введите Ваш номер телефона!');return false}return true;">
<input class="phone" type="text" name="phone" placeholder="Телефон">
</form>

</body>