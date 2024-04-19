<?php


$num = 60;
$d = 0;

try{
    $r = $num/$d;
}catch(Exception $e){
    echo "nice one". $e;
}


echo $r;