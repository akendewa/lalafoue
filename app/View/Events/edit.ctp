<div class="btn-toolbar pull-right">
    <div class="btn-group">
        <?php echo $this->Html->link(__('list all events'), array('action' => 'index', 'admin' => false), array('class' => 'btn'));?>
        <?php echo $this->Html->link(__('add new event'), array('action' => 'add', 'admin' => false), array('class' => 'btn')); ?>
    </div>
</div>
<div class="events form">
    <?php
        echo $this->Form->create(
            'Event',
            array(
                'inputDefaults' => array(
                    'div' => array('class' => 'control-group'),
                    'error' => array(
                        'attributes' => array(
                            'wrap' => 'span',
                            'class' => 'label label-important'
                        )
                    )
                )
            )
        );
    ?>
    <?php
        echo $this->Form->input('start_date');
        echo $this->Form->input('end_date');
        echo $this->Form->input('headline', array('escape' => false));
        echo $this->Form->input('description', array('escape' => false));
        echo $this->Form->input('is_active');
    ?>

    <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-large btn-primary'));?>
    <?php echo $this->Form->end();?>
</div>
<hr />
<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', 'admin' => true, $this->Form->value('Event.id')), array('class' => 'btn btn-small btn-danger') , __('Are you sure you want to delete # %s?', $this->Form->value('Event.id'))); ?>
