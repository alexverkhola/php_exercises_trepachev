<?php

/**
 * Упражнения к уроку 21 по учебнику Дмитрия Трепачёва
 * http://old.code.mu/tasks/php/practice/praktika-na-otrabotku-ciklov-i-funkcij-php.html
 */

require 'settings.php';

/** 
 * 1 Выведите с помощью цикла столбец чисел от 1 до 100
*/
$output_data_1 = "<p>";
for ($i = 1; $i <= 100; $i++) {
    $output_data_1 .=  $i;
}
$output_data_1 .=  "<br>";

/**
 * 2 Выведите с помощью цикла столбец четных чисел от 1 до 100.
 */
$output_data_2 = '';
for ($i = 0; $i <= 100; $i += 2) {
    $output_data_2 .= "<p>" . $i . "</p>";
}

/**
 * 3 Найдите с помощью цикла сумму чисел от 1 до 100.
 */
$sum = 0;
for ($i = 1; $i <= 100; $i++) {
    $sum += $i;
}
$output_data_3 = "<p> Sum: $sum </p>";

/**
 *  4 Найдите с помощью цикла сумму квадратов чисел от 1 до 15. 
 */
$sum = 0;
for ($i = 1; $i <= 15; $i++) {
    $sum += $i ** 2;
}
$output_data_4 = "<p> Sum: $sum </p>";

/**
 * 5 Найдите с помощью цикла сумму корней чисел от 1 до 15. 
 * Результат округлите до двух знаков после дробной части.
 */
$sum = 0;
for ($i = 1; $i <= 15; $i++) {
    $sum +=  sqrt($i);
}
$sum = round($sum, 2);
$output_data_5 = "<p> Sum: $sum </p>";

/**
 * 6 Найдите с помощью цикла сумму тех чисел от 1 до 100, которые делятся на 7
 */
$sum = 0;
for ($i = 1; $i <= 100; $i++) {
    if ($i % 7 == 0) {
        $sum += $i;
    }
}
$output_data_6 = "<p> Sum: $sum </p>";

/**
 * 7 Заполните массив 10-ю иксами с помощью цикла.
 */
$arr = [];
for ($i = 1; $i <= 10; $i++) {
    $arr[] = 'x';
}
$output_data_7 = '<pre>' . var_dump($arr) . '</pre>';

/**
 * 8 Заполните массив числами от 1 до 10 с помощью цикла.
 */
$arr = [];
for ($i = 1; $i <= 10; $i++) {
    $arr[] = $i;
}
$output_data_8 = '<pre>' . var_dump($arr) . '</pre>';

/**
 * 9  Заполните массив числами от 10 до 1 с помощью цикла.
 */
$arr = [];
for ($i = 10; $i >= 1; $i--) {
    $arr[] = $i;
}
$output_data_9 = '<pre>' . var_dump($arr) . '</pre>';

/**
 * 10 Заполните массив 10-ю случайными числами от 1 до 10 с помощью цикла.
 */
$arr = [];
for ($i = 1; $i <= 10; $i++) {
    $arr[] = rand(1, 10);
}
$output_data_10 = '<pre>' . var_dump($arr) . '</pre>';

/**
 * 11 С помощью цикла создайте строку из 6-ти символов,
 * состоящую из случайных чисел от 1 до 9.
 */
$str = '';
for ($i = 1; $i <= 6; $i++) {
    $str .= rand(1, 9);
}
$output_data_11 = $str;

/**
 * 12 Дан массив с числами. 
 * С помощью цикла найдите сумму элементов этого массива.
 */
$arr = range(1, 100);
$sum = 0;
foreach ($arr as $key) {
    $sum += $key;
}
$output_data_12 = 'Sum: ' . $sum;

/**
 * 13 Дан массив с числами. 
 * С помощью цикла найдите сумму квадратов элементов этого массива.
 */
$arr = range(1, 100);
$sum = 0;
foreach ($arr as $key) {
    $sum += $key ** 2;
}
$output_data_13 = 'Sum: ' . $sum;

/**
 * 14 Дан массив с числами. 
 * С помощью цикла найдите корень из суммы квадратов элементов этого массива. 
 * Результат округлите в меньшую сторону до целых.
 */
$arr = range(1, 100);
$sum = 0;
foreach ($arr as $key) {
    $sum += $key ** 2;
}
$sqrt = sqrt($sum);
$sqrt = floor($sqrt);
$output_data_14 = 'Sum: ' . $sqrt;

/**
 * 15 Дан массив с числами. Найдите сумму тех элементов массива, 
 * которые больше 0 и меньше 10
 */
