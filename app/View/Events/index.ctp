<div class="btn-toolbar pull-right">
    <div class="btn-group">
        <?php echo $this->Html->link(__('add new event'), array('action' => 'add', 'admin' => false), array('class' => 'btn'));?>
    </div>
</div>
<div class="events index">
    <table class="table table-striped table-bordered table-condensed">
        <tr>
            <th><?php echo $this->Paginator->sort('start_date', __('Start Date'));?></th>
            <th><?php echo $this->Paginator->sort('end_date', __('End Date'));?></th>
            <th><?php echo $this->Paginator->sort('headline', __('Headline'));?></th>
            <th><?php echo $this->Paginator->sort('description', __('Description'));?></th>
            <th><?php echo $this->Paginator->sort('is_active', __('Active'));?></th>
            <th class="span2"><?php echo __('Actions');?></th>
            <th class="span2"><?php echo __('Asset'); ?></th>
        </tr>
        <?php foreach ($events as $event): ?>
        <tr>
            <td><?php echo h($event['Event']['start_date']); ?>&nbsp;</td>
            <td><?php echo h($event['Event']['end_date']); ?>&nbsp;</td>
            <td><?php echo $event['Event']['headline'] ?>&nbsp;</td>
            <td><?php echo $event['Event']['description'] ?>&nbsp;</td>
            <td>
            <?php
                if ($event['Event']['is_active']) {
                    echo '<span class="label label-success">'.__('YES').'</span>';
                } else {
                    echo '<span class="label label-important">'.__('NO').'</span>';
                }
            ?>
            </td>
            <td>
                <?php echo $this->Html->link(__('edit this event'), array('action' => 'edit', $event['Event']['id']), array('class' => 'btn')); ?>
            </td>
            <td>
            <?php
                if (isset($event['Asset']) && $event['Asset']['id'] != '') {
                    echo $this->Html->link(__('edit asset'), array('controller' => 'assets', 'action' => 'edit', $event['Asset']['id']), array('class' => 'btn btn-primary'));
                } else {
                    echo $this->Html->link(__('add new asset'), array('controller' => 'assets', 'action' => 'add', '?' => array('event_id' => $event['Event']['id'])), array('class' => 'btn btn-success'));
                }
            ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
            ));
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
