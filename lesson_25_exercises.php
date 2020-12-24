<?php
/**
 * Упражнения к уроку 24 по учебнику Дмитрия Трепачёва
 * http://old.code.mu/tasks/php/regular/rabota-s-regulyarnymi-vyrazeniyami-v-php-glava-1.html
*/
require 'settings.php';

function findMatches($str, $pattern) 
{
    $result = '';
    preg_match_all($pattern, $str, $matches);
    foreach ($matches as $arr) {
        foreach ($arr as $key => $val){
            $result .= $val . ' ';
        }
    }
    return $result;
}
   

/** 
 * 1 Дана строка 'ahb acb aeb aeeb adcb axeb'. 
 * Напишите регулярку, которая найдет строки ahb, acb, aeb по шаблону: 
 * буква 'a', любой символ, буква 'b'
*/
$str = 'ahb acb aeb aeeb adcb axeb';
$pattern = '#a.b#';
$output_data_1 = findMatches($str, $pattern);

/** 
 * 2 Дана строка 'aba aca aea abba adca abea'. 
 * Напишите регулярку, которая найдет строки abba adca abea по шаблону: 
 * буква 'a', 2 любых символа, буква 'a'
*/
$str = 'aba aca aea abba adca abea';
$pattern = '#a..a#';
$output_data_2 = findMatches($str, $pattern);


/** 
 * 3 Дана строка 'aba aca aea abba adca abea'.
 * Напишите регулярку, которая найдет строки abba и abea, не захватив adca.
*/
$str = 'aba aca aea abba adca abea';
$pattern = '#ab.a#';
$output_data_3 = findMatches($str, $pattern);

/** 
 * 4 Дана строка 'aa aba abba abbba abca abea'. 
 * Напишите регулярку, которая найдет строки aba, abba, abbba по шаблону: 
 * буква 'a', буква 'b' любое количество раз, буква 'a'.
*/
$str = 'aa aba abba abbba abca abea';
$pattern = '#ab+a#';
$output_data_4 = findMatches($str, $pattern);

/** 
 * 5 Дана строка 'aa aba abba abbba abca abea'. 
 * Напишите регулярку, которая найдет строки aa, aba, abba, abbba по шаблону: 
 * буква 'a', буква 'b' любое количество раз (в том числе ниодного раза), 
 * буква 'a'
*/
$str = 'aa aba abba abbba abca abea';
$pattern = '#ab*a#';
$output_data_5 = findMatches($str, $pattern);

/** 
 * 6 Дана строка 'aa aba abba abbba abca abea'. 
 * Напишите регулярку, которая найдет строки aa, aba по шаблону: буква 'a',
 * буква 'b' один раз или ниодного, буква 'a'. Показать решение.
*/
$str = 'aa aba abba abbba abca abea';
$pattern = '#ab?a#';
$output_data_6 = findMatches($str, $pattern);

/** 
 * 7 Дана строка 'ab abab abab abababab abea'. 
 * Напишите регулярку, которая найдет строки по шаблону: строка 'ab' 
 * повторяется 1 или более раз.
*/
$output_data_7 = '';
$str = 'ab abab abab abababab abea';
$pattern = '#(ab)+#';
$matches = [];
preg_match_all($pattern, $str, $matches);

foreach ($matches[0] as $key => $val) {
    $output_data_7 .= $val . ' ';
}

/** 
 * 8 Дана строка 'a.a aba aea'. Напишите регулярку, 
 * которая найдет строку a.a, не захватив остальные.
*/
$str = 'a.a aba aea';
$pattern = '#a\.a#';
$output_data_8 = findMatches($str, $pattern);

/** 
 * 9 Дана строка '2+3 223 2223'. Напишите регулярку,
 * которая найдет строку 2+3, не захватив остальные.
*/
$str = '2+3 223 2223';
$pattern = '#2\+3#';
$output_data_9 = findMatches($str, $pattern);

/** 
 * 10 Дана строка '23 2+3 2++3 2+++3 345 567'. 
 * Напишите регулярку, которая найдет строки 2+3, 2++3, 2+++3, 
 * не захватив остальные (+ может быть любое количество). 
*/
$str = '23 2+3 2++3 2+++3 345 567';
$pattern = '#2\++3#';
$output_data_10 = findMatches($str, $pattern);

/** 
 * 11 Дана строка '23 2+3 2++3 2+++3 445 677'. 
 * Напишите регулярку, которая найдет строки 23, 2+3, 2++3, 2+++3, 
 * не захватив остальные.
*/
$str = '23 2+3 2++3 2+++3 445 677';
$pattern = '#2\+*3#';
$output_data_11 = findMatches($str, $pattern);

/** 
 * 12 Дана строка '*+ *q+ *qq+ *qqq+ *qqq qqq+'. 
 * Напишите регулярку, которая найдет строки *q+, *qq+, *qqq+, 
 * не захватив остальные.
*/
$str = '*+ *q+ *qq+ *qqq+ *qqq qqq+';
$pattern = '#\*q+\+#';
$output_data_12 = findMatches($str, $pattern);

/** 
 * 13 Дана строка '*+ *q+ *qq+ *qqq+ *qqq qqq+'. 
 * Напишите регулярку, которая найдет строки *+, *q+, *qq+, *qqq+, 
 * не захватив остальные.
*/
$str = '*+ *q+ *qq+ *qqq+ *qqq qqq+';
$pattern = '#\*q*\+#';
$output_data_13 = findMatches($str, $pattern);

/** 
 * 14 Дана строка 'aba accca azzza wwwwa'. Напишите регулярку, 
 * которая найдет все строки по краям которых стоят буквы 'a', 
 * Между буквами a может быть любой символ (кроме a).
*/
$str = 'aba accca azzza wwwwa';
$pattern = '#a.*?a#';
$output_data_14 = findMatches($str, $pattern);

require 'html/lesson_25_exercises.html';