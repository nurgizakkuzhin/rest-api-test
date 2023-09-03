# rest-api-test
REST API

## Формат JSON
JSON представляет собой формат для хранения данных. Этот формат часто используется для обмена данными между сайтами, либо между сервером и браузером. Этот формат более компактный и простой по сравнению с XML, поэтому в настоящее время используется гораздо ширине.
Аббревиатура JSON расшифровывается как JavaScript Object Notation. Дело в том, что изначально JSON был придуман в языке JavaScript, но теперь используется повсеместно.
Сам формат представляет собой некую многомерную структуру, состоящую из обычных и ассоциативных массивов. Элементами массивов могут быть строки обязательно в двойных кавычках, числа, значения true, false или null.

С помощью функции json_encode можно автоматически преобразовывать данные в PHP формате в формат JSON.

С помощью функции json_decode можно автоматически преобразовывать данные из формата JSON в PHP структуры.

При преобразовании объектов JSON есть нюансы. Дело в том, что они преобразуются не в ассоциативные массивы PHP, а в объекты PHP.

Можно сделать так, чтобы объекты JSON преобразовывались в ассоциативные массивы в PHP. Для этого нужно второй параметр функции json_decode установить в значение true.

При работе сайта часто бывает так, что некоторые URL отдают не HTML код, а JSON. Давайте напишем пример такой страницы:

<?php
	$data = [1, 2, 3];
	$json = json_encode($data);
	echo $json;
?>

Более правильным будет отдать при этом соответствующий HTTP заголовок:

<?php
	$data = [1, 2, 3];
	$json = json_encode($data);
	
	header('Content-Type: application/json');
	echo $json;
?>

Бывает такое, что строка с JSON построена некорректно. В этом случае функция json_decode вернет null.

С помощью функции json_last_error можно узнать, какая именно ошибка случилась при парсинге JSON. Давайте посмотрим, как это делается. Так как возникала ошибка, то json_last_error при вызове выдаст номер этой ошибки.

## Формат XML в PHP
XML представляет собой формат для хранения данных. Этот формат часто используется для обмена данными между сайтами, либо между сервером и браузером. Технически XML похож на HTML, но с любыми тегами и атрибутами. Давайте сделаем отдельный файл test.xml, в котором мы будем хранить тестовый документ XML. 

## Библиотека CURL в PHP
Библиотека CURL позволяет осуществлять HTTP запросы и получать HTML код страниц сайтов в переменные. При этом она может работать с куками, с HTTP заголовками, а также позволяет отправлять формы и переходить по редиректам.

Базовая работа с CURL состоит всего лишь из трех функций: curl_init, curl_setopt и curl_exec.

Функция curl_init инициализирует сеанс работы с библиотекой и записывает его в переменную. Дальнейшая работа ведется с этой переменной.

Следующим этапом являются настройки - они делаются с помощью функции curl_setopt, которая первым параметром принимает переменную с сеансом, вторым параметром - название параметра для настройки (в виде константы PHP), а третьим параметром - значение параметра настройки.

После настроек вызывается функция curl_exec, которая и выполняет запрос к сайту в соответствии с настройками. Эта функция возвращает HTML код заданной страницы.

Давайте посмотрим на минимально необходимые настройки (что они делают читайте в комментариях):

<?php
	// Адрес страницы для обращения:
	$url = 'http://test.loc';
	
	// Инициализируем сеанс:
	$curl = curl_init();
	
	// Указываем адрес страницы:
	curl_setopt($curl, CURLOPT_URL, $url);
	
	// Выполняем запрос:
	curl_exec($curl);
?>