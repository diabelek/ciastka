<div class="mails index">
    <h2><?php __('Mails'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Mail', true), array('action' => 'add')); ?></li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="1">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('confirmed'); ?></th>
			<th><?php echo $this->Paginator->sort('operation_key'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?php __('Delete'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($mails as $mail):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
        ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $mail['Mail']['id']; ?>&nbsp;</td>
                <td><?php echo $this->Html->link($mail['Mail']['email'], array('action' => 'edit', $mail['Mail']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
				<td><?php echo $mail['Mail']['confirmed']; ?>&nbsp;</td>
				<td><?php echo $mail['Mail']['operation_key']; ?>&nbsp;</td>
                <td><?php echo $mail['Mail']['created']; ?>&nbsp;</td>
                <td><?php echo $mail['Mail']['modified']; ?>&nbsp;</td>
                <td class="actions">
                <?php 
                    echo $this->Html->link(
                        $html->image(
                            'icons/delete.png', 
                            array('alt' => __('Delete', true), 'title' => __('Delete', true))
                        ), 
                        array('action' => 'delete', $mail['Mail']['id']), 
                        array('escape' => false), 
                        sprintf(__('Are you sure you want to delete # %s?', true), $mail['Mail']['id'])); ?>
            </td>
        </tr>
        <?php endforeach; ?>
            </table>
            <p>
        <?php
                echo $this->Paginator->counter(array(
                    'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
                ));
        ?>	</p>

            <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class' => 'disabled')); ?>
        	 | 	<?php echo $this->Paginator->numbers(); ?>
                |
        <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>