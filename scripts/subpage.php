<?php
function subpage(&$movies,$id){
 //LEE  LA PAGINA
 $link='http://miradetodo.net/'.$movies[$id]['link'].'/';
 if(!$fp=fopen($link,'r')) exit;
 $data=stream_get_contents($fp);
 fclose($fp);


 // SACA LO QUE NO SIRVE
 $data=substr($data,strpos($data,'sbox">')+6);
 $data=substr($data,0,strpos($data,'<div class="comentarios">'));

 $data=substr($data,strpos($data,'<i itemprop="name">')+19);
 $movies[$id]['title']=substr($data,0,strpos($data,'<'));

 $data=substr($data,strpos($data,'itemprop="datePublished">')+25);
 $movies[$id]['premiere']=substr($data,0,strpos($data,'<'));
 $movies[$id]['premiere']=strtotime($movies[$id]['premiere']);
 $movies[$id]['premiere']=date('Y-m-d',$movies[$id]['premiere']);

 $data=substr($data,strpos($data,'itemprop="duration">')+20);
 $movies[$id]['duration']=substr($data,0,strpos($data,'<'));

 $categories=substr($data,strpos($data,'<i class="limpiar">')+19);
 $categories=substr($categories,0,strpos($categories,'</i>'));
 $movies[$id]['categories']=explode(',',$categories);
 for($i=0;$i<count($movies[$id]['categories']);$i++){
  $movies[$id]['categories'][$i]=substr($movies[$id]['categories'][$i],strpos($movies[$id]['categories'][$i],'>')+1);
  $movies[$id]['categories'][$i]=substr($movies[$id]['categories'][$i],0,strpos($movies[$id]['categories'][$i],'<'));
 }

 $data=substr($data,strpos($data,'class="movieplay">')+18);

 if(strpos($data,'plays.php'))  $movies[$id]['sources']='plays';
 elseif(strpos($data,'usc.php'))  $movies[$id]['sources']='usc';
 else $movies[$id]['sources']='na';

 if($movies[$id]['sources']=='na'){  $data=substr($data,strpos($data,'data-lazy-src="')+15);
  $movies[$id]['uid']=substr($data,0,strpos($data,'"'));

  $movies[$id]['sub']='na';
 }else{  $data=substr($data,strpos($data,'?id=')+4);
  $movies[$id]['uid']=substr($data,0,strpos($data,'&'));

  $data=substr($data,strpos($data,'&')+1);
  $data=substr($data,strpos($data,'=')+1);
  $movies[$id]['sub']=substr($data,0,strpos($data,'.srt'));
 }

 $data=substr($data,strpos($data,'<div class="sbox">'));
 $data=substr($data,strpos($data,'itemprop="description"')+22);
 $data=substr($data,strpos($data,'<p>')+3);
 $movies[$id]['description']=substr($data,0,strpos($data,'</p>'));
 while(preg_match('/</',$movies[0]['description'])){
  $d1=substr($movies[$id]['description'],0,strpos($movies[$id]['description'],'<'));
  $d2=substr($movies[$id]['description'],strpos($movies[$id]['description'],'>')+1);
  $movies[$id]['description']=$d1.$d2;
 }
 $data=substr($data,strpos($data,'youtube.com/embed/')+18);
 $movies[$id]['trailer']=utf8_encode(substr($data,0,strpos($data,'"')));
}

?>