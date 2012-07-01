<div class="post clearfix">
    <a href="#" class="pull-left">
        <?php
            $image = '';
                if ($post['Post']['image_url'] != '') {
                    $image = $post['Post']['image_url'];
                } else {
                    $image = $post['Blog']['preview_image_url'];
                }
                echo $this->Html->image($image,
                    array(
                        'class' => 'thumbnail',
                        'style' => 'margin-right : 10px; width : 100px; height : 100px; float : left;'
                    )
                );
        ?>
    </a>
    <h4>
        <?php echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', 'id' => $post['Post']['id'], 'slug' => $post['Post']['slug'])); ?>
    </h4>
    <div class="date">
        <small><i>Post&eacute; le <?php echo strftime("%d %B %Y &agrave; %H:%M", $this->Time->fromString($post['Post']['created'])) ?></i></small>
    </div>
    <?php
        echo $this->Text->excerpt(htmlspecialchars_decode($post['Post']['description']), 100);
    ?>
    <div style="margin-bottom: 5px">
        <?php echo $this->Html->link($post['Blog']['name'],
                array(
                    'controller' => 'blogs',
                    'action' => 'view',
                    $post['Blog']['url']
                ));
            ?>

    </div>                          
    <hr/ >                           
</div>
