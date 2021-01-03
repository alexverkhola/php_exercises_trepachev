<?php

/**
 * Упражнения к уроку 28 по учебнику Дмитрия Трепачёва
 * http://old.code.mu/tasks/php/regular/rabota-s-regulyarnymi-vyrazeniyami-v-php-glava-3.html
 */

require 'settings.php';

/** 
 * 1 Дана строка 'aaa@bbb eee7@kkk'. 
 * Напишите регулярку, которая найдет строки по шаблону: 
 * любое количество букв и цифр, символ @, любое количество букв и цифр 
 * и поменяет местами то, что стоит до @ на то, что стоит после нее. 
 * Например, aaa@bbb должно превратиться в bbb@aaa.
*/
$str = 'aaa@bbb eee7@kkk';
$pattern = '#(\w+)@(\w+)#';
$replacement = '$2@$1';
$output_data_1 = preg_replace($pattern, $replacement, $str);

/** 
 * 2 Дана строка вида 'a1b2c3'. 
 * Напишите регулярку, которая найдет все цифры и удвоит их количество 
 * таким образом: 'a11b22c33' (то есть рядом с каждой цифрой напишет такую же).
*/
$str = 'a1b2c3';
$pattern = '#(\d)#';
$replacement = '$1$1';
$output_data_2 = preg_replace($pattern, $replacement, $str);

/** 
 * 3  Дана строка 'aae xxz 33a'. 
 * Найдите все места, где есть два одинаковых идущих подряд символа 
 * и замените их на '!'.
*/
$str = 'aae xxz 33a';
$pattern = '#([\w])\1#';
$replacement = '!';
$output_data_3 = preg_replace($pattern, $replacement, $str);

/** 
 * 4 Дана строка 'aaa bcd xxx efg'. 
 * Найдите строки, состоящие из одинаковых символов (это будет aaa xxx). 
*/
$str = 'aaa bcd xxx efg';
$pattern = '#(\w)\1+#';
preg_match_all($pattern, $str, $matches);
print_r($matches);
$output_data_4 = $matches[0][0] . ' ' . $matches[0][1];

/** 
 * 5 С помощью preg_match определите, что переданная строка является емэйлом. 
 * Примеры емэйлов для тестирования mymail@mail.ru, my.mail@mail.ru, 
 * my-mail@mail.ru, my_mail@mail.ru, mail@mail.com, mail@mail.by, 
 * mail@yandex.ru.
*/
$output_data_5 = '';
$emails = [
    'mymailmail.ru',
    'mymail@mail.ru',
    'my.mail@mail.ru',
    'my-mail@mail.ru',
    'my_mail@mail.ru',
    'mail@mail.com',
    'mail@mail.by',
    'mail@yandex.ru',
    'mai34@yandex.ru',
    '84mail@yandex.ru'
];

foreach ($emails as $email) {
    if (preg_match('#^[a-zA-Z0-9-_.]+@[a-z]{4,6}\.[a-z]{2,3}#', $email) == 1) {
        $output_data_5 .= "$email is correct <br>";
    } else {
        $output_data_5 .= "$email is not correct <br>";
    }
}

/** 
 * 6 Дана строка с текстом, в котором могут быть емейлы. 
 * С помощью preg_match_all найдите все емэйлы.
*/
$output_data_6 = '<br>';

$str = 'We and our partners mymail@mail.ru store and/or access my-mail@mail.ru 
information on a device, such as cookies and process personal mail@mail.com 
data, such as unique identifiers and standard information sent by a device for 
personalised ads and content, ad and 84mail@yandex.ru content measurement, 
and audience insights, as well as to develop and improve products.';

unset($emails);

$pattern = '#[a-zA-Z0-9-_.]+@[a-z]{4,6}\.[a-z]{2,3}#';
preg_match_all($pattern, $str, $emails);
foreach($emails as $key => $val) {
    foreach ($val as $email) {
        $output_data_6 .= $email . '<br>';
    }
}

/** 
 * 7 С помощью preg_match определите, что переданная строка является доменом. 
 * Примеры доменов: site.ru, site.com, my-site123.com.
*/
$output_data_7 = '<br>';
$domains = [
    'site.ru',
    'site.com',
    'my-site123.com',
    'my-site123.',
    'my-site123.strtsr'
];

foreach ($domains as $domain) {
    if (preg_match('#^[a-z0-9-]+\.[a-z]{2,3}$#', $domain) == 1) {
        $output_data_7 .= "$domain is correct <br>";
    } else {
        $output_data_7 .= "$domain is not correct <br>";
    }
}

/** 
 * 8 С помощью preg_match определите, что переданная строка является доменом 
 * 3-го уровня. Примеры доменов: 
 * hello.site.ru, hello.site.com, hello.my-site.com
*/
$output_data_8 = '<br>';
$domains = [
    'hello.site.ru',
    'hello.site.com',
    'hello.my-site.com',
    'hello.my.com',
    'my-site.com',
];

foreach ($domains as $domain) {
    if (preg_match('#^[a-z0-9-]+\.[a-z-]+\.[a-z]{2,3}$#', $domain) == 1) {
        $output_data_8 .= "$domain is correct <br>";
    } else {
        $output_data_8 .= "$domain is not correct <br>";
    }
}

