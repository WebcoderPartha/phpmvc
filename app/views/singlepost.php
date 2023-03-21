


<h2>Single Post Page</h2>
<hr>

<article class="postContent">

            <div class="post">
                <?php if ($data) {
                    foreach ($data as $post){ ?>
                <h3><?php echo $post['title']; ?></h3>
                <h5>Author By <a href=""><?php echo $post['name'] ?></a></h5>
                <p><?php echo $post['content']; ?></p>
                    <?php }
                }?>

            </div>


</article>




