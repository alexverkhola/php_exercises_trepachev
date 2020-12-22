<?php

/**
 * Упражнения к уроку 22 по учебнику Дмитрия Трепачёва
 * http://old.code.mu/tasks/php/practice/praktika-po-napisaniyu-prostyh-skriptov-php.html.
 */
require 'settings.php';

/**
 * 1  По заходу на страницу выведите сколько дней осталось до нового года.
 */
function daysToNewYear()
{
    $current_year = date('Y', time());
    $new_year = $current_year + 1;
    $current_time = time();
    $new_year_time = mktime(0, 0, 0, 1, 1, $new_year);
    $diff = $new_year_time - $current_time;
    $days = round($diff / (60 * 60 * 24));

    return $days;
}

$output_data_0 = '<p>До Нового Года осталось '.daysToNewYear().' дней</p>';

/**
 * 2 Дан инпут и кнопка. В этот инпут вводится год.
 * По нажатию на кнопку выведите на экран, високосный он или нет.
 *
 * submit = form_1_submit
 * input = year_input
 */
$output_data_1 = '';
if (isset($_GET['form_1_submit'])) {
    $year = strip_tags($_GET['year_input']);
    if (is_numeric($year)) {
        if (date('L', mktime(0, 0, 0, 1, 1, $year))) {
            $output_data_1 = "$year високосный";
        } else {
            $output_data_1 = "$year не високосный";
        }
    } else {
        $output_data_1 = 'недопустимый формат данных';
    }
}

/**
 * 3 Дан инпут и кнопка. В этот инпут вводится дата в формате '01.12.1990'.
 * По нажатию на кнопку выведите на экран день недели, соответствующий
 * этой дате, например, 'воскресенье'.
 *
 * submit = form_2_submit
 * input = date_input
 */
$output_data_3 = '';
if (isset($_GET['form_2_submit'])) {
    $date = date_create($_GET['date_input']);
    $day = date_format($date, 'l');
    $output_data_2 = $day;
}

/**
 * 4  По заходу на страницу выведите текущую дату в формате
 * '12 мая 2015 года, воскресенье'.
 */
$output_data_4 = date('d F Y, l', time());

/**
 * 5 Дан инпут и кнопка. В этот инпут вводится дата рождения в формате
 * '01.12.1990'. По нажатию на кнопку выведите на экран сколько дней
 * осталось до дня рождения пользователя.
 *
 * input = date_birthday
 * submit = form_3_submit
 */
$output_data_5 = '';
function daysToBirthday($date)
{
    $current_year = date('Y', time());
    $birthday_time = mktime(0, 0, 0, $date[1], $date[0], $current_year);
    $current_time = time();

    // Текущий день для сравнения (может день рождения сегодня)
    $current_day = date('d.m.Y', time());
    $birthday_day = $date[0].'.'.$date[1].'.'.$current_year;
    if ($current_day == $birthday_day) {
        //День рождения сегодня
        $output_data_5 = 'День рождения сегодня';
    } elseif ($birthday_time < $current_time) {
        //день рождения прошел, ищем его в следующем году
        $birthday_time = mktime(0, 0, 0, $date[1], $date[0], $current_year + 1);
        $days = round(($birthday_time - $current_time) / (60 * 60 * 24));
        $output_data_5 = 'День рождения наступит через '.$days.' дней';
    } else {
        //День рождения не наступил, ищем его в текущем году
        $days = round(($birthday_time - $current_time) / (60 * 60 * 24));
        $output_data_5 = 'День рождения наступит через '.$days.' дней';
    }

    return $output_data_5;
}

if (isset($_GET['form_3_submit'])) {
    $data = strip_tags($_GET['date_birthday']);

    //Сравниваю входные данные с шаблоном
    if (preg_match("#[0-9]{2}\.[0-9]{2}\.[0-9]{4}#", $data)) {
        //Разбиваю входную дату
        $date = explode('.', strip_tags($_GET['date_birthday']));
        $output_data_5 = daysToBirthday($date);
    } else {
        $output_data_5 = 'Недопустимый формат данных';
    }
}

/**
 * 6 По заходу на страницу выведите сколько дней осталось до ближайшей
 * масленницы (последнее воскресенье весны).
 */
$current_time = time();
$pancake = strtotime('last sunday of May this year');

