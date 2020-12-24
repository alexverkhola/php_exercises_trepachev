<?php
/**
 * Упражнения к уроку 24 по учебнику Дмитрия Трепачёва
 * http://old.code.mu/trainings/php/work-with-get-queries-in-php.html
*/
require 'settings.php';

/** 
 * 1 Отправьте с помощью GET-запроса число. Выведите его на экран.
*/
$output_data_1 = '';
if (isset($_GET['number'])) {
    $num = htmlspecialchars($_GET['number']);
    $output_data_1 = $num;
}

/** 
 * 2 Отправьте с помощью GET-запроса число. 
 * Выведите его на экран квадрат этого числа.
*/
$output_data_2 = '';
if (isset($_GET['number'])) {
    $num = htmlspecialchars($_GET['number']);
    if (is_numeric($num)) {
        $output_data_2 = pow($num, 2);
    } else {
        $output_data_2 = 'Недопустимое значение';
    }
}

/** 
 * 3 Отправьте с помощью GET-запроса два числа. 
 * Выведите его на экран сумму этих чисел.
*/
$output_data_3 = '';
if (isset($_GET['num1']) && isset($_GET['num2'])) {
    $num1 = htmlspecialchars($_GET['num1']);
    $num2 = htmlspecialchars($_GET['num2']);
    if (is_numeric($num1) && is_numeric($num2)) {
        $output_data_3 = $num1 + $num2;
    } else {
        $output_data_3 = 'Недопустимое значение';
    }
}

/** 
 * 4 Пусть с помощью GET-запроса отправляется число. 
 * Оно может быть или 1, или 2. 
 * Сделайте так, чтобы если передано 1 - на экран вывелось слово 'привет', 
 * а если 2 - то слово 'пока'.
*/
$output_data_4 = '';
if (isset($_GET['hello'])) {
    $hello = htmlspecialchars($_GET['hello']);
    switch ($hello) {
        case 1:
            $output_data_4 = 'Привет';
            break;
        case 2:
            $output_data_4 = 'Пока';
            break;
        default: 
        $output_data_4 = 'Непонятные данные';
    }
}

/** 
 * 5  Дан массив. Сделайте так, чтобы с помощью GET-запроса можно было вывести
 * любой элемент этого массива.
*/
$output_data_5 = '';
$arr = ['a', 'b', 'c', 'd', 'e'];
if (isset($_GET['get']) && isset($arr[$_GET['get']])) {
    $index = htmlspecialchars($_GET['get']);
    $output_data_5 = $arr[$index];
}

/** 
 * 6  Сделайте 3 ссылки. Пусть первая передает число 1, вторая - число 2, 
 * третья - число 3. Сделайте так, чтобы по нажатию на ссылку
 * на экран выводилось ее число.
*/
$output_data_6 = '';
if (isset($_GET['get'])) {
    $output_data_6 = htmlspecialchars($_GET['get']);
}

/** 
 * 7 Сформируйте в цикле 10 ссылок. Пусть каждая ссылка передает свое число. 
 * Сделайте так, чтобы по нажатию на ссылку на экран выводилось ее число.
 * 
 * 8  Модифицируйте предыдущую задачу так, 
 * чтобы каждая ссылка стояла в своем абзаце.
*/
$output_data_7 = '';
$output_data_7_1 = '';
for ($i = 1; $i <= 10; $i++) {
    $output_data_7 .= "<p><a href=\"?get=$i\">link $i</a></p>";
}
if (isset($_GET['get'])) {
    $output_data_7_1 = htmlspecialchars($_GET['get']);
}

/** 
 * 9  Модифицируйте предыдущую задачу так, 
 * чтобы каждая ссылка стояла в своем li в теге ul.
*/
$output_data_9 = '<ul>';
for ($i = 1; $i <= 10; $i++) {
    $output_data_9 .= "<li><a href=\"?get=$i\">link $i</a></li>";
}
$output_data_9 .= '</ul>';

/** 
 * 10 Дан массив. Сделайте так, чтобы с помощью GET-запроса можно было вывести 
 * любой элемент этого массива. Для этого вручную сделайте ссылку для каждого 
 * элемента массива. Переходя любой ссылке мы должны увидеть на экране 
 * соответствующий элемент массива.
*/
$output_data_10 = '';
$output_data_10_1 = '';
$links = ['a', 'b', 'c'];

$output_data_10 .= "<a href=\"?link=0\"> link $links[0] </a>";
$output_data_10 .= "<a href=\"?link=1\"> link $links[1] </a>";
$output_data_10 .= "<a href=\"?link=2\"> link $links[2] </a>";

if (isset($_GET['link'])) {
    $output_data_10_1 .= $links[$_GET['link']];
}

/** 
 * 11 Модифицируйте предыдущую задачу так, чтобы ссылки выводились с 
 * помощью цикла foreach автоматически в соответствии с количеством 
 * элементов в массиве.
*/
$output_data_11 = '';
$output_data_11_1 = '';
foreach ($links as $key => $val) {
    $output_data_11 .= "<a href=\"?link=$key\"> link $val </a>";
}
require 'html/lesson_24_exercises.html';