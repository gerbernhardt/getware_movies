<?php
if(!preg_match('/index.php/',$_SERVER['PHP_SELF'])) header('Location: ../../')&&exit();
$_TABLE['name']='movies';
$KERNEL->table();
$_MODULE['title']='movies';
$_MODULE['width']=740;
if($KERNEL->privilege('add')) {
 $KERNEL->dialog->add->show();
} elseif($KERNEL->privilege('edit')) {
 $KERNEL->dialog->edit->show();
}
 $_MODULE['search']['size']=array(20);
 $_MODULE['search']['name']=array('title');
 $_MODULE['search']['field']=array('title');
 $_MODULE['grid']['size']=array(20);
 $_MODULE['grid']['name']=array('title');
 $_MODULE['grid']['field']=array('title');
 $_MODULE['grid']['menu']['field']=array('edit','add');
 $KERNEL->search->autocomplete();
 $KERNEL->dialog->autocomplete();
 $KERNEL->query->make();
 $KERNEL->search->content();
 $KERNEL->grid->content();
 $KERNEL->json_print();

?>