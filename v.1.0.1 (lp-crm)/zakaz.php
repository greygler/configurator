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
	if ($key!="") {
// формируем массив с товарами в заказе (если товар один - оставляйте только первый элемент массива)
$products_list = array(
    1 => array( 
            'product_id' => $product_id,    //код товара (из каталога CRM)
            'price'      => $price_new, //цена товара 1
            'count'      => '1'                      //количество товара 1
    ),  
    
);
$products = urlencode(serialize($products_list));
 if ($country_crm=="auto")  $country_crm = tabgeo_country_v4($ip);
// параметры запроса
$data = array(
    'key'             => $key, //Ваш секретный токен
    'order_id'        => number_format(round(microtime(true)*10),0,'.',''), //идентификатор (код) заказа (*автоматически*)
    'country'         => $country_crm,                      // Географическое направление заказа
    'office'          => $office,                   // Офис (id в CRM)
    'products'        => $products,                 // массив с товарами в заказе
    'bayer_name'      => $name,             // покупатель (Ф.И.О)
    'phone'           => $phone,           // телефон
    'email'           => $_GET['email'],           // электронка
    'comment'         => $comment,    // комментарий
    'site'            => $_SERVER['SERVER_NAME'],  // сайт отправляющий запрос
    'ip'              => $_SERVER['REMOTE_ADDR'],  // IP адрес покупателя
    'delivery'        => $delivery,        // способ доставки (id в CRM)
    'delivery_adress' => $_GET['delivery_adress'], // адрес доставки
    'payment'         => $payment,          // вариант оплаты (id в CRM)
    'utm_source'      => $_SESSION['utms']['utm_source'],  // utm_source 
    'utm_medium'      => $_SESSION['utms']['utm_medium'],  // utm_medium 
    'utm_term'        => $_SESSION['utms']['utm_term'],    // utm_term   
    'utm_content'     => $_SESSION['utms']['utm_content'], // utm_content    
    'utm_campaign'    => $_SESSION['utms']['utm_campaign'] // utm_campaign
);
 
// запрос
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://'.$crm.'/api/addNewOrder.html');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$out = curl_exec($curl);
curl_close($curl);
//$out – ответ сервера в формате JSON	
$jout=json_decode($out); $m1=$jout -> status; foreach($jout ->message as $val) { $m2=$m2.$val; } $mess="<b>{$product_id} - Ответ LP-СРМ:</b> {$m1},\n<br>Сообщение: {$m2}";	
	}	

$subject = 'Заказ товара - "'.$product.'"'; // заголовок письма
$addressat = $email; // Ваш Электронный адрес
$sender="{$product} <noreply@{$_SERVER['HTTP_HOST']}>"; // Адрес отправителя
$header="Content-type:text/plain;charset=utf-8\r\nFrom: {$sender}\r\n";

$message = "ФИО: {$name}\nКонтактный телефон: {$phone}\nТовар: {$product}\n\nСайт продажи: {$_SERVER['HTTP_HOST']}\nВремя покупки: ".date("m.d.Y H:i:s")."\n\nИнформация о покупателе:\nIP покупателя: {$_SERVER['REMOTE_ADDR']}\nУстановленный язык: {$_SERVER['HTTP_ACCEPT_LANGUAGE']}\nБраузер и ОС: {$_SERVER['HTTP_USER_AGENT']}\nРеферер: {$_SERVER['HTTP_REFERER']}\n\nUTM-метки:\nutm_source= {$_SESSION['utms']['utm_source']}\nutm_medium= {$_SESSION['utms']['utm_medium']}\n&utm_term= {$_SESSION['utms']['utm_term']}\nutm_content= {$_SESSION['utms']['utm_content']}\nutm_campaign={$_SESSION['utms']['utm_campaign']}\n\n{$comment}\n\n{$mess}";
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