if ($current_time < $pancake) {
    $days = round(($current_time - $pancake) / (60 * 60 * 24));
} else {
    $pancake = strtotime('last sunday of May next year');
    $days = round(($current_time - $pancake) / (60 * 60 * 24));
}

$output_data_6 = '<p> До масленицы осталось '.$days.' дней </p>';

/**
 * 7 Дан инпут и кнопка. В этот инпут вводится дата рождения в формате '31.12'.
 *  По нажатию на кнопку выведите знак зодиака пользователя.
 *
 * input = date_birthday
 * submit = form_7_submit
 */
$output_data_7 = '';

function getZodiak($birthday)
{
    $zodiaks = [
        'Овен' => ['21.03', '20.04'],
        'Телец' => ['21.04', '21.05'],
        'Близнецы' => ['22.05', '21.06'],
        'Рак' => ['22.06', '22.07'],
        'Лев' => ['23.07', '21.08'],
        'Дева' => ['22.08', '23.09'],
        'Весы' => ['24.09', '23.10'],
        'Скорпион' => ['24.10', '23.11'],
        'Стрелец' => ['24.11', '22.12'],
        'Козерог' => ['23.12', '20.01'],
        'Водолей' => ['21.01', '19.02'],
        'Рыбы' => ['20.02', '20.03'],
    ];

    $birthday = explode('.', $birthday);
    $birthday = mktime(0, 0, 0, $birthday[1], $birthday[0]);
    
    foreach ($zodiaks as $key => $val) {
        $start_zodiak = explode('.', $val[0]);
        $end_zodiak = explode('.', $val[1]);

        $start_zodiak = mktime(0, 0, 0, $start_zodiak[1], $start_zodiak[0]);
        $end_zodiak = mktime(0, 0, 0, $end_zodiak[1], $end_zodiak[0]);

        if ($birthday >= $start_zodiak and $birthday <= $end_zodiak) {
            return "$key";
        }
    }

    return 'Что то пошло не так, проверте дату рождения';
}

if (isset($_GET['form_7_submit'])) {
    $date = strip_tags($_GET['date_birthday']);

    //Сравниваю входные данные с шаблоном
    if (preg_match("#[0-9]{2}\.[0-9]{2}#", $date, $matches)) {
        //Разбиваю входную дату
        $output_data_7 = "Ваш знак зодиака "  . getZodiak($matches[0]);
    } else {
        $output_data_7 = 'Недопустимый формат данных';
    }
}

/**
 * 8 По заходу на страницу ввыведите какой сегодня день по гороскопу
 */
$current_day = date('d.m');
$current_zodiak = getZodiak($current_day);
$output_data_8 = "Cейчас знак $current_zodiak";

/**
 * 9 Сделайте скрипт-гороскоп. Внутри него хранится массив гороскопов
 *  на несколько дней вперед для каждого знака зодиака.
 *  По заходу на страницу спросите у пользователя дату рождения, 
 *  определите его знак зодиака и выведите предсказание для этого знака зодиака 
 *  на текущий день.
 * 
 *  submit = form_submit_9
 *  input = date_birthday
 */
$output_data_9 = '';

function convertZodiakToEnglish($zodiak)
{
    $zodiaks = [
        'Овен' => 'aries',
        'Телец' => 'taurus',
        'Близнецы' => 'gemini',
        'Рак' => 'cancer',
        'Лев' => 'leo',
        'Дева' => 'virgo',
        'Весы' => 'libra',
        'Скорпион' => 'scorpio',
        'Стрелец' => 'saggitarius',
        'Козерог' => 'capricon',
        'Водолей' => 'aquarius',
        'Рыбы' => 'pisces',
    ];
    return $zodiaks[$zodiak];

}

function getGoroscop($symbol)
{
    $path = 'goroscop.xml';
    
    $obj = simplexml_load_file($path);
    foreach ($obj->$symbol as $key) {
        return $key->today;
    }
}

if (isset($_GET['form_9_submit'])) {
    $date = strip_tags($_GET['date_birthday']);

    //Сравниваю входные данные с шаблоном
    if (preg_match("#[0-9]{2}\.[0-9]{2}#", $date, $matches)) {
        //Разбиваю входную дату
        $goroscop_symbol = getZodiak($matches[0]);
        $output_data_9 = "Гороскоп  для "  . $goroscop_symbol . ".";
        $goroscop_symbol_en = convertZodiakToEnglish($goroscop_symbol);
        $output_data_9 .= getGoroscop($goroscop_symbol_en);
    } else {
        $output_data_9 = 'Недопустимый формат данных';
    }
}

