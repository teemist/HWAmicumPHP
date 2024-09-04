<?php
function isCollision($a, $b){
    if($a[1] > $b[0]) { echo true; return true; }
    else if($a[0] > $b[1]) { echo true; return true; }
    else { echo false; return false; }
}

$a[0] = 2;
$a[1] = 3;

$b[0] = 3;
$b[1] = 4;
echo isCollision($a, $b);