<?php

$str = 'cc04441234567b_';
//$str = 'a';

$re = '/4{1,}/';
$re = '/4+/';

$re = '/4{0,}/';
$re = '/4*/';

$re = '/\d/';
$re = '/\d*b/';

$re = '/^((s+)(\d*))b/';

$re = '/[a-zA-Z]+/';

$re = '/\d/';
$re = '/[0-9]/';

$re = '/ss(\d{3})/';

$re = '/\d{0,1}/';
$re = '/\d?/';

$re = '/^\.$/';

$re = '/[abc]/ims'; // a|b|c
$re = '/[^04]*/';

$re = '/(.)\1{2}/';
$re = '/(?P<code>044|067)/';

//$rs

//if (preg_match($re, $str)) {
//    echo '+';
//}
$matches = [];
//echo preg_match($re, $str, $matches) ? '+' : '-';
echo preg_match_all($re, $str, $matches, PREG_SET_ORDER) ? '+' : '-';
print_r($matches);