/**
 * 10 Дан текстареа и кнопка. В текстареа вводится текст. 
 * По нажатию на кнопку выведите количество слов в тексте, количество символов 
 * в тексте, количество символов за вычетом пробелов.
 * 
 * input = user_text
 * submit = form_10_submit
 */
$output_data_10 = '';
if (isset($_GET['form_10_submit'])) {
    if (!empty($_GET['user_text'])) {
        $text = strip_tags($_GET['user_text']);
        // Для работы с русским текстом я посчитаю через массив
        // str_word_count не работает
        $words = count(explode(' ', $text));
        $symbols = strlen($text);

        $symbols_without_spaces = strlen(str_replace(' ', '', $text));

        $output_data_10 = "<p>$words слов </p>". 
                          "<p>$symbols символов</p>". 
                          "<p>$symbols_without_spaces символов без пробелов</p>";
    }
}

/**
 * 11 Дан текстареа и кнопка. В текстареа вводится текст. 
 * По нажатию на кнопку нужно посчитать процентное содержание 
 * каждого символа в тексте.
 * 
 * submit = form_11_submit
 * input = user_text
 */
$output_data_11 = '';

if (isset($_GET['form_11_submit'])) {
    if (!empty($_GET['user_text'])) {
        $text = strip_tags($_GET['user_text']);
        $text = str_split($text);
        $arr = array_count_values($text);
        $sum = array_sum($arr);

        $percent_by_symbol = round(100 / $sum, 3);
        foreach ($arr as $key => $val) {
            $output_data_11 .= "<p>Символ $key " .  
                               $val * $percent_by_symbol . 
                               " %</p>";
        }
    }
}

/**
 * 12  Дан массив слов, инпут и кнопка. В инпут вводится набор букв. 
 * По нажатию на кнопку выведите на экран те слова, которые содержат
 * в себе все введенные буквы.
 * 
 * submit = form_12_submit
 * input = user_text
 */
$output_data_12 = '';

$text = "Дан текстареа и кнопка. В текстареа вводится текст. " . 
        "По нажатию на кнопку нужно посчитать процентное содержание " . 
        "каждого символа в тексте";
$words = explode(' ', $text);

if (isset($_GET['form_12_submit'])) {
    if (!empty($_GET['user_text'])) {
        $letters = strip_tags($_GET['user_text']);
        $letters = str_replace(' ', '', $letters);
        $letters = mb_str_split($letters);

        foreach ($words as $word) {
            foreach ($letters as $letter) {
                if (mb_strripos($word, $letter) !== false) {
                    $output_data_12 .= " $word ";
                }
            }
        }
    }
}

/**
 * 13  Дан текстареа и кнопка. В текстареа через пробел вводятся слова. 
 * По нажатию на кнопку выведите слова в таком виде: 
 * сначала заголовок 'слова на букву а' и под ним все слова, 
 * которые начинаются на 'а', потом заголовок 'слова на букву б' 
 * и все слова на 'б' и так далее. Буквы должны идти в алфавитном порядке. 
 * Брать следует только те буквы, на которые начинаются наши слова. 
 * То есть: если нет слов, к примеру, на букву 'в' - 
 * такого заголовка тоже не будет.
 * 
 * submit = form_12_submit
 * input = user_text
 */
$output_data_13 = '';

if (isset($_GET['form_13_submit'])) {
    if (!empty($_GET['user_text'])) {
        $str = strip_tags($_GET['user_text']);
        $str = mb_strtolower($str);
        $arr = explode(' ', $str);
        $arr = array_unique($arr);
        sort($arr);

        unset($words);
        $words = [];

        foreach ($arr as $key) {
            $words[mb_substr($key, 0, 1)][] = $key;
        }

        foreach ($words as $key => $val) {
            $output_data_13 .= "<h3>Слова на букву $key:</h3>";
            $output_data_13 .= implode(' ', $val);
        }
    }
}

/**
 * 14 Дан инпут и кнопка. В этот инпут вводится строка на русском языке.
 * По нажатию на кнопку выведите на экран транслит этой строки.
 * 
 * submit = form_14_submit
 * input = user_text
 */
$output_data_14 = '';

