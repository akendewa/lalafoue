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
        echo $this->Form->input('start_date', array('placeholder' => 'Format: 1960,8,7'));
        echo $this->Form->input('end_date', array('placeholder' => 'Format: 1960,8,7'));
        echo $this->Form->input('headline');
        echo $this->Form->input('description');
        echo $this->Form->input('is_active')
    ?>
    <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-large btn-primary'));?>
    <?php echo $this->Form->end();?>
</div>
