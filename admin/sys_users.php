<?php
#
# Getware: Ultra-Secure Script
# Filename: admin/system/sys_users.php, 2011/06/09
# Copyright (c) 2004 - 2011 by German Bernhardt
# E-mail: <german.bernhardt@gmail.com>
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License.
#
if(!preg_match('/index.php/',$_SERVER['PHP_SELF'])) header('Location: ../../')&&exit();

$_TABLE['name']='sys_users';
$KERNEL->table();
$_MODULE['title']='users';
if($KERNEL->privilege('add')) {
 $_MODULE['table']='100%';
 $_MODULE['size']=array(20,20,7,7);
 $KERNEL->dialog->add->show();
} elseif($KERNEL->privilege('edit')) {
 $KERNEL->dialog->edit->show();
}
 $_MODULE['search']['size']=array(20,7,7);
 $_MODULE['search']['name']=array('username','type','access');
 $_MODULE['search']['field']=array('username','type','access');
 $_MODULE['grid']['size']=array(20,7,7);
 $_MODULE['grid']['name']=array('username','type','access');
 $_MODULE['grid']['field']=array('username','type','access');
 $_MODULE['grid']['menu']['field']=array('edit','add');
 $KERNEL->search->autocomplete();
 $KERNEL->dialog->autocomplete();
 $KERNEL->query->make();
 $KERNEL->search->content();
 $KERNEL->grid->content();
 $KERNEL->json_print();

?>