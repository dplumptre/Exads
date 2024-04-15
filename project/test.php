<?php


$num = 60;
$d = 0;

try{
    $r = $num/$d;
}catch(Exception $e){
    echo "something went really wrong ok - ". $e;
}


echo $r;