<?php

$str = 'test.com site.ua asus.us';
// echo preg_match_all('#([a-z]+)\.([a-z]{2,3})#', $str, $matches) . "\n";
echo preg_replace('#([a-z]+)\.([a-z]{2,3})#', '$2.$1', $str) . "\n";
// echo $str;
// print_r($matches);

