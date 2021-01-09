<?php

/**
 * Упражнения к уроку 29 по учебнику Дмитрия Трепачёва
 * http://old.code.mu/tasks/php/regular/rabota-s-regulyarnymi-vyrazeniyami-v-php-glava-4.html
 */

require 'settings.php';

/** 
 * 1  С помощью позитивного и негативного просмотра найдите все строки 
 * по шаблону буква b, затем 3 буквы a и поменяйте 3 буквы a на знак '!'. 
 * То есть из 'baaa' нужно сделать 'b!'.
*/
$output_data_1 = '';
$str = 'baaa xaaa baaaa baa baaa';
$pattern = '#(?<=b)aaa#';
$output_data_1 = preg_replace($pattern, '!', $str);

/** 
 * 2 С помощью позитивного и негативного просмотра найдите все строки 
 * по шаблону любая буква, но не b, затем 3 буквы a и 
 * поменяйте 3 буквы a на знак '!'. То есть из, к примеру, 
 * 'waaa' нужно сделать 'w!', а 'baaa' не поменяется.
*/
$output_data_2 = '';
$str = 'waaa baaa caaa';
$pattern = '#(?<!b)aaa#';
$output_data_2 = preg_replace($pattern, '!', $str);

/** 
 * 3 С помощью позитивного и негативного просмотра найдите все строки 
 * по шаблону 3 буквы a, затем буква b и поменяйте 3 буквы a на знак '!'. 
 * То есть из 'aaab' нужно сделать '!b'.
*/
$output_data_3 = '';
$str = 'aaax aaab aaav';
$pattern = '#aaa(?=b)#';
$output_data_3 = preg_replace($pattern, '!', $str);

/** 
 * 4  С помощью позитивного и негативного просмотра найдите все строки 
 * по шаблону 3 буквы a, затем любая буква, но не b и поменяйте 3 буквы a 
 * на знак '!'. То есть из, к примеру, 
 * 'aaaw' нужно сделать '!w', а 'aaab' не поменяется.
*/
$output_data_4 = '';
$str = 'aaax aaab aaav';
$pattern = '#aaa(?!b)#';
$output_data_4 = preg_replace($pattern, '!', $str);

/** 
 * 5 Дана строка со звездочками 'aaa * bbb ** eee * **'. 
 * Замените на '!' только одиночные звездочки, но не двойные.
*/
$output_data_5 = '';
$str = 'aaa * bbb ** eee * **';
$pattern = '#(?<!\*)\*(?!\*)#';
$output_data_5 = preg_replace($pattern, '!', $str);

/** 
 * 6 Дана строка со звездочками 'aaa * bbb ** eee *** kkk ****'. 
 * Замените на '!' только двойные звездочки, но не одиночные или тройные и более.
*/
$output_data_6 = '';
$str = 'aaa * bbb ** eee *** kkk ****';
$pattern = '#(?<!\*)\*\*(?!\*)#';
$output_data_6 = preg_replace($pattern, '!', $str);

/** 
 * 7 С помощью позитивного и негативного просмотра найдите 
 * две одинаковые идущие подряд буквы и первую поменяйте на '!'
*/
$output_data_7 = '';
$str = 'abc * ddr * str * tsr *';
$pattern = '#([a-z])(?=\1)#';
$output_data_7 = preg_replace($pattern, '!', $str);

/** 
 * 8 С помощью позитивного и негативного просмотра найдите две одинаковые 
 * идущие подряд буквы и вторую поменяйте на '!'.
*/
$output_data_8 = '';
$str = 'abc * ddr * str * tsr *';
$pattern = '#(?<=([a-z]))\1#';
$output_data_8 = preg_replace($pattern, '!', $str);

/** 
 * 9 Дана строка с целыми числами. 
 * С помощью регулярки преобразуйте строку так, 
 * чтобы вместо этих чисел стояли их квадраты.
*/
$output_data_9 = '';
$str = '1 2 3 4 5 6 7 8';
$pattern = '#\d+#';
$output_data_9 = preg_replace_callback($pattern, 'sqr', $str);
function sqr($matches)
{
    $result = '';
    foreach ($matches as $key) {
        $result .= ' ' . pow($key, 2);
    }
    return $result;
}

/** 
 * 10 Дана строка с целыми числами. 
 * Найдите числа, стоящие в кавычках и увеличьте их в два раза. 
 * Пример: из строки 2aaa'3'bbb'4' сделаем строку 2aaa'6'bbb'8'.
*/
$output_data_10 = '';
$str = "2aaa'3'bbb'4'";
$pattern = '#\'(\d)\'#';
$output_data_10 = preg_replace_callback($pattern, 'increase', $str);
function increase($matches)
{
    return $matches[1] * 2;
}


require 'html/lesson_29_exercises.html';