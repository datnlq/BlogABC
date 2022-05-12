<DOCTYPE html>
    <header>
        <div class="navbar">
        <?php
            require BLOG_ROOT . '/views/includes/header.php';
            require BLOG_ROOT . '/views/includes/navbar.php';
        ?>
        </div>
    </header>

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <form action="<?php echo URL_ROOT; ?>/users/update_profile" method="post" enctype="multipart/form-data">
                    <div class="row mt-3">
                        <div class="col-md-12 flex">
                            <input type="file" class="form-control"  name="file">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    <div class="row mt-3">
                            
                        <span class="font-weight-bold"><?php echo $_SESSION['username']?></span>
                        <span class="text-black-50"><?php echo $_SESSION['email']?></span>
                        <span> </span>
                    </div>
                </div>
            </div>
            <div class="col-md-5 border-right">
            <form action="<?php echo URL_ROOT; ?>/users/update_profile" method="POST">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label class="labels">Full Name</label>
                            <input type="text" class="form-control" name='fullname' placeholder="<?php echo $data['user']->user_fullname?>" value="">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Birthday</label>
                            <input type="text" class="form-control" name='birthday' onblur="this.type='text'" onclick="(this.type='date')" value="" placeholder="<?php echo $data['user']->user_birthday?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Mobile Number</label>
                            <input type="text" class="form-control" name='phone' placeholder="<?php echo $data['user']->user_phone?>" value="">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Address</label>
                            <input type="text" class="form-control" name='address' placeholder="<?php echo $data['user']->user_address?>" value="">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Email </label>
                            <input type="text" class="form-control" name='email' placeholder="<?php echo $data['user']->user_email?>" value="">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit" name="submit" >Save Profile</button>
                    </div>
                </div>
            </form>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                <h4 class="text-right">Post List</h4>
                <div class="row mt-2">
                <?php foreach($data['posts'] as $post): ?>
                    <?php if(isLoggedIn() && $_SESSION['user_id'] == $post->user_id): ?>
                        <a class="btn blue" href="' . URL_ROOT . '/posts/update/' . $post->id . '">Edit  </a>
                        <form action="<?php echo URL_ROOT . "/posts/delete/" . $post->id ?>" method="POST">
                            <input type="submit" name="delete" value="Delete" class="btn red">
                        </form>

                    <?php endif; ?>
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
            </div>
        </div>
    </div>
    </div>
    </div>
</DOCTYPE>

