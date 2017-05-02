<?php
/* * * * * * * * * * * * * * * * * * * * * * * 
 *  Configuration v.1.9.0 for LandingPage:   *
 *               configurator                *
 *   Last edition by 01.05.2017, 01:43:56    *
 * * * * * * * * * * * * * * * * * * * * * * */

session_start();
require_once("config/class/functions.class.php");
$remote_addr=Config::GetRealIp();
$country_code = Config::tabgeo_country_v4($remote_addr);
if ($remote_addr=="127.0.0.1") $remote_addr="localhost";
if (stripos($_SERVER['PHP_SELF'], "index"))
	{
		foreach($_GET as $key => $value) $_SESSION['utms'][$key] = $value;
		if ($_SERVER['HTTP_REFERER']!="") $_SESSION['referer']=$_SERVER['HTTP_REFERER'];
		else $_SESSION['referer']="Не определен.";
	echo('<script> var ip = "'.$remote_addr .'";</script> ');
	}
else 
	if (isset($_SESSION['utms'])) foreach ($_SESSION['utms'] as $key => $value) $utm.="<tr><td><b>".str_pad($key, 14, " ", STR_PAD_RIGHT)."</b> </td><td> {$value}</td></tr>\n";

if (Config::is_mobile()) $device="Мобильный"; else $device="Стационарный";
$user_agent=$_SERVER['HTTP_USER_AGENT'];
$browser=Config::user_browser($user_agent);
$os=Config::getOS($user_agent);

$valuta = "грн.";
$price_new = "349";
$price_old_select = "0";
$price_old = "900";
$mask_phone = "_ua";
$head_index = "";
$head_thanks = "";
$body_index = "";
$body_thanks = "";
$product = "Название Вашего товара";
$email = "Ваш email";
$sender = "{$product} <noreply@{$_SERVER['HTTP_HOST']}>";
$subject = "Заказ товара - {$product}";
$comment = "";
$message = "<table border=\"0\"><td colspan=\"2\" height=\"40\" ><p align=\"center\"><i>Информация о покупателе:</i></td></tr><tr><td><b>IP покупателя:</b></td><td>{$remote_addr}</td></tr><tr><td><b>Страна (по IP):</b></td><td> {$country_code}</td></tr>
<tr><td><b>Город (по IP):</b></td><td> {$_POST['city']}</td></tr><tr><td><b>Установленный язык:</b> </td><td>{$_SERVER['HTTP_ACCEPT_LANGUAGE']}</td></tr><tr><td><b>Браузер: </b> </td><td>{$browser}</td></tr><tr><td><b>Устройство:</b></td><td>{$device}</td></tr><tr><td><b>ОС:</b></td><td>{$os}</td></tr><tr><td><b>Реферер:</b></td><td>{$_SESSION['referer']}</td></tr><tr><td colspan=\"2\"><p align=\"center\"><b>UTM-метки: </b></p> </tr>{$utm}</tr><tr><td><b>Комментарий к заказу:  </b></td><td><p>{$comment}</p></td></tr></table>
";
$seller = "ООО «Рога и копыта»,  ОГРН 458788856458";
$seller_adress = "г. Мухосральск, ул. Веселых Тараканов,  д. 11 ";
$contact_phone1 = "Телефон1";
$contact_phone2 = "Телефон2";
$contact_phone3 = "Телефон3";
$contact_email = "Контактный e-mail";
$script = "1";
$country_script = "auto";
$auditoria = "all";
$title = "Название Вашего товара";
$tovar = "1";
$vsego = "10";
$delay2 = "10";
$delay1 = "30";
$modal = "1";
$modal_title = "Понравилось это предложение?";
$modal_text = "Мы расскажем Вам все об Название Вашего товара, предложим наилучшие условия и ознакомим с подходящими акционными предложениями!";
$modal_text2 = "Оператор перезвонит Вам через 15-30 минут.";
$button = "ПЕРЕЗВОНИТЬ МНЕ";
$modal_delay = "30";
$upsel = "0";
$key_crm = "";
$crm = "";
$country_crm = "auto";
$office_crm = "";
$delivery_crm = "";
$payment_crm = "";
$skidka = 100-floor(($price_new/$price_old)*100);
$header="Content-type: text/html;charset=utf-8\r\nFrom: {$sender}\r\n";


/* * * * * * * * * * * * * * * * * * * * * * * 
 *           Created by ConfigLand           *
 *          Powered by Igor Sayutin          *
 *          http://it-senior.pp.ua           *
 * * * * * * * * * * * * * * * * * * * * * * */


?>