$arr = range(1, 100);
$sum = 0;
foreach ($arr as $key) {
    if ($key > 0 and $key < 10) {
        $sum += $key;
    }
}
$output_data_15 = 'Sum: ' . $sum;

/**
 * 16 Дан массив с числами. Проверьте, что в нем есть 3 одинаковых числа подряд
 */
$arr = [1, 2, 4, 5, 5, 5, 6, 7, 7, 7, 4];
$length = count($arr);
for ($i = 0; $i < $length; $i++) {
    //Массив для хранения промежуточных чисел
    $repeat = [];
    // Итерация $j три раза, или пока не будет достигнут конец массива
    for ($j = 0; $j + $i < $length and $j + $i < $i + 3; $j++) {
        $repeat[] = $arr[$i + $j];
    }
    if (
        count($repeat) == 3 
        and ($repeat[0] == $repeat[1] and $repeat[1] == $repeat[2])
    ) {
        $output_data_16 = "<p>Number $repeat[0] repeats 3 times </p>";
        unset($repeat);
    } 
}

/**
 * 17 С помощью цикла сформируйте строку '1223334444...'
 * и так далее до заданного числа
 */
$size = 10;
$str = '';
for ($i = 1; $i <= $size; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        $str .= $i;
    }
}
$output_data_17 = $str;

/**
 * 18 Дан многомерный массив. 
 * С помощью цикла выведите строки в формате 'имя-зарплата'.
 */
$output_data_18 = '';
$arr = [
    0=>['name'=>'Коля', 'salary'=>300],
    1=>['name'=>'Вася', 'salary'=>400],
    2=>['name'=>'Петя', 'salary'=>500],
];
foreach ($arr as $key => $val) {
    $output_data_18 .= "<p>" . $val['name'] ." - " . $val['salary'] . " $ </p>";
}

/**
 * 19 Заполните двумерный массив случайными числами от 1 до 10. 
 * В каждом подмассиве должно быть по 10 элементов. Должно быть 10 подмассивов.
 */
$arr = [];
for ($i = 1; $i <= 10; $i++) {
    for ($j = 1; $j <= 10; $j++) {
        $arr[$i][] = rand(1, 10);
    }
}
$output_data_19 = '<pre>' . print_r($arr) . '</pre>';

/**
 * 20 Напишите свой аналог функции
 * ucfirst (аналог - значит можно использовать все, 
 * что угодно, кроме этой функции).
 */
function userUcfirst($str)
{
    $step = 32;
    $ch = ord($str[0]);
    // Проверка не является ли первый символ заглавным
    if ($ch >= 97 and $ch <= 122) {
        $str[0] = chr($ch - 32);
    } 
    return $str;
}
$output_data_20 =  userUcfirst('some text');

/**
 * 21 Напишите свой аналог функции strrev. Решите задачу двумя способами.
 */
$output_data_21 = '';
function userStrrev1($str)
{
    $result_str = '';
    $length = strlen($str) - 1;
    for (; $length >= 0; $length--) {
        $result_str .= $str[$length];
    }
    return $result_str;
}

function userStrrev2($str)
{
    $result_str = '';
    $arr = str_split($str, 1);
    $arr = array_reverse($arr);
    $result_str = implode('', $arr);
    return $result_str;
}
$output_data_21 .= userStrrev1('some text') . '<br>';
$output_data_21 .= userStrrev2('some text');

/**
 * 22 Напишите свой аналог функции strlen.
 */
function userStrlen($str)
{
    $arr = str_split($str, 1);
    $length = count($arr);
    return $length;
}
$output_data_22 = userStrlen('data');

/**
 * 23 Поменяйте в строке большие буквы на маленькие и наоборот.
 */
function convertStrRegisters($str)
{
    $result_str = '';
    foreach (str_split($str) as $key) {
        $char = ord($key);
        if ($char >= 97 and $char <= 122) {
            $result_str .= chr($char - 32);
        } elseif ($char >= 65 and $char <= 90) {
            $result_str .= chr($char + 32);
        } else {
            $result_str .= chr($char);
        }
    }
    return $result_str;
}
$output_data_23 = convertStrRegisters('sOmE tExT');

/**
 * 24 Преобразуйте строку 'var_text_hello' в 'varTextHello'. 
 * Скрипт должен работать с любыми стоками такого рода
 */
function convertStr($str) {
    $str = str_replace('_', ' ', $str);
    $str = ucwords($str);
    $str = lcfirst($str);
    $str = str_replace(' ', '', $str);
    return $str;
}
$output_data_24 = convertStr('var_text_hello');

/**
 * 25 С помощью только одного цикла нарисуйте пирамидку
 */
