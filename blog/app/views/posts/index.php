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
        <?php 
            //Check session to see if user is logged in
            //var_dump($post);
            //var_dump($_SESSION);
            if(isLoggedIn() && $_SESSION['user_id'] == $post->user_id) 
            {
                    //If user is the author, show edit and delete buttons
                    echo '<a class="btn blue" href="' . URL_ROOT . '/posts/update/' . $post->id . '">Edit</a>';
                    echo '<a class="btn red" href="' . URL_ROOT . '/posts/delete/' . $post->id . '">Delete</a>';

            }
        ?>
        <div class="card">
            <h2>    
                <?php echo $post->title; ?> 
            </h2>
            <h3>
                <?php echo 'Created on: ' .date('F j h:m', strtotime($post->create_at)) ?>
            </h3>
            <p>
                <?php echo $post->body; ?>
            </p>

        </div>
    <?php endforeach; ?>
</div>