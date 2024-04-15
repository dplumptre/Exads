<?php


$num = 60;
$d = 0;

try{
    $r = $num/$d;
}catch(Exception $e){
    echo "something went really wrong ok - 22". $e;
}


echo $r;