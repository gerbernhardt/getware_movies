<?php

$session=mysqli_connect('localhost','root','','getware_movies');
if(mysqli_connect_errno($session)) exit(mysqli_connect_error($session));
 #
 # OBTIENE LAS FUENTES DEL VIDEO
 # MW04Z!ArEJnejJkcGNp
 #
 $data=array('link'=>$movies[$j]['uid']);
 $data=http_build_query($data);
 $context=array('http'=>array('method'=>'POST','header'=>"Content-type: application/x-www-form-urlencoded\r\n"."Content-Length: ".strlen($data)."\r\n",'content'=>$data));
 $context=stream_context_create($context);
 $fp=fopen('http://miradetodo.net/stream/plugins/gkpluginsphp.php','r',false,$context);
 $data=stream_get_contents($fp);
 fclose($fp);
 $data=json_decode($data);
 print_r($data);exit;
?>
