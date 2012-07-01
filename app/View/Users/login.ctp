<div class="users form">
    <?php
        echo $this->Form->create('User', array('inputDefaults' => array(
            'div' => array('class' => 'control-group'),
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'label label-important'))
        )));
    ?>
    <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    <?php echo $this->Form->submit(__('Login'), array('class' => 'btn btn-large btn-primary'));?>
    <?php echo $this->Form->end();?>
</div>

