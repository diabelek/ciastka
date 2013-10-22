<div class="categories index">
    <h2><?php __('Select Category'); ?></h2>
    <table cellpadding="0" cellspacing="1">
        <tr>
            <th><?php echo __('id'); ?></th>
            <th><?php echo __('name'); ?></th>
            <th><?php echo __('alias'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($category_list as $key => $value): ?>
        <?php
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }

            foreach ($category_flat_list as $category) {
                if ($category['Category']['id'] == $key) {
                    $curcategory = $category;
                    break;
                }
            }
        ?>
            <tr <?php echo $class; ?>>
                <td><a href="#" class="item-selection" title="array('plugin'=>false, 'controller'=>'articles', 'action'=>'category', '<?php echo $curcategory['Category']['alias']; ?>')"><?php echo $key; ?></a></td>
                <td><a href="#" class="item-selection" title="array('plugin'=>false, 'controller'=>'articles', 'action'=>'category', '<?php echo $curcategory['Category']['alias']; ?>')"><?php echo $curcategory['Category']['name']; ?></a></td>
                <td><a href="#" class="item-selection" title="array('plugin'=>false, 'controller'=>'articles', 'action'=>'category', '<?php echo $curcategory['Category']['alias']; ?>')"><?php echo $curcategory['Category']['alias']; ?></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>