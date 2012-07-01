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
                        'style' => 'margin-right : 10px; width : 50px; height : 50px; float : left;'
                    )
                );
            ?>
    </a>
    <h5>
        <?php echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view',  'id' => $post['Post']['id'], 'slug' => $post['Post']['slug'])); ?>
    </h5>
            <div class="date">
                <small><i>Post&eacute; le <?php echo strftime("%d %B %Y &agrave; %H:%M", $this->Time->fromString($post['Post']['created'])) ?></i></small>
            </div>
    <?php if (isset($showBlog) && $showBlog) :?>
    <div style="margin-bottom: 0px">
            <?php echo $this->Html->link($post['Blog']['name'],
                array(
                    'controller' => 'blogs',
                    'action' => 'view',
                    $post['Blog']['url']
                ));
            ?>
    </div>
    <?php endif; ?>
    <hr/ >                           
</div>
