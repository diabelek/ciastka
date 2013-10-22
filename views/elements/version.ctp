<?php
  $title = Configure::read('Settings.title');
  $version = Configure::read('Settings.version');
  $codename = Configure::read('Settings.codename');
  
  echo $title." ".$version." (".$codename.")"; 
?>