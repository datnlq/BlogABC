<?php
    require_once '../app/helpers/session_helper.php';
?>
<div class="navbar dark">
    <?php
        require BLOG_ROOT . '/views/includes/navbar.php';
        require BLOG_ROOT . '/views/includes/header.php';
    ?>
</div>


<div class="container">

<?php if(isLoggedIn()): ?>
        <a class="btn green" href="<?php echo URL_ROOT; ?>/posts/create">
            Create
        </a>
    <?php endif; ?>


    <?php foreach($data['posts'] as $post): ?>

            <?php if(isLoggedIn() && $_SESSION['user_id'] == $post->user_id): ?>
                <a class="btn blue" href="<?php echo URL_ROOT . '/posts/update/' . $post->post_id ?>">Edit  </a>
                <form action="<?php echo URL_ROOT . "/posts/delete/" . $post->post_id ?>" method="POST">
                    <input type="submit" name="delete" value="Delete" class="btn red">
                </form>

            <?php endif; ?>
        <div class="card">
            <h2>    
                <?php echo $post->post_title; ?> 
            </h2>
            <h3>
                <?php echo 'Created on: ' .date('F j h:m', strtotime($post->post_created)) ?>
            </h3>
            <p>
                <?php echo $post->post_body; ?>
            </p>

        </div>
    <?php endforeach; ?>
</div>