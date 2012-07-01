<div class="users form">
    <?php
        echo $this->Form->create(
            'User',
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
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('is_admin');
    ?>
    <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-large btn-primary'));?>
    <?php echo $this->Form->end();?>
</div>
<hr />
<div class="btn-toolbar">
    <div class="btn-group">
        <?php echo $this->Html->link(__('List Users'), array('action' => 'index'), array('class' => 'btn'));?>
    </div>
</div>
