    <!--<h1><?php __("Login") ?></h1-->
    <fieldset class="user login">
	<legend><?php __("Login") ?></legend>
<?php    
    echo $form->create('User', array('action' => 'login'));
    echo $form->input('username');
    echo $form->input('password');
    echo $form->end(__('Login', true));
?>
  </fieldset>
