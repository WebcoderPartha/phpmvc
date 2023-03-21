<h2>Single Post Page</h2>
<hr>

<article class="postContent">
    <?php if ($data){
        foreach ($data as $post){ ?>

    <div class="post">
        <h3><?php echo $post['title'] ?></h3>
        <h5>Author By <b><?php echo $post['name'] ?></b></h5>
        <p><?php
                if (strlen($post['content'] > 200)){
                    $content = substr($post['content'], 0, 200);
                    echo $content;
                }
            ?></p>
        <a href="<?php echo BASE_URL ?>/index/post/<?php echo $post['id']; ?>" class="readmore">Read More</a>
        <?php }
        }
        ?>
    </div>


</article>




