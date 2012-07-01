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
        echo $this->Form->input('event_id', array('selected' => $event_id, 'escape' => false));
        echo $this->Form->input('media');
        echo $this->Form->input('credit');
        echo $this->Form->input('caption');
    ?>
    <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-large btn-primary'));?>
    <?php echo $this->Form->end();?>
</div>
