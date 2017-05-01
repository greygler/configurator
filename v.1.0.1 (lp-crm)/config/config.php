<? 
$filename = "../config.php";

if (file_exists($filename)) include ($filename);
 ?>
<fieldset>
    <legend><h2>Ценообразование: </h2></legend>
	<label for="valuta">Валюта: <em>*</em></label><input required id="valuta" type="text" name="valuta" value="<?= $valuta; ?>" placeholder="Валюта для цены - грн, руб, и т.д. Размещается во всех местах ленда"></p>
	 <label for="price_new">Новая цена: <em>*</em></label><input required id="price_new" type="text" name="price_new" value="<?=  $price_new ?>" placeholder="Новая цена. Размещается во всех местах ленда"></p>
	 <label for="skidka">Скидка, %: <em>*</em></label><input required id="skidka" type="text" name="skidka" value="<?=  $skidka ?>" placeholder="Скидка. Старая цена будет считаться автоматически"></p>
	 
	 
	 <!--	 Дополнительная переменная в разделе ЦЕНООБРАЗОВАНИЕ -->

	  
	 Старая цена в конфигураторе: <strong><?= $price_old ?> <?= $valuta ?></strong> 
	
  </fieldset>
  <fieldset>
  <legend><h2>Коды: </h2></legend>
	 <label for="head_index">Блок head для Index:<span><br>Код для размещения в тегах<br><strong>&#8249;head&#8250; Ваш код &#8249;&#47;head&#8250;</strong><br>индексной страницы<br>Здесь размещают пиксели, META-теги, ссылки на JS для аналитики и пр.</span></label><textarea rows="5" id="head_index" name="head_index" cols="70"><?= str_replace("<br />", "\n", $head_index); ?></textarea></p>
	 <label for="head_thanks">Блок head для Thanks: <span><br>Код для размещения в тегах<br><strong>&#8249;head&#8250; Ваш код &#8249;&#47;head&#8250;</strong><br>страницы "Спасибо"<br>Здесь размещают пиксели, META-теги, ссылки на JS для аналитики и пр.</span></label><textarea rows="5" id="head_thanks" name="head_thanks" cols="70"><?= str_replace("<br />", "\n", $head_thanks); ?></textarea></p>
	 <label for="body_index">Блок body для Index: <span><br>Код для размещения в тегах<br><strong>&#8249;body&#8250; Ваш код &#8249;&#47;body&#8250;</strong><br>индексной страницы<br>Здесь можно разместить код ретаргетинга, счетчиков Яндекс, Вконтакте, Mail-ru, Google-аналитику</span></label><textarea rows="5" id="body_index" name="body_index" cols="70"><?= str_replace("<br />", "\n", $body_index); ?></textarea></p>
	 <label for="body">Блок body для Thanks: <span><br>Код для размещения в тегах<br><strong>&#8249;body&#8250; Ваш код &#8249;&#47;body&#8250;</strong><br>страницы "Спасибо"Здесь можно разместить код ретаргетинга, счетчиков Яндекс, Вконтакте, Mail-ru, Google-аналитику</span></label><textarea rows="5" id="body_thanks" name="body_thanks" cols="70"><?= str_replace("<br />", "\n", $body_thanks); ?></textarea></p>
	 
	  <!--	 Дополнительная переменная в разделе КОДЫ -->
	  </fieldset> 
	  <fieldset>
	 <legend><h2>Отправка информации о покупке: </h2></legend> 
	 <label for="product">Наименование подукта: <em>*</em></label><input required id="product" type="text" name="product" value="<?=  $product ?>" placeholder="Наименование продукта, которое будет указано в заголовке и тексте письма">
     <label for="email">E-mail: <em>*</em></label><input required id="email" type="text" name="email" value="<?=  $email ?>" placeholder="E-mail, на который будут приходить уведомления о покупке.">
	
    <label for="comment">Комментарий: <span><br>Комментарий, который автоматически добавится в письмо о покупке<br>А также добавлен в Вашу СРМ систему, (Если ленд подключен) </span></label><textarea rows="5" id="comment" name="comment" cols="70"><?= str_replace("<br />", "\n", $comment); ?></textarea></p>
	 <!--	 Дополнительная переменная в разделе Отправка информации о покупке -->
  </fieldset>
  
  
   <fieldset>
	 <legend><h2>&#160;<i class="fa fa-connectdevelop"></i>&#160;Отправка информации в LP-СRМ:&#160;</h2></legend> 
	  <label for="product_id">ID продукта: </label><input id="product_id" type="text" name="product_id" value="<?=  $product_id ?>" placeholder="ID продукта в Вашей LP-СRМ-системе.">
	
	 <label for="key">Ключ доступа: </label><input id="key" type="text" name="key" value="<?=  $key ?>" placeholder="Ключ доступа к Вашей LP-СRМ-системе.(без http)">
	 <label for="crm">Подключение к СРМ: </label><input id="crm" type="text" name="crm" value="<?=  $crm ?>" placeholder="Путь подключения к Вашей СРМ-системе.(Если ленд подключен)">
	 <label for="country_crm">Страна: </label>
	  <select id="country_crm" name="country_crm">
        <option <? if ($country_crm=="RU") echo "selected"; ?> value="RU">Россия</option>
    <option <? if ($country_crm=="UA") echo "selected"; ?> value="UA">Украина</option>
      </select>
	  <label for="office">Офис: </label><input id="office" type="text" name="office" value="<?=  $office ?>" placeholder="ID офиса  (Можно оставить пустым)">
	   <label for="delivery">Способ доставки: </label><input id="delivery" type="text" name="delivery" value="<?=  $delivery ?>" placeholder="ID способа доставки  (Можно оставить пустым)">
	   <label for="payment">Способ оплаты: </label><input id="payment" type="text" name="payment" value="<?=  $payment ?>" placeholder="ID способа оплаты  (Можно оставить пустым)"> 
	
	 <br>
    
  </fieldset> 
  <div style="font-size:10px; float: right;">&copy; Igor Saytuin, <a href="http://it-senior.pp.ua">http://it-senior.pp.ua</a> 2014-<?= date("Y") ?></div>