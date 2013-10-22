    <h1><?php __("Administration panel") ?></h1>
    <div class="user login">
<?php    
    echo $form->create('User', array('action' => 'login'));
    echo $form->input('username');
    echo $form->input('password');
    echo $form->end('login/button.png');
?>
  </div>
