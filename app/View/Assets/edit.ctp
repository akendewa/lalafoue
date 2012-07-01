<div class="assets form">
    <?php
        echo $this->Form->create(
            'Asset',
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
        echo $this->Form->input('id');
        echo $this->Form->input('event_id', array('escape' => false));
        echo $this->Form->input('media', array('escape' => false));
        echo $this->Form->input('credit', array('escape' => false));
        echo $this->Form->input('caption', array('escape' => false));
    ?>
    <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-large btn-primary'));?>
    <?php echo $this->Form->end();?>
</div>
<hr />
<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', 'admin' => true, $this->Form->value('Asset.id')), array('class' => 'btn btn-small btn-danger') , __('Are you sure you want to delete # %s?', $this->Form->value('Asset.id'))); ?>