function translit($str) {
    $alphabet = ['а' => 'a',
                'б' => 'b',
                'в' => 'v',
                'г' => 'g',
                'д' => 'd',
                'е' => 'e',
                'ё' => 'jo',
                'ж' => 'zh',
                'з' => 'z',
                'и' => 'i',
                'й' => 'j',
                'к' => 'k',
                'л' => 'l',
                'м' => 'm',
                'н' => 'n',
                'о' => 'o',
                'п' => 'p',
                'р' => 'r',
                'с' => 's',
                'т' => 't',
                'у' => 'u',
                'ф' => 'f',
                'х' => 'h',
                'ц' => 'cz',
                'ч' => 'ch',
                'ш' => 'sh',
                'щ' => 'shh',
                'ъ' => '',
                'ы' => 'y',
                'ь' => '',
                'э' => 'e',
                'ю' => 'yu',
                'я' => 'ya',
                ' ' => ' ',
                '.' => '.' ];

    $str = mb_strtolower($str);
    $str = mb_str_split($str, 1);
    $result = '';
    

    foreach ($str as $val) {
        $result .= $alphabet[$val];
    }

    return $result;
}

if (isset($_GET['form_14_submit'])) {
    if (!empty($_GET['user_text'])) {
        $str = strip_tags($_GET['user_text']);
        $output_data_14 .= translit($str);
    }
}

/**
 * 15 Дан инпут, 2 радиокнопочки и кнопка. В инпут вводится строка, 
 * а с помощью радиокнопочек выбирается - нужно преобразовать эту строку 
 * в транслит или из транслита обратно.
 * 
 * submit = form_15_submit
 * input = user_text
 * radio = translate_to (in, back)
 * 
 * В связи с необычайной сложностью и времязатратностью необходимой для
 * реализации обратного транслита, и что бы не создавать пародию
 * я откладываю это задание
 */

/**
 * 16  Дан массив с вопросами и правильными ответами. 
 * Реализуйте тест: выведите на экран все вопросы, под каждым инпут. 
 * Пользователь читает вопрос, пишет свой ответ в инпут. Когда вопросы 
 * заканчиваются - он жмет на кнопку, страница обновляется и вместо инпутов 
 * под вопросами появляется сообщение вида: 'ваш ответ: ... верно!' 
 * или 'ваш ответ: ... неверно! Правильный ответ: ...'. 
 * Правильно отвеченные вопросы должны гореть зеленым цветом,
 * а неправильно - красным.
 */
$output_data_16 = '';
$questions = [
    "1 + 1" => "2",
    "2 + 2 * 2" => "6",
    "12 + 13" => "25",
    "100 / 20" => "5",
    "9 * 9" => "81"
];

if (!isset($_GET['form_16_submit'])) {
    foreach ($questions as $key => $val) {
        $output_data_16 .= 
        "<p>$key</p>";
        $output_data_16 .= 
        "<p><input type='hidden' name='". $key ."' value=''>";
        $output_data_16 .= 
        "<input type='text' name='". $key ."' value=''></p>";
    }
    $output_data_16 .= 
    "<p><input type='submit' value='Отправить' name='form_16_submit'></p>";
} elseif (isset($_GET['form_16_submit'])) {
    foreach ($questions as $key => $val) {
        $key = str_replace(' ', '_', $key);
        $answer = strip_tags($_GET[$key]);
        if ($answer == $val) {
            $key = str_replace('_', ' ', $key);
            $output_data_16 .= 
            "<p class='right_answer'> $key Ваш ответ: $answer. Правильно </p>";
        } elseif ($answer == '') {
            $key = str_replace('_', ' ', $key);
            $output_data_16 .= 
            "<p class='no_answer'> $key Вы не дали ответ. </p>";
        } else {
            $key = str_replace('_', ' ', $key);
            $output_data_16 .= 
            "<p class='wrong_answer'> $key Ваш ответ: $answer. Ошибка </p>";
        }
    }
}

/**
 * 17 Модифицируем предыдущую задачу: пусть теперь тест показывает 
 * варианты ответов и радиокнопочки. Пользователь должен выбрать один из
 * вариантов.
 * 
 * submit = form_17_data
 */
$output_data_17 = '';
unset($questions);

$questions = [
    "1 + 1" => ["2", "3", "4"],
    "2 + 2 * 2" => ["6", "7", "8"],
    "12 + 13" => ["25", "26", "27"],
    "100 / 20" => ["5", "6", "7"],
    "9 * 9" => ["81", "82", "83"]
];

