<?php



echo PHP_EOL;
echo 'ex1';
echo PHP_EOL;
$i = 0;
while($i <= 100){
    if($i % 3 === 0 && $i != 0)
    echo $i . ', ';
    $i++;
}


echo PHP_EOL;
echo 'ex2';
echo PHP_EOL;

$a = 0;
do{
    echo $a;
    if($a === 0) echo ' - это ноль';
    if($a % 2 === 0) echo ' - это четное число';
    if($a % 2 != 0) echo ' - это нечетное число';
    $a++;
    echo PHP_EOL;
} while($a <= 10);

echo PHP_EOL;
echo 'ex3';
echo PHP_EOL;

$obl = [];
$obl['Новосибирская обл'] = 'Новосибирск';
$obl['Кузбасс'] = 'Березовский';
$obl['Тульская обл'] = 'Тула';

foreach ($obl as $key => $value){
    echo $key . ', ' . $value;
    echo PHP_EOL;
}

echo PHP_EOL;
echo 'ex4';

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

echo transliteration('привет', $eng);


function transliteration($string, $eng){
    $newStr = '';
    foreach ($string as $value){

        $newStr . $eng[\array_search($value , $eng, true)];
    }
    return $newStr;
}

echo PHP_EOL;
echo 'ex5';
echo PHP_EOL;

function spaceFunc($string){
    $str = \str_split($string);
    while (\in_array(' ', $str, true))
        $str[\array_search(' ', $str, true)] = '_';
    return \implode($str);
}

echo spaceFunc('строка с пробелами');

echo PHP_EOL;
echo 'ex6';

echo PHP_EOL;
echo 'ex7';
echo PHP_EOL;

for($x = 0; $x < 10; print $x++){}

echo PHP_EOL;
echo 'ex8';

foreach ($obl as $key => $value){
    if(\array_search('к', \str_split($value)) == 0 || \array_search('К', \str_split($value)) == 0)
    echo $key . ', ' . $value;
    echo PHP_EOL;
}