$output_data_25 = '';
for ($i = 0; $i <= 9; $i++) {
    $output_data_25 .= str_repeat($i, $i) . "<br>";
}

/**
 * 26 Нарисуйте пирамиду, как показано на рисунке, 
 * только у вашей пирамиды должно быть не 5 рядов, 
 * а произвольное количество, оно задается так: 
 * $str = 'xxxxxxxx'; - это первый ряд пирамиды.
 */
$output_data_26 = '';
$start_string = 'xxxxxxxx';
while (strlen($start_string)) {
    $output_data_26 .= $start_string . "<br>";
    $start_string = substr($start_string, 1);
}

/**
 * 27 Дан массив с произвольными числами. 
 * Сделайте так, чтобы элемент повторился в массиве количество раз, 
 * соответствующее его числу. 
 * Пример: [1, 3, 2, 4] превратится в [1, 3, 3, 3, 2, 2, 4, 4, 4, 4].
 */
$arr = [1, 3, 2, 4];
$result_arr = [];
foreach ($arr as $key) {
    for ($i = 1; $i <= $key; $i++) {
        $result_arr[] = $key;
    }
}
$output_data_27 = '<pre>' . var_dump($result_arr) . '</pre>';

/**
 * 28 Дан массив с произвольными целыми числами. 
 * Сделайте так, чтобы первый элемент стал ключом второго элемента, 
 * третий элемент - ключом четвертого и так далее. 
 * Пример: [1, 2, 3, 4, 5, 6] превратится в [1=>2, 3=>4, 5=>6]. 
 */
$arr = [1, 2, 3, 4, 5, 6];
$result_arr = [];
while ($arr) {
    $result_arr[array_shift($arr)] = array_shift($arr);
}
$output_data_28 = '<pre>' . var_dump($result_arr) . '</pre>';

/**
 * 29 Дана строка. Удалите из этой строки четные символы
 */
$str = 'some text';
$result_str = '';
$i = 1;
while ($str) {
    $result_str .= substr($str, 0, 1);
    $str = substr($str, 2);
}
$output_data_29 = $result_str;

/**
 * 30 Дана строка. Поменяйте ее первый символ на второй и наоборот, 
 * третий на четвертый и наоборот, пятый на шестой и наоборот и так далее. 
 * То есть из строки '12345678' нужно сделать '21436587'.
 */
$str = '12345678';
$arr = str_split($str, 2);
$arr = array_map('strrev', $arr);
$str = implode('', $arr);
$output_data_30 = $str;

/**
 * 31 Сделайте аналог функции array_unique
 */
$arr = [1, 2, 3, 3, 4, 5, 1, 2, 3, 5, 1, 2, 3];

function userArrayUnique($arr)
{
    $result_arr = [];
    foreach ($arr as $key) {
        if (array_search($key, $result_arr) === false) {
            $result_arr[] = $key;
        }
    }
    return $result_arr;
}

$output_data_31 = '<pre>' . print_r(userArrayUnique($arr)) . '</pre>';

/**
 * 32 Сделайте функцию, противоположную функции array_unique. 
 * Ваша функция должна оставлять дубли и удалять элементы, не имеющие дублей.
 */
$arr = [1, 2, 3, 3, 4, 5, 1, 2, 3, 5, 1, 2, 3, 6, 7];

function oppositeUserArrayUnique($arr)
{
    $single_values = [];
    foreach ($arr as $key) {
        $arr_val = array_count_values($arr);
        if ($arr_val[$key] == 1) {
            $single_values[] = $key;
        }
    }
    $arr = array_diff($arr, $single_values);
    return $arr;
}
$output_data_32 = '<pre>' . print_r(oppositeUserArrayUnique($arr)) . '</pre>';

/**
 * 33 Напишите скрипт, который проверяет, 
 * является ли данное число простым 
 * (простое число - это то, которое делится только на 1 и на само себя)
 */
$output_data_33 = '';
function isPrime($num)
{
    $answer = "<p> $num is prime number </p>";
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            $answer = "<p> $num is not prime number </p>";
            break;
        }
    }
    $output_data_33 = $answer;
}
isPrime(6);

/**
 * 34 Дан массив со строками. Запишите в новый массив только те строки, 
 * которые начинаются с 'http://'
 */
$arr = ['http://some.com', 'site.en', 'https://google.com', 'http://test.site'];
$http_arr = [];
foreach ($arr as $key) {
    if (strpos($key, 'http://') === 0) {
        $http_arr[] = $key;
    }
}
$output_data_34 = '<pre>' . print_r($http_arr) . '</pre>';

require 'html/lesson_21_exercises.html';