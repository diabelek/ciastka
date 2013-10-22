<div class="users index">
	<h2><?php __('Users'); ?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?></li>
		</ul>
	</div>
	<table cellpadding="0" cellspacing="1">
		<tr>
			<th><?php __('ID'); ?></th>
			<th><?php __('Login'); ?></th>
			<!--<th><?php __('Roles'); ?></th>-->
			<th><?php __('Delete'); ?></th>
		</tr>
		<?php $i = 0; ?>
		<?php foreach ($users as $user): ?>
		<?php
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr <?php echo $class; ?>>
				<td><?php 
					if (($session->read('Auth.User.username') == 'admin' || $user['User']['username'] != 'admin') && $user['User']['username'] != 'guest')
						echo $this->Html->link($user['User']['id'], array('action' => 'edit', $user['User']['id']), array('class' => 'linkedit'));
					else
						echo $user['User']['id']; ?></td>
				<td><?php 
					if (($session->read('Auth.User.username') == 'admin' || $user['User']['username'] != 'admin') && $user['User']['username'] != 'guest')
						echo $this->Html->link($user['User']['username'], array('action' => 'edit', $user['User']['id']), array('class' => 'linkedit'));
					else
						echo $user['User']['username']; ?></td>
				<!--<td><?php //echo $user['Role']['name']; ?></td>-->
				<td class="actions">
				<?php if ($user['User']['username'] != 'admin' && $user['User']['username'] != 'guest')
					echo $this->Html->link(
						$html->image(
							'icons/delete.png', 
							array('alt' => __('Delete', true), 'title' => __('Delete', true))
						),
						array('action' => 'delete', $user['User']['id']), 
						array('escape' => false), 
						sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>