<?php 
function connect(){
$host = 'localhost';
$user = 'root';
$pass = '';
$dbase_name = 'maxsat';

$conect = new mysqli($host, $user, $pass, $dbase_name);
return $conect;
 
echo "connected";
}





?>