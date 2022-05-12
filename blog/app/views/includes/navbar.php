<nav class="navbar navbar-expand navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo URL_ROOT; ?>/pages">BlogABC</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URL_ROOT; ?>/pages">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL_ROOT; ?>/posts">Posts</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

      <?php if(isset($_SESSION['user_id'])) : ?>
        <ul>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['username']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo URL_ROOT; ?>/users/profile">Profile</a></li>
            <li><a class="dropdown-item" href="<?php echo URL_ROOT; ?>/users/logout">Logout</a></li>
          </ul>
        </li>
        </ul>
    <?php else : ?>
            <a href="<?php echo URL_ROOT; ?>/users/login">Login</a>
    <?php endif; ?>
    
    </div>
  </div>
</nav>

