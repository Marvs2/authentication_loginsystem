
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
  <div class="container">
    <a class="navbar-brand"href="index.php">MY FORM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">HOME</a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="features.php">Features</a>
        </li>
        <?php 
          if(isset($_SESSION['auth']))
          {
            ?>
             <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             <?= $_SESSION['auth_user']['email']; ?>
             </a>
             <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
               <li><a class="dropdown-item" href="#">Action</a></li>
               <li><a class="dropdown-item" href="#">Another action</a></li>
               <li><a class="dropdown-item" href="logout.php">Logout</a></li>
             </ul>
             </li>
             <?php
          }
          else
          {
            ?>
              <li class="nav-item">
                <a class="nav-link" href="register.php">REGISTER</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">LOGIN</a>
              </li>
            <?php
          }
        ?>
      </ul>
    </div>
  </div>
</nav>

