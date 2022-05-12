<?php
   require BLOG_ROOT . '/views/includes/header.php';
?>

<div class="navbar dark">
    <?php
       require BLOG_ROOT . '/views/includes/navbar.php';
    ?>
</div>

<div class="container center">
    <h1>
        Update post
    </h1>

    <form
    action="<?php echo URL_ROOT; ?>/posts/update/<?php echo $data['post']->post_id ?>" method="POST">
        <div class="form-item">
            <input
                type="text"
                name="title"
                value="<?php echo $data['post']->post_title ?>">

            <span class="invalidFeedback">
                <?php echo $data['titleError']; ?>
            </span>
        </div>

        <div class="form-item">
            <textarea name="body" placeholder="Enter your post..."><?php echo $data['post']->post_body ?></textarea>

            <span class="invalidFeedback">
                <?php echo $data['bodyError']; ?>
            </span>
        </div>

        <button class="btn green" name="submit" type="submit">Submit</button>
    </form>
</div>