<?php
    session_start();
   require BLOG_ROOT . '/views/includes/header.php';
?>
<div id="section-landing">
    <?php
       require BLOG_ROOT . '/views/includes/navbar.php';
    ?>

    <div class="wrapper-landing">
        <h1>One man's crappy software</h1>
        <h2>is another man's full-time job.</h2>
    </div>
</div>
<?php
    var_dump($_SESSION); ;
?>