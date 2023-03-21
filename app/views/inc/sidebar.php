<aside class="sidebar">
    <div class="widget">
        <h3>Category</h3>
        <hr>
        <ul>
            <?php
            if ($data){
                foreach ($students as $author) { ?>
                <li><a href="<?php echo BASE_URL ?>/index/author/<?php echo $author['id']; ?>"><?php echo $author['name']; ?></a></li>
            <?php  } }
            ?>
        </ul>
    </div>
    <div class="widget">
        <h3>Latest Post</h3>
        <hr>
        <ul>
            <?php
            if ($data){
                foreach ($allpost as $post) { ?>
                    <li><a href="<?php echo BASE_URL ?>/index/post/<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></li>
                <?php  } }
            ?>
        </ul>
    </div>
</aside>