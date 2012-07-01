<div class="users index">
    <table class="table table-striped table-bordered table-condensed">
        <tr>
            <th><?php echo $this->Paginator->sort('id');?></th>
            <th><?php echo $this->Paginator->sort('username');?></th>
            <th><?php echo $this->Paginator->sort('is_admin');?></th>
            <th class="actions"><?php echo __('Actions');?></th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
            <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
            <td>
            <?php
                if ($user['User']['is_admin']) {            
                    echo '<span class="label label-important">YES</span>';
                } else {
                    echo '<span class="label label-success">NO</span>';
                }
            ?>
            </td>
            <td class="actions">
                <div class="btn-toolbar">
                    <div class="btn-group">
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn')); ?>
                    </div>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
            echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));
        ?>
    </p>

    <ul class="pagination">
        <li>
            <?php
                echo $this->Paginator->prev('< ' . __('Page précédente'), array('escape' => true), null, array('class' => 'prev disabled', 'escape' => 'true'));
            ?>
        </li>
        <li>
            <?php
                echo $this->Paginator->numbers(array('separator' => ''));
            ?>
        </li>
        <li>
            <?php
                echo $this->Paginator->next(__('Page suivante') . ' >',  array('escape' => false), null, array('class' => 'next disabled'));
            ?>
        </li>
    </ul>
</div>
<hr />
<div class="btn-toolbar">
    <div class="btn-group">
        <?php echo $this->Html->link(__('Add a new user'), array('action' => 'add'), array('class' => 'btn'));?>
    </div>
</div>