if (!isset($_GET['form_17_submit'])) {
    foreach ($questions as $question => $answers) {
        $output_data_17 .= 
        "<p>$question</p>";
        $output_data_17 .= 
        "<p><input type='hidden' name='". $question ."' value=''>";
        foreach ($answers as $answer) {
            $output_data_17 .= 
            "$answer" .
            "<input type='radio' name='". $question ."' value='" . $answer . "'>";
        }
        $output_data_17 .= "</p>";
    }
    $output_data_17 .= 
    "<p><input type='submit' value='Отправить' name='form_17_submit'></p>";
} elseif (isset($_GET['form_17_submit'])) {
    foreach ($questions as $key => $val) {
        $key = str_replace(' ', '_', $key);
        $answer = strip_tags($_GET[$key]);
        if ($answer == $val[0]) {
            $key = str_replace('_', ' ', $key);
            $output_data_17 .= 
            "<p class='right_answer'> $key Ваш ответ: $answer. Правильно </p>";
        } elseif ($answer == '') {
            $key = str_replace('_', ' ', $key);
            $output_data_17 .= 
            "<p class='no_answer'> $key Вы не дали ответ. </p>";
        } else {
            $key = str_replace('_', ' ', $key);
            $output_data_17 .= 
            "<p class='wrong_answer'> $key Ваш ответ: $answer. Ошибка </p>";
        }
    }
}

/**
 *  18 Модифицируем предыдущую задачу: пусть теперь на один вопрос может быть
 *  несколько правильных ответов. Пользователь должен отметить 
 *  один или несколько чекбоксов.
 */

$output_data_18 = '';
unset($questions);

$questions = [
    "1 + 1" => ["2", "3", "4", "2"],
    "2 + 2 * 2" => ["6", "7", "8", "6"],
    "12 + 13" => ["25", "26", "27", "25"],
    "100 / 20" => ["5", "6", "7", "5"],
    "9 * 9" => ["81", "82", "83", "81"]
];

if (!isset($_GET['form_18_submit'])) {
    foreach ($questions as $question => $answers) {
        $output_data_18 .= 
        "<p>$question</p>";
        $output_data_18 .= 
        "<p><input type='hidden' name='". $question ."' value=''>";
        foreach ($answers as $answer) {
            $output_data_18 .= 
            "$answer" .
            "<input type='checkbox' name='". 
            $question ."' value='" . 
            $answer . "'>";
        }
        $output_data_18 .= "</p>";
    }
    $output_data_18 .= 
    "<p><input type='submit' value='Отправить' name='form_18_submit'></p>";
} elseif (isset($_GET['form_18_submit'])) {
    foreach ($questions as $key => $val) {
        $key = str_replace(' ', '_', $key);
        $answer = strip_tags($_GET[$key]);
        if ($answer == $val[0] or $answer == $val[3]) {
            $key = str_replace('_', ' ', $key);
            $output_data_18 .= 
            "<p class='right_answer'> $key Ваш ответ: $answer. Правильно </p>";
        } elseif ($answer == '') {
            $key = str_replace('_', ' ', $key);
            $output_data_18 .= 
            "<p class='no_answer'> $key Вы не дали ответ. </p>";
        } else {
            $key = str_replace('_', ' ', $key);
            $output_data_18 .= 
            "<p class='wrong_answer'> $key Ваш ответ: $answer. Ошибка </p>";
        }
    }
}

/**
 * 19  Напишите скрипт, который будет считать факториал числа. 
 * Само число вводится в инпут и после нажатия на кнопку
 * пользователь должен увидеть результат.
 */
$output_data_19 = '';

if (!isset($_GET['form_19_submit'])) {
    $output_data_19 .= 
    "<p> Введите число для поиска факториала </p>" . 
    "<p> <input type='number' name='factorial'>" . 
    "<p> <input type='submit' name='form_19_submit' value='Отправить'";
        
} elseif (isset($_GET['form_19_submit']) && isset($_GET['factorial'])) {
    $number = strip_tags($_GET['factorial']);
    if (is_numeric($number)) {
        $fact = gmp_fact($number);
        $fact = gmp_strval($fact);
        $output_data_19 = "<p>Факториал числа $number</p>" .
                          "<p>" . $fact . "</p>";
    } else {
        $output_data_19 = "<p>Вы ввели не число</p>";
    }
}

