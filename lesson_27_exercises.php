<?php

/**
 * Упражнения к уроку 27 по учебнику Дмитрия Трепачёва
 * http://old.code.mu/books/php/regular/rabota-s-regulyarnymi-vyrazeniyami-v-php-glava-2.html
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
    // print_r($matches);
}

/** 
 * 1 Дана строка 'aa aba abba abbba abbbba abbbbba'. 
 * Напишите регулярку, которая найдет строки abba, abbba, abbbba и только их.
*/
$str = 'aa aba abba abbba abbbba abbbbba';
$pattern = '#ab{2,4}a#';
$output_data_1 = findMatches($str, $pattern);

/** 
 * 2 Дана строка 'aa aba abba abbba abbbba abbbbba'.
 * Напишите регулярку, которая найдет строки вида aba, 
 * в которых 'b' встречается менее 3-х раз (включительно). 
*/
$str = 'aa aba abba abbba abbbba abbbbba';
$pattern = '#ab{0,3}a#';
$output_data_2 = findMatches($str, $pattern);

/** 
 * 3 Дана строка 'aa aba abba abbba abbbba abbbbba'. 
 * Напишите регулярку, которая найдет строки вида aba, 
 * в которых 'b' встречается более 4-х раз (включительно). 
*/
$str = 'aa aba abba abbba abbbba abbbbba';
$pattern = '#ab{4,}a#';
$output_data_3 = findMatches($str, $pattern);

/** 
 * 4 Дана строка 'a1a a2a a3a a4a a5a aba aca'. 
 * Напишите регулярку, которая найдет строки, в которых по краям стоят буквы 
 * 'a', а между ними одна цифра.
*/
$str = 'a1a a2a a3a a4a a5a aba aca';
$pattern = '#a\da#';
$output_data_4 = findMatches($str, $pattern);

/** 
 * 5 Дана строка 'a1a a22a a333a a4444a a55555a aba aca'. 
 * Напишите регулярку, которая найдет строки, 
 * в которых по краям стоят буквы 'a', а между ними любое количество цифр.
*/
$str = 'a1a a22a a333a a4444a a55555a aba aca';
$pattern = '#a\d+a#';
$output_data_5 = findMatches($str, $pattern);

/** 
 * 6 Дана строка 'aa a1a a22a a333a a4444a a55555a aba aca'. 
 * Напишите регулярку, которая найдет строки, 
 * в которых по краям стоят буквы 'a', а между ними любое количество цифр 
 * (в том числе и ноль цифр, то есть строка 'aa').
*/
$str = 'aa a1a a22a a333a a4444a a55555a aba aca';
$pattern = '#a\d*a#';
$output_data_6 = findMatches($str, $pattern);

/** 
 * 7 Дана строка 'avb a1b a2b a3b a4b a5b abb acb'. 
 * Напишите регулярку, которая найдет строки следующего вида: 
 * по краям стоят буквы 'a' и 'b', а между ними - не число. 
*/
$str = 'avb a1b a2b a3b a4b a5b abb acb';
$pattern = '#a\Db#';
$output_data_7 = findMatches($str, $pattern);

/** 
 * 8 Дана строка 'ave a#b a2b a$b a4b a5b a-b acb'. 
 * Напишите регулярку, которая найдет строки следующего вида: 
 * по краям стоят буквы 'a' и 'b', а между ними - не буква и не цифра. 
*/
$str = 'ave a#b a2b a$b a4b a5b a-b acb';
$pattern = '#a\Wb#';
$output_data_8 = findMatches($str, $pattern);

/** 
 * 9 Дана строка 'ave a#a a2a a$a a4a a5a a-a aca'. 
 * Напишите регулярку, которая заменит все пробелы на '!'.
*/
$str = 'ave a#a a2a a$a a4a a5a a-a aca';
$pattern = '#\s#';
$output_data_9 = preg_replace($pattern, '!', $str);

