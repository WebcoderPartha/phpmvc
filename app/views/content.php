


    <h2>Home Page</h2>
    <hr>

    <article class="postContent">


        <?php if ($data){
            foreach ($data as $post) { ?>
                <div class="post">
                    <h3> <?php echo $post['title']; ?></h3>
                    <h3>Author <b><a href="<?php echo BASE_URL; ?>/index/author/<?php echo $post['studentid']; ?>"><?php echo $post['name']; ?></a></b></h3>
                    <p><?php
                        if (strlen($post['content'] > 200)){
                            $content = substr($post['content'], 0, 200);
                            echo $content;

                        }else{
                            echo $post['content'];
                        }

                    ?></p>
                    <a href="<?php echo BASE_URL ?>/index/post/<?php echo $post['id']; ?>" class="readmore">Read More</a>
                </div>
        <?php    }
        }else {
            echo "<h2> No post found..!";
        }
        ?>

    </article>




