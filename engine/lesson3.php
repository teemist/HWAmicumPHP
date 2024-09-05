<?php


echo PHP_EOL;
echo 'ex1';
echo PHP_EOL;
$i = 0;
while ($i <= 100) {
    if ($i % 3 === 0 && $i != 0)
        echo $i . ', ';
    $i++;
}


echo PHP_EOL;
echo 'ex2';
echo PHP_EOL;

$a = 0;
do {
    echo $a;
    if ($a === 0) echo ' - это ноль';
    else if ($a % 2 === 0) echo ' - это четное число';
    else if ($a % 2 != 0) echo ' - это нечетное число';
    $a++;
    echo PHP_EOL;
} while ($a <= 10);

echo PHP_EOL;
echo 'ex3';
echo PHP_EOL;

$obl = [];
$obl['Новосибирская обл'] = 'Новосибирск';
$obl['Кузбасс'] = 'Березовский';
$obl['Тульская обл'] = 'Тула';
$obl['Курганская обл'] = 'Курган';

foreach ($obl as $key => $value) {
    echo $key . ', ' . $value;
    echo PHP_EOL;
}

echo PHP_EOL;
echo 'ex4';

echo transliteration('привет');


function transliteration($string)
{
    $eng = [];
    $eng['а'] = 'a';
    $eng['б'] = 'b';
    $eng['в'] = 'v';
    $eng['г'] = 'g';
    $eng['д'] = 'd';
    $eng['е'] = 'e';
    $eng['ж'] = 'g';
    $eng['з'] = 'z';
    $eng['и'] = 'i';
    $eng['к'] = 'k';
    $eng['л'] = 'l';
    $eng['м'] = 'm';
    $eng['н'] = 'n';
    $eng['о'] = 'o';
    $eng['п'] = 'p';
    $eng['р'] = 'r';
    $eng['с'] = 's';
    $eng['т'] = 't';
    $eng['у'] = 'u';
    $eng['ф'] = 'f';
    $eng['х'] = 'h';
    $eng['ц'] = 'c';
    $eng['ч'] = 'ch';
    $eng['ш'] = 'sh';
    $eng['щ'] = 'sh';
    $eng['ы'] = 'i';
    $eng['э'] = 'e';
    $eng['ю'] = 'you';
    $eng['я'] = 'ya';
    $length = mb_strlen($string);
    $arrRus = [];
    $engStr = '';
    for ($i = 0; $i < $length; $i++) {
        $arrRus[] = mb_substr($string, $i, 1);
        if($arrRus[$i] === ' ') $engStr = $engStr.' ';
        else {
            foreach ($eng as $key => $value) {
                if ($key == $arrRus[$i])
                    $engStr = $engStr . $value;
            }
        }
    }
    return $engStr;
}

echo PHP_EOL;
echo 'ex5';
echo PHP_EOL;

function spaceFunc($string)
{
    $str = \str_split($string);
    while (\in_array(' ', $str, true))
        $str[\array_search(' ', $str, true)] = '_';
    return \implode($str);
}

echo spaceFunc('строка с пробелами');

echo PHP_EOL;
echo 'ex6';
// Нет прикрепленного файла

echo PHP_EOL;
echo 'ex7';
echo PHP_EOL;

for ($x = 0; $x < 10; print $x++) {
}

echo PHP_EOL;
echo 'ex8';
echo PHP_EOL;

foreach ($obl as $value) {
    if (\mb_substr($value, 0, 1) == 'К')
        echo $value;
}
echo PHP_EOL;

echo 'ex9';
echo PHP_EOL;
function spaceTranslit($string)
{
   $string = transliteration($string);
   return spaceFunc($string);
}
echo spaceTranslit("строка с пробелами");