/** 
 * 10 Дана строка 'aba aea aca aza axa'. Напишите регулярку, 
 * которая найдет строки aba, aea, axa, не затронув остальных.
*/
$str = 'aba aea aca aza axa';
$pattern = '#a[bex]a#';
$output_data_10 = findMatches($str, $pattern);

/** 
 * 11  Дана строка 'aba aea aca aza axa a.a a+a a*a'. 
 * Напишите регулярку, которая найдет строки aba, a.a, a+a, a*a, 
 * не затронув остальных. 
*/
$str = 'aba aea aca aza axa a.a a+a a*a';
$pattern = '#a[b.+*]a#';
$output_data_11 = findMatches($str, $pattern);

/** 
 * 12  Напишите регулярку, которая найдет строки следующего вида:
 * по краям стоят буквы 'a', а между ними - цифра от 3-х до 7-ми.
*/
$pattern = '#a[3-7]a#';
$output_data_12 = $pattern;

/** 
 * 13 Напишите регулярку, которая найдет строки следующего вида: 
 * по краям стоят буквы 'a', а между ними - буква от a до g.
*/
$pattern = '#a[a-g]a#';
$output_data_13 = $pattern;

/** 
 * 14 Напишите регулярку, которая найдет строки следующего вида: 
 * по краям стоят буквы 'a', а между ними - буква от a до f и от j до z.
*/
$pattern = '#a[a-fj-z]a#';
$output_data_14 = $pattern;

/** 
 * 15  Напишите регулярку, которая найдет строки следующего вида: 
 * по краям стоят буквы 'a', а между ними - буква от a до f и от A до Z. 
*/
$str = '';
$pattern = '#a[a-fA-Z]a#';
$output_data_15 = $pattern;

/** 
 * 16 Дана строка 'aba aea aca aza axa a-a a#a'. Напишите регулярку, 
 * которая найдет строки следующего вида: 
 * по краям стоят буквы 'a', а между ними - не 'e' и не 'x'.
*/
$str = 'aba aea aca aza axa a-a a#a';
$pattern = '#a[^ex]a#';
$output_data_16 = preg_replace($pattern, '!', $str);

/** 
 * 17 Дана строка 'wйw wяw wёw wqw'. 
 * Напишите регулярку, которая найдет строки следующего вида: 
 * по краям стоят буквы 'w', а между ними - буква кириллицы.
*/
$str = 'wйw wяw wёw wqw';
$pattern = '#w[а-яА-Я]w#u';
$output_data_17 = findMatches($str, $pattern);

/** 
 * 18 Дана строка 'aAXa aeffa aGha aza ax23a a3sSa'. 
 * Напишите регулярку, которая найдет строки следующего вида: 
 * по краям стоят буквы 'a', а между ними - маленькие латинские буквы, 
 * не затронув остальных. 
*/
$str = 'aAXa aeffa aGha aza ax23a a3sSa';
$pattern = '#a[a-z]+a#';
$output_data_18 = findMatches($str, $pattern);

/** 
 * 19 Дана строка 'aAXa aeffa aGha aza ax23a a3sSa'. 
 * Напишите регулярку, которая найдет строки следующего вида: 
 * по краям стоят буквы 'a', а между ними - маленькие и большие латинские буквы,
 * не затронув остальных. 
*/
$str = 'aAXa aeffa aGha aza ax23a a3sSa';
$pattern = '#a[a-zA-Z]+a#';
$output_data_19 = findMatches($str, $pattern);

/** 
 * 20 Дана строка 'aAXa aeffa aGha aza ax23a a3sSa'. 
 * Напишите регулярку, которая найдет строки следующего вида: 
 * по краям стоят буквы 'a', а между ними - маленькие латинские буквы и цифры, 
 * не затронув остальных.
*/
$str = 'aAXa aeffa aGha aza ax23a a3sSa';
$pattern = '#a[a-z0-9]+a#';
$output_data_20 = findMatches($str, $pattern);

