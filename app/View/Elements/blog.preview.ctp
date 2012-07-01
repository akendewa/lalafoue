<div class="blog clearfix">
    <a href="#" class="pull-left">
        <?php
            echo $this->Html->image($blog['Blog']['preview_image_url'],
                array(
                    'class' => 'thumbnail',
                    'style' => 'margin-right : 10px; width : 60px; height : 60px; float : left;'
                )
            );
        ?>
    </a>
    <h4>
        <?php echo $this->Html->link($blog['Blog']['name'], array('controller' => 'blogs', 'action' => 'view', 'url' => $blog['Blog']['url'])); ?>
    </h4>
    <?php
        echo $this->Text->excerpt(htmlspecialchars_decode($blog['Blog']['description']), 200);
    ?>
    <div style="margin-bottom: 5px">
        <?php echo $this->Html->link($blog['Blog']['posts_count'].' articles index&eacute;s',
                array(
                    'controller' => 'blogs',
                    'action' => 'view',
                    $blog['Blog']['url']
                ), array('escape' => false));
            ?>

    </div>                          
    <hr/ >                           
</div>