/**
 * 20 Напишите скрипт, который будет находить корни квадратного уравнения. 
 * Для этого сделайте 3 инпута, в которые будут вводиться коэффициенты уравнения.
 *
 * submit = form_20_submit
 * input = val_1, val_2, val_3
 */
$output_data_20 = '';

function eqRoots($a, $b, $c) {
    if ($a==0) return false;

    if ($b==0) {
        if ($c<0) {
            $x1 = sqrt(abs($c/$a));
            $x2 = sqrt(abs($c/$a));
        } elseif ($c==0) {
            $x1 = $x2 = 0;
        } else {
            $x1 = sqrt($c/$a).'i';
            $x2 = -sqrt($c/$a).'i';
        }
    } else {
        $d = $b*$b-4*$a*$c;
        if ($d>0) {
            $x1 = (-$b+sqrt($d))/2*$a;
            $x2 = (-$b-sqrt($d))/2*$a;
        } elseif ($d==0) {
            $x1 = $x2 = (-$b)/2*$a;
        } else {
            $x1 = -$b . '+' . sqrt(abs($d)) . 'i';
            $x2 = -$b . '-' . sqrt(abs($d)) . 'i';
        }
    }
    return array($x1, $x2);
}

if (isset($_GET['form_20_data'])) {
    if (
        !empty($_GET['val_1']) &&
        !empty($_GET['val_2']) &&
        !empty($_GET['val_3'])
    ) {
        $val_1 = strip_tags($_GET['val_1']);
        $val_2 = strip_tags($_GET['val_2']);
        $val_3 = strip_tags($_GET['val_3']);

        $result = eqRoots($val_1, $val_2, $val_3);
        $output_data_20 = $result[0] . "<br>" . $result[1];
    }
}

/**
 * 21 Даны 3 инпута. В них вводятся числа. 
 * Проверьте, что эти числа являются тройкой Пифагора:
 * квадрат самого большого числа должен быть равен
 * сумме квадратов двух остальных.
 * 
 * submit = form_21_submit
 * input = val_1, vinput = val_1, val_2, val_3al_2, val_3
 */
$output_data_21 = '';

function pifagor($a, $b, $c) {
    $arr = [$a, $b, $c];
    sort($arr);

    if (pow($arr[2], 2) == (pow($arr[0], 2) + pow($arr[1], 2))) {
        return "Числа являются тройкой Пифагора";
    }
    return "Числа не являются тройкой Пифагора";
}

if (isset($_GET['form_21_data'])) {
    if (
        !empty($_GET['val_1']) &&
        !empty($_GET['val_2']) &&
        !empty($_GET['val_3'])
    ) {
        $val_1 = strip_tags($_GET['val_1']);
        $val_2 = strip_tags($_GET['val_2']);
        $val_3 = strip_tags($_GET['val_3']);

        $output_data_21 = pifagor($val_1, $val_2, $val_3);
    }
}

/**
 * 22 Дан инпут и кнопка. В инпут вводится число.
 * По нажатию на кнопку выведите список делителей этого числа.
 * 
 * submit = form_22_submit
 * input = val
 */
$output_data_22 = '';

function getDivisors($num) {
    $arr = [];
    for ($i = $num; $i > 0; $i--) {
        if ($num % $i == 0) {
            $arr[] = $i;
        }
    }
    return $arr;
}

if (isset($_GET['form_22_data'])) {
    if (!empty($_GET['val'])) {
        $val = strip_tags($_GET['val']);

        $arr = getDivisors($val);
        foreach ($arr as $key) {
            $output_data_22 .= " $key ";
        }
    }
}

/**
 * 23  Дан инпут и кнопка. В инпут вводится число. 
 * По нажатию на кнопку разложите число на простые множители.
 * 
 * submit = form_23_submit
 * input = val
 */
$output_data_23 = '';

function getFactors($num) {
    $arr = [];
    for ($i = $num; $i > 0; $i--) {
        for ($j = 1; $j <= $num; $j++) {
            if ($j * $i == $num) {
                $arr[] = [$j, $i];
            }
        }
    }
    return $arr;
}

if (isset($_GET['form_23_data'])) {
    if (!empty($_GET['val'])) {
        $val = strip_tags($_GET['val']);
        
        $arr = getFactors($val);

        foreach ($arr as $key => $val) {
            $output_data_23 .= " $val[0] * $val[1] <br>";
        }
    }
}

