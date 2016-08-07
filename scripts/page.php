<?php

$session=mysqli_connect('localhost','root','','getware_movies');
if(mysqli_connect_errno($session)) exit(mysqli_connect_error($session));

include('subpage.php');
for($i=1;$i<189;$i++){
 //LEE  LA PAGINA
 if(!$fp=fopen('http://miradetodo.net/page/'.$i.'/','r')) break; // de cero salta al 2
 $data=stream_get_contents($fp);
 fclose($fp);

 // SACA LO QUE NO SIRVE
 $data=substr($data,strpos($data,'<div id="mt'));
 $data=substr($data,0,strpos($data,'<div class="nav-previous'));

 // HACE UN EXPLODE DE LOS ITEMS
 $data=substr($data,12);
 $data=explode('<div id="mt-',$data);

 //CREA LAS VARIABLES
 $movies=array();

 //GUARDA DATOS EN LAS VARIABLES
 for($j=0;$j<count($data);$j++){
  $movies[$j]['id']=substr($data[$j],0,strpos($data[$j],'"'));

  $data[$j]=substr($data[$j],strpos($data[$j],'href="http://miradetodo.net/')+28);
  $movies[$j]['link']=substr($data[$j],0,strpos($data[$j],'/"'));

  $data[$j]=substr($data[$j],strpos($data[$j],'src="http://miradetodo.net/wp-content/uploads/')+46);
  $movies[$j]['image']=substr($data[$j],0,strpos($data[$j],'"'));

  $data[$j]=substr($data[$j],strpos($data[$j],'imdbs">')+7);
  $movies[$j]['rate']=substr($data[$j],0,strpos($data[$j],'<'));

  $data[$j]=substr($data[$j],strpos($data[$j],'<h2>')+4);
  $movies[$j]['titlew']=substr($data[$j],0,strpos($data[$j],'<'));

  $data[$j]=substr($data[$j],strpos($data[$j],'year">')+6);
  $movies[$j]['year']=substr($data[$j],0,strpos($data[$j],'<'));

  $data[$j]=substr($data[$j],strpos($data[$j],'dad2">')+6);
  $movies[$j]['qualities']=substr($data[$j],0,strpos($data[$j],'<'));
  subpage($movies,$j); // OBTIENE LOS DATOS RESTANTES DE LA PAGINA
  unset($data);
  $sql='INSERT INTO movies (id,titlew,year,rate,image,link,qualities,title,premiere,duration,categories,sources,uid,sub,description,trailer) VALUES ';
  $sql.='('
  .'"'.$movies[$j]['id'].'",'
  .'"'.$movies[$j]['title'].'",'
  .'"'.$movies[$j]['year'].'",'
  .'"'.$movies[$j]['rate'].'",'
  .'"'.$movies[$j]['image'].'",'
  .'"'.$movies[$j]['link'].'",'
  .'"'.$movies[$j]['qualities'].'",'
  .'"'.$movies[$j]['title'].'",'
  .'"'.$movies[$j]['premiere'].'",'
  .'"'.$movies[$j]['duration'].'",'
  .'"'.implode(',',$movies[$j]['categories']).'",'
  .'"'.$movies[$j]['sources'].'",'
  .'"'.$movies[$j]['uid'].'",'
  .'"'.$movies[$j]['sub'].'",'
  .'"'.$movies[$j]['description'].'",'
  .'"'.$movies[$j]['trailer'].'"'
  .')';
  mysqli_query($session,$sql);
 }
}

?>