<?php
class RightManagerHelper extends Object
{
	var $rules = null;
	var $default = false;
	var $right_manager = null;

	function init(){
		if (!$this->initialized) {
			App::import('Lib','RightManager');
			$this->right_manager = new RightManager();

			$this->initialized = true;
		}
	}
	
	function check($userId, $controller, $action, $roles = null)
	{
		if ($roles == null)
			return false;

		$rules = array();
		foreach($roles as $role)
			if (isset($role['Role']['rules']))
				$rules[] = $role['Role']['rules'];

		$this->right_manager->initialize($rules);
		$result = $this->right_manager->check($controller, $action);

		return $result;
	}
}
?>