/**
 * 24 Даны 2 инпута и кнопка. В инпуты вводятся числа.
 * По нажатию на кнопку выведите список общих делителей этих двух чисел
 * 
 * submit = form_24_submit
 * input = val_1, val_2
 */
$output_data_24 = '';

if (isset($_GET['form_24_data'])) {
    if (!empty($_GET['val_1'] && !empty($_GET['val_2']))) {
        $val_1 = strip_tags($_GET['val_1']);
        $val_2 = strip_tags($_GET['val_2']);
        
        $arr_1 = getDivisors($val_1);
        $arr_2 = getDivisors($val_2);

        $common_divisors = array_intersect($arr_1, $arr_2);

        $output_data_24 .= "<p>Общие делители для чисел $val_1 и $val_2: </p>";
        foreach ($common_divisors as $key) {
            $output_data_24 .= " $key <br>";
        }
    }
}

/**
 * 25  Даны 2 инпута и кнопка. В инпуты вводятся числа. 
 * По нажатию на кнопку выведите наибольший общий делитель этих двух чисел.
 *
 *  submit = form_25_submit
 *  input = val_1, val_2
 */
$output_data_25 = '';

if (isset($_GET['form_25_data'])) {
    if (!empty($_GET['val_1'] && !empty($_GET['val_2']))) {
        $val_1 = strip_tags($_GET['val_1']);
        $val_2 = strip_tags($_GET['val_2']);
        
        $arr_1 = getDivisors($val_1);
        $arr_2 = getDivisors($val_2);

        $common_divisors = array_intersect($arr_1, $arr_2);

        $output_data_25 .= 
            "<p>Наибольий общий делитель для чисел $val_1 и $val_2: </p>";
            $output_data_25 .=  max($common_divisors) . "<br>";
    }
}

/**
 * 26 Даны 2 инпута и кнопка. В инпуты вводятся числа. 
 * По нажатию на кнопку выведите наименьшее число, которое делится и на одно,
 * и на второе из введенных чисел.
 *
 *  submit = form_26_submit
 *  input = val_1, val_2
 */
$output_data_26 = '';

if (isset($_GET['form_26_data'])) {
    if (!empty($_GET['val_1'] && !empty($_GET['val_2']))) {
        $val_1 = strip_tags($_GET['val_1']);
        $val_2 = strip_tags($_GET['val_2']);
        
        $arr_1 = getDivisors($val_1);
        $arr_2 = getDivisors($val_2);

        $common_divisors = array_intersect($arr_1, $arr_2);

        $output_data_26 .= 
            "<p>Наименьший общий делитель для чисел $val_1 и $val_2: </p>";
            $output_data_26 .=  min($common_divisors) . "<br>";
    }
}

/**
 * 27 Даны 3 селекта и кнопка. 
 * Первый селект - это дни от 1 до 31, второй селект - 
 * это месяцы от января до декабря, а третий - это годы от 1990 до 2025. 
 * С помощью этих селектов можно выбрать дату. По нажатию на кнопку выведите 
 * на экран день недели, соответствующий этой дате, например, 'воскресенье'.
 */
$output_data_27 = '';
$form = '';

function buildForm() {
    $form = '';
    $form .= "<select name='day'>";
    for ($i = 1; $i <= 31; $i++) {
        $form .= "<option name='{$i}' value='{$i}'>$i</option>";
    }
    $form .= "</select>";
    $form .= "<select name='month'>";
    for ($i = 1; $i <= 12; $i++) {
        $form .= "<option name='{$i}' value='{$i}'>$i</option>";
    }
    $form .= "</select>";
    $form .= "<select name='year'>";
    for ($i = 1990; $i <= 2025; $i++) {
        $form .= "<option name='{$i}' value='{$i}'>$i</option>";
    }
    $form .= "</select>";
    return $form;
}

$form = buildForm();

if (isset($_GET['form_27_data'])) {
    if (
        !empty($_GET['day']) && 
        !empty($_GET['month']) && 
        !empty($_GET['year'])
    ) {
        $day = strip_tags($_GET['day']); 
        $month = strip_tags($_GET['month']); 
        $year = strip_tags($_GET['year']); 
        
        $current_day = date('l', mktime(0, 0, 0, $month, $day, $year));
        $output_data_27 .= $current_day;
    }
}


require 'html/lesson_22_exercises.html';
