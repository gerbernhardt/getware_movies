<?php

include('subpage.php');

$session=mysqli_connect('localhost','root','','getware_movies');
if(mysqli_connect_errno($session)) exit(mysqli_connect_error($session));

$movies=array();

$sql='SELECT x.id,x.link,x.trailer FROM movies AS x WHERE x.description="" AND x.link NOT LIKE "series/%"';
if($result=mysqli_query($session,$sql)){
 while($fetch=$result->fetch_array()){  $movies[0]['link']=$fetch['link'];
  subpage($movies,0);
  $sql='UPDATE movies AS x SET '
   .'x.title="'.$movies[0]['title'].'",'
   .'x.premiere="'.$movies[0]['premiere'].'",'
   .'x.duration="'.$movies[0]['duration'].'",'
   .'x.categories="'.implode(',',$movies[0]['categories']).'",'
   .'x.sources="'.$movies[0]['sources'].'",'
   .'x.uid="'.$movies[0]['uid'].'",'
   .'x.sub="'.$movies[0]['sub'].'",'
   .'x.description="'.$movies[0]['description'].'",'
   .'x.trailer="'.$movies[0]['trailer'].'"'
   .' WHERE x.id='.$fetch['id'];
   if(!mysqli_query($session,$sql)) exit($sql);
   print '.';
 }
}

?>