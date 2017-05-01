<?php 
session_start();
include('config.php');
$name = stripslashes(htmlspecialchars($_POST['name']))." ".stripslashes(htmlspecialchars($_POST['name_last']));
$phone = stripslashes(htmlspecialchars($_POST['phone']));

if(empty($name) || empty($phone)){
echo '<h1 style="color:red;">Пожалуйста заполните все поля</h1>';
echo '<meta http-equiv="refresh" content="2; url=http://'.$_SERVER['SERVER_NAME'].'">';
}
else{
$order = array(
    'key' => $key,//уникальный ключ
    'product_id' => $product_id,//код товара в платформе
    'price' => $price_new, //цена продажи
    'count' => '1',
    'total' => $price_new,
    'bayer_name' => $name,
    'phone' => $phone,
	'site' => $_SERVER['HTTP_HOST'],
	'client_address' => '', // дл¤ отправки адреса
 'order_processe_type' => '1', //1-аутсорс, 2 - дроп
    'comment' => $comment,
 'utm_source' => $_SESSION['utms']['utm_source'], 
'utm_medium' => $_SESSION['utms']['utm_medium'], 
'utm_term' => $_SESSION['utms']['utm_term'], 
'utm_content' => $_SESSION['utms']['utm_content'], 
'utm_campaign' => $_SESSION['utms']['utm_campaign'] 
);

$get = http_build_query($order);
$out = file_get_contents('http://"http://dropplatforma.ru/api/public_order?' . $get, true);

$subject = 'Заказ товара - "'.$product.'"'; // заголовок письма
$addressat = $email; // Ваш Электронный адрес
$sender="{$product} <noreply@{$_SERVER['HTTP_HOST']}>"; // Адрес отправителя
$header="Content-type:text/plain;charset=utf-8\r\nFrom: {$sender}\r\n";

$message = "ФИО: {$name}\nКонтактный телефон: {$phone}\nТовар: {$product}\n\nСайт продажи: {$_SERVER['HTTP_HOST']}\nВремя покупки: ".date("m.d.Y H:i:s")."\n\nИнформация о покупателе:\nIP покупателя: {$_SERVER['REMOTE_ADDR']}\nУстановленный язык: {$_SERVER['HTTP_ACCEPT_LANGUAGE']}\nБраузер и ОС: {$_SERVER['HTTP_USER_AGENT']}\nРеферер: {$_SERVER['HTTP_REFERER']}\n\nUTM-метки:\nutm_source= {$_SESSION['utms']['utm_source']}\nutm_medium= {$_SESSION['utms']['utm_medium']}\n&utm_term= {$_SESSION['utms']['utm_term']}\nutm_content= {$_SESSION['utms']['utm_content']}\nutm_campaign={$_SESSION['utms']['utm_campaign']}\n\n{$comment}";
$success_url = 'form-ok.php?name='.$name.'&phone='.$phone.'';

$verify = mail($addressat,$subject,$message,$header);
if ($verify == 'true'){
	echo("<script>document.location.href = '{$success_url}';</script>");
    //header('Location: '.);
    echo '<h1 style="color:green;">Поздравляем! Ваш заказ принят!</h1>';
    exit;
}
else 
    {
    echo '<h1 style="color:red;">Произошла ошибка!</h1>';
    }
}
?>