/** 
 * 9 С помощью preg_match определите, что переданная строка является доменом, 
 * название которого начинается с http. Примеры доменов: 
 * http://site.ru, http://site.com. 
*/
$output_data_9 = '<br>';
$domains = ['http://site.ru', 'http://site.com', 'https://site.com'];

foreach ($domains as $domain) {
    if (preg_match('#^http://[a-z0-9-]+\.[a-z]{2,3}$#', $domain) == 1) {
        $output_data_9 .= "$domain is correct <br>";
    } else {
        $output_data_9 .= "$domain is not correct <br>";
    }
}

/** 
 * 10  С помощью preg_match определите, что переданная строка является
 * доменом вида http://site.ru. 
 * Протокол может быть как http, так и https.
*/
$output_data_10 = '<br>';
$domains = ['http://site.ru', 'http://site.com', 'https://site.com'];

foreach ($domains as $domain) {
    if (preg_match('#^https?://[a-z0-9-]+\.[a-z]{2,3}$#', $domain) == 1) {
        $output_data_10 .= "$domain is correct <br>";
    } else {
        $output_data_10 .= "$domain is not correct <br>";
    }
}

/** 
 * 11  С помощью preg_match определите, что переданная строка является доменом. 
 * Протокол может быть как http, так и https. 
 * Домен может быть со слешем в конце: 
 * http://site.ru, http://site.ru/, https://site.ru, https://site.ru/.
*/
$output_data_11 = '<br>';
$domains = ['http://site.ru', 'http://site.com/', 'https://site.com'];

foreach ($domains as $domain) {
    if (preg_match('#^https?://[a-z0-9-]+\.[a-z]{2,3}/?$#', $domain) == 1) {
        $output_data_11 .= "$domain is correct <br>";
    } else {
        $output_data_11 .= "$domain is not correct <br>";
    }
}

/** 
 * 12 С помощью preg_match определите, 
 * что переданная строка начинается с http или с https
*/
$output_data_12 = '<br>';
$str = 'httpsrt';

if (preg_match('#^https?#', $str) == 1) {
    $output_data_12 .= "$str starts from http or https";
} else {
    $output_data_12 .= "$str doesn`t start from http or https";
}

/** 
 * 13  С помощью preg_match определите, что переданная строка 
 * заканчивается расширением txt, html или php. 
*/
$output_data_13 = '<br>';
$str = 'httpsrttxta';

if (preg_match('#(txt|html|php)$#', $str) == 1) {
    $output_data_13 .= "$str ends by required extension";
} else {
    $output_data_13 .= "$str doesn`t end by required extension";
}

/** 
 * 14 С помощью preg_match определите, что переданная строка заканчивается 
 * расширением jpg или jpeg
*/
$output_data_14 = '<br>';
$str = 'httpsrttxtapjpg';

if (preg_match('#(jpg|jpeg)$#', $str) == 1) {
    $output_data_14 .= "$str ends by required extension";
} else {
    $output_data_14 .= "$str doesn`t end by required extension";
}

/** 
 * 15 С помощью preg_match узнайте является ли строка числом, длиной до 12 цифр.
*/
$output_data_15 = '<br>';
$str = '123456783453543539';

if (preg_match('#^[0-9]{1,12}$#', $str) == 1) {
    $output_data_15 .= "$str is required numeric ";
} else {
    $output_data_15 .= "$str is not required numeric";
}

/** 
 * 16 Дана строка с буквами, пробелами и цифрами. 
 * Найдите сумму всех чисел из данной строки.
*/
$output_data_16 = '<br>';
$str = '1kn 23 2rv 49 33tdr 0240 2347 93';
$sum = 0;

$arr = explode(' ', $str);

foreach ($arr as $num) {
    if (is_numeric($num)) {
        $sum += $num;
    }
}

$output_data_16 .= "sum is $sum";

/** 
 * 17 С помощью preg_replace преобразуйте дату в формате 
 * '31-12-2014' в '2014.12.31'
*/
$output_data_17 = '<br>';
$date = '31-12-2014';
$output_data_17 .= 
    preg_replace('#(\d{2})\-(\d{2})\-(\d{4})#', '$3.$2.$1', $date);

/** 
 * 18 С помощью preg_replace замените в строке домены вида 
 * http://site.ru, http://site.com на <a href="http://site.ru">site.ru</a>
*/
$output_data_18 = '<br>';

$str = 'We and our partners mymail@mail.ru store and/or access my-mail@mail.ru 
information on a http://site.ru device, such as cookies and process personal mail@mail.com 
data, such as unique identifiers and standard information sent by a device for 
personalised ads and content, ad http://site.com and 84mail@yandex.ru content measurement, 
and audience insights, as well as to develop and improve products.';

$pattern = '#\bhttps?://([a-z0-9-]+\.[a-z]{2,})#';
$replacement = '<a href="$1">$1</a>';

$output_data_18 .= preg_replace($pattern, $replacement, $str);



require 'html/lesson_28_exercises.html';