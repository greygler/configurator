<?php 
include('config.php');
$name = stripslashes(htmlspecialchars($_POST['name']));
$phone = stripslashes(htmlspecialchars($_POST['phone']));

if(empty($phone)){
echo '<h1 style="color:red;">Пожалуйста заполните все поля</h1>';
echo '<meta http-equiv="refresh" content="2; url=http://'.$_SERVER['SERVER_NAME'].'">';
}
else{
	
		
	
$success_url = 'form-ok.php?name='.$name.'&phone='.$phone.'';
$message1 = "<table border=\"0\">
<tr><td colspan=\"2\" ><b>Товар:</b><font size=\"5\" color=\"#FF0000\"> {$product}</font></td></tr><tr><td><b>Цена:&nbsp; </b></td><td >{$price_new} {$valuta}</td></tr>
<tr><td><b>Старая цена:&nbsp; </b></td><td >{$price_old} {$valuta}</td></tr>
<tr><td><b>Скидка:&nbsp; </b></td><td >{$skidka} %</td></tr>
<tr><td ><b>Покупатель:</b></td><td>{$name}</td></tr><tr><td ><b>Телефон: </b></td><td>{$phone}</td></tr><tr><td ><b>Сайт продажи:</b></td><td>{$_SERVER['HTTP_HOST']}</td></tr>
<tr><td ><b>Время: </b></td><td>".date('m.d.Y H:i:s')."</td></tr><tr></table>";
$message = $message1.$message;
$verify = mail($email,$subject,$message,$header);
if ($verify == 'true'){
    header('Location: '.$success_url);
    echo '<h1 style="color:green;">Поздравляем! Ваш заказ принят!</h1>';
    exit;
}
else 
    {
    echo '<h1 style="color:red;">Произошла ошибка!</h1>';
    }
}
?>