/** 
 * 21 Дана строка 'ааа ббб ёёё ззз ййй ААА БББ ЁЁЁ ЗЗЗ ЙЙЙ'. 
 * Напишите регулярку, которая найдет все слова по шаблону: 
 * любая кириллическая буква любое количество раз.
*/
$str = 'ааа ббб ёёё ззз ййй ААА БББ ЁЁЁ ЗЗЗ ЙЙЙ';
$pattern = '#[а-яА-ЯЁё]+#u';
$output_data_21 = findMatches($str, $pattern);

/** 
 * 22 Дана строка 'aaa aaa aaa'. 
 * Напишите регулярку, которая заменит первое 'aaa' на '!'. 
*/
$str = 'aaa aaa aaa';
$pattern = '#^aaa#';
$output_data_22 = preg_replace($pattern, '!', $str);

/** 
 * 23 Дана строка 'aaa aaa aaa'. 
 * Напишите регулярку, которая заменит последнее 'aaa' на '!'.
*/
$str = 'aaa aaa aaa';
$pattern = '#aaa$#';
$output_data_23 = preg_replace($pattern, '!', $str);

/** 
 * 24 Дана строка 'aeeea aeea aea axa axxa axxxa'. 
 * Напишите регулярку, которая найдет строки следующего вида: 
 * по краям стоят буквы 'a', а между ними - или буква 'e' любое количество раз 
 * или по краям стоят буквы 'a', а между ними - буква 'x' любое количество раз.
*/
$str = 'aeeea aeea aea axa axxa axxxa';
$pattern = '#a(e+|x+)a#';
$output_data_24 = findMatches($str, $pattern);

/** 
 * 25 Дана строка 'aeeea aeea aea axa axxa axxxa'. 
 * Напишите регулярку, которая найдет строки следующего вида: 
 * по краям стоят буквы 'a', а между ними - или буква 'e' два раза 
 * или буква 'x' любое количество раз.
*/
$str = 'aeeea aeea aea axa axxa axxxa';
$pattern = '#a(ee|x+)a#';
$output_data_25 = findMatches($str, $pattern);

/** 
 * 26 Дана строка 'xbx aca aea abba adca abea'. 
 * Напишите регулярку, которая вокруг каждого слова вставит '!' 
 * (получится '!xbx! !aca! !aea! !abba! !adca! !abea!'). 
*/
$str = 'xbx aca aea abba adca abea';
$pattern = '#\b#';
$output_data_26 = preg_replace($pattern, '!', $str);

/** 
 * 27 Дана строка 'a\a abc'. 
 * Напишите регулярку, которая заменит строку 'a\a' на '!'. 
*/
$str = 'a\a abc';
$pattern = '#a\\\a#';
$output_data_27 = preg_replace($pattern, '!', $str);

/** 
 * 28 Дана строка 'a\a a\\a a\\\a'. 
 * Напишите регулярку, которая заменит строку 'a\\\a' на '!'.
*/
$str = 'a\a a\\a a\\\\\a';
$pattern = '#a\\\\{3}a#';
$output_data_28 = preg_replace($pattern, '!', $str);

/** 
 * 29 Дана строка 'bbb /aaa\ bbb /ccc\'. 
 * Напишите регулярку, которая найдет содержимое всех конструкций
 * /...\ и заменит их на '!'.
*/
$str = 'bbb /aaa\\ bbb /ccc\\';
$pattern = '#/.+?\\\#';
$output_data_29 = preg_replace($pattern, '!', $str);

/** 
 * 30 Дана строка 'bbb <b> hello </b>, <b> world </b> eee'. 
 * Напишите регулярку, которая найдет содержимое тегов <b> и заменит их на '!'.
*/
$str = 'bbb <b> hello </b>, <b> world </b> eee';
$pattern = '#<b>.+?b>#';
$output_data_30 = preg_replace($pattern, '<b> ! </b>', $str);

require 'html/lesson_27_exercises.